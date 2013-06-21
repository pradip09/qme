<?
class Routes
{
	var $file;
	var $mode;

	function __construct()
	{
		if(isset($_REQUEST['file']) && $_REQUEST['file']!="")
		{

			$this->file = $_REQUEST['file'];
			
			if($_REQUEST['mode'] == 'add' || $_REQUEST['mode'] == 'edit')
			{             
				$this->mode = $_REQUEST['mode'];             
			}
			else if($_REQUEST['mode'] == 'view')
			{
				$this->mode = "view";                     
			}
			else
			{
				$this->mode = "";
			}
				
			$sc = explode("-",$this->file);
			switch(	$sc[0] )
			{
				case "ad":
						$module = "administrator";
						break;
				case "n":
						$module = "news";
						break;
				case "ne":
						$module = "news_nfl";
						break;
				case "au":
						$module = "authentication";
						break;
				case "fa":
						$module = "faq";
						break;
				case "fan":
						$module = "faq_nfl";
						break;
				case "pj":
						$module = "postjob";
						break;
				case "pc":
						$module = "postcampaign";
						break;
				case "con":
						$module = "contests";
						break;
				case "fu":
						$module = "fundraiser";
						break;	
				case "ph":
						$module = "photo";
						break;
				case "so":
						$module = "song";
						break;
				case "sp":
						$module = "storeplan";
						break;
				case "pt":
						$module = "plan_transaction";
						break;        
				case "st":
						$module = "store";
						break;
				case "pro":
						$module = "product";
						break;
				case "cl":
						$module = "clothing";
						break;
                                                
				case "at":
						$module = "automotive";
						break; 
                        
				case "re":
						$module = "realestate";
						break;        
                                         
				case "ch":
						$module = "channel";
						break;
				case "bc":
						$module = "blogcategory";
						break;
				case "b":
						$module = "blog";
						break;
				case "v":
						$module = "video";
						break;
				case "va":
						$module = "videoalbum";
						break;
				case "to":
						$module = "tools";
						break;
				case "m":
						$module = "members";
						break;
				case "o":
						$module = "order";
						break;
				case "mk":
						$module = "make";
						break;
				case "md":
						$module = "model";
						break;
				case "ve":
						$module = "vehicle";
						break;
				case "e":
						$module = "events";
						break;	
				case "h":
						$module = "home";
						break;	
				case "sy":
						$module = "system_admin";
						break;			
				
				default:
						$module = "dashboard";
						$this->module = "dashboard";
						$this->script = "dashboard";
						$this->mode = "view";
						break;
			}
            
			$this->module = $module;
			$this->script = $sc[1];
		}
		else
		{
				if(isset($_SESSION["sess_iAdminId"]) && $_SESSION["sess_iAdminId"] !="")
				{
					$this->module = "dashboard";
					$this->script = "dashboard";
					$this->mode = "view";
				}
				else
				{
					$this->module = "authentication";
					$this->script = "login";
					$this->mode = "au";
				}
		}

	}

	function GetModule()
	{
		return $this->module;
	}

	function GetMode()
	{
		return $this->mode;
	}

	function GetScript()
	{
		return $this->script;
	}

	

}
?>
