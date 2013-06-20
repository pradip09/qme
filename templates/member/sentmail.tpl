

<form name="frmlist" id="frmlist" method="post" action="{$site_url}/index.php?file=a-ajsendmail_a">
	
<input name="chkCount" id="chkCount" type="hidden"/>
<input name="view" id="view" type="hidden"/>
<!--<?echo $generalobj->PrintElement("view","view",$view,"Hidden");?>-->
<!--<?echo $generalobj->PrintElement("chkCount","chkCount",'',"Hidden");?>-->
<div class="desboard_body"><table border="0" cellpadding="0" cellspacing="0" width="100%">

<tr>
	<td width="22%" valign="top" class="mail_left">
		<table width="100%" border="0" style="margin-top:10px;"  align="right" cellpadding="0" cellspacing="0">
		<tr>
			<td height="25" class="inbox-round-bg" style="padding-left:18px;"><img src="{$tconfig["front_images"]}inbox-icon1.gif" alt="" border="0" style="margin-bottom: 7px;"/> <a href="{$site_url}/myaccount" class="whitelink-normal"><img src="{$tconfig["front_images"]}my-account.png" alt="My Store" title="My Store" border="0" /></a></td>
		</tr>
		<tr>
			<td height="25" class="inbox-round-bg" style="padding-left:18px;"><img src="{$tconfig["front_images"]}inbox-icon1.gif" alt="" border="0"/> <a href="{$site_url}/composemessage" class="whitelink-normal">Compose Message</a></td>
		</tr>
		<tr>
			<td height="25" class="inbox-round-bg"  style="padding-left:18px;"><img src="{$tconfig["front_images"]}inbox-icon1.gif" alt="" border="0"/> <a href="{$site_url}/myinbox" class="whitelink-normal">Inbox</a></td>
		</tr>
		<tr>
			<td height="25" class="inbox-round-bg active" style="padding-left:18px;"><img src="{$tconfig["front_images"]}inbox-icon1.gif" alt="" border="0"/> <a href="{$site_url}/sentmail" class="whitelink-normal">Sent Mails</a></td>
		</tr>
		</table>
	</td>
	<td width="1%"></td>
	<td width="78%" valign="top" class="gr-bg">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="top">
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        	<!--	<tr>
                	<td width="3"><img src="{$tconfig["front_images"]}gr-topleftcorner.gif" alt="" border="0" /></td>
                    <td class="gr-bg" width="100%"><img src="{$tconfig["front_images"]}spacer.gif" height="1" width="1" /></td>
                    <td width="3"><img src="{$tconfig["front_images"]}gr-toprightcorner.gif" alt="" border="0" /></td>
				</tr>
                <tr>-->
                	<td colspan="3"  valign="top" class="send">
						<table width="100%" border="0" cellspacing="4" cellpadding="2">
							{if $msg1 neq ''}
								<tr id="msgrow" class="displaynone">
									<td colspan="2">
									<div id="msg">
										<ul id="top-tabstrips">
											<li style="list-style:none;"><em style="margin-left: 123px;color: red;">{$msg1}</em></li>
										</ul>
									</div>
									</td>
								</tr>
								{/if}
						<tr>
							<td height="25" colspan="2"><input type="Text" class="input1" id="vSearch" name="vSearch" value="{$vSearch}"> <input type="button" class="btn_searchmail"  style="cursor:pointer" title="Search Mail"  onclick="getRedirect();" value="Search Mail">&nbsp;<a style="cursor:pointer"  title="Delete" onclick="checkDelete('Delete');"><img src="{$tconfig["front_images"]}mail_delete_btn.png" alt="Delete" border="0" hspace="2" align="absmiddle" /></a>&nbsp;<a href="{$site_url}/sentmail" style="cursor:pointer"  title="Show all" ><img src="{$tconfig["front_images"]}mail_show_all_btn.png" alt="Show all" border="0" hspace="2" align="absmiddle" /></a></td>
						</tr>	
						{if $num_totrec gt 0}
						<tr>
							<td height="25"><strong>Select :</strong> <a href="#" title="All" class="greylink-normal" onclick="checkAll(true);">All</a>, <a href="#" title="None" class="greylink-normal" onclick="checkAll(false);">None</a><!-- , <a href="index.php?file=ge-sentmails&view=edit&AX=Yes&parent=ge-inbox&vRead=1" class="greylink-normal">Read</a>, <a href="index.php?file=ge-sentmails&view=edit&AX=Yes&parent=ge-inbox&vRead=0" class="greylink-normal">Unread</a> --></td>
							<td align="right">{$recmsg}&nbsp;&nbsp;<span class=bmatter>Pages</span> :{$page_link}</td>
						</tr>	
						{else}
						<tr>
							<td colspan="2" height="25" align="center" class="red-matter">{$recmsg}</td>
						</tr>	
						{/if}
						{if $num_totrec gt 0}
						<tr>
							<td  colspan="2" valign="top">
								<table width="100%" class="table-border-status" cellspacing="0" cellpadding="0">
								{if  $msgs|@count gt 0}
													{section name=j loop=$msgs}
													{if $msgs[j].eRead eq 0} 
													{assign var="class" value="light"}
													{else}
													{assign var="class" value="dark"}
													{/if}
								
								<tr>
									
									<td width="4%" height="22" class="{$class}"><input type="checkbox" name="ch[]" id='iId'  value="{$msgs[j].iMailId}" /></td>
									{if $msgs[j].eRead eq 0}
									<td class="{$class}"><img src="{$tconfig["front_images"]}unread_mail.png" alt="" border="0" /></td>
									{else}
									<td class="{$class}"><img src="{$tconfig["front_images"]}read_mail.png" alt="" border="0" /></td>
									{/if}
									<td width="66%" class="{$class}"><div><a href="{$site_url}/msgdetail/{$msgs[j].iMailId}/sentmail" class="sender-link" class="subject-link">{$msgs[j].vSubject}</a></div></td>
									<td width="30%" align="center" class="{$class}"<a class="sender-link">{$msgs[j].dMaildate}</a></td>
								</tr>
								
								{/section}		
								{/if}
								<input  type="hidden" name="no" id="no" value="{$count_msg}">
								</table>
							</td>
						</tr>
						{/if}
						<tr>
							<td height="25"><strong>Select :</strong> <a href="#" title="All" class="greylink-normal" onclick="checkAll(true);">All</a>, <a href="#" title="None" class="greylink-normal" onclick="checkAll(false);">None</a><!-- , <a href="index.php?file=ge-sentmails&view=edit&AX=Yes&parent=ge-inbox&vRead=1" class="greylink-normal">Read</a>, <a href="index.php?file=ge-sentmails&view=edit&AX=Yes&parent=ge-inbox&vRead=0" class="greylink-normal">Unread</a> --></td>
							<td align="right">{$recmsg}&nbsp;&nbsp;<span class=bmatter>Pages</span> :{$page_link}</td>
						</tr>
						</table>								
			</td>
		</tr>
        <tr>
        	<td width="3"><img src="{$tconfig["front_images"]}gr-bottleftcorner.gif" alt="" border="0" /></td>
            <td class="gr-bg"><img src="{$tconfig["front_images"]}spacer.gif" height="1" width="1" /></td>
            <td width="3"><img src="{$tconfig["front_images"]}gr-bottrightcorner.gif" alt="" border="0" /></td>
		</tr>
        </table>
		</td>
		</tr>
		</table>
	</td>
</tr>
</table></div>
</form>
{literal}
<script type="text/javascript">
function checkDelete(val)
{
	$('#view').val(val);
	var chks = document.getElementsByName('ch[]');
        var hasChecked = false;
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        if (!hasChecked)
        {
                alert("Please select at least one e-mail.");
                chks[0].focus();
                return false;
        }
	document.frmlist.submit();
	
}
</script>
<script>

//auto hide msg after five second.	
<?if(GetVar('var_msg') !='') { ?>
$('msgrow').style.display="";
	setTimeout("$('msgrow').style.display='none';",5000);
<?}?>
	


</script>
<script>
function getRedirect(){
	var txtVal = document.getElementById("vSearch").value;
	//alert(txtVal);
	window.location = 'index.php?file=m-sentmail&vSearch='+txtVal;
}

</script>
{/literal}