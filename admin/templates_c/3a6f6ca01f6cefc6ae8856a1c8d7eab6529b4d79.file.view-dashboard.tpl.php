<?php /* Smarty version Smarty-3.0.7, created on 2012-07-12 12:01:40
         compiled from "/var/www/quotation/admin/templates/dashboard/view-dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5822827604ffe6f4c5c5160-70836488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a6f6ca01f6cefc6ae8856a1c8d7eab6529b4d79' => 
    array (
      0 => '/var/www/quotation/admin/templates/dashboard/view-dashboard.tpl',
      1 => 1342074688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5822827604ffe6f4c5c5160-70836488',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Top/large buttons start -->  
            <ul id="topbtns">
            	<li class="desc"><strong>Quick Links</strong><br />Popular shortcuts</li>
                <li>
                	<a href="#"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_calendar.png" alt="Calendar" /><br />Calendar</a>
                </li>
                <li>
                	<a href="#"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_create.png" alt="Create" /><br />Create</a>
                </li>
                <li>
                	<a href="#"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_user.png" alt="Users" /><br />Users</a>
                </li>
                <li>
                	<a href="#"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_media.png" alt="Media" /><br />Media</a>
                </li>
                <li>
                	<a href="#"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_comment.png" alt="Comment" /><br />Comment</a>
                </li>
                <li>
                	<a href="#"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_lrg_support.png" alt="Support" /><br />Support</a>
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
                    	<ul class="tablinks tabfade">
                        	<li class="nomar"><a href="#graphs-1">Bar</a></li>
                            <li><a href="#graphs-2">Pie</a></li>
                            <li><a href="#graphs-3">Line</a></li>
                            <li><a href="#graphs-4">Area</a></li>
                        </ul>
<!-- Tabbed navigation end -->                       
<!-- Tabbed boxes start -->
                    	<div class="tabcontent" id="graphs-1">
                            <table style="display: none; height: 250px" class="bar" width="52%">
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
                            </table>
                   		</div>
<!-- Tabbed boxes end -->  
                      
                    </div>
                </div>
                
<!-- Website stats start -->               
                <div class="container sml right">
                	<div class="conthead">
                		<h2>Website Stats</h2>
                    </div>
                	<div class="contentbox">
                    	<ul class="summarystats">
                        	<li>
                            	<p class="statcount">30</p> <p>Registrations</p>  <p class="statview"><a href="#" title="view">view</a></p>
                            </li>
                            <li>
                            	<p class="statcount">17</p> <p>New Sales</p>  <p class="statview"><a href="#" title="view">view</a></p>
                            </li>
                            <li>
                            	<p class="statcount">05</p> <p>Pending sales</p>  <p class="statview"><a href="#" title="view">view</a></p>
                            </li>
                            <li>
                            	<p class="statcount">10</p> <p>Support requests</p>  <p class="statview"><a href="#" title="view">view</a></p>
                            </li>
                        </ul>
                        
                        <p><strong>Usage bar examples</strong></p>
                        
                        <table>
                            <tr>
                                <td width="150"><strong><span class="usagetxt redtxt">Red</span></strong></td>
                                <td width="500">
                                    <div class="usagebox">
                                        <div class="highbar" style="width: 85%;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong><span class="usagetxt orangetxt">Orange</span></strong></td>
                                <td>
                                    <div class="usagebox">
                                        <div class="midbar" style="width: 50%;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong><span class="usagetxt greentxt">Green</span></strong></td>
                                <td>
                                    <div class="usagebox">
                                        <div class="lowbar" style="width: 25%;"></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
<!-- Website stats end -->  
               
                <!-- Clear finsih for all floated content boxes --> <div style="clear: both"></div>