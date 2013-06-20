<?php /* Smarty version Smarty-3.0.7, created on 2012-07-12 12:29:48
         compiled from "/var/www/quotation/admin/templates/left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10441882704ffe75e45738d3-66763632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94c5dbc6a4149acc0e93d02d7b0f1757cc1610af' => 
    array (
      0 => '/var/www/quotation/admin/templates/left.tpl',
      1 => 1342076384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10441882704ffe75e45738d3-66763632',
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
                    <li class="alt"><a href="#" title="">Change Password</a></li>
                    <li><a href="#" title="">Change Address</a></li>
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
            	<p>Welcome Michael</p>
                <p><span>You are logged in as Admin</span></p>
                <ul>
                	<li><a href="#" title="Check Mail"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_mail.png" alt="Mail" /></a></li>
                    <li><a href="#" title="Configure"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
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
                    <a class="collapsed heading">Section Heading</a>
                     <ul class="navigation">
                        <li><a href="#" title="">Section link here</a></li>
                        <li><a href="#" title="">Section link here</a></li>
                        <li><a href="#" title="">Section link here</a></li>
                    </ul>
                </li>   
                <li>
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
                </li>        
            </ul>