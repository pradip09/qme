{if  $FriendArr|@count gt 0}
		<div class="recent_activities_title" id="recentactivity">Friend Requests</div>
                <div class="frnd_request_scroll">
                {section name=i loop=$FriendArr}
                <div class="added_users">
			<div class="my_acc_img"><a href="#">
			<a href="{$site_url}/{$FriendArr[i].vMemberUrl}"><img src="{$FriendArr[i].vProfileImage}" alt="" height="50" width="50"/></a>
			</a></div>
			<div class="user_content">
				{if $FriendArr[i].eType eq 'status_update'}
				<div class="myacc_dele_btn"><a href="#" onclick="deleteitem({$FriendArr[i].iTypeId},'status');"> Delete</a></div>
				{/if}
				<div class="conform_notnow_btn" id="req{$FriendArr[i].iFriendRequestId}">
                                <div class="conform_btn"><a href="javascript:void(0);" onclick="conform('Approve','{$FriendArr[i].iMemberId}','{$FriendArr[i].iFriendRequestId}');" id="conf{$FriendArr[i].iFriendRequestId}">Confirm</a></div>
                                <div class="notnow_btn"><a href="javascript:void(0);" onclick="conform('Cancel','{$FriendArr[i].iMemberId}','{$FriendArr[i].iFriendRequestId}');" id="decline{$FriendArr[i].iFriendRequestId}">Decline</a></div>
                                </div>
                                <a href="{$site_url}/{$FriendArr[i].vMemberUrl}" class="public_user_link">{$FriendArr[i].vName}</a>
                        </div>
		</div>
                {/section}
		</div>
<div class="page_link">
    <span style="padding-left:10px; float:left;">{$recmsg}</span>
    <span class="nav" style="float:right;"><div align="right" id="paging">{$pages}</div></span>	
</div>
<div class="cl"></div>
{else}
{/if}
{literal}
<script type="text/javascript">
    function conform(status, id, requestid)
    {
	
        var extra = '';
        extra+='&status='+status;
	extra+='&iMemberId='+id;
	extra+='&iRequestId='+requestid;
        var url = site_url+"/index.php?file=a-ajfrndrequestupdate";
	var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
	    function(data) {
                displayfrndrequest(0);
                });
    }
</script>
{/literal}