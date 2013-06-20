 <div id="image{$PhotoArr[i].iPhotoId}" class="readpoppup" style="width:800px;min-height:453px;">
			
		</div>
		    
		    
		    {literal}
		    <script type="text/javascript">
		    $(document).ready(function() {
			$(".fancybox-thumb").fancybox({
			prevEffect	: 'none',
			nextEffect	: 'none',
			helpers	: {
			title	: {
				type: 'outside'
			},
			overlay	: {
				opacity : 0.8,
				css : {
					'background-color' : '#000'
				}
			},
			thumbs	: {
				width	: 100,
				height	: 100
			}
			}
			});
			});
		    </script>
		    {/literal}