<!DOCTYPE html>
<html lang="fa" >
<head>
  <meta charset="UTF-8">
  <title><?= SITETITLE ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/css/auth.css')?>">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="background">
	<div id="panel-box">
		<div class="panel">
			<div class="auth-form on" id="login">
				<div id="form-title">ورود</div>
				<form action="<?= $base_uri.'?action=login' ?>" method="POST">
					<input name="email" autocomplete="off" type="text" required="required" placeholder="ایمیل"/>
					<input name="password" type="password" autocomplete="off" required="required" placeholder="گذرواژه"/>
					<button type="Submit">ورود</button>
				</form>
			</div>
			<div class="auth-form" id="signup" >
				<div id="form-title">عضویت</div>
				<form action="<?= $base_uri.'?action=register' ?>" method="POST">
					<input name="name" autocomplete="off" type="text" required="required" placeholder="نام"/>
					<input name="email" autocomplete="off" type="text" required="required" placeholder="ایمیل"/>
					<input name="password" autocomplete="off" type="password" required="required" placeholder="گذرواژه"/>
					<button type="Submit">ثبت نام</button>
				</form>
			</div>
		</div>
		<div class="panel">
			<div id="switch">عضویت</div>
			<div id="image-overlay"></div>
			<div id="image-side"></div>
		</div>
	</div>
</div>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
  <script >

    $('#switch').click(function(){
	$(this).text(function(i, text){
		return text === "عضویت" ? "ورود" : "عضویت";
	});
	$('#login').toggleClass("on");
	$('#signup').toggleClass("on");
	$(this).toggleClass("two");
	$('#background').toggleClass("two");
	$('#image-overlay').toggleClass("two");
    })
  </script>

</body>
</html>
