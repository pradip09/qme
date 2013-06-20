<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<div class="container" id="tabs">
	<div class="conthead">
		<h2 class="left">Post Job</h2>
	</div>
	
	<div class="contentbox" id="tabs-1">
		<form id="frmpostadd" name="frmpostadd" action="index.php?file=pj-mpostjob_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_post_job[0].vImage}"/>
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_post_job[0].iMemberId}" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$memberId}" />
			<input type="hidden" name="iPostJobId" id="iPostJobId" value="{$iPostJobId}" />
			<input type="hidden" name="action" id="action" value="{$modePost}" />
			<input type="hidden" name="selectedstate" id="selectedstate" value="{$db_post_job[0].iStateId}"/>
			
			
			<table align="center" class="photo_edit_table">
			<tr>
			<td>
			
			<div class="inputboxes">
				<label for="textfield"><strong>What skill are you looking for:</strong></label>
				<input type="text" id="vSkill" name="Data[vSkill]" class="inputbox" value="{$db_post_job[0].vSkill}" lang="*" title=" Skill"/>
			</div>
			
				<div class="inputboxes">
					<label for="textfield"><strong>What do you need this person to do:</strong></label>
					<textarea id="tDescription" name="Data[tDescription]" class="inputbox" lang="*" title="What do you need this person to do" style="width:500px;height:123px;">{$db_post_job[0].tDescription}</textarea>
				</div>
				<div class="inputboxes">
							<label><strong>Skill:</strong></label>
							<br/>
							{if  $db_skill|@count gt 0}
							<div class="event_skill" style="margin-left:137px;">
								{section name=j loop=$db_skill}
								<div class="event_slikk_inner">
									<input type="checkbox" value="{$db_skill[j].iSkillId}" lang="*" id="iSkillId" name="iSkillId[]" {if $db_skill[j].iSkillId|in_array:$Arrskill}checked{/if}/>
									{$db_skill[j].vSkill}
								</div>
								{/section}
							</div>
						{/if}
				</div>
				<div class="inputboxes">
						<label><strong>Interest:</strong></label>
						<br/>
						{if  $db_interest|@count gt 0}
						<div class="event_skill">
							{section name=j loop=$db_interest}
							<div class="event_slikk_inner">
								<input type="checkbox" value="{$db_interest[j].iInterestId}" id="iInterestId" lang="*" name="iInterestId[]" {if $db_interest[j].iInterestId|in_array:$Arrintrest}checked{/if}/>{$db_interest[j].vInterest}
							</div>
							{/section}
						</div>
						{/if}
				</div>	
				
							
				<div class="inputboxes">
					<label for="textfield"><strong>Other Interest:</strong></label>
					<input type="text" name="Data[vOtherInterest]" class="inputbox" id="vOtherInterest" value="{$db_post_job[0].vOtherInterest}" title="Other Interest"/>
				</div>
				 <div class="inputboxes">
					<label for="textfield"><strong>Country:</strong></label>
					<select id="iCountryId" name="Data[iCountryId]" lang="*" title="Country" onchange="getCountrylist(this.value)" style="width:227px;">
						<option value=''>--Select Country--</option>
						{section name=i loop=$db_cont}
						<option value='{$db_cont[i].iCountryId}' {if $db_cont[i].iCountryId eq $db_post_job[0].iCountryId}selected{/if}>{$db_cont[i].vCountry}</option>
						{/section}
					</select>                
				</div>             
                                	 
				 <div class="inputboxes">
					<label for="textfield"><strong>State:</strong></label>
					<div id="showallsta">					
						<select id="iStateId" name="Data[iStateId]" title="State"  lang="*"  style="width:227px">							
						<option value=''>--Select State--</option>
					    </select>	
					</div>				 
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>City:</strong></label>
					<input type="text" id="vCity" name="Data[vCity]" class="inputbox" title="City" lang="*" value="{$db_post_job[0].vCity}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Zip:</strong></label>
					<input type="text" id="vZip" name="Data[vZip]" class="inputbox" title="Zip" lang="*" value="{$db_post_job[0].vZip}" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Mile:</strong></label>
					<input type="text" id="vMile" name="Data[vMile]" class="inputbox" title="Mile" lang="*" value="{$db_post_job[0].vMile}" onkeypress="return checkprice(event);"/>
				</div>
				
				<div style="clear:both;"></div>
									
			<div class="inputboxes">
				<label for="textfield"><strong>Status:</strong></label>
				<select id="eStatus" name="Data[eStatus]">
					<option value="Active" {if $db_post_job[0].eStatus eq Active}selected{/if}>Active</option>
					<option value="Inactive" {if $db_post_job[0].eStatus eq Inactive}selected{/if}>Inactive</option>
				</select>
			</div>
			<br/>
			<br/>
			<div class="add_photo_cancel">
				{if $modePost eq 'add'}
				<input type="submit" value="Add Post job" class="btn" onclick="return validate(document.frmpostadd);" title="Add Post job"/>
				{else}
				<input type="submit" value="Edit Post job" class="btn" on click="return validate(document.frmpostadd);" title="Edit Post job"/>
				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</div>
			</td>
			</tr>
			</table>
		</form>
	</div>
	<!--- Add/Edit Blog ends here --->
	<form name="frmsearchpost" id="frmsearchpost" action="#tab-postjob" method="post">       
        <table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword23" name="keyword23" value="{$keyword}" class="inputbox" /></div><td>
				<td width="10%" ><div class="bulkactions">
					<select name="option23" id="option23">
						<option value="vSkill">Skill</option>
						<option value="eStatus">Status</option>
						
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Srchoption();"/></div></td>
			</tr>	

		</tbody>			
		</table> 
        </form>
	
	<!--  Blog listing starts here -->
	<div class="contentbox contentbox_admin_bot" id="tabs-1">
		<form name="frmpostlist" id="frmpostlist"  action="index.php?file=pj-mpostjob_a" method="post">
			<input type="hidden" name="action" id="action" value="" />
			<input type="hidden" name="iPostJobId" id="iPostJobId" value="" />
			<input  type="hidden" name="iMemberId" id="iMemberId" value=""/>
			<table width="100%" border="0" class="admin_photo_table">
				<thead class="admin_table_title">
					<tr>						
						<th>Skill</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmpostlist);"/></th>
					</tr>
					<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;"></div>
				</td>
				</tr>
				</thead>
				<tbody>
				
				{if $db_view_post_job|@count gt 0}
				{section name=i loop=$db_view_post_job}
				
				{if $smarty.section.i.index % 2}
				{assign var="class" value="alt"}
				{else}
				{assign var="class" value=""}
				{/if}
				<tr class="{$class}">					
					<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_view_post_job[i].iMemberId}&iPostJobId={$db_view_post_job[i].iPostJobId}#tab-postjob" title="">{$db_view_post_job[i].vSkill}</a></td>					
					
					<td>{$db_view_post_job[i].eStatus}</td>
					<td>
						<a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_view_post_job[i].iMemberId}&iPostJobId={$db_view_post_job[i].iPostJobId}#tab-postjob" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
						<a href="javascript:void(0);" title="Active" onclick="MakeActionPost('{$db_view_post_job[i].iPostJobId}','{$db_view_post_job[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
						<a href="javascript:void(0);" title="Inactive" onclick="MakeActionPost('{$db_view_post_job[i].iPostJobId}','{$db_view_post_job[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
						<a href="javascript:void(0);" title="Delete" onclick="MakeActionPost('{$db_view_post_job[i].iPostJobId}','{$db_view_post_job[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
					</td>
					<td>
						<input name="iPostJobId[]" type="checkbox" id="iId" value="{$db_view_post_job[i].iPostJobId}"/>
						<input name="iMemberId" type="hidden" id="mId" value="{$db_view_post_job[i].iMemberId}"/>
					</td>
				</tr>
				{/section}
				{else}
				<tr>
					<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
				</tr>
				{/if}
				</tbody>
				
			</table>
		</form>
		<div class="extrabottom"><table cellpadding="0" cellspacing="0" width="100%"><tr><td>
			<div class="pagination">
			{if $db_view_post_job|@count gt 0}
			    <span class="switch" style="float: left;">{$recmsg33}</span>
			    {/if}
			 </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newactionpost">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionpost').value,'m-member',document.frmpostlist);"/>
			</div></td></tr></table>
		</div>
	</div>
	<!--  Blog listing ends here -->
	
