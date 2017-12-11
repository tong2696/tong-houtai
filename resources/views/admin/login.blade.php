
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>1号店 后台登录</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="/houtai/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/houtai/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/houtai/assets/css/amazeui.min.css" />
  <link rel="stylesheet" href="/houtai/assets/css/admin.css">
  <link rel="stylesheet" href="/houtai/assets/css/app.css">
</head>

<body data-type="login">

  <div class="am-g myapp-login">
	<div class="myapp-login-logo-block  tpl-login-max">

		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">
				欢迎来到<span> 1号店</span> <i class="am-icon-skyatlas"></i>
				
			</div>
		</div>

		<div class="login-font" style="color:#ff0036;font-size: 15px;">
           @if(session('msg'))
              
              {{session('msg')}}

			@endif
		</div>
		<div class="am-u-sm-10 login-am-center">
            
			<form class="am-form" action="/admin/login" method="post">
				<fieldset>
					<div class="am-form-group">
						<input type="text" class="" id="doc-ipt-email-1" placeholder="输入您的用户名" name="username">
					</div>
					<div class="am-form-group">
						<input type="password" class="" id="doc-ipt-pwd-1" placeholder="设置个密码吧" name="password">
					</div>

					{{csrf_field()}}
					<p><button type="submit" class="am-btn am-btn-default">登录</button></p>
				</fieldset>
			</form>
		</div>
	</div>
</div>

  <script src="/houtai/assets/js/jquery.min.js"></script>
  <script src="/houtai/assets/js/amazeui.min.js"></script>
  <script src="/houtai/assets/js/app.js"></script>
</body>

</html>