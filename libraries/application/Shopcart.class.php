<?

//echo $path;exit;
//print_r($_REQUEST);
/**
 * @package			:	class.cart.php
 * @author				:	Pradip Dash
 * @Create/Modify Date	:	30 Dec,2009
 * @Description : Add/ Remove on Cart
 */
class Cart
{
	var $mode;
	var $total = 0;
	var $total_price = 0;
	var $taxable_total = 0;
	var $itemcount = 0;
	var $items = 0;
	var $iProductId = 0;
	var $itemprices = 0;
	var $option = 0;
	var $itemqtys = 0;
	var $productname = 0;
    var $categoryid = 0;
    var $categorytype = 0;

	function CartProduct($CartArr){	
	$this->mode = $CartArr['mode'];
	$this->iProductId = $CartArr['iProductId'];
	$this->itemqtys = $CartArr['itemqtys'];
	$this->productname = $CartArr['productname'];
	$this->itemprices = $CartArr['itemprices'];
        $this->categoryid = $CartArr['categoryid'];
        $this->categorytype = $CartArr['categorytype'];
		

		switch($this->mode){
			case "Add":
				$output=$this->addItem();
			break;
			case "Delete":
				$output=$this->removeItem();
			break;
			case "RemoveAll":
				$this->removeAll();
			break;
			case "Update":
				$output = $this->UpdateItem();
			break;
			default:
				$this->showMyBag();
			break;
		}
		
		return $output;		
	}
	
 	//add item to order
	function addItem(){
		global $obj;
		//echo "<pre>";
		//print_r($_SESSION);exit;
	
		if($this->itemqtys == ""  || $this->itemqtys == "0"){
			$this->itemqtys = 1;
		}
		if(count($_SESSION['Cart']['sess_iProductId']) > 0){
			if(in_array($this->iProductId,$_SESSION['Cart']['sess_iProductId']) && in_array($this->categoryid,$_SESSION['Cart']['sess_categoryid'])){
				$productexist = 1;
				$productsucc=0;
				$key=array_search($this->iProductId,$_SESSION['Cart']['sess_iProductId']);
                $keycat=array_search($this->categoryid,$_SESSION['Cart']['sess_categoryid']);
                
				
                if($key == $keycat){
                    //echo $key;exit;
    				$_SESSION['Cart']['sess_itemqtys'][$key] = $_SESSION['Cart']['sess_itemqtys'][$key]+$this->itemqtys;
    				
                    if($this->categoryid ==1){
                       $sql = "SELECT * FROM product_general_item WHERE iProductId = '".$this->iProductId."'";				
                    }else if($this->categoryid ==2){
                        $sql = "SELECT * FROM product_clothing_accessories WHERE iProductId = '".$this->iProductId."'";
                    }
                    $db_sql = $obj->MySQLSelect($sql);
    				
    			
    				$_SESSION['Cart']['sess_total_price'] = $_SESSION['Cart']['sess_total_price'] + (($this->itemqtys * $this->itemprices) - $db_sql[0]['fDiscount']);
    			
    				//$_SESSION['Cart']['sess_total_product'] = $_SESSION['Cart']['sess_total_product']+$this->itemqtys; 
                }
                
				
			}else{
				$productexist = 0;
			}	
		}
		if($productexist !='1'){
			
            if($this->categoryid ==1){
               $sql = "SELECT * FROM product_general_item WHERE iProductId = '".$this->iProductId."'";				
            }else if($this->categoryid ==2){
                $sql = "SELECT * FROM product_clothing_accessories WHERE iProductId = '".$this->iProductId."'";
            }
			
            $db_sql = $obj->MySQLSelect($sql);
            
		$_SESSION['Cart']['sess_total_price'] = $_SESSION['Cart']['sess_total_price'] + ($this->itemqtys * $this->itemprices) - $db_sql[0]['fDiscount'];
			
		$_SESSION['Cart']['sess_total_product'] = $_SESSION['Cart']['sess_total_product']+$this->itemqtys;
		$_SESSION['Cart']['sess_iProductId'][] = $this->iProductId;
			//set item quantitiy in to qty array
			
		$_SESSION['Cart']['sess_images'][] = $db_sql[0]['vProductImage'];
		$_SESSION['Cart']['sess_itemqtys'][] = $this->itemqtys;
		$_SESSION['Cart']['sess_itemprices'][] = $this->itemprices;
		$_SESSION['Cart']['sess_productname'][] = $this->productname;
		$_SESSION['Cart']['sess_categoryid'][] = $this->categoryid;
		$_SESSION['Cart']['sess_categorytype'][] = $this->categorytype;
		$_SESSION['Cart']['sess_iMemberId'][] = $db_sql[0]['iMemberId'];
		$productsucc=1;
		}
		
		//echo "<pre>";
		//print_r($_SESSION);exit;
                //echo $productsucc;exit;
		return $productsucc =$productsucc."|".$_SESSION['Cart']['sess_total_product'];;

	}
    
   
   	//remove item from menu order
	function removeItem(){
	global $obj;
		$key=array_search($this->iProductId,$_SESSION['Cart']['sess_iProductId']);
		//$keycat=array_search($this->categoryid,$_SESSION['Cart']['sess_categoryid']);
		
		$price = ($_SESSION['Cart']['sess_itemqtys'][$key] * $_SESSION['Cart']['sess_itemprices'][$key]);
		$total_price = $_SESSION['Cart']['sess_total_price'] - $price;
		
		$_SESSION['Cart']['sess_total_price'] = $total_price;
		
		$_SESSION['Cart']['sess_total_product'] = $_SESSION['Cart']['sess_total_product'] - 1;
		
		
		array_splice($_SESSION['Cart']['sess_iProductId'],$key,1);
		array_splice($_SESSION['Cart']['sess_images'],$key,1);
		array_splice($_SESSION['Cart']['sess_itemqtys'],$key,1);
		array_splice($_SESSION['Cart']['sess_itemprices'],$key,1);
		array_splice($_SESSION['Cart']['sess_productname'],$key,1);
		array_splice($_SESSION['Cart']['sess_categoryid'],$key,1);
		array_splice($_SESSION['Cart']['sess_categorytype'],$key,1);
		array_splice($_SESSION['Cart']['sess_iMemberId'],$key,1);
		
		if($_SESSION['Cart']['sess_total_product'] == 0){
			$_SESSION['Cart']['sess_total_price'] = '0.00';
		}
		$productsucc = 'success';
		return $productsucc = $productsucc."|".$_SESSION['Cart']['sess_total_product'];;
	
		
	}


