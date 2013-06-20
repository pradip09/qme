
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=pj-postjob&mode=view">Post Job</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Post Job{else}Edit Post Job{/if}</li>
	</ul>
</div>
<div id="content">
	<div class="container" id="tabs">
		<div class="conthead">
			{if $mode eq add}
			<h2 class="left">Add Post</h2>
			{else}
			<h2 class="left">Edit Post</h2>
			{/if}
		</div>
		<div class="contentbox" id="tabs-1">
			<form id="frmadd" name="frmadd" action="index.php?file=pj-postjob_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iPostJobId" id="iPostJobId" value="{$iPostJobId}" />
			<input type="hidden" name="action" id="action" value="{$mode}" />
			<input type="hidden" name="selectedstate" id="selectedstate" value="{$db_postjob[0].iStateId}"/>
				<div class="inputboxes">
					<label for="textfield"><strong>What skill are you looking for?:</strong></label>
					<input type="text" id="vSkill" name="Data[vSkill]" class="inputbox" lang="*" title="What skill are you looking for" value="{$db_postjob[0].vSkill}"/>
				</div>
				
				<div class="inputboxes" >
					<label for="textfield" style="width:500px;"><strong>What do you need this person to do?:</strong></label>
				</div>
				<textarea id="tDescription" name="Data[tDescription]" class="inputbox" lang="*" title="What do you need this person to do" style="width:500px;height:123px;margin-left: 140px;">{$db_postjob[0].tDescription}</textarea>
				<div style="clear:both;"></div>
				<div class="inputboxes">
					<label for="textfield"><strong>Skills:</strong></label>
					{if $db_skill|@count gt 0}
					<select multiple name="iSkillId[]" id="iSkillId" title="Skills" lang="*" style="width:227px;">
						
						{section name=i loop=$db_skill}
						<option value="{$db_skill[i].iSkillId}" {if $db_skill[i].iSkillId|in_array:$relatedArr} selected {/if}>{$db_skill[i].vSkill}</option>
						{/section}
					</select>
					{/if}
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Interests:</strong></label>
					{if $db_interest|@count gt 0}
					<select multiple name="iInterestId[]" id="iInterestId" title="Interests" lang="*" style="width:227px;">
						
						{section name=i loop=$db_interest}
						<option value="{$db_interest[i].iInterestId}" {if $db_interest[i].iInterestId|in_array:$relatedArrIntrest} selected {/if}>{$db_interest[i].vInterest}</option>
						{/section}
					</select>
					{/if}
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Other Interest:</strong></label>
					<input type="text" id="vOtherInterest" name="Data[vOtherInterest]" class="inputbox"  title="Other Interest" value="{$db_postjob[0].vOtherInterest}"/>
				</div>
				 <div class="inputboxes">
					<label for="textfield"><strong>Country:</strong></label>
					<select id="iCountryId" name="Data[iCountryId]" lang="*" title="Country" onchange="getCountry(this.value)" style="width:227px;">
						<option value=''>--Select Country--</option>
						{section name=i loop=$db_con}
						<option value='{$db_con[i].iCountryId}' {if $db_con[i].iCountryId eq $db_postjob[0].iCountryId}selected{/if}>{$db_con[i].vCountry}</option>
						{/section}
					</select>                
				</div>             
                                	 
				 <div class="inputboxes">
					<label for="textfield"><strong>State:</strong></label>
					<div id="showallstates">					
						<select id="iStateId" name="Data[iStateId]" title="State"  lang="*"  style="width:227px">							
						<option value=''>--Select State--</option>
					    </select>	
					</div>				 
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>City:</strong></label>
					<input type="text" id="vCity" name="Data[vCity]" class="inputbox" title="City" lang="*" value="{$db_postjob[0].vCity}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Zip:</strong></label>
					<input type="text" id="vZip" name="Data[vZip]" class="inputbox" title="Zip" lang="*" value="{$db_postjob[0].vZip}" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Mile:</strong></label>
					<input type="text" id="vMile" name="Data[vMile]" class="inputbox" title="Mile" lang="*" value="{$db_postjob[0].vMile}" onkeypress="return checkprice(event);"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status :</strong></label>
						<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" {if $db_postjob[0].eStatus eq Active}selected{/if} >Active</option>
						<option value="Inactive" {if $db_postjob[0].eStatus eq Inactive}selected{/if} >Inactive</option>
					</select>
				</div>
				<br/>
				<br/>
				{if $mode eq add}
				<input type="submit" value="Add Post" class="btn" title="Add Post" onclick="return validate(document.frmadd);" style="margin-left:139px;"/>
				{else}
				<input type="submit" value="Edit Post" class="btn" title="Edit Post" onclick="return validate(document.frmadd);" style="margin-left:139px;"/>
				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</form>
		</div>
	</div>
</div>
{literal}
<script>
function redirectcancel(){

    window.location="{/literal}{$admin_url}{literal}/index.php?file=pj-postjob&mode=view";
    return false;
}


</script>
<script>
getId('{/literal}{$db_postjob[0].iCountryId}{literal}');
function getId(id){
	
	if($('#action').val() == 'edit'){
		var countryId = id;
		getCountry(countryId);
	}
	
}

function getCountry(countryId)
{
	//alert(countryId);
	var extra ='';
	extra+='&countryId='+countryId;
	if($('#selectedstate')){
        if($('#selectedstate').val() !=''){
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }
        
	}
	var url = admin_url+"/index.php?file=pj-ajcountrylist";
	var pars = extra;
    //alert(url+pars);
	$.post(url+pars,
            function(data) {
      // alert(data);
		if($('#showallstates')){
			$('#showallstates').html(data);
          
		}
	});
}
</script>


{/literal}
