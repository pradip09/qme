<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 10:46:07
         compiled from "/var/www/qme/admin/templates/left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207705090050b44c972397d2-01484291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab360c76ba933e48571f2384cb2a7ff09ef65f3d' => 
    array (
      0 => '/var/www/qme/admin/templates/left.tpl',
      1 => 1353993349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207705090050b44c972397d2-01484291',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!--<div class="user">
	<img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
avatar.png" width="44" height="44" class="hoverimg" alt="Avatar" />
	<p>Logged in as:</p>
	<p class="username"><?php echo $_smarty_tpl->getVariable('sess_vFirstName')->value;?>
 <?php echo $_smarty_tpl->getVariable('sess_vLastName')->value;?>
</p>
	<p class="userbtn"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ad-administrator&mode=edit&iAdminId=<?php echo $_smarty_tpl->getVariable('sess_iAdminId')->value;?>
" title="<?php echo $_smarty_tpl->getVariable('sess_vFirstName')->value;?>
 <?php echo $_smarty_tpl->getVariable('sess_vLastName')->value;?>
">Profile</a></p>
	<p class="userbtn"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=au-logout" title="Log out">Log out</a></p>
</div>
<ul id="nav">
	<li>
		<a class="collapsed heading">Dashboard</a>
		<ul class="navigation">
		<?php if ($_GET['file']==''){?>
			<li class="heading selected">Dashboard</li>
		<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=home-dashboard"  title="">Dashboard</a></li>
		<?php }?>
			
		</ul>
	</li>
	<li>
		<a class="collapsed heading">Administrators</a>
		<ul class="navigation">
			<?php if ($_GET['file']=='ad-administrator'){?>
			
			<li class="selected">Administrator</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ad-administrator&mode=view"  title="">Administrator</a></li>
			<?php }?>
			
			<?php if ($_GET['file']=='ad-loginhistory'){?>
			<li class="selected">Login History</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ad-loginhistory&mode=view" title="">Login History</a></li>

			<?php }?>
		</ul>
	</li>
	
	<li>
		<a class="collapsed heading">Users</a>
		<ul class="navigation">
			<?php if ($_GET['file']=='u-user'){?>
			<li class="selected">Users Management</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=u-user&mode=view&type=contendor"  title="">Users Management</a></li>
			<?php }?>
			
			
		</ul>
	</li>
	
	<li>
		<a class="collapsed heading">Category</a>
		<ul class="navigation">
			<?php if ($_GET['file']=='fa-category'){?>
			<li class="selected">Category Management</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=fa-category&mode=view"  title="">Category Management</a></li>
			<?php }?>
			
			
		</ul>
	</li>
	<li>
		<a class="collapsed heading">Product</a>
		<ul class="navigation">
			<?php if ($_GET['file']=='pr-product'){?>
			<li class="selected">Product</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pr-product&mode=view"  title="">Product</a></li>
			<?php }?>
            </ul>
            </li>
            
   <li> 
		<a class="collapsed heading">Product Clothing Accessories</a> 
        <ul class="navigation">          					
			<?php if ($_GET['file']=='cl-proclothing'){?>
			<li class="selected">Product</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=cl-proclothing&mode=view"  title=""> Product Clothing Accessories</a></li>
			<?php }?>            	
			</ul>						
	
	<li>
		<a class="collapsed heading">Estimate</a>
		<ul class="navigation">
			<?php if ($_GET['file']=='o-estimate'){?>
			<li class="selected">Estimate</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=o-estimate&mode=view"  title="">Estimate</a></li>
			<?php }?>
			
			</ul>
		
		</li>
	

	<li>
		<a class="collapsed heading">Settings</a>
		<ul class="navigation">
		
			<?php if ($_GET['file']=='to-generalsettings'){?>
				<li class="selected">General Configration</li>
			<?php }else{ ?>
				<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-generalsettings&mode=edit" title="">General Configration</a></li>
			<?php }?>
			<?php if ($_GET['file']=='to-systememails'){?>
			<li class="selected">System Emails</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-systememails&mode=view"  title="">System Emails</a></li>
			<?php }?>
			<?php if ($_GET['file']=='to-staticpage'){?>
			<li class="selected">Static Pages</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-staticpage&mode=view"  title="">Static Pages</a></li>
			<?php }?>
			<?php if ($_GET['file']=='to-bannner'){?>
			<li class="selected">Banner List</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-banner&mode=view"  title="">Banner List</a></li>
			<?php }?>
			
		</ul>
	</li>            	      
	    
</ul>-->

<!-- Toolbox dropdown start -->
        	<div id="openCloseIdentifier"></div>
            <div id="slider">
                <ul id="sliderContent">
                    <li><a href="#" title="">Change Username</a></li>
                   
                    <li class="alt"><a href="#" title="">Payment Details</a></li>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=au-logout" title="">Log Out</a></li>
                </ul>
                <div id="openCloseWrap">
                    <div id="toolbox">
            			<a href="#" title="Toolbox Dropdown" class="toolboxdrop">Toolbox <img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icon_expand_grey.png" alt="Expand" /></a>
            		</div>
                </div>
            </div>
<!-- Toolbox dropdown end -->   
    	
<!-- Userbox/logged in start -->
            <div id="userbox">
            	<p>Welcome <?php echo $_smarty_tpl->getVariable('sess_vFirstName')->value;?>
</p>
                <p><span>You are logged in as Admin</span></p>
                <ul>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-generalsettings&mode=edit" title="Configure"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_cog.png" alt="Configure" /></a></li>
                    <li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=au-logout" title="Logout"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unlock.png" alt="Logout" /></a></li>
                </ul>
            </div>
<!-- Userbox/logged in end -->  

<!-- Main navigation start -->         
            <ul id="nav">
            	<li>
                    <a class="collapsed heading">Dashboard</a>
                     <ul class="navigation">
                        <?php if ($_GET['file']==''){?>
                        <li class="heading selected">Dashboard</li>
                       <?php }else{ ?>
                       <li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=home-dashboard"  title="">Dashboard</a></li>
                        <?php }?>
                    </ul>
                </li>
                <li>
                    <a class="collapsed heading">Administrators</a>
                     <ul class="navigation">
                        <?php if ($_GET['file']=='ad-administrator'){?>
                        <li class="heading selected">Administrator</li>
                      <?php }else{ ?>
			             <li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ad-administrator&mode=view"  title="">Administrator</a></li>
			         <?php }?>
                        
                        <?php if ($_GET['file']=='ad-loginhistory'){?>
			             <li class="heading selected">Login History</li>
			             <?php }else{ ?>
                <li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ad-loginhistory&mode=view" title="">Login History</a></li>
                        <?php }?>
                    </ul>
                </li>
                <li>
		<a class="collapsed heading">Members</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='m-member'){?>
			<li class="heading selected">Members Management</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=view&type=contendor"  title="">Members Management</a></li>
			<?php }?>
			
			
                    </ul>
                </li>
		<!--<li>
		<a class="collapsed heading">Events</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='e-event'){?>
			<li class="heading selected">Event</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=e-event&mode=view"  title="">Event</a></li>
			<?php }?>
                    </ul>
                </li>--> 
                <li>
		<a class="collapsed heading">FAQs</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='fa-faq'){?>
			<li class="heading selected">FAQs</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=fa-faq&mode=view"  title="">FAQs</a></li>
			<?php }?>
			<?php if ($_GET['file']=='fa-faqcat'){?>
			<li class="heading selected">FAQ Category</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=fa-faqcat&mode=view" title="">FAQ Category</a></li>
			<?php }?>
		    </ul>
                </li>
               <!-- <li>
		<a class="collapsed heading">Blog</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='b-blog'){?>
			<li class="heading selected">Blog</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=b-blog&mode=view"  title="">Blog</a></li>
			<?php }?>
			<?php if ($_GET['file']=='bc-blogcategory'){?>
			<li class="heading selected">Blog Category</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=bc-blogcategory&mode=view" title="">Blog Category</a></li>
			<?php }?>
                    </ul>
                </li>-->
                <!--<li>
		<a class="collapsed heading">Photo</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='ph-photo'){?>
			<li class="heading selected">Photo</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ph-photo&mode=view"  title="">Photo</a></li>
			<?php }?>
			<?php if ($_GET['file']=='ph-photocategory'){?>
			<li class="heading selected">Photo Category</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ph-photocategory&mode=view" title="">Photo Category</a></li>
			<?php }?>
                    </ul>
                </li>-->
		<!--<li>
		<a class="collapsed heading">Song</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='so-song'){?>
			<li class="heading selected">Song</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=so-song&mode=view" title="">Song</a></li>
			<?php }?>
			<?php if ($_GET['file']=='so-songalbum'){?>
			<li class="heading selected">Song Album</li>
			<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=so-songalbum&mode=view" title="">Song Album</a></li>
			<?php }?>
                    </ul>
                </li>-->
               <!-- <li>
		<a class="collapsed heading">Video</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='v-video'){?>
			<li class="heading selected">Video</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=v-video&mode=view"  title="">Video</a></li>
			<?php }?>
			<?php if ($_GET['file']=='va-videoalbum'){?>
			<li class="heading selected">Video Album</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=va-videoalbum&mode=view" title="">Video Album</a></li>
			<?php }?>
                    </ul>
                </li>-->
                <li>
		<a class="collapsed heading">Store</a>
                    <ul class="navigation">
            <?php if ($_GET['file']=='sp-storeplan'){?>
			<li class="heading selected">Store Plan</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=sp-storeplan&mode=view"  title="">Store Plan</a></li>
			<?php }?>        
                                                            
			<?php if ($_GET['file']=='st-store'){?>
			<li class="heading selected">Store Category</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=st-store&mode=view"  title="">Store Category</a></li>
			<?php }?>
                        
                        <?php if ($_GET['file']=='pt-plan_transaction'){?>
			<li class="heading selected">Plan Transaction</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pt-plan_transaction&mode=view"  title="">Plan Transaction</a></li>
			<?php }?>
                        
                 <?php if ($_GET['file']=='pro-product'){?>
			<li class="heading selected">General Items</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pro-product&mode=view"  title="">General Items</a></li>
			<?php }?>
                        
                  <?php if ($_GET['file']=='cl-clothing'){?>
			<li class="heading selected">Clothing and Accessories</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=cl-clothing&mode=view"  title="">Clothing and Accessories</a></li>
			<?php }?>
            
            
            
            <?php if ($_GET['file']=='at-automotive'){?>
			<li class="heading selected">Automotive</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=at-automotive&mode=view"  title="">Automotive</a></li>
			<?php }?>
                        
            <?php if ($_GET['file']=='re-realestate'){?>
			<li class="heading selected">Real Estate</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=re-realestate&mode=view"  title="">Real Estate</a></li>
			<?php }?>
                        
                        <?php if ($_GET['file']=='mk-make'){?>
			<li class="heading selected">Make</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=mk-make&mode=view"  title="">Make</a></li>
			<?php }?> 
                        
                        <?php if ($_GET['file']=='md-model'){?>
			<li class="heading selected">Model</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=md-model&mode=view"  title="">Model</a></li>
			<?php }?>
                        
                         <?php if ($_GET['file']=='ve-vehicle'){?>
			<li class="heading selected">Vehicle Type</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ve-vehicle&mode=view"  title="">Vehicle Type</a></li>
			<?php }?>
                        
                    </ul>
                </li>
                <!--<li>
		<a class="collapsed heading">Channel</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='ch-channel'){?>
			<li class="heading selected">Channel</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ch-channel&mode=view"  title="">Channel</a></li>
			<?php }?>
                    </ul>
                </li>-->

                <li>
		<a class="collapsed heading">Post Job</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='pj-postjob'){?>
			<li class="heading selected">Post Job</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pj-postjob&mode=view"  title="">Post Job</a></li>
			<?php }?>
                    </ul>
                </li>
                <li>
		<a class="collapsed heading">Post Campaign</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='pc-postcampaign'){?>
			<li class="heading selected">Post Campaign</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pc-postcampaign&mode=view"  title="">Post Campaign</a></li>
			<?php }?>
                    </ul>
                </li>
                <li>
		<a class="collapsed heading">Fundraiser Campaign</a>
                    <ul class="navigation">
			<?php if ($_GET['file']=='fu-fundraiser'){?>
			<li class="heading selected">Fundraiser Campaign</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=fu-fundraiser&mode=view"  title="">Fundraiser Campaign</a></li>
			<?php }?>
                    </ul>
                </li>
		      <li>
		<a class="collapsed heading">Qme news</a>
		<ul class="navigation">
			<?php if ($_GET['file']=='n-news'){?>
			<li class="heading selected">Qme news</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=n-news&mode=view"  title="">News</a></li>
			<?php }?>
			
		</ul>
		
            </li>
                <li>
		<a class="collapsed heading">Settings</a>
		<ul class="navigation">
		
			<?php if ($_GET['file']=='to-generalsettings'){?>
				<li class="heading selected">General Configration</li>
			<?php }else{ ?>
				<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-generalsettings&mode=edit" title="">General Configration</a></li>
			<?php }?>
                        <?php if ($_GET['file']=='to-buypointscontent'){?>
				<li class="heading selected">Buy Points Content</li>
			<?php }else{ ?>
				<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-buypointscontent&mode=edit" title="">Buy Points Content</a></li>
			<?php }?>
                        <?php if ($_GET['file']=='to-tooltipsettings'){?>
				<li class="heading selected">Tool Tip Settings</li>
			<?php }else{ ?>
				<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-tooltipsettings&mode=edit" title="">Tool Tip Settings</a></li>
			<?php }?>
                        <?php if ($_GET['file']=='to-systememails'){?>
			<li class="heading selected">System Emails</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-systememails&mode=view"  title="">System Emails</a></li>
			<?php }?>
			<?php if ($_GET['file']=='to-staticpage'){?>
			<li class="heading selected">Static Pages</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-staticpage&mode=view"  title="">Static Pages</a></li>
			<?php }?>
			<?php if ($_GET['file']=='to-bannner'){?>
			<li class="heading selected">Banner List</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-banner&mode=view"  title="">Banner List</a></li>
			<?php }?>
                         <?php if ($_GET['file']=='to-interest'){?>
			<li class="heading selected">Interest</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-interest&mode=view"  title="">Interest</a></li>
			<?php }?>
                        <?php if ($_GET['file']=='to-skill'){?>
			<li class="heading selected">Skill</li>
			<?php }else{ ?>
			<li class="heading"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=to-skill&mode=view"  title="">Skill</a></li>
			<?php }?>
                       
			
                    </ul>
                </li>
          
            
                <!---<li>
                    <ul class="navigation">
                        <li class="heading selected">Current Section</li>
                        <li><a href="#" title="">Section link here</a></li>
                        <li><a href="#" title="">Section link here</a></li>
                        <li><a href="#" title="">Section link here</a></li>
                    </ul>
                </li>
                <li>
                    <a class="collapsed heading">Section Heading</a>
                     <ul class="navigation">
                        <li><a href="#" title="">Section link here</a></li>
                        <li><a href="#" title="">Section link here</a></li>
                        <li><a href="#" title="">Section link here</a></li>
                    </ul>
                </li>-->   
            </ul>