	//show menu order bag on left side
	function showMyBag($start){
		global $obj,$store_logo_url,$product_image_url,$product_image_path,$site_image_url,$store_logo_path,$FRONT_REC_LIMIT_ALL,$GeneralObj;
		
		if($start == ''){
			$start = 0;
		}
		if((count($_SESSION['Cart']['sess_iProductId'])-$start) > 5){
			$loop = $start + $FRONT_REC_LIMIT_ALL;
		}else{
			$loop = count($_SESSION['Cart']['sess_iProductId']);
		}
		//echo "<pre>";
		//print_r($_SESSION);exit;
		//echo $loop;
		//echo $start;
		$j=0;
		for($i=$start;$i<$loop;$i++){
			$sql = "SELECT p.iProductId, p.vProductName,p.fPrice,p.iStoreId,p.fDiscount,p.vImage as productimage,s.vImage 
				FROM product as p 
				INNER JOIN 
				store as s
				ON (p.iStoreId = s.iStoreId)
				WHERE iProductId = '".$_SESSION['Cart']['sess_iProductId'][$i]."'";
			$db_sql = $obj->select($sql);
			//echo "<pre>";
			//print_r($db_sql);//exit;
			for($k=0;$k<count($db_sql);$k++){
				$ProductArr[$j]['iProductId'] = $db_sql[$k]['iProductId'];
				$ProductArr[$j]['vProductName'] = $db_sql[$k]['vProductName'];				
				$ProductArr[$j]['iStoreId'] = $db_sql[$k]['iStoreId'];
                                
                                 if($db_sql[$k]['vImage'] !='' && is_file($store_logo_path.$db_sql[$k]['vImage'])){
                                        $ProductArr[$j]['vImage'] = $store_logo_url.$db_sql[$k]['vImage'];
                                }else{
                                        $ProductArr[$j]['vImage'] = $site_image_url."store-noimage.gif";
                                }
                                //$ProductArr[$j]['vImage'] = $store_logo_url.$db_sql[$k]['vImage'];
                               // print_r($product_image_url.$db_sql[$k]['productimage']);
				if($db_sql[$k]['productimage'] !='noimage.jpg' && $db_sql[$k]['productimage'] !='' && filesize($product_image_path.$db_sql[$k]['iStoreId']."/".$db_sql[$k]['productimage']) > 531 && is_file($product_image_path.$db_sql[$k]['iStoreId']."/".$db_sql[$k]['productimage'])){                              
                                        $ProductArr[$j]['vProductImage'] = $product_image_url.$db_sql[$k]['iStoreId']."/".$db_sql[$k]['productimage'];
                                }else{
                                        $ProductArr[$j]['vProductImage'] = $site_image_url.'noimage.jpg';
                                }
				$ProductArr[$j]['fPrice'] = $db_sql[$k]['fPrice'];
				$ProductArr[$j]['iQty'] = $_SESSION['Cart']['sess_itemqtys'][$i];
				$ProductArr[$j]['fDiscount'] = $db_sql[$k]['fDiscount'];
				$ProductArr[$j]['totalprice'] = $GeneralObj->Make_Currency(($_SESSION['Cart']['sess_itemqtys'][$i]*$db_sql[$k]['fPrice'])-$db_sql[$k]['fDiscount']);
				$ProductArr[$j]['totalpricecal'] = ($_SESSION['Cart']['sess_itemqtys'][$i]*$db_sql[$k]['fPrice'])-$db_sql[$k]['fDiscount'];
				
			}
		$j++;		
		}
		//echo "<pre>";
		//print_r($ProductArr);
		$ProductArr_new = $this->Sort_by_value($ProductArr,'iStoreId');
		return $ProductArr_new;
	}
	
