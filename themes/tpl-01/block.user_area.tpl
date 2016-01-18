<div class="tpl-block-user-area">
	<h2 class="title">Thành viên</h2>
	{if $is_logined}
		<div class="main">
			<a>Dăng ký</a>
			<a>Dăng nhập</a>
		</div>
	{else}
		<div class="main">
			<form method="post" action="#" class="loginform">
				<div class="xform-group">
					<p class="label">Account ID: </p>
					<input class="input-text" name="username" placeholder="Account ID" type="text" />
				</div>
				<div class="xform-group">
					<p class="label">Password: </p>
					<input class="input-text" name="userpass" placeholder="Password" type="password" />
				</div>
				<div class="xform-group">
					<input type="submit" class="input-submit" name="submit" value="Let's go!!" />
				</div>
			</form>
			<a class="link" href="#">Đăng ký tài khoản</a>
			<a class="link" href="#">Quên mật khẩu</a>
		</div>
	{/if}
</div>