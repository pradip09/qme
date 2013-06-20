<?php
/*
    echo "<pre>";
    print_r($_REQUEST);
    exit;
*/
    //$sMemberId = $_SESSION['iUserId'];    
    $mode = $_REQUEST['mode'];
    $iMemberId = $_REQUEST['iMemberId'];
    $type = $_REQUEST['type'];
    
    $sql_gal = "SELECT * FROM banner_image  WHERE iMemberId='".$iMemberId."'ORDER BY iBannerId";
    $db_banner_gal = $obj->MySQLSelect($sql_gal);
   
    $sql_country = "select * from country_master";
    $db_mycountry = $obj->MySQLSelect($sql_country);
    
    $sql_state = "select * from state_master";
    $stateArr = $obj->MySQLSelect($sql_state);
    
    $sql_language = "select * from language";
    $db_language = $obj->MySQLSelect($sql_language);
    
    $sql_setting = "select * from general_setting where iMemberId = '".$iMemberId."' AND eStatus ='Active' ";
    $db_gen_setting = $obj->MySQLSelect($sql_setting);
    
    $sql_interest = "select * from interest where eStatus='Active'";
    $db_interestt = $obj->MySQLSelect($sql_interest);
    
    $sql_skill1 = "select * from skill where eStatus='Active'";
    $db_skill1 = $obj->MySQLSelect($sql_skill1);
    
    
    
    if($mode == 'add'){
      $totgal = 1;  
    }else{
        if(count($db_banner_gal) > 0){
         $totgal = count($db_banner_gal);
         $flag=1;
        }else{
            $totgal = 1;
            $flag = 0;
        }
        
    }
    if($iMemberId !=''){
        $sql = "select * from members where iMemberId='".$iMemberId."' ";
        $db_mem = $obj->MySQLSelect($sql);
	$db_mem[0]['dBirthdate'] = date('m-d-Y',strtotime($db_mem[0]['dBirthdate']));
	$relatedArr = explode(",",$db_mem[0]['iInterestId']);
	$skillArr= explode(",",$db_mem[0]['iSkillId']);
	
	 
	
	 
	 #echo "<pre>";
	#print_r($statusArr);exit;
    }
    $interest=array("Travel","Education","Food","Fashion","Wildlife","Sports","Entertainment","Volunteer","Business","Health","Home good","Technology","Comunity","events","Non-profits","Cars","Autos","Motorcycle","Boating","Racing","Politics","Luxury","Love","Art","Production","Animals","Religion","Church","Spritual","Government","Investment","Wellness","Photography","Art","Books","Family","Fine-Wines","InternationalFood","Cruise","Gaming","Collectable","ResortsGetaways","Festival","Museum","Historical","Celibrities","Games");
    $Single=array("Yes","No");
    $location=array( "AMERICA NORTH: USA: Alabama (AL)"," AMERICA NORTH: USA: Alaska (AK)"," AMERICA NORTH: USA: Arizona (AZ)"," AMERICA NORTH: USA: Arkansas (AR)"," AMERICA NORTH: USA: California (CA)"," AMERICA NORTH: USA: Colorado (CO)"," AMERICA NORTH: USA: Connecticut (CT)"," AMERICA NORTH: USA: Delaware (DE)"," AMERICA NORTH: USA: Florida (FL)"," AMERICA NORTH: USA: Georgia (GA)"," AMERICA NORTH: USA: Hawaii (HI)"," AMERICA NORTH: USA: Idaho (ID)"," AMERICA NORTH: USA: Illinois (IL)"," AMERICA NORTH: USA: Kansas (KS)"," AMERICA NORTH: USA: Kentucky (KY)"," AMERICA NORTH: USA: Louisiana (LA)"," AMERICA NORTH: USA: Maine (ME)"," AMERICA NORTH: USA: Maryland (MD)"," AMERICA NORTH: USA: Massachusetts (MA)"," AMERICA NORTH: USA: Michigan (MI)"," AMERICA NORTH: USA: Minnesota (MN)"," AMERICA NORTH: USA: Mississippi (MS)"," AMERICA NORTH: USA: Missouri (MO)"," AMERICA NORTH: USA: Montana (MT)"," AMERICA NORTH: USA: Nebraska (NE)"," AMERICA NORTH: USA: New Hampshire (NH)"," AMERICA NORTH: USA: New Jersey (NJ)"," AMERICA NORTH: USA: New Mexico (NM)"," AMERICA NORTH: USA: New York (NY)"," AMERICA NORTH: USA: Nevada (NV)"," AMERICA NORTH: USA: North Carolina (NC)"," AMERICA NORTH: USA: North Dakota (ND)"," AMERICA NORTH: USA: Ohio (OH)"," AMERICA NORTH: USA: Oklahoma (OK)"," AMERICA NORTH: USA: Oregon (OR)"," AMERICA NORTH: USA: Pennsylvania (PA)"," AMERICA NORTH: USA: Rhode Island (RI)"," AMERICA NORTH: USA: South Carolina (SC)"," AMERICA NORTH: USA: South Dakota (SD)"," AMERICA NORTH: USA: Tennessee (TN)"," AMERICA NORTH: USA: Texas (TX)"," AMERICA NORTH: USA: Utah (UT)"," AMERICA NORTH: USA: Washington (WA)"," AMERICA NORTH: USA: Vermont (VT)"," AMERICA NORTH: USA: West Virginia (WV)"," AMERICA NORTH: USA: Virginia (VA)"," AMERICA NORTH: USA: Wisconsin (WI)"," AMERICA NORTH: USA: Wyoming (WY)");
    $skill=array('Account Executive','ACCOUNTANT','Actor','AGENTS','ANIMATION','Artist','BAKER','BOOKING AGENT','Business','CABINET MAKER','CHEF','COMEDIAN','COSTUME DESINGER','CREATIVE DESIGNER','DANCERS','DECORATOR','DESIGNER','Director','DJ','EFFECTS ENGINEER','Engineer','FILM EDITOR','FILM PRODUCER','FISHION DESIGNER','Flash animation, video editing, motion graphics','GAME DESIGNER','GAME DEVELOPER','Gamer','HAIR/ MAKEUP ARTIST','ICE ARTIST','ICE MAKER','ILLUSTRATOR','INDUSTRIAL ENGINEER','JEWELER','JOCKEY','LAWYER','MANAGER','MANUFACTURING','MARKETER','MECHANIC','member','Model','PAINTER','PHOTOGRAPHER','POET','PRINTER','Producer','PROMOTER','PUBLISHER','RADIO HOST','SALES AGENT','SALES REP','SCREEN WRITER','Screenplay writer','Screenwriter, Playwriters, Actor','SET DESIGNER','SILK SCREEN PRINTER','Social Member','Social Qmmunity','Song Writer','SOUND ENGINEER','SOUND PERSON','STYLIST','TRAVEL AGENT','VENDOR','VETERINARIAN','WEB DEVELOPER','Website Development', 'Search Engine Optimization','Strategic Planning','Writer','ZOOLOGIST');
    
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_mem",$db_mem);
    
    $smarty->assign("iMemberId",$iMemberId);
    $smarty->assign("stateArr",$stateArr);
    $smarty->assign("interest",$interest);
    $smarty->assign("Single",$Single);
    $smarty->assign("location",$location);
    $smarty->assign("relatedArr",$relatedArr);
    $smarty->assign("skill",$skill);
    $smarty->assign("statusArr",$statusArr);
    $smarty->assign("db_banner_gal",$db_banner_gal);
    $smarty->assign("totgal",$totgal);
    $smarty->assign("flag",$flag);
    $smarty->assign("db_mycountry",$db_mycountry);
    $smarty->assign("db_language",$db_language);
    $smarty->assign("stateArr",$stateArr);
    $smarty->assign("db_gen_setting",$db_gen_setting);
    $smarty->assign("db_interestt",$db_interestt);
    $smarty->assign("db_skill1",$db_skill1);
    $smarty->assign("skillArr",$skillArr);
    
    
    /*included files for Photo module*/
    include_once("modules/photo/photo.php");
    include_once("modules/photo/view-photo.php");
    include_once("modules/photo/view-photocategory.php");
    
    /*included files for Song Module*/
    include_once("modules/song/song.php");
    include_once("modules/song/view-song.php");
    include_once("modules/song/view-songalbum.php");
    
    
    /*included files for Video Module*/
    include_once("modules/video/video.php");
    include_once("modules/video/view-video.php");
    include_once("modules/video/video_a.php");
    include_once("modules/video/view-videoalbum.php");
    
    
    
    /*included files for member-postjob module */
    include_once("modules/postjob/view-mpostjob.php");
    include_once("modules/postjob/mpostjob.php");
    include_once("modules/postjob/mpostjob_a.php");

    /*included files for member-post campaign module */
    include_once("modules/postcampaign/view-mpostcampaign.php");
    include_once("modules/postcampaign/mpostcampaign.php");
    include_once("modules/postcampaign/mpostcampaign_a.php");
    
    /*included files for member-event module */
    include_once("modules/events/event.php");
    include_once("modules/events/view-event.php");
    include_once("modules/events/event_a.php");
    
    /*included files for member-blog module */
    include_once("modules/blog/blog.php");
    include_once("modules/blog/view-blog.php");
    include_once("modules/blog/blog_a.php");
?>