	//show menu order bag on left side
	function showMyPopBag($start){
		global $obj,$store_logo_url,$product_image_url,$product_image_path,$site_image_url,$store_logo_path,$FRONT_REC_LIMIT_ALL,$GeneralObj;
		
		if($start == ''){
			$start = 0;
		}
		if((count($_SESSION['Cart']['sess_iProductId'])-$start) > 5){
			$loop = $start + 5;
		}else{
			$loop = count($_SESSION['Cart']['sess_iProductId']);
		}
		//echo "<pre>";
		//print_r($_SESSION);exit;
		//echo $loop;
		//echo $start;
		$j=0;
		for($i=$start;$i<$loop;$i++){
			$sql = "SELECT p.iProductId, p.vProductName,p.fPrice,p.iStoreId,p.fDiscount,p.vImage as productimage,s.vImage 
				FROM product as p 
				INNER JOIN 
				store as s
				ON (p.iStoreId = s.iStoreId)
				WHERE iProductId = '".$_SESSION['Cart']['sess_iProductId'][$i]."' order by iStoreId DESC ";
			$db_sql = $obj->select($sql);
			//echo "<pre>";
			//print_r($db_sql);//exit;
			for($k=0;$k<count($db_sql);$k++){
				$ProductArr[$j]['iProductId'] = $db_sql[$k]['iProductId'];
				$ProductArr[$j]['vProductName'] = $db_sql[$k]['vProductName'];				
				$ProductArr[$j]['iStoreId'] = $db_sql[$k]['iStoreId'];
                                
                                 if($db_sql[$k]['vImage'] !='' && is_file($store_logo_path.$db_sql[$k]['vImage'])){
                                        $ProductArr[$j]['vImage'] = $store_logo_url.$db_sql[$k]['vImage'];
                                }else{
                                        $ProductArr[$j]['vImage'] = $site_image_url."store-noimage.gif";
                                }
                                //$ProductArr[$j]['vImage'] = $store_logo_url.$db_sql[$k]['vImage'];
                               // print_r($product_image_url.$db_sql[$k]['productimage']);
				if($db_sql[$k]['productimage'] !='noimage.jpg' && $db_sql[$k]['productimage'] !='' && filesize($product_image_path.$db_sql[$k]['iStoreId']."/".$db_sql[$k]['productimage']) > 531 && is_file($product_image_path.$db_sql[$k]['iStoreId']."/".$db_sql[$k]['productimage'])){                              
                                        $ProductArr[$j]['vProductImage'] = $product_image_url.$db_sql[$k]['iStoreId']."/".$db_sql[$k]['productimage'];
                                }else{
                                        $ProductArr[$j]['vProductImage'] = $site_image_url.'noimage.jpg';
                                }
				$ProductArr[$j]['fPrice'] = $db_sql[$k]['fPrice'];
				$ProductArr[$j]['iQty'] = $_SESSION['Cart']['sess_itemqtys'][$i];
				$ProductArr[$j]['fDiscount'] = $db_sql[$k]['fDiscount'];
				$ProductArr[$j]['totalprice'] = $GeneralObj->Make_Currency(($_SESSION['Cart']['sess_itemqtys'][$i]*$db_sql[$k]['fPrice'])-$db_sql[$k]['fDiscount']);
				$ProductArr[$j]['totalpricecal'] = ($_SESSION['Cart']['sess_itemqtys'][$i]*$db_sql[$k]['fPrice'])-$db_sql[$k]['fDiscount'];
			}
			//$newarr = $GeneralObj->array_sort($ProductArr,$ProductArr[$j]['iStoreId'],'');
		$j++;
		}
		//echo "<pre>";
		//print_r($ProductArr);//exit;
		$ProductArr_new = $this->Sort_by_value($ProductArr,'iStoreId');
		//echo "<pre>";
		//print_r($ProductArr_new);//exit;
		return $ProductArr_new;
	}
	
	
	
	
	function removeAll(){
		unset($_SESSION['Cart']['sess_iMemberId']);
		unset($_SESSION['Cart']['sess_categorytype']);
		unset($_SESSION['Cart']['sess_categoryid']);
		unset($_SESSION['Cart']['sess_images']);
		unset($_SESSION['Cart']['sess_itemqtys']);
		unset($_SESSION['Cart']['sess_productname']);
		unset($_SESSION['Cart']['sess_iProductId']);
		unset($_SESSION['Cart']['sess_itemprices']);
		unset($_SESSION['Cart']['sess_option']);
		unset($_SESSION['Cart']['sess_total_price']);
		unset($_SESSION['Cart']['sess_total_product']);
	}
	
