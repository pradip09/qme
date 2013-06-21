<?php
Class General
{
	public function __construct(){}
	
	/**
	* @access	public
	* @Print Element input type
	*/
    
    function DateTime($text,$format='')
    {
	if($text =="" || $text =="0000-00-00 00:00:00")
		return "---";
	switch($format)
	{
		//us formate
		case "1":
			return date('M j, Y',strtotime($text));
			break;

		case "2":
			return date('M j, y  [G:i] ',strtotime($text));
			break;

		case "3":
			return date("M j, Y", $text);
			break;

		case "4":
			return date('Y,n,j,G,',$text).intval(date('i',$text)).','.intval(date('s',$text));
			break;

		case "5":
			return date('l, F j, Y',$text);
			break;

		case "6":
			return date('g:i:s',$text);
			break;

		case "7":
			return date('D, F j, Y  h:i A',strtotime($text));
			break;
			
		case "8":
			return date('Y-m-d',strtotime($text));
			break;
		case "9":
			return date('F j, Y',strtotime($text));
			break;
		case "10":
			return date('d/m/y',strtotime($text));
			break;
		case "11":
			return date('m/d/y',strtotime($text));
			break;
		case "12":
			return date('H:i',strtotime($text));
			break;	
		default :
			return date('M j, Y',strtotime($text));
			break;
	}
}
function getGeneralVar()
{
	global $obj;
	//$listField = $obj->MySQLGetFieldsQuery("setting");
	$wri_usql = "SELECT * FROM configurations where eStatus='Active'";
	
	$wri_ures = $obj->MySQLSelect($wri_usql);
	for($i=0;$i<count($wri_ures);$i++){
		$vName  = $wri_ures[$i]["vName"];
		$vValue  = $wri_ures[$i]["vValue"];
		global $$vName;
		$$vName=$vValue;
	}
	
}
    function encrypt($data)
	{
		for($i = 0, $key = 27, $c = 48; $i <= 255; $i++)
		{
			$c = 255 & ($key ^ ($c << 1));
			$table[$key] = $c;
			$key = 255 & ($key + 1);
		}
		$len = strlen($data);
		for($i = 0; $i < $len; $i++)
		{
			$data[$i] = chr($table[ord($data[$i])]);
		}
		return base64_encode($data);
	}
    function decrypt($data)
	{
		$data = base64_decode($data);
		for($i = 0, $key = 27, $c = 48; $i <= 255; $i++)
		{
			$c = 255 & ($key ^ ($c << 1));
			$table[$c] = $key;
			$key = 255 & ($key + 1);
		}
		$len = strlen($data);
		for($i = 0; $i < $len; $i++)
		{
			$data[$i] = chr($table[ord($data[$i])]);
		}
		return $data;
	}
	public function getParentCatNew($iParentId=0, $old_cat="",$iCatIdNot="0",$loop=1,$iCategoryId)
	{
		//echo 'heeeeeee';exit
		global $obj, $par_arr_new;
		$sql_query = "select iCategoryId, vCategory, iParentId from categories  where iParentId='$iParentId' and eStatus='Active'";
		//$sql_query .= " order by iDisporder ASC";
		$db_cat_rs = $obj->MySQLSelect($sql_query);
		$n=count($db_cat_rs);
        #echo $n;exit;
		if($n>0)
		{
			for($i=0 ; $i<$n ; $i++)
			{
				$par_arr_new[]=array('iCategoryId'=> $db_cat_rs[$i]['iCategoryId'],'vCategory' =>  $old_cat."--|".$loop."|&nbsp;&nbsp;".$db_cat_rs[$i]['vCategory']);
				$this->getParentCatNew($db_cat_rs[$i]['iCategoryId'], $old_cat."&nbsp;&nbsp;&nbsp;&nbsp;",$iCatIdNot,$loop+1,$iCategoryId);
			}
			$old_cat = "";
		}
        return $par_arr_new;
    }
     function checkAuthntication()
    {
        //echo $_SESSION["sess_iAdminId"];
        if($_SESSION["sess_iAdminId"] == '')
        {
            if($_REQUEST["file"] != 'au-login' && $_REQUEST["file"] != 'au-login_a')
            {
                header("location:".$tconfig["tsite_url"]."index.php?file=au-login");
                exit;
            }
        }
    }
    public function PrintComboBoxNew($arr,$selVal,$name,$title,$key="",$val="",$ext="",$onchange='',$selectboxName='',$multiple_select='')
	{
		$dcombo = "";
		$a=strrpos($name,"[]");
		if($a)
			$id=substr($name,0,$a);
		else
			$id=$name;
		if($multiple_select != "")
		{
			$id=$selectboxName;
			$selectboxName=$selectboxName.'[]';
			$multiple_select="multiple=".$multiple_select;
		}
		else
		{
			$multiple_select='';
		}

		if($onchange!="")$onchange="onchange='$onchange'";
			$dcombo .= "<select $multiple_select name=\"$name\" style=\"width:250px;\"   id=\"$id\" class=INPUT $ext $onchange>";
		if($title!=""){
			if(empty($selVal)) $sel="selected";else $sel="";
			$dcombo .= "<option value='' $sel>".$title."</option>";
		}
		if($key=="")$key=0;if($val=="")$val=1;


	   for($i=0;$i<count($arr);$i++)
		{
			if(@is_array($selVal))
			{
				if(@in_array(trim($arr[$i][$key]),$selVal))
				{
					$dcombo .= "<option value=".$arr[$i][$key]." selected>".$arr[$i][$val]."</option>";
				} else {
					$dcombo .= "<option value=".$arr[$i][$key].">".$arr[$i][$val]."</option>";
				}
			}
			else
			{
				if (trim($selVal)==trim($arr[$i][$key]))
				{
					$dcombo .= "<option value=".$arr[$i][$key]." selected>".$arr[$i][$val]."</option>";
				} else {
					$dcombo .= "<option value=".$arr[$i][$key].">".$arr[$i][$val]."</option>";
				}
			}
		}
		$dcombo .= "</select>";
		return $dcombo;
	}
	
	
	
    function imageupload($photopath,$vphoto,$vphoto_name,$prefix='', $vaildExt= "gif,jpg,jpeg,bmp")
    {
        $msg="";
        if(!empty($vphoto_name) and is_file($vphoto) )
        {
            // Remove Dots from File name
            $tmp=explode(".",$vphoto_name);
            for($i=0;$i<count($tmp)-1;$i++)
            {
                $tmp1[]=$tmp[$i];
            }
            $file=implode("_",$tmp1);
            $ext=$tmp[count($tmp)-1];

            $vaildExt_arr = explode(",", strtoupper($vaildExt));
            if(in_array(strtoupper($ext), $vaildExt_arr))
            {
                //$vphotofile=$file.".".$ext;
                $vphotofile=$file."_".date("YmdHis").".".$ext;
                $ftppath1 = $photopath.$vphotofile;
                //echo $ftppath1;exit;
                if(!copy($vphoto, $ftppath1))
                {
                    $vphotofile = '';
                    $msg="File Not Uploaded Successfully !!";
                }
                else
                $msg="File Uploaded Successfully !!";
            }
            else
            {
                $vphotofile = '';
                $msg="File Extension Is Not Valid, Vaild Ext are  $vaildExt !!!";
            }
        }
        $ret[0] = $vphotofile;
        $ret[1] = $msg;
        return $ret;
    }
    
    
	function import($PARAM_ARRAY, $vFile)
	{
	   
		Global $useimagemagick,$imagemagickinstalldir,$temp_gallery;
		
		include_once(TPATH_CLASS_APP."/imagemagick.class.php");
		$target_dir = $PARAM_ARRAY['TARGET_DIR'];
		
		if($temp_gallery=='')
		$temp_gallery=$target_dir;
		$temp=strlen($temp_gallery);
		//$temp_gallery=substr($temp_gallery,0,$temp-1);
	
		if($useimagemagick == "Yes")
		{
			$imObj = new ImageMagick($imagemagickinstalldir,$temp_gallery);
		}
	
		$imObj -> setTargetdir($target_dir);
	
	
		if($useimagemagick == "Yes")
		{
		
			$imObj->loadByFileData($vFile);
			$imObj->setVerbose(FALSE);
			$size = $imObj->GetSize();
		}
		else
		{
			$size = GetImageSize($vFile['tmp_name']);
		}
		$HEIGHT=array();
		$WIDTH=array();
		$PERFIX=array();
			for($i=1;$i<count($PARAM_ARRAY);$i++)
			{
				$height_width=$PARAM_ARRAY[$i-1]['WIDTH_HEIGHT'];
				$height_width=explode("X",$height_width);
				$WIDTH[$i]=$height_width[0];
				$HEIGHT[$i]=$height_width[1];
				$PERFIX[$i]=$PARAM_ARRAY[$i-1]['PREFIX'];
			}
			$time=time();
		
		if($useimagemagick == "Yes")
		{
			for($i=0;$i<count($PARAM_ARRAY);$i++)
		{
			if($PERFIX[$i]!='')
			$temp=$PERFIX[$i]."_".$time;
			else
			$temp=$time;
			if($WIDTH[$i]>0 && $HEIGHT[$i]>0)
			{
			$imObj->loadByFileData($vFile);
			$imObj->Resize($WIDTH[$i], $HEIGHT[$i],'fit');
			list($WIDTH[$i], $HEIGHT[$i]) = $imObj->GetSize();
			$filename[$i] = $imObj -> Save($temp);
			}else{
			$filename1 = $target_dir."/".$temp.basename($vFile['name']);
			copy($vFile['tmp_name'], $filename1);
			$filename[$i]=$temp.basename($vFile['name']);
		}
		}
			$imObj -> CleanUp();
			$fname=substr($filename[1], strlen($PERFIX[$i]));
			$ReturnFile=$fname;
		}
		else
		{
		for($i=1;$i<count($PARAM_ARRAY);$i++)
		{
		if($PERFIX[$i]!='')
		$temp=$PERFIX[$i]."_".$time;
		else
		$temp=$time;
		$filename1 = $target_dir."/".$temp.basename($vFile['name']);
		copy($vFile['tmp_name'], $filename1);
		}
		
		$ReturnFile=$time.basename($vFile['name']);
		}
		return $ReturnFile;
	}
	function rand_str($length = 32, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890')
	{
		      $chars_length = (strlen($chars) - 1);
		      $string = $chars{rand(0, $chars_length)};
      
		      for ($i = 1; $i < $length; $i = strlen($string))
		      {
			      $r = $chars{rand(0, $chars_length)};
      
			      if ($r != $string{$i - 1}) $string .=  $r;
		      }
		      return $string;
	}
	function Make_Currency($text,$parameter=2,$defCurrency='$')
	{
		if($text==0) return '00.00'; else
		return (($defCurrency) ? $defCurrency . ' ' : '') . number_format($text,$parameter,'.',',');
	}
	function UniqueID($prefix,$table,$field,$charlimit="3")
	{
		global $obj;
		$sql  	= "select MAX($field) as ID from $table";
		$db_sql = $obj->MySQLSelect($sql);
		//print_r($db_sql);exit;
		if($db_sql[0][ID] == "" || $db_sql[0][ID] == "0"){
			$code = "0000001";
		}else{
			$code = substr($db_sql[0][ID],$charlimit,strlen($db_sql[0][ID])-2);
			$code = $code+1;
			$codelen = strlen($code)-1;
			if(strlen($code) < 7+$codelen){
				$pad = 7+$codelen - strlen($code)+1;
				$code = str_pad($code,$pad,"0", STR_PAD_LEFT);
			}
		}
		//print_r($code);
		//exit;
		return $prefix.$code;
	}
	function checkFrontAuthntication()
	{  
		if($_SESSION["iUserId"] == '')
		{
			define('URL_RETURN', dirname($_SERVER['PHP_SELF']));
			header("Location: ".URL_RETURN);
			exit;
		    
		}
	}
    
    function getDateDifference($dateFrom, $dateTo, $unit = 'd')
	{
		$difference = null;
		$dateFromElements = split(' ', $dateFrom);
		$dateToElements = split(' ', $dateTo);
		$dateFromDateElements = split('-', $dateFromElements[0]);
		$dateFromTimeElements = split(':', $dateFromElements[1]);
		$dateToDateElements = split('-', $dateToElements[0]);
		$dateToTimeElements = split(':', $dateToElements[1]);
		
		// Get unix timestamp for both dates
		$dateFromTimeElements[0] = ($dateFromTimeElements[0]=='')?0:$dateFromTimeElements[0];
		$dateFromTimeElements[1] = ($dateFromTimeElements[1]=='')?0:$dateFromTimeElements[1];
		$dateFromTimeElements[2] = ($dateFromTimeElements[2]=='')?0:$dateFromTimeElements[2];
		
		$date1 = mktime($dateFromTimeElements[0], $dateFromTimeElements[1], $dateFromTimeElements[2], $dateFromDateElements[1], $dateFromDateElements[2], $dateFromDateElements[0]);

		$dateToTimeElements[0] = ($dateToTimeElements[0]=='')?0:$dateToTimeElements[0];
		$dateToTimeElements[1] = ($dateToTimeElements[1]=='')?0:$dateToTimeElements[1];
		$dateToTimeElements[2] = ($dateToTimeElements[2]=='')?0:$dateToTimeElements[2];

		$date2 = mktime($dateToTimeElements[0], $dateToTimeElements[1], $dateToTimeElements[2], $dateToDateElements[1], $dateToDateElements[2], $dateToDateElements[0]);
		if( $date1 > $date2 )
		{
		return null;
		}
		
		$diff = $date2 - $date1;
		$days = 0;
		$hours = 0;
		$minutes = 0;
		$seconds = 0;
		if ($diff % 86400 <= 0)  // there are 86,400 seconds in a day
		{
		$days = $diff / 86400;
		}
		if($diff % 86400 > 0)
		{
		$rest = ($diff % 86400);
		$days = ($diff - $rest) / 86400;
		if( $rest % 3600 > 0 )
		{
		$rest1 = ($rest % 3600);
		$hours = ($rest - $rest1) / 3600;
		if( $rest1 % 60 > 0 )
		{
		$rest2 = ($rest1 % 60);
		$minutes = ($rest1 - $rest2) / 60;
		$seconds = $rest2;
		}
		else
		{
		$minutes = $rest1 / 60;
		}
		}
		else
		{
		$hours = $rest / 3600;
		}
		}
		
		switch($unit)
		{
		case 'd':
		case 'D':
		$partialDays = 0;
		$partialDays += ($seconds / 86400);
		$partialDays += ($minutes / 1440);
		$partialDays += ($hours / 24);
		$difference = $days + $partialDays;
		break;
		case 'h':
		case 'H':
		$partialHours = 0;
		$partialHours += ($seconds / 3600);
		$partialHours += ($minutes / 60);
		$difference = $hours + ($days * 24) + $partialHours;
		break;
		case 'm':
		case 'M':
		$partialMinutes = 0;
		$partialMinutes += ($seconds / 60);
		$difference = $minutes + ($days * 1440) + ($hours * 60) + $partialMinutes;
		break;
		case 's':
		case 'S':
		$difference = $seconds + ($days * 86400) + ($hours * 3600) + ($minutes * 60);
		break;
		case 'a':
		case 'A':
		$difference = array (
		"days" => $days,
		"hours" => $hours,
		"minutes" => $minutes,
		"seconds" => $seconds
		);
		break;
		}
		#echo "<pre>";
		#print_r($difference);exit;
		return $difference;
	}
	function limit_words($text, $limit)
	{
		$text = strip_tags($text);
		$words = str_word_count($text, 2);
		$pos = array_keys($words);
		if (count($words) > $limit) {
		$text = substr($text, 0, $pos[$limit]) . ' ...';
		}
		return $text;
	}
    
    /**
     * DBGeneral::getInfoTable() 
	 * @tablename,iPrimaryId,iPriValue,eType,$extra
	 * get Table Information and assign each value to it's field  
	*/
	 function getInfoTable($tablename,$iPrimaryId,$iPriValue,$eType="",$extra=""){
		global $obj;
		$sql_select = "SELECT * FROM $tablename WHERE $iPrimaryId = '".$iPriValue."' $extra";
		$db_select = $obj->MySQLSelect($sql_select);
		return $db_select;
	}
	
}	

?>
