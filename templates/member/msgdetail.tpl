{if $sent eq 1}
<form name="frmadd" id="frmadd" action="{$site_url}/index.php?file=a-ajsendmail_a" method="post">
{/if}
{if $sent eq 0}
<form name="frmadd" id="frmadd" action="{$site_url}/index.php?file=a-ajmyinbox_a" method="post">
{/if}
<input type="hidden" name="view" id="view" value="{$view}"/>
<input type="hidden" name="iMailId" id="iMailId" value="{$iMailId}"/>
<div class="desboard_body" id="services_boxinnerbg">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="22%" valign="top" class="mail_left">
		<table width="100%" border="0" style="margin-top:10px;"  align="right" cellpadding="0" cellspacing="0">
		<tr>
			<td height="25" class="inbox-round-bg" style="padding-left:18px;"><img src="{$tconfig["front_images"]}inbox-icon1.gif" alt="" border="0" style="margin-bottom: 7px;"/> <a href="{$site_url}/myaccount" class="whitelink-normal"><img src="{$tconfig["front_images"]}my-account.png" alt="My Store" title="My Store" border="0"/></a></td>
		</tr>
		<tr>
			<td height="25" class="inbox-round-bg" style="padding-left:18px;"><img src="{$tconfig["front_images"]}inbox-icon1.gif" alt="" border="0"/> <a href="{$site_url}/composemessage" class="whitelink-normal">Compose Message</a></td>
		</tr>
		<tr>
			<td height="25" {if $sent eq 0}class="inbox-round-bg active"{else}class="inbox-round-bg"{/if}  style="padding-left:18px;"><img src="{$tconfig["front_images"]}inbox-icon1.gif" alt="" border="0"/> <a href="{$site_url}/myinbox" class="whitelink-normal">Inbox</a></td>
		</tr>
		<tr>
			<td height="25" {if $sent eq 0}class="inbox-round-bg"{else}class="inbox-round-bg active"{/if} style="padding-left:18px;"><img src="{$tconfig["front_images"]}inbox-icon1.gif" alt="" border="0"/> <a href="{$site_url}/sentmail" class="whitelink-normal">Sent Mails</a></td>
		</tr>
		</table>
	</td>
	<td width="80%" align="right">
		<table width="95%" border="0" cellspacing="0" cellpadding="0">
			{$sent}
		<tr>
			<td valign="top" >
				<table width="100%" border="0" class="table-border-status" cellspacing="2" cellpadding="2">
				<tr>
					<td><a style="cursor:pointer" title="Delete" onclick="return getMessageDelete();"><img src="{$tconfig["front_images"]}btn-delete.gif" alt="" border="0" hspace="2" /></a> {if $sent eq ''}<a href="{$site_url}/index.php?file=m-composemessage&iMailId={$iMailId}" title="Reply"><img src="{$tconfig["front_images"]}btn-reply.gif" alt="" border="0" hspace="2" style="margin-left: 74px;margin-top: -25px;"/></a> {/if}</td>
				</tr>
				<tr>
					<td class="mail-heading">Subject</td><td>:</td><td colspan="3" class="mail-heading">{$msgsDetail.Subject}</td> 
				</tr>
				{if $sent neq ''}
				<tr>
					<td width="15%">
					From
					</td>
					<td width="1%">:</td>
					<td width="94%">{$db_memname[0]['vName']}( {$db_memname[0]['vEmail']}) </td>
				</tr>
				{/if}
				<tr class="grey-matter">
					<td width="15%">
					{if $sent eq ''}
					From
					{else}
					Sending to 
					{/if}
					</td>
					<td width="1%">:</td>
					<td width="94%">{$msgsDetail.Name}</td>
				</tr>
				
				<tr class="grey-matter">
					<td>Sent</td>
					<td>:</td>
					<td>{$msgsDetail.Sent}</td>
				</tr>
				<tr>
					<td >Content</td><td >:</td> <td>{$msgsDetail.lBody}</td>
					<!--<td colspan="3"><?print nl2br(stripslashes($msgsDetail['lBody']));?></td>-->
				</tr>
				</table>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
</div>
</form>
<script>
function getMessageDelete(){
	
	var a = document.getElementById('view').value = 'Delete';
	document.frmadd.submit();
}
</script>