		//show menu order bag on left side
	function UpdateItem(){
		global $obj;
      $sql = "SELECT p.iProductId, p.vProductName,p.fPrice,p.iStoreId,p.fDiscount,p.vImage as productimage,s.vImage 
				FROM product as p 
				INNER JOIN 
				store as s
				ON (p.iStoreId = s.iStoreId)
				WHERE iProductId = '".$this->iProductId."' ";
			$db_sql = $obj->select($sql);  
			$key=array_search($this->iProductId,$_SESSION['Cart']['sess_iProductId']);
			$_SESSION['Cart']['sess_itemqtys'][$key] =  $this->itemqtys;
                   
                        $totalprice = ($_SESSION['Cart']['sess_itemqtys'][$key] * $_SESSION['Cart']['sess_itemprices'][$key]) - $db_sql[0]['fDiscount'];
                        $_SESSION['Cart']['sess_total_price'] ='0.00';
                        for($i=0;$i<count($_SESSION['Cart']['sess_iProductId']);$i++){
                                  $sql = "SELECT p.iProductId, p.vProductName,p.fPrice,p.iStoreId,p.fDiscount,p.vImage as productimage,s.vImage 
				FROM product as p 
				INNER JOIN 
				store as s
				ON (p.iStoreId = s.iStoreId)
				WHERE iProductId = '".$this->iProductId."' ";
                                
                                $_SESSION['Cart']['sess_total_price'] = $_SESSION['Cart']['sess_total_price']+($_SESSION['Cart']['sess_itemqtys'][$i] * $_SESSION['Cart']['sess_itemprices'][$i]) - $db_sql[$i]['fDiscount'];
                                
                        }
                        return $totalprice; 
		}
	
