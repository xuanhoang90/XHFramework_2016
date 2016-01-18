<div class="tpl-01-block-post-list tpl-01-block-post-list-{$rand}" data="{$flag}">
	<div class="block-header">
		<p class="title"><i class="fa fa-newspaper-o"></i> Danh sách bài viết</p>
	</div>
	<div class="list-post">
		{$i = 1}
		{foreach $postlist as $post}
			<div class="one-post post-{$i}">
				<div class="context">
					<a class="link" href="{$post.nice_url}"><i class="fa fa-pencil"></i> {$post.name}</a>
					<div class="details">
						<p class="post-date"><i class="fa fa-clock-o"></i> Time: {$post.date_created}</p>
						<p class="post-viewed"><i class="fa fa-eye"></i> Viewed: {$post.viewed}</p>
					</div>
					<div class="preview">
						{$post.short_descripton}
					</div>
				</div>
				<div class="thumbnail">
					<img class="thumb" src="{$post.image}" />
				</div>
			</div>
		{$i = $i+1}
		{/foreach}
	</div>
	<script>
		$(function(){
			//slider auto play
			var _XHSlider = function(ele){
				var _NumberSlider = $(ele).find(".list-post").children().length;
				var _ExtendHtml = "<div class='x-nav-btn-slider'>";
				for(i = 1; i <= _NumberSlider; i++){
					_ExtendHtml += "<p class='slider-btn-switch' data='"+i+"'>"+i+"</p>";
				}
				_ExtendHtml += "</div>";
				$(ele).append(_ExtendHtml);
				$(ele).find(".one-post").hide();
				$(ele).find(".post-1").show();
				$(ele).find(".slider-btn-switch").first().addClass("active");
			}
			var _Flag = $(".tpl-01-block-post-list-{$rand}").attr("data");
			if(_Flag == "frontend"){
				if($(".tpl-01-block-post-list-{$rand}").parent().parent().parent().hasClass("col-md-12")){
					$(".tpl-01-block-post-list-{$rand}").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-{$rand}");
				}
				if($(".tpl-01-block-post-list-{$rand}").parent().parent().parent().hasClass("col-md-9")){
					$(".tpl-01-block-post-list-{$rand}").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-{$rand}");
				}
				if($(".tpl-01-block-post-list-{$rand}").parent().parent().parent().hasClass("col-md-8")){
					$(".tpl-01-block-post-list-{$rand}").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-{$rand}");
				}
			}
			if(_Flag == "backend"){
				if($(".tpl-01-block-post-list-{$rand}").parent().parent().parent().hasClass("col-md-12")){
					$(".tpl-01-block-post-list-{$rand}").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-{$rand}");
				}
				if($(".tpl-01-block-post-list-{$rand}").parent().parent().parent().hasClass("col-md-9")){
					$(".tpl-01-block-post-list-{$rand}").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-{$rand}");
				}
				if($(".tpl-01-block-post-list-{$rand}").parent().parent().parent().hasClass("col-md-8")){
					$(".tpl-01-block-post-list-{$rand}").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-{$rand}");
				}
			}
		})
	</script>
</div>