</div>
{literal}
<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dCreateDate').datepicker({dateFormat: 'mm-dd-yy'});});
 });
 </script>
<script>

function Srchoption(){
	
    document.getElementById('frmsearchpost').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'm-member';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}

function MakeActionPost(loopid,member,type){
	//alert("hello");
    document.frmpostlist.iPostJobId.value = loopid;
    document.frmpostlist.iMemberId.value = member;
    document.frmpostlist.action.value = type;    
    document.frmpostlist.submit();	
}

function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'm-member';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=m-member&mode=view";
    return false;
}
</script>
<script>
getId('{/literal}{$db_post_job[0].iCountryId}{literal}','{/literal}{$db_post_job[0].iMemberId}{literal}','{/literal}{$db_post_job[0].iPostJobId}{literal}');
function getId(id,id1,id2){	
	if($('#action').val() == 'edit'){
		var countryId = id;
		var iMemberId=id1
		var iPostJobId=id2
		getCountrylist(countryId,iMemberId,iPostJobId);
	}	
}
function getCountrylist(countryId,iMemberId,iPostJobId)
{
	//alert(countryId);
	var extra ='';
	extra+='&countryId='+countryId;
	extra+='&iMemberId='+iMemberId;
	extra+='&iPostJobId='+iPostJobId;
	if($('#selectedstate')){
        if($('#selectedstate').val() !=''){
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }        
	}
	var url = admin_url+"/index.php?file=pj-ajpostcountry";
	var pars = extra;
    //alert(url+pars);
	$.post(url+pars,
            function(data) {
       //alert(data);
		if($('#showallsta')){
			$('#showallsta').html(data);
          
		}
	});
}
</script>
{/literal}
