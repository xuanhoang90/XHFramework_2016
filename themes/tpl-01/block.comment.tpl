<div class="tpl-01-block-comment">
	<p class="title">Bình luận</p>
	<div class="list-comment">
		{foreach $list_comment as $comment}
			<div class="one-comment">
				<div class="image">
					<img src="/admin/skin/style/images/default_image.png" />
				</div>
				<div class="main">
					<div class="name">
						<p class="cmt-by">Ng X Hoang</p>
					</div>
					<div class="content">
						{$comment.content}
					</div>
				</div>
			</div>
		{/foreach}
			<div class="one-comment">
				<div class="image">
					<img src="/admin/skin/style/images/default_image.png" />
				</div>
				<div class="main">
					<div class="name">
						<p class="cmt-by">Ng X Hoang</p>
					</div>
					<div class="content">
						Print this page to PDF for the complete set of vectors. Or to use on the desktop, install FontAwesome.otf, set it as the font in your application, and copy and paste the icons (not the unicode) directly from this page into your designs.
					</div>
				</div>
			</div>
			<div class="one-comment">
				<div class="image">
					<img src="/admin/skin/style/images/default_image.png" />
				</div>
				<div class="main">
					<div class="name">
						<p class="cmt-by">Ng X Hoang</p>
					</div>
					<div class="content">
						Print this page to PDF for the complete set of vectors. Or to use on the desktop, install FontAwesome.otf, set it as the font in your application, and copy and paste the icons (not the unicode) directly from this page into your designs.
					</div>
				</div>
			</div>
	</div>
	<a>Hiển thị bình luận cũ hơn</a>
	{if $is_logined}
	<div class="object-comment">
		<textarea placeholder="Your comment"></textarea>
		<input type="submit" name="comment-submit" value="Gửi bình luận" />
	</div>
	{else}
	<div class="object-comment">
		<p class="alert"><i class="fa fa-exclamation-triangle"></i> Vui long dang nhap de gui binh luan</p>
		<div class="link">
			<a>Dang nhap</a>
			<a>Dang ky</a>
		</div>
	</div>
	{/if}
</div>