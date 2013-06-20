{section name=i loop=$db_banner}
        <td></td>
        <td>
                <div>
                    <img src="{$tconfig["tsite_upload_images_member"]}{$db_banner[0].iMemberId}/banner/{$db_banner[0].vBannerImage}" width="300" height="100">
                </div>				
        </td>
        <td style="vertical-align:top;">
                {if $db_banner[0].vBannerImage neq ''}
                        <input class="banner_delete" type="button" id="deleteButton{$bannerNum}" name="bannerButton" value="Delete Banner" onclick="return deleteBanner({$db_banner[0].iBannerId},{$bannerNum});">
                {/if}
        </td>
{/section}