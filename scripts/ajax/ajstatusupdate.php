<?php


    $iMemberId = $_SESSION['iUserId'];
    $Descript1 = str_replace("backslash","//",urldecode($_REQUEST['vDescription']));
    
    $vDescription1 =  strpos($Descript1,"http");
    $vDescription =  strpos($Descript1,"www");   
    
     if($vDescription){
	  $Descript2 = substr($Descript1,0,$vDescription);	 
	  $Descript = substr($Descript1,$vDescription);	  
     }if($vDescription1){
	  $Descript2 = substr($Descript1,0,$vDescription1);	   
          $Descript = substr($Descript1,$vDescription1);    
     }else{
	 $Description = $Descript1;
     }
        $Des= substr($Descript,0,4);
  
    if($Des == 'www.'){
	     $Descript = explode('www.',$Descript);
	     $Description = $Descript2.'<a style="text-decoration:none;color: #E26700;" target=_blank href="http://'.$Descript[1].'">'.$Descript[1].'</a>';
    }elseif($Des == 'http'){
	     $Description = $Descript2.'<a style="text-decoration:none;color: #E26700;" target=_blank href="'.$Descript.'">'.$Descript.'</a>';
    }
    /*echo "<pre>";
    print_r($Description);exit;*/
    
    $eType = $_REQUEST['eType'];
    $dAddedDate = date('Y-m-d H:i:s');
    $Data = array(
        'iMemberId'=>$iMemberId,
        'vDescription'=>$Description,
        'dAddedDate'=>$dAddedDate,
	'eType'=> $eType
    );
        $id = $obj->MySQLQueryPerform("status_update",$Data,'insert');
        if($eType == 'Private')
	{
	$sql = "select * from members where iMemberId='".$_REQUEST['iMemberId']."'";
	$user = $obj->MySQLSelect($sql);
	$Recent['iMemberId'] = $user[0]['iMemberId'];
	$Recent['eType'] = 'status_update';
	$Recent['iTypeId'] = $id;
	$Recent['vDescription'] = $_SESSION['Name'].' send private message to <a style="text-decoration:none;color: #E26700;" href="'.$site_url.'/'.$user[0]['vMemberUrl'].'">'.$user[0]['vName'].'</a>. <br/><b> Message </b>';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] = $Data['vDescription'];
	$Recent['iType'] = $eType;
	$Recent['iPostMemberId'] = $_SESSION['iUserId'];
	$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
	
	$Recent2['iMemberId'] = $_SESSION['iUserId'];
	$Recent2['eType'] = 'status_update';
	$Recent2['iTypeId'] = $id;
	$Recent2['vDescription'] = $_SESSION['Name'].' send private message to <a style="text-decoration:none;color: #E26700;" href="'.$site_url.'/'.$user[0]['vMemberUrl'].'">'.$user[0]['vName'].'</a>. <br/><b> Message </b>';
	$Recent2['dAddedDate'] = $Data['dAddedDate'];
	$Recent2['eNameActivity'] = $Data['vDescription'];
	$Recent2['iType'] = $eType;
	$id2 = $obj->MySQLQueryPerform("recent_activities",$Recent2,'insert');
	
	}else{
	if($_REQUEST['iMemberId'])
	{
	    $sql = "select * from members where iMemberId='".$_REQUEST['iMemberId']."'";
	    $user = $obj->MySQLSelect($sql);
	    $Recent['iMemberId'] = $user[0]['iMemberId'];
	    $Recent['eType'] = 'status_update';
	    $Recent['iTypeId'] = $id;
	    if($user[0]['iMemberId'] == $Data['iMemberId'])
	    {
		$Recent['vDescription'] = $_SESSION['Name'].' update new status';
	    }else{
		$Recent1['iMemberId'] = $_SESSION['iUserId'];
		$Recent1['eType'] = 'status_update';
		$Recent1['iTypeId'] = $id;
		$Recent1['vDescription'] = $_SESSION['Name'].' > <a style="text-decoration:none;color: #E26700;" href="'.$site_url.'/'.$user[0]['vMemberUrl'].'">'.$user[0]['vName'].'</a> </b>';
		$Recent1['dAddedDate'] = $Data['dAddedDate'];
		$Recent1['eNameActivity'] = $Data['vDescription'];
		$Recent1['iType'] = $eType;
		$id1 = $obj->MySQLQueryPerform("recent_activities",$Recent1,'insert');
		$Recent['vDescription'] = $_SESSION['Name'].' > <a style="text-decoration:none;color: #E26700;" href="'.$site_url.'/'.$user[0]['vMemberUrl'].'">'.$user[0]['vName'].'</a></b>';
	    }
	    $Recent['dAddedDate'] = $Data['dAddedDate'];
	    $Recent['eNameActivity'] = $Data['vDescription'];
	    $Recent['iType'] = $eType;
	    $Recent['iPostMemberId'] = $_SESSION['iUserId'];
	    $id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
	}else{
	$Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'status_update';
	$Recent['iTypeId'] = $id;
	$Recent['vDescription'] = $_SESSION['Name'].' update new status';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] = $Data['vDescription'];
	$Recent['iType'] = $eType;
	$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');    
	}
	}
    if($id){
        $var_msg = $eType;
    }
    else{
        $var_msg = 'Error in Posting Job';
    }
    echo $var_msg;exit;
?>

