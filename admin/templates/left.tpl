<!--<div class="user">
	<img src="{$tconfig.tpanel_img}avatar.png" width="44" height="44" class="hoverimg" alt="Avatar" />
	<p>Logged in as:</p>
	<p class="username">{$sess_vFirstName} {$sess_vLastName}</p>
	<p class="userbtn"><a href="{$tconfig.tpanel_url}/index.php?file=ad-administrator&mode=edit&iAdminId={$sess_iAdminId}" title="{$sess_vFirstName} {$sess_vLastName}">Profile</a></p>
	<p class="userbtn"><a href="{$tconfig.tpanel_url}/index.php?file=au-logout" title="Log out">Log out</a></p>
</div>
<ul id="nav">
	<li>
		<a class="collapsed heading">Dashboard</a>
		<ul class="navigation">
		{if $smarty.get.file eq ''}
			<li class="heading selected">Dashboard</li>
		{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=home-dashboard"  title="">Dashboard</a></li>
		{/if}
			
		</ul>
	</li>
	<li>
		<a class="collapsed heading">Administrators</a>
		<ul class="navigation">
			{if $smarty.get.file eq 'ad-administrator'}
			
			<li class="selected">Administrator</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=ad-administrator&mode=view"  title="">Administrator</a></li>
			{/if}
			
			{if $smarty.get.file eq 'ad-loginhistory'}
			<li class="selected">Login History</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=ad-loginhistory&mode=view" title="">Login History</a></li>

			{/if}
		</ul>
	</li>
	
	<li>
		<a class="collapsed heading">Users</a>
		<ul class="navigation">
			{if $smarty.get.file eq 'u-user'}
			<li class="selected">Users Management</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=u-user&mode=view&type=contendor"  title="">Users Management</a></li>
			{/if}
			
			
		</ul>
	</li>
	
	<li>
		<a class="collapsed heading">Category</a>
		<ul class="navigation">
			{if $smarty.get.file eq 'fa-category'}
			<li class="selected">Category Management</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=fa-category&mode=view"  title="">Category Management</a></li>
			{/if}
			
			
		</ul>
	</li>
	<li>
		<a class="collapsed heading">Product</a>
		<ul class="navigation">
			{if $smarty.get.file eq 'pr-product'}
			<li class="selected">Product</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=pr-product&mode=view"  title="">Product</a></li>
			{/if}
            </ul>
            </li>
            
   <li> 
		<a class="collapsed heading">Product Clothing Accessories</a> 
        <ul class="navigation">          					
			{if $smarty.get.file eq 'cl-proclothing'}
			<li class="selected">Product</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=cl-proclothing&mode=view"  title=""> Product Clothing Accessories</a></li>
			{/if}            	
			</ul>						
	
	<li>
		<a class="collapsed heading">Estimate</a>
		<ul class="navigation">
			{if $smarty.get.file eq 'o-estimate'}
			<li class="selected">Estimate</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=o-estimate&mode=view"  title="">Estimate</a></li>
			{/if}
			
			</ul>
		
		</li>
	

	<li>
		<a class="collapsed heading">Settings</a>
		<ul class="navigation">
		
			{if $smarty.get.file eq 'to-generalsettings'}
				<li class="selected">General Configration</li>
			{else}
				<li><a href="{$tconfig.tpanel_url}/index.php?file=to-generalsettings&mode=edit" title="">General Configration</a></li>
			{/if}
			{if $smarty.get.file eq 'to-systememails'}
			<li class="selected">System Emails</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=to-systememails&mode=view"  title="">System Emails</a></li>
			{/if}
			{if $smarty.get.file eq 'to-staticpage'}
			<li class="selected">Static Pages</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=to-staticpage&mode=view"  title="">Static Pages</a></li>
			{/if}
			{if $smarty.get.file eq 'to-bannner'}
			<li class="selected">Banner List</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=to-banner&mode=view"  title="">Banner List</a></li>
			{/if}
			
		</ul>
	</li>            	      
	    
</ul>-->

<!-- Toolbox dropdown start -->
        	<div id="openCloseIdentifier"></div>
            <div id="slider">
                <ul id="sliderContent">
                    <li><a href="#" title="">Change Username</a></li>
                   
                    <li class="alt"><a href="#" title="">Payment Details</a></li>
                    <li><a href="{$tconfig.tpanel_url}/index.php?file=au-logout" title="">Log Out</a></li>
                </ul>
                <div id="openCloseWrap">
                    <div id="toolbox">
            			<a href="#" title="Toolbox Dropdown" class="toolboxdrop">Toolbox <img src="{$tconfig.tpanel_img}icon_expand_grey.png" alt="Expand" /></a>
            		</div>
                </div>
            </div>
<!-- Toolbox dropdown end -->   
    	
<!-- Userbox/logged in start -->
            <div id="userbox">
            	<p>Welcome {$sess_vFirstName}</p>
                <p><span>You are logged in as Admin</span></p>
                <ul>
                    <li><a href="{$tconfig.tpanel_url}/index.php?file=to-generalsettings&mode=edit" title="Configure"><img src="{$tconfig.tpanel_img}icons/icon_cog.png" alt="Configure" /></a></li>
                    <li><a href="{$tconfig.tpanel_url}/index.php?file=au-logout" title="Logout"><img src="{$tconfig.tpanel_img}icons/icon_unlock.png" alt="Logout" /></a></li>
                </ul>
            </div>
<!-- Userbox/logged in end -->  

<!-- Main navigation start -->         
            <ul id="nav">
            	<li>
                    <a class="collapsed heading">Dashboard</a>
                     <ul class="navigation">
                        {if $smarty.get.file eq ''}
                        <li class="heading selected">Dashboard</li>
                       {else}
                       <li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=home-dashboard"  title="">Dashboard</a></li>
                        {/if}
                    </ul>
                </li>
                <li>
                    <a class="collapsed heading">Administrators</a>
                     <ul class="navigation">
                        {if $smarty.get.file eq 'ad-administrator'}
                        <li class="heading selected">Administrator</li>
                      {else}
			             <li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=ad-administrator&mode=view"  title="">Administrator</a></li>
			         {/if}
                        
                        {if $smarty.get.file eq 'ad-loginhistory'}
			             <li class="heading selected">Login History</li>
			             {else}
                <li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=ad-loginhistory&mode=view" title="">Login History</a></li>
                        {/if}
                    </ul>
                </li>
                <li>
		<a class="collapsed heading">Members</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'm-member'}
			<li class="heading selected">Members Management</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=view&type=contendor"  title="">Members Management</a></li>
			{/if}
			
			
                    </ul>
                </li>
		<!--<li>
		<a class="collapsed heading">Events</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'e-event'}
			<li class="heading selected">Event</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=e-event&mode=view"  title="">Event</a></li>
			{/if}
                    </ul>
                </li>--> 
                <li>
		<a class="collapsed heading">FAQs</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'fa-faq'}
			<li class="heading selected">FAQs</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=fa-faq&mode=view"  title="">FAQs</a></li>
			{/if}
			{if $smarty.get.file eq 'fa-faqcat'}
			<li class="heading selected">FAQ Category</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=fa-faqcat&mode=view" title="">FAQ Category</a></li>
			{/if}
		    </ul>
                </li>
               <!-- <li>
		<a class="collapsed heading">Blog</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'b-blog'}
			<li class="heading selected">Blog</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=b-blog&mode=view"  title="">Blog</a></li>
			{/if}
			{if $smarty.get.file eq 'bc-blogcategory'}
			<li class="heading selected">Blog Category</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=bc-blogcategory&mode=view" title="">Blog Category</a></li>
			{/if}
                    </ul>
                </li>-->
                <!--<li>
		<a class="collapsed heading">Photo</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'ph-photo'}
			<li class="heading selected">Photo</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=ph-photo&mode=view"  title="">Photo</a></li>
			{/if}
			{if $smarty.get.file eq 'ph-photocategory'}
			<li class="heading selected">Photo Category</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=ph-photocategory&mode=view" title="">Photo Category</a></li>
			{/if}
                    </ul>
                </li>-->
		<!--<li>
		<a class="collapsed heading">Song</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'so-song'}
			<li class="heading selected">Song</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=so-song&mode=view" title="">Song</a></li>
			{/if}
			{if $smarty.get.file eq 'so-songalbum'}
			<li class="heading selected">Song Album</li>
			{else}
			<li><a href="{$tconfig.tpanel_url}/index.php?file=so-songalbum&mode=view" title="">Song Album</a></li>
			{/if}
                    </ul>
                </li>-->
               <!-- <li>
		<a class="collapsed heading">Video</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'v-video'}
			<li class="heading selected">Video</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=v-video&mode=view"  title="">Video</a></li>
			{/if}
			{if $smarty.get.file eq 'va-videoalbum'}
			<li class="heading selected">Video Album</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=va-videoalbum&mode=view" title="">Video Album</a></li>
			{/if}
                    </ul>
                </li>-->
                <li>
		<a class="collapsed heading">Store</a>
                    <ul class="navigation">
            {if $smarty.get.file eq 'sp-storeplan'}
			<li class="heading selected">Store Plan</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=sp-storeplan&mode=view"  title="">Store Plan</a></li>
			{/if}        
                                                            
			{if $smarty.get.file eq 'st-store'}
			<li class="heading selected">Store Category</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=st-store&mode=view"  title="">Store Category</a></li>
			{/if}
                        
                        {if $smarty.get.file eq 'pt-plan_transaction'}
			<li class="heading selected">Plan Transaction</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=pt-plan_transaction&mode=view"  title="">Plan Transaction</a></li>
			{/if}
                        
                 {if $smarty.get.file eq 'pro-product'}
			<li class="heading selected">General Items</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=pro-product&mode=view"  title="">General Items</a></li>
			{/if}
                        
                  {if $smarty.get.file eq 'cl-clothing'}
			<li class="heading selected">Clothing and Accessories</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=cl-clothing&mode=view"  title="">Clothing and Accessories</a></li>
			{/if}
            
            
            
            {if $smarty.get.file eq 'at-automotive'}
			<li class="heading selected">Automotive</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=at-automotive&mode=view"  title="">Automotive</a></li>
			{/if}
                        
            {if $smarty.get.file eq 're-realestate'}
			<li class="heading selected">Real Estate</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=re-realestate&mode=view"  title="">Real Estate</a></li>
			{/if}
                        
                        {if $smarty.get.file eq 'mk-make'}
			<li class="heading selected">Make</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=mk-make&mode=view"  title="">Make</a></li>
			{/if} 
                        
                        {if $smarty.get.file eq 'md-model'}
			<li class="heading selected">Model</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=md-model&mode=view"  title="">Model</a></li>
			{/if}
                        
                         {if $smarty.get.file eq 've-vehicle'}
			<li class="heading selected">Vehicle Type</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=ve-vehicle&mode=view"  title="">Vehicle Type</a></li>
			{/if}
                        
                    </ul>
                </li>
                <!--<li>
		<a class="collapsed heading">Channel</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'ch-channel'}
			<li class="heading selected">Channel</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=ch-channel&mode=view"  title="">Channel</a></li>
			{/if}
                    </ul>
                </li>-->

                <li>
		<a class="collapsed heading">Post Job</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'pj-postjob'}
			<li class="heading selected">Post Job</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=pj-postjob&mode=view"  title="">Post Job</a></li>
			{/if}
                    </ul>
                </li>
                <li>
		<a class="collapsed heading">Post Campaign</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'pc-postcampaign'}
			<li class="heading selected">Post Campaign</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=pc-postcampaign&mode=view"  title="">Post Campaign</a></li>
			{/if}
                    </ul>
                </li>
                 <li>
		<a class="collapsed heading">Contests</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'con-contests'}
			<li class="heading selected">Contests</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=con-contests&mode=view"  title="">Contests</a></li>
			{/if}
                    </ul>
                </li>
               
                <li>
		<a class="collapsed heading">Fundraiser Campaign</a>
                    <ul class="navigation">
			{if $smarty.get.file eq 'fu-fundraiser'}
			<li class="heading selected">Fundraiser Campaign</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=fu-fundraiser&mode=view"  title="">Fundraiser Campaign</a></li>
			{/if}
                    </ul>
                </li>
		      <li>
		<a class="collapsed heading">Qme news</a>
		<ul class="navigation">
			{if $smarty.get.file eq 'n-news'}
			<li class="heading selected">Relevent News</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=n-news&mode=view"  title="">Relevent News</a></li>
			{/if}
			{if $smarty.get.file eq 'n-distictnews'}
			<li class="heading selected">Distict News</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=n-distictnews&mode=edit"  title="">Distict News</a></li>
			{/if}
                        {if $smarty.get.file eq 'n-citynews'}
			<li class="heading selected">City News</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=n-citynews&mode=edit"  title="">City News</a></li>
			{/if}
		</ul>
		
            </li>
                <li>
		<a class="collapsed heading">QME Sports</a>
		<ul class="navigation">
			{if $smarty.get.file eq 'fan-faq_nfl'}
			<li class="heading selected">FAQs</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=fan-faq_nfl&mode=view"  title="">FAQs</a></li>
			{/if}
			{if $smarty.get.file eq 'fan-faqcat_nfl'}
			<li class="heading selected">FAQ Category</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=fan-faqcat_nfl&mode=view" title="">FAQ Category</a></li>
			{/if}
                        {if $smarty.get.file eq 'ne-news_nfl'}
			<li class="heading selected">News</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=ne-news_nfl&mode=view"  title="">News</a></li>
			{/if}
		</ul>
		
            </li>
                <li>
		<a class="collapsed heading">Settings</a>
		<ul class="navigation">
		
			{if $smarty.get.file eq 'to-generalsettings'}
				<li class="heading selected">General Configration</li>
			{else}
				<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=to-generalsettings&mode=edit" title="">General Configration</a></li>
			{/if}
                        {if $smarty.get.file eq 'to-buypointscontent'}
				<li class="heading selected">Buy Points Content</li>
			{else}
				<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=to-buypointscontent&mode=edit" title="">Buy Points Content</a></li>
			{/if}
                        {if $smarty.get.file eq 'to-tooltipsettings'}
				<li class="heading selected">Tool Tip Settings</li>
			{else}
				<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=to-tooltipsettings&mode=edit" title="">Tool Tip Settings</a></li>
			{/if}
                        {if $smarty.get.file eq 'to-systememails'}
			<li class="heading selected">System Emails</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=to-systememails&mode=view"  title="">System Emails</a></li>
			{/if}
			{if $smarty.get.file eq 'to-staticpage'}
			<li class="heading selected">Static Pages</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=to-staticpage&mode=view"  title="">Static Pages</a></li>
			{/if}
			{if $smarty.get.file eq 'to-bannner'}
			<li class="heading selected">Banner List</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=to-banner&mode=view"  title="">Banner List</a></li>
			{/if}
                        {if $smarty.get.file eq 'to-agencybanner'}
			<li class="heading selected">Agency Banner List</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=to-agencybanner&mode=view"  title="">Agency Banner List</a></li>
			{/if}
                        {if $smarty.get.file eq 'to-hometab'}
			<li class="heading selected">Home Tab</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=to-hometab&mode=view"  title="">Home Tab</a></li>
			{/if}
                         {if $smarty.get.file eq 'to-interest'}
			<li class="heading selected">Interest</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=to-interest&mode=view"  title="">Interest</a></li>
			{/if}
                        {if $smarty.get.file eq 'to-skill'}
			<li class="heading selected">Skill</li>
			{else}
			<li class="heading"><a href="{$tconfig.tpanel_url}/index.php?file=to-skill&mode=view"  title="">Skill</a></li>
			{/if}
                       
			
                    </ul>
                </li>
          
            
                <!---<li>
                    <ul class="navigation">
                        <li class="heading selected">Current Section</li>
                        <li><a href="#" title="">Section link here</a></li>
                        <li><a href="#" title="">Section link here</a></li>
                        <li><a href="#" title="">Section link here</a></li>
                    </ul>
                </li>
                <li>
                    <a class="collapsed heading">Section Heading</a>
                     <ul class="navigation">
                        <li><a href="#" title="">Section link here</a></li>
                        <li><a href="#" title="">Section link here</a></li>
                        <li><a href="#" title="">Section link here</a></li>
                    </ul>
                </li>-->   
            </ul>