		//show menu order bag on left side
	function showMyEmailBag(){
		global $obj,$store_logo_url,$product_image_url,$product_image_path,$site_image_url,$store_logo_path,$GeneralObj;
		
		for($i=0;$i<count($_SESSION['Cart']['sess_iProductId']);$i++){
		        if($_SESSION['Cart']['sess_categoryid'][$i] == 1){
			
			$sql1="SELECT p.iProductId,p.iMemberId, p.vProductName,p.fPrice,p.iStoreCategoryId,p.iShippingCost,p.vProductImage as productimage FROM store_category as s
			       LEFT JOIN product_general_item as p ON (s.iStoreCategoryId = p.iStoreCategoryId) WHERE p.iProductId = '".$_SESSION['Cart']['sess_iProductId'][$i]."' ";
				//echo $sql1;
			}
			if($_SESSION['Cart']['sess_categoryid'][$i] == 2){
				
			$sql1 ="SELECT pc.iProductId,pc.iMemberId,pc.vProductName,pc.fPrice,pc.fHandlingCost,pc.iStoreCategoryId,pc.vProductImage as clothImage FROM store_category as s
			       LEFT JOIN product_clothing_accessories as pc ON (s.iStoreCategoryId = pc.iStoreCategoryId) WHERE pc.iProductId = '".$_SESSION['Cart']['sess_iProductId'][$i]."' ";
				//echo $sql1;
			}
				
				//SELECT p.iProductId, p.vProductName,p.fPrice,p.iStoreCategoryId,p.iShippingCost,p.vProductImage as productimage,s.vStoreImage,pc.iProductId,pc.vProductName,pc.fPrice,pc.fHandlingCost,pc.iStoreCategoryId,pc.vProductImage as clothImage FROM store_category as s LEFT JOIN product_general_item as p ON
				//(s.iStoreCategoryId = p.iStoreCategoryId) LEFT JOIN product_clothing_accessories as pc ON (s.iStoreCategoryId = pc.iStoreCategoryId) WHERE p.iProductId = '39' OR  pc.iProductId= '64'
			$db_sql = $obj->MySQLSelect($sql1);
			
			
			for($k=0;$k<count($db_sql);$k++){
				$ProductArr[$i]['iProductId'] = $db_sql[$k]['iProductId'];
				$ProductArr[$i]['vProductName'] = $db_sql[$k]['vProductName'];
				$ProductArr[$i]['iMemberId'] = $db_sql[$k]['iMemberId'];	
				$ProductArr[$i]['iStoreCategoryId'] = $db_sql[$k]['iStoreCategoryId'];
                                if($db_sql[$k]['vImage'] !='' && is_file($store_logo_path.$db_sql[$k]['vImage'])){
                                        $ProductArr[$i]['vImage']  = $store_logo_url.$db_sql[$k]['vImage'];
                                }else{
                                        $ProductArr[$i]['vImage']  = $site_image_url."store-noimage.gif";
                                }
                              
                               if($db_sql[$k]['productimage'] !='noimage.jpg' && $db_sql[$k]['productimage'] !='' && filesize($product_image_path.$db_sql[$k]['iStoreCategoryId']."/".$db_sql[$k]['productimage']) > 531 && is_file($product_image_path.$db_sql[$k]['iStoreCategoryId']."/".$db_sql[$k]['productimage'])){                              
                                        $ProductArr[$i]['vProductImage']  = $product_image_url.$db_sql[$k]['iStoreCategoryId']."/".$db_sql[$k]['productimage'];
                                }else{
                                        $ProductArr[$i]['vProductImage']  = $site_image_url.'noimage.jpg';
                                }
				//$ProductArr[$i]['vImage'] = $store_logo_url.$db_sql[$k]['vImage'];
				//$ProductArr[$i]['vProductImage'] = $product_image_url.$db_sql[$k]['productimage'];
				$ProductArr[$i]['fPrice'] = $db_sql[$k]['fPrice'];
				$ProductArr[$i]['iQty'] = $_SESSION['Cart']['sess_itemqtys'][$i];
				//$ProductArr[$i]['fDiscount'] = $db_sql[$k]['fDiscount'];
				$ProductArr[$i]['totalprice'] = $_SESSION['Cart']['sess_total_price'];
			//echo "<pre>";
			//print_r($ProductArr);
			}
		}
		
		
		$ProductArr_new = $this->Sort_by_value($ProductArr,'iStoreCategoryId');
		//echo "<pre>";
		//print_r($ProductArr_new);
		return $ProductArr_new;
	}   
	   
