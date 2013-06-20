<script type="text/javascript" src="{$tconfig['tsite_admin_ckeditor_path']}ckeditor.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="#">Distict News</a></li>
		
	</ul>
</div>
<div id="content">
<div class="container" >
	<div class="conthead">
		
		<h2 class="left">Distict News</h2>
		
	</div>
	<div class="contentbox" >
    {if $var_msg_new neq ''}
     <div class="status success" id="errormsgdiv"> 
        	<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
        	<p><img src="{$tconfig.tpanel_img}icons/icon_success.png" title="Success" />
              {$var_msg_new}</p> 
     </div>     
    <div></div>
    {elseif $var_msg neq ''}
    <div class="status success" id="errormsgdiv"> 
        	<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
        	<p><img src="{$tconfig.tpanel_img}icons/icon_success.png" title="Success" />
              {$var_msg}</p> 
     </div>     
    <div></div>
    {/if}
	<form name="frmsearch" id="frmsearch" action="" method="post">
	<input type="hidden" value="{$type}" name="type">
		
        <table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword" name="keyword" value="{$keyword}"  class="inputbox" /></div><td>
				<td width="10%"><div class="bulkactions">
					<select name="option" id="option">
						<option value=''>Select Name</option>
						<option value='vName'>Member Name</option>
												
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions">
				<input type="hidden" value="{$type}" id="type" name="type">
				<input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoption();"/></div></td>
				<td width="10%">
				
				</td>
			</tr>	
			<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;">{$AlphaBox}</div>
				</td>
			</tr>
		</tbody>			
		</table> 
        </form>
            
		<form id="frmaddd" name="frmaddd" action="index.php?file=n-distictnews_a" enctype="multipart/form-data" method="post">
			<div class="administator_table">
				<table width="100%" border="0" id="data_table">
				<input type="hidden" name="action" id="action" value="{$mode}" />		
				
			<div class="inputboxes">
                                 <label for="textfield" style="width:300px;"><strong>Select Member profile:</strong></label><br /><br />                       
                                      <hr />                        
                                                <div style="width:200px; float:left; padding:5px;" >
                                                        {section name=j loop=$db_member}
                                                        {if $smarty.section.j.index % 6 == 0 && $smarty.section.j.index neq 0}
                                                 </div>
                                                        <div style="width:200px; float:left;padding:5px;">
                                                          {/if}
                                                        <input type="checkbox" id="iDistictId[]" name="iDistictId[]" value="{$db_member[j].iMemberId}" {if $db_member[j].iMemberId|@in_array:$DistArray}checked="checked"{/if}  lang="*" title="checkbox" />{$db_member[j].vName}<br />
                                                        {/section}                                                            
                                                </div>
                    	</div>
               			
   		      <input type="submit" value="Save" class="btn" onclick="return validate(document.frmaddd);" title="Save" style="margin-left:511px;"/>
		</div></table>	
		</form>
	
	<div class="extrabottom">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td>
			<div class="pagination">
            {if $db_member|@count gt 0}
	       <!-- <span class="switch" style="float: left;">{$recmsg}</span>-->
	        {/if}
            </div></td>
	    
			<td><div class="bulkactions" style="float: right;">
				<select name="newaction" id="newaction">
					<!--<option value="">Select Action</option>-->
					<option value="Show All">Show All</option>
				</select>
				
				<input type="button" value="Apply" class="btn" onclick="showAlll();"/>
			</div></td>
				<td><div>
	
	 
        </div></td></tr></table>
			
		</div>
	</div>
</div>
{literal}
<script>
function showAlll(){
	
    var file = 'n-distictnews';    
    window.location="index.php?file="+file+"&mode=edit";   
    return false;
}
function Searchoption(){
    document.getElementById('frmsearch').submit();
}
function AlphaSearch(val){
//alert($('#type').val());
var type = $('#type').val();

    var alphavalue = val;
    var file = 'n-distictnews';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=edit";
    return false;
}

function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}	
</script>
{/literal}



