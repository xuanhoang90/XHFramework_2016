{if $notfound == "true"}
	<div class="tpl-block-main-post">
		<div class="header">
			<div class="notfound-title">
				<h1>Post not found</h1>
			</div>
		</div>
		<div class="body">
			<div class="notfound-content">
				<p>Sorry, post not found</p>
			</div>
		</div>
		<div class="footer">
		
		</div>
	</div>
{else}
	<div class="tpl-block-main-post">
		<div class="header">
			<div class="xcol-left">
				<div class="thumbnail">
					<img class="thumb" src="{$post_detail.image}" />
				</div>
			</div>
			<div class="xcol-right">
				<h1 class="post-title">{$post_detail.name}</h1>
				<div class="post-details">
					<p class="detail post-date"><i class="fa fa-clock-o"></i> Time: {$post_detail.date_created}</p>
					<p class="detail post-viewed"><i class="fa fa-eye"></i> Viewed: {$post_detail.viewed}</p>
				</div>
			</div>
		</div>
		<div class="body">
			{$post_detail.content}
		</div>
		<div class="footer">
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5580e001347ed740" async="async"></script>

			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<div class="addthis_native_toolbox"></div>
		</div>
	</div>
{/if}