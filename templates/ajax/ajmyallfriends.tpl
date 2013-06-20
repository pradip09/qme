{if $FriendArr|@count gt 0}
<div class="blog_listing_centerpart1">
{section name=i loop=$FriendArr}

	<div class="bloglisting_reapt_box">
		<div class="blog_list_img"><img src="{$FriendArr[i].vProfileImage}" alt="" title="" height="70" width="70"/></div>
			<div class="bloglisting_reapt_conttext">
                                <div class="BrowseJobLikeLink"><a href="javascript:void(0);" onclick="conform('Cancel','{$FriendArr[i].iMemberId}','{$FriendArr[i].iFriendRequestId}');" id="decline{$FriendArr[i].iFriendRequestId}">Remove</a>
                                |
                                {if $FriendArr[i].Status eq 'Blocked'}
                                <a href="javascript:void(0);" onclick="conform('Unblock','{$FriendArr[i].iMemberId}','{$FriendArr[i].iFriendRequestId}');" id="decline{$FriendArr[i].iFriendRequestId}">Unblock</a></div>
                                {else}
                                <a href="javascript:void(0);" id="block{$FriendArr[i].iMemberId}" onclick="conform('Blocked','{$FriendArr[i].iMemberId}','{$FriendArr[i].iFriendRequestId}');" id="decline{$FriendArr[i].iFriendRequestId}">Block</a></div>
                                {/if}
                                <div class="blog_list_title" style="color:#31631E;" ><a href="{$site_url}/{$FriendArr[i].vMemberUrl}" class="public_user_link_1">{$FriendArr[i].vName}</a>
					<!--{$BlogListArr[i].vBlogCategory}-->
				</div>
				<div class="OppurtunitiesTxt">
				<div class="postjob_reapt_text">
					From : {$FriendArr[i].vCity}</br>
					Degree : {$FriendArr[i].vDegree}</br>
					Occupation : {$FriendArr[i].vOccupation}</br>
					
				</div></div>
				<!--<div class="postjob_reapt_text">
					Identifier: {$FriendArr[i].eGender}</br>
					From : {$FriendArr[i].vCountry},{$FriendArr[i].vState},{$FriendArr[i].vCity}</br>
					Degree : {$FriendArr[i].vStudiedAt},{$FriendArr[i].vDegree}</br>
					<span style="color: #6D6D6D;font-size: 14px;margin-left: 5px;">Occupation</span> : {$FriendArr[i].vOccupation}</br>
					
				</div>-->
				<!--<div class="blog_reapt_link"><a href="#">[1]Like</a> | <a href="#">Comment [1]</a> | <a href="#">Share</a></div></div>-->
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
<div style="text-align:center;color:red;margin-top:75px;">No Friends available.</div>
{/if}

{literal}
<script type="text/javascript">
    function conform(status, id, requestid)
    {
        var extra = '';
        extra+='&status='+status;
	extra+='&iMemberId='+id;
        var url = site_url+"/index.php?file=a-ajfrndrequestupdate";
	var pars = extra;
        //alert(url+pars);return false;
	$.post(url+pars,
	    function(data) {
                displaymyallfriends(0);    
                });
    }
</script>
{/literal}