	function EmailData($CartArr){
		//echo "<pre>";
		//print_r($_SESSION);exit;
		
	
	
		$totalproduct = $_SESSION['Cart']['sess_total_product'];
		//echo $totalproduct;
		global $obj,$generalobj,$site_url;
		 $body.= '<div style="border:1px solid #c7c7c7; margin: 20px 0px 0px 0px;">';
		 $body.= '<table width="100%" cellpadding="0" cellspacing="1">
                          <tbody>
				<tr>
					<th style="text-align:left; background:#c7c7c7; padding: 4px 0px 4px 5px; font-size:13px; font-weight:normal; ">Category Name</th>
					<th style="text-align:left; background:#c7c7c7; padding: 4px 0px 4px 5px; font-size:13px; font-weight:normal; ">Praduct Image</th>
					<th style="text-align:left; background:#c7c7c7; padding: 4px 0px 4px 5px; font-size:13px; font-weight:normal; ">Member Name</th>
					<th style="text-align:left; background:#c7c7c7; padding: 4px 0px 4px 5px; font-size:13px; font-weight:normal; ">Product Name</th>
					<th style="text-align:left; background:#c7c7c7; padding: 4px 0px 4px 5px; font-size:13px; font-weight:normal; ">Quantity</th>
					<th style="text-align:left; background:#c7c7c7; padding: 4px 0px 4px 5px; font-size:13px; font-weight:normal; ">Price</th>
				</tr>
			</tbody>';
				
				for($i=0;$i<$totalproduct;$i++){
					  if($_SESSION['Cart']['sess_categoryid'][$i] == 1){
						
						$sql1="SELECT p.iProductId,p.iMemberId, p.vProductName,p.fPrice,p.iStoreCategoryId,p.iShippingCost,p.vProductImage as productimage FROM store_category as s
						       LEFT JOIN product_general_item as p ON (s.iStoreCategoryId = p.iStoreCategoryId) WHERE p.iProductId = '".$_SESSION['Cart']['sess_iProductId'][$i]."' ";
							//echo $sql1;
						}
						if($_SESSION['Cart']['sess_categoryid'][$i] == 2){
							
						$sql1 ="SELECT pc.iProductId,pc.iMemberId,pc.vProductName,pc.fPrice,pc.fHandlingCost,pc.iStoreCategoryId,pc.vProductImage as clothImage FROM store_category as s
						       LEFT JOIN product_clothing_accessories as pc ON (s.iStoreCategoryId = pc.iStoreCategoryId) WHERE pc.iProductId = '".$_SESSION['Cart']['sess_iProductId'][$i]."' ";
							//echo $sql1;
						}
						$db_sql = $obj->MySQLSelect($sql1);
						//$member= $db_sql[$i]['iMemberId'];
						$ssql="select vName from members where iMemberId='".$db_sql[0]['iMemberId']."'";
						$db_sqll = $obj->MySQLSelect($ssql);
						//echo "<pre>";
						//print_r($ssql);
						//echo "<pre>";
						//print_r($db_sql);
						$totprice = $_SESSION['Cart']['sess_itemqtys'][$i]*$_SESSION['Cart']['sess_itemprices'][$i];
					
					$body.= '<tbody>
					<tr>
					    <td style="vertical-align:top; padding: 4px 0px 4px 0px; background:#f2f2f2; text-align:center; font-size:12px;">'.$_SESSION['Cart']['sess_categorytype'][$i].'</td>
					    <td style="vertical-align:top; padding: 4px 0px 4px 0px; background:#f2f2f2; text-align:center;font-size:12px;"><img src="'.$site_url.'/uploads/store/'.$_SESSION['Cart']['sess_categoryid'][$i].'/'.$_SESSION['Cart']['sess_iProductId'][$i].'/2_'.$_SESSION['Cart']['sess_images'][$i].'" width="40" height="40" /></td>
					    <td style="vertical-align:top; padding: 4px 0px 4px 0px; background:#f2f2f2; font-size:12px; text-align:center;">'.$db_sqll[0]['vName'].'</td>   
					    <td style="vertical-align:top; padding: 4px 0px 4px 0px; background:#f2f2f2; font-size:12px; text-align:center;">'.$_SESSION['Cart']['sess_productname'][$i].'</td>                            
					    <td style="vertical-align:top; padding: 4px 0px 4px 0px; background:#f2f2f2; font-size:12px; text-align:center;">'.$_SESSION['Cart']['sess_itemqtys'][$i].'</td>
					    <td style="vertical-align:top; padding: 4px 0px 4px 0px; background:#f2f2f2; font-size:12px; text-align:center;">'.$_SESSION['Cart']['sess_itemqtys'][$i] * $_SESSION['Cart']['sess_itemprices'][$i].'</td>
					</tr>
					
					    </tbody>';
					
              				}
   			      $body.= '</table></div><table align="right">
					<tbody>
					<tr>
					<td align="right">Total: </td>
					<td align="right">'.$_SESSION['Cart']['sess_total_price'].'</td>
					</tr></tbody>
					</table>';
			      //$body.= '<table align="right"><tr><td height="20" style="border-right: 2px solid #42BFFF;color: #000000;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 14px;">'.$_SESSION['Cart']['sess_total_price'].'</td></tr></table></div>';
			      
		//echo $body;
		return $body;	
	}
	function showMyCartBagInProductDetailPage(){
	global $obj,$store_logo_url,$store_logo_path,$site_image_url,$GeneralObj;
		#echo "<pre>";
		#print_r($_SESSION['Cart']['sess_itemprices'][0]);exit;
		$ProductArr = array();
		for($i=0;$i<count($_SESSION['Cart']['sess_iProductId']);$i++){
			$sql = "SELECT p.iProductId, p.vProductName,p.fPrice,p.iStoreId,p.fDiscount,p.vImage as productimage,s.vImage,s.iStoreId 
				FROM product as p 
				INNER JOIN 
				store as s
				ON (p.iStoreId = s.iStoreId)
				WHERE iProductId = '".$_SESSION['Cart']['sess_iProductId'][$i]."'";
				$db_sql = $obj->select($sql);
				#echo "<pre>";
				#print_r($db_sql);
				$ProductArr[$i]['iProductId'] = $_SESSION['Cart']['sess_iProductId'][$i];
				$ProductArr[$i]['vProductName'] = $_SESSION['Cart']['sess_productname'][$i];				
				$ProductArr[$i]['iStoreId'] = $db_sql[0]['iStoreId'];				
				#print_r(db_sql[$i]['vImage']);
				
				if($db_sql[0]['vImage'] !='' && is_file($store_logo_path.$db_sql[0]['vImage'])){
					$ProductArr[$i]['vStoreImage'] = $store_logo_url.$db_sql[0]['vImage'];
                }else{
                   $ProductArr[$i]['vStoreImage']  = $site_image_url."store-noimage.gif";
                }
				#echo "<pre>";
				#print_r($ProductArr);exit;
				
				$ProductArr[$i]['sess_itemprices'] =$GeneralObj->Make_Currency(($_SESSION['Cart']['sess_itemprices'][$i]*$_SESSION['Cart']['sess_itemqtys'][$i])-$db_sql[$i]['fDiscount']);
				
			}
			#echo "<pre>";
			#print_r($ProductArr);exit;
			$ProductArr_new = $this->Sort_by_value($ProductArr,'iStoreId');
			#echo "<pre>";
			#print_r($ProductArr_new);exit;
		return $ProductArr_new;
	}
	function PastEmailData($ShoppingListProductArr){
		global $obj,$store_logo_url,$product_image_url,$site_image_url;
			$body.= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
						<style>
						body{color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px;}
						.table-border{ border:1px solid #ccc;}
						.prod-topbg {background:url('.$site_image_url.'prod-topbg.png) repeat-x;}
						.th-head {font-weight:bold; font-size:15px; color:#fffce1; padding:0 0 0 10px;}
						.brown-items {font:bold 13px  Arial, Helvetica, sans-serif; color:#ba9948; text-decoration:none;}
						.total-row{ border-top:3px solid #e5d4ba; color:#005c00; font-size:16px; font-weight:700}
						.green-heading {font:bold 16px  Arial, Helvetica, sans-serif; color:#147c0c; text-decoration:none;}
						.hr-dottedline {background:url('.$site_image_url.'hr-dottedline.gif) repeat-x center;}
						.prod-whitebg {background:#fff; padding:0 10px 10px 10px;}
						</style>
						</head>
				<body>';
			$body.= '
			<table width="700" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td  valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td valign="top">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="10" valign="top" align="right"><img src="'.$site_image_url.'prod-tlc.png"/></td>
								<td background="'.$site_image_url.'prod-topbg.png" style="background-repeat:repeat-x;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="233" align="left" style="font-weight:bold; font-size:15px; color:#fffce1; padding:0 0 0 10px;">Item</td>
										<td width="100" align="center" style="font-weight:bold; font-size:15px; color:#fffce1; padding:0 0 0 10px;">Unit Price</td>
										<td width="100" align="center" style="font-weight:bold; font-size:15px; color:#fffce1; padding:0 0 0 10px;">Quantity</td>
										<td width="100" align="center" style="font-weight:bold; font-size:15px; color:#fffce1; padding:0 0 0 10px;">Total Price</td>
										<td width="100" align="center" style="font-weight:bold; font-size:15px; color:#fffce1; padding:0 0 0 10px;">Store</td>
									</tr>
									</table>	
								</td>
								<td width="10" valign="top"><img src="'.$site_image_url.'prod-trc.png" alt="" border="0" /></td>
							</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td valign="top" class="prod-whitebg">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">';
                            $totalCartprice = '0';
							for($i=0;$i<count($ShoppingListProductArr);$i++){				
						$body.= '<tr class="list-row">';
								$body.= '<td width="250">
										<div style="width:250px;">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td valign="middle">';
													$body.= '<img src="'.$ShoppingListProductArr[$i]['vImage'].'" width="89" height="92" title="'.$ShoppingListProductArr[$i]['vProductName'].'" style="cursor:pointer;"/>';
												$body.= '</td>';
												$body.= '<td  style="font:bold 14px  Arial, Helvetica, sans-serif; color:#ba9948; text-decoration:none;" align="left" style="word-wrap:break-word;">'.$ShoppingListProductArr[$i]['vProductName'].'</td>
											</tr>
											</table>
										</div>
									</td>';
									$body.= '<td width="100" align="center" style="font:bold 16px  Arial, Helvetica, sans-serif; color:#147c0c; text-decoration:none;">$'.$ShoppingListProductArr[$i]['fPrice'].'</td>';
									$body.= '<td width="100" align="center" style="font:bold 13px  Arial, Helvetica, sans-serif; color:#ba9948; text-decoration:none;">'.$ShoppingListProductArr[$i]['iQty'].'</td>';
									$body.= '<td width="100" align="center" style="font:bold 16px  Arial, Helvetica, sans-serif; color:#147c0c; text-decoration:none;" >$'.$ShoppingListProductArr[$i]['ItemtotPrice'] .'</td>';
									$body.= '<td align="center"><img src="'.$ShoppingListProductArr[$i]['storImage'].'" alt=" " width="102" height="34" class="thumb-border" /></td>';
                                                                        $totalCartprice =  $totalCartprice+$ShoppingListProductArr[$i]['ItemtotPrice'];   
						$body.= '</tr>';
						$body.= '<tr>
								<td colspan="5"  background="'.$site_image_url.'hr-dottedline.gif" style="background-repeat:repeat-x; center">&nbsp;</td>
								</tr>';									
										
								}	
								$body.= '<tr style="solid #e5d4ba; color:#005c00; font-size:16px; font-weight:700">
								<td colspan="3" align="right">Total Price </td>
								<td align="center">$'.$totalCartprice.'</td>
								<td align="center">&nbsp;</td>
								</tr>';	
						$body.= '</table>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>';
		//echo $body;exit;
		return $body;	
	}
	function getStoreOrderHistList($var_limit,$ssql,$orderby){
		global $obj;
		$sql =  "SELECT soh.*,sh.*
				FROM store_order_history AS  soh
				LEFT JOIN shopping_history AS  sh
				ON(soh.iOrderId = sh.iOrderId)
				WHERE $ssql  ORDER BY $orderby $var_limits";
		//echo $sql;//exit;
		 $StoreOrderHistoryArr = $obj->select($sql);
		return $StoreOrderHistoryArr;   
	}
	function storeorderdetail($iOrderId){
		global $obj;
		$sql =  "SELECT * from shopping_history WHERE iOrderId='".$iOrderId."'";
		$StoreOrderdetailArr = $obj->select($sql);
		return $StoreOrderdetailArr;   
	}
	function getStoreOrderDetailList($var_limit,$ssql){
		global $obj;
		$sql =  "SELECT od.*,s.vImage AS store_image from order_details AS od
		 LEFT JOIN store AS s ON(od.iStoreId = s.iStoreId)
		 WHERE $ssql $var_limit";
		$StoreOrderDetailArr = $obj->select($sql);
		return $StoreOrderDetailArr;   
	}
	
    /*function Sort_by_value($ProductArr, $value_key)
	{
		
		echo "<pre>";
		
		//print_r($ProductArr);exit;
		$ProductArr_new = $ProductArr;
		for($j=0;count($ProductArr)>$j;$j++)
		{
			
			for($i=0;count($ProductArr_new)>$i;$i++)
			{
				$Id_arr = $ProductArr[$j];
				if($ProductArr_new[$i][$value_key] > $Id_arr[$value_key] && $i != $j)
				{
						$temp_arr = $ProductArr_new[$i+1];
						$ProductArr_new[$i+1]= $Id_arr;
						$ProductArr[$j] = $temp_arr;
				}
			}
		}
		
		#return $ProductArr_new;
		return $ProductArr_new;
		
	}*/

    function Sort_by_value($ProductArr, $value_key)
	{
		$order = array();
		foreach ($ProductArr as $key => $row) { 
			$order[$key] = $row[$value_key]; 
		} 
		$sort_order = SORT_ASC; 
		array_multisort($order, $sort_order, $ProductArr);

		return $ProductArr;
		
	}

}
?>
