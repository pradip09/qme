<?
/**
 * Class For Mailbox System
 * @package		class.mailbox.php
 * @general		general
 * @author		cyrus_dev@hotmail.com
 */


class Mailbox
{
	private $iFromId;		//From Id 

	private $eFromType;		//From Type


	public function __construct($iFromId,$eFromType)
	{
		//set from id
		$this->iFromId = $iFromId;

		//set from type admin,member
		$this->eFromType = $eFromType;
	}

   /**
	* @access	public
	* @Return Array of Message of Logged User
	*/

	public function MyInbox($count,$var_limit,$where)
	{
		global $obj;
		$sql = "SELECT inb.iMailId,inb.iFromId,inb.eFromType,inb.iToId,
					inb.eToType,inb.vSubject,inb.dMaildate,inb.eRead 
					FROM qme_inbox inb LEFT JOIN members m ON (inb.iFromId = m.iMemberId)
					WHERE inb.iToId = '".$this->iFromId."' AND iFromId !='' $where 
					ORDER BY inb.iMailId DESC $var_limit";
					//echo $sql;exit;
		$db_sql = $obj->MySQLSelect($sql);
		//echo "<pre>";
		//print_r($db_sql);exit;
		if(count($db_sql) > 0){
			for($i=0;$i<count($db_sql);$i++){
				$msgarr[$i]['iMailId'] = $db_sql[$i]['iMailId'];
				$msgarr[$i]['iFromId'] = $db_sql[$i]['iFromId'];
				$msgarr[$i]['eFromType'] = $db_sql[$i]['eFromType'];
				$msgarr[$i]['iToId'] = $db_sql[$i]['iToId'];
				$msgarr[$i]['eToType'] = $db_sql[$i]['eToType'];
				$msgarr[$i]['vSubject'] = $db_sql[$i]['vSubject'];
				$msgarr[$i]['dMaildate'] = $db_sql[$i]['dMaildate'];
				$msgarr[$i]['eRead'] = $db_sql[$i]['eRead'];
				
				if($db_sql[$i]['eFromType'] == 'Member'){
					$sql_mem = "SELECT klm.vName as from_name  
							FROM members klm
							WHERE klm.iMemberId = '".$db_sql[$i]['iFromId']."'";
					$db_mem = $obj->MySQLSelect($sql_mem);
					$msgarr[$i]['from_name'] = $db_mem[0]['from_name'];
				}
				else if($db_sql[$i]['eFromType'] == 'Admin'){
					$sql_mem = "SELECT concat(kc.vFirstname,' ',kc.vLastname) as from_name  
							FROM administrators  kc
							WHERE kc.iAdminId = '".$db_sql[$i]['iFromId']."'";
					$db_mem = $obj->MySQLSelect($sql_mem);
					$msgarr[$i]['from_name'] = $db_mem[0]['from_name'];
				}
			}
		}
		
		return $msgarr;
	}

	
   /**
	* @access	public
	* @Return Array of Sent Messages
	*/

public function SentMails($count,$var_limit,$where)
	{
		global $obj;

		if($count	==	'Yes'){	
			$field	=	" count(ks.iMailId) as tot ";	
		}else{
			$field	=	" kin.*";	
		}

		$sql = "SELECT ".$field.",ks.iFromId,ks.iToId 
				FROM qme_sentmails  ks,qme_inbox kin LEFT JOIN members m ON (kin.iFromId = m.iMemberId)
				WHERE ks.iMailId	=	kin.iMailId 
				and ks.iFromId = '".$this->iFromId."' 
				and ks.eFromType = '".$this->eFromType."' 
				$where ORDER BY  kin.iMailId DESC $var_limit";
				
		//echo $sql;		
		$db_sql = $obj->MySQLSelect($sql);
		//echo "<pre>";
		//print_r($db_sql);exit;
		if($count	==	'No'){	
		if(count($db_sql) > 0){
			for($i=0;$i<count($db_sql);$i++){
				$msgarr[$i]['iMailId'] = $db_sql[$i]['iMailId'];
				$msgarr[$i]['iFromId'] = $db_sql[$i]['iFromId'];
				$msgarr[$i]['eFromType'] = $db_sql[$i]['eFromType'];
				$msgarr[$i]['iToId'] = $db_sql[$i]['iToId'];
				$msgarr[$i]['eToType'] = $db_sql[$i]['eToType'];
				$msgarr[$i]['vSubject'] = $db_sql[$i]['vSubject'];
				$msgarr[$i]['dMaildate'] = $db_sql[$i]['dMaildate'];
				$msgarr[$i]['eRead'] = $db_sql[$i]['eRead'];
				if($db_sql[$i]['eFromType'] == 'Member'){
					$sql_mem = "SELECT klm.vName as from_name  
							FROM members klm
							WHERE klm.iMemberId = '".$db_sql[$i]['iFromId']."'";
					$db_mem = $obj->MySQLSelect($sql_mem);
					$msgarr[$i]['from_name'] = $db_mem[0]['from_name'];
				}
				else if($db_sql[$i]['eFromType'] == 'Admin'){
					$sql_mem = "SELECT concat(kc.vFirstname,' ',kc.vLastname) as from_name  
							FROM administrators  kc
							WHERE kc.iAdminId = '".$db_sql[$i]['iFromId']."'";
					$db_mem = $obj->MySQLSelect($sql_mem);
					$msgarr[$i]['from_name'] = $db_mem[0]['from_name'];
				}
			}
		}
		}
		else{
			$msgarr = $db_sql;
		}

//echo $sql;exit;
		return $msgarr;
	}
   /**
	* @access	public
	* @Return Array of Message Detail
	*/
	public function MailDetail($iMailId,$viewtype)
	{
		
		global $obj;
		
		$this->iMailId = $iMailId;
		$sql = "SELECT iMailId,iFromId,eFromType,iToId,eToType,vSubject,lBody,dMaildate,eRead
				FROM qme_inbox WHERE iMailId = '".$this->iMailId."'";
		$db_sql = $obj->MySQLSelect($sql);
		
		$sqll = "SELECT qse.iMailId,qse.iFromId,qin.eFromType,qse.iToId,qin.eToType,qin.vSubject,qin.lBody,qin.dMaildate,qin.eRead
				FROM qme_inbox qin left join qme_sentmails qse ON (qin.iMailId = qse.iMailId) WHERE qin.iMailId = '".$this->iMailId."'";
		$db_sqll = $obj->MySQLSelect($sqll);
		
		
		//echo "<pre>";
		//print_r($sqll);exit;
		if($viewtype == 'inbox'){
			
			switch($db_sql[0]['eFromType'])
			{
				case "Member":
					$sql_info = "SELECT iMemberId,vName,vEmail FROM members  WHERE iMemberId = '".$db_sql[0]['iFromId']."'";
					break;
				case "Admin":
					$sql_info = "SELECT iAdminId,vName,vFirstname,vLastname,vEmail FROM administrators  WHERE iAdminId = '".$db_sql[0]['iFromId']."'";
					break;	
			}
		}else if($viewtype == 'sentmail'){
			switch($db_sql[0]['eToType'])
			{
				case "Member":
					$sql_info = "SELECT iMemberId,vName,vEmail FROM members WHERE iMemberId = '".$db_sqll[0]['iToId']."'";
					break;
				case "Admin":
					$sql_info = "SELECT iAdminId,vName,vFirstName,vLastName,vEmail FROM administrators  WHERE iAdminId = '".$db_sqll[0]['iToId']."'";
					break;	
					
			}
		}
		
		$db_info = $obj->MySQLSelect($sql_info);
		
		if(count($db_info) > 0 )
		{
			$info_arr['Name'] 		= $db_info[0]['vName'];
			$info_arr['vEmail']	 	= $db_info[0]['vEmail'];
			$info_arr['Sent']	 	= $db_sql[0]['dMaildate'];
			$info_arr['Subject']	        = $db_sql[0]['vSubject'];
			$info_arr['lBody'] 		= $db_sql[0]['lBody'];
		}
		//echo "<pre>";
		//print_r($info_arr);exit;
		return $info_arr;
	}
}
?>
