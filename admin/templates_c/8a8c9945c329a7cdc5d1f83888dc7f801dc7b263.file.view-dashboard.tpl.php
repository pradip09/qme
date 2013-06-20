<?php /* Smarty version Smarty-3.0.7, created on 2012-11-28 14:59:20
         compiled from "/var/www/qme/admin/templates/dashboard/view-dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164756839550b5d970dcd6d5-99720888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a8c9945c329a7cdc5d1f83888dc7f801dc7b263' => 
    array (
      0 => '/var/www/qme/admin/templates/dashboard/view-dashboard.tpl',
      1 => 1354094471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164756839550b5d970dcd6d5-99720888',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li class="current">Dashboard</li>
	</ul>
</div>

<!-- Top/large buttons start -->  
            <ul id="topbtns">
            	<li class="desc"><strong>Quick Links</strong><br />Popular shortcuts</li>
                <li>
                	<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ad-administrator&mode=view"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_username.png" alt="Calendar" style="height:23px;"/><br />Admin</a>
                </li>
                <li>
                	<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=view"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_user.png" alt="Create" /><br />Member</a>
                </li>
                <li>
                	<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=fa-faq&mode=view"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_create.png" alt="Users" /><br />Faq</a>
                </li>
                <li>
                	<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pj-postjob&mode=view"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_media.png" alt="Media" /><br />Post Job</a>
                </li>
                <li>
                	<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pc-postcampaign&mode=view"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_comment.png" alt="Comment" /><br />Post Campaign</a>
                </li>
                <li>
                	<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=fu-fundraiser&mode=view"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_support.png" alt="Support" /><br />Fundraiser Campaign</a>
                </li>
		<li>
                	<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=n-news&mode=view"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_calendar.png" alt="Support" /><br />Qme News</a>
                </li>
            </ul>
<!-- Top/large buttons end -->  

 <!-- Main content start -->      
            <div id="content">

<!-- Charts box start -->          
        		<div class="container med left" id="graphs">
                	<div class="conthead">
                		<h2>Sales Charts</h2>
                    </div>
<!-- Tabbed navigation start -->                    
                	<div class="contentbox">
                    	<!--<ul class="tablinks tabfade">
                        	<li class="nomar"><a href="#graphs-1">Bar</a></li>
                            <li><a href="#graphs-2">Pie</a></li>
                            <li><a href="#graphs-3">Line</a></li>
                            <li><a href="#graphs-4">Area</a></li>
                        </ul>-->
<!-- Tabbed navigation end -->                       
<!-- Tabbed boxes start -->
                    	<div class="tabcontent" id="graphs-1">
			    
			    <h1 style="margin-left:144px;color:#3E4815;">Welcome <br/><br/> <p style="margin-left:98px;">To </p><br/><p style="margin-left:140px;">Admin Panel</p></h1>
			    
                          <!--  <table style="display: none; height: 250px" class="bar" width="52%">
                                <caption> Registered Members</caption>
                                <thead>
                                    <tr>
                                        <td></td>
                                        <th scope="col">Jan</th>
                                        <th scope="col">Feb</th>
                                        <th scope="col">March</th>
                                        <th scope="col">April</th>
                                        <th scope="col">May</th>
                                        <th scope="col">June</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">2011</th>
                                        <td>190</td>
                                        <td>160</td>
                                        <td>40</td>
                                        <td>120</td>
                                        <td>30</td>
                                        <td>70</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2010</th>
                                        <td>3</td>
                                        <td>40</td>
                                        <td>30</td>
                                        <td>45</td>
                                        <td>35</td>
                                        <td>49</td>
                                    </tr>	
                                </tbody>
                            </table>
                    </div>
                    <div class="tabcontent" id="graphs-2">
                        <table style="display: none; height: 250px" class="pie" width="52%">
                            <caption> Registered Members</caption>
                                <thead>
                                    <tr>
                                        <td></td>
                                        <th scope="col">Jan</th>
                                        <th scope="col">Feb</th>
                                        <th scope="col">March</th>
                                        <th scope="col">April</th>
                                        <th scope="col">May</th>
                                        <th scope="col">June</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">2011</th>
                                        <td>190</td>
                                        <td>160</td>
                                        <td>40</td>
                                        <td>120</td>
                                        <td>30</td>
                                        <td>70</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2010</th>
                                        <td>3</td>
                                        <td>40</td>
                                        <td>30</td>
                                        <td>45</td>
                                        <td>35</td>
                                        <td>49</td>
                                    </tr>	
                                </tbody>
                            </table>
                    </div>
                    <div class="tabcontent" id="graphs-3">
                            <table style="display: none; height: 250px" class="line" width="52%">
                                <caption> Registered Members</caption>
                                <thead>
                                    <tr>
                                        <td></td>
                                        <th scope="col">Jan</th>
                                        <th scope="col">Feb</th>
                                        <th scope="col">March</th>
                                        <th scope="col">April</th>
                                        <th scope="col">May</th>
                                        <th scope="col">June</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">2011</th>
                                        <td>190</td>
                                        <td>160</td>
                                        <td>40</td>
                                        <td>120</td>
                                        <td>30</td>
                                        <td>70</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2010</th>
                                        <td>3</td>
                                        <td>40</td>
                                        <td>30</td>
                                        <td>45</td>
                                        <td>35</td>
                                        <td>49</td>
                                    </tr>	
                                </tbody>
                            </table>
                    	</div>
                   		<div class="tabcontent" id="graphs-4">
                            <table style="display: none; height: 250px" class="area" width="52%">
                               <caption> Registered Members</caption>
                                <thead>
                                    <tr>
                                        <td></td>
                                        <th scope="col">Jan</th>
                                        <th scope="col">Feb</th>
                                        <th scope="col">March</th>
                                        <th scope="col">April</th>
                                        <th scope="col">May</th>
                                        <th scope="col">June</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">2011</th>
                                        <td>190</td>
                                        <td>160</td>
                                        <td>40</td>
                                        <td>120</td>
                                        <td>30</td>
                                        <td>70</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2010</th>
                                        <td>3</td>
                                        <td>40</td>
                                        <td>30</td>
                                        <td>45</td>
                                        <td>35</td>
                                        <td>49</td>
                                    </tr>	
                                </tbody>
                            </table>-->
                   		</div>
<!-- Tabbed boxes end -->  
                      
                    </div>
                </div>
                
<!-- Website stats start -->               
                <div class="container sml right">
                	<div class="conthead">
                		<h2>Website Status</h2>
                    </div>
                	<div class="contentbox">
                    	<ul class="summarystats">
                        	<li>
                            	<p class="statcount"><?php echo $_smarty_tpl->getVariable('admin')->value;?>
</p> <p>Administrator</p>  <p class="statview"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ad-administrator&mode=view" title="view">view</a></p>
                            </li>
                            <li>
                            	<p class="statcount"><?php echo $_smarty_tpl->getVariable('user')->value;?>
</p> <p>Member</p>  <p class="statview"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=view" title="view">view</a></p>
                            </li>
                            <li>
                            	<p class="statcount"><?php echo $_smarty_tpl->getVariable('postjob')->value;?>
</p> <p>Post Job</p>  <p class="statview"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pj-postjob&mode=view" title="view">view</a></p>
                            </li>
                            <li>
                            	<p class="statcount"><?php echo $_smarty_tpl->getVariable('postcampaign')->value;?>
</p> <p>Post Campaign</p>  <p class="statview"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pc-postcampaign&mode=view" title="view">view</a></p>
                            </li>
			  <!--  <li>
                            	<p class="statcount">10</p> <p>Fundraiser Campaign</p>  <p class="statview"><a href="#" title="view">view</a></p>
                            </li>-->
			     <li>
                            	<p class="statcount"><?php echo $_smarty_tpl->getVariable('news')->value;?>
</p> <p>Qme News</p>  <p class="statview"><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=n-news&mode=view" title="view">view</a></p>
                            </li>
                        </ul>
                        
                        <p><strong>Last Login Information</strong></p>
                        
                        <table cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td><strong>Last Login :</strong></td>
						<td><strong><?php echo $_smarty_tpl->getVariable('db_login')->value[0]['dLoginDate'];?>
</strong></td>
					</tr>
					<tr>
						<td><strong>From IP :</strong></td>
						<td><strong><?php echo $_smarty_tpl->getVariable('db_login')->value[0]['vFromIP'];?>
</strong></td>
					</tr>
					<tr>
						<td><strong>User Name :</strong></td>
						<td><strong><?php echo $_smarty_tpl->getVariable('db_login')->value[0]['vUserName'];?>
</strong></td>
					</tr>
				</tbody>
			</table>
                    </div>
                </div>
<!-- Website stats end -->  
               
                <!-- Clear finsih for all floated content boxes --> <div style="clear: both"></div>
        </div>

<!-- Right side end --> 

