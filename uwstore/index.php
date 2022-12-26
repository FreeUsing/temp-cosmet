<?php
	session_start();
	if(isset($_SESSION['uw_store_logged_in'])&&$_SESSION['uw_store_logged_in']){
		if(isset($_GET['logout'])){
			unset($_SESSION['uw_store_logged_in']);
		}else{
			header('Location: store.php');
			exit();
		}
	}else{
		require_once('login.php');
		if(isset($_POST['login'])&&isset($_POST['password'])){
			$error = true;
			if($_POST['login'] == $user['login']){
				if($_POST['password'] == $user['password']){
					$_SESSION['uw_store_logged_in'] = true;
					$error = false;
					header('Location: store.php');
					exit();
				}
			}
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<meta charset="utf-8" />
		<meta name="robots" content="index, follow" />
		<meta http-equiv="cache-control" content="no-cache" />

		<base href="" />

		<link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="assets/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
		<link rel="manifest" href="assets/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
		<link href="assets/css/main.css" rel="stylesheet" />
		<link href="assets/css/basic.css" rel="stylesheet" />
		<link href="assets/css/pretty-checkbox.min.css" rel="stylesheet" />
		<link href="assets/css/magnific.css" rel="stylesheet" />	
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
		<link href="assets/css/animate.css" rel="stylesheet" />
		<link href="assets/w2ui/w2ui.css" rel="stylesheet" />


		<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700,700italic,400italic&subset=latin,cyrillic" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assets/js/wow.js"></script>

 		<title>Вход в систему | UWSTORE</title>

 		<!--[if IE 9]>
	      <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie9.min.css" rel="stylesheet">
	    <![endif]-->
	    <!--[if lte IE 8]>
	      <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie8.min.css" rel="stylesheet">
	      <script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3"></script>
	    <![endif]-->
	</head>
	<body>
		
		<div class="login_cover">
			<div class="login_form text-center wow bounceInDown">
				<figure>
					<img src="assets/images/logo.svg" />
				</figure>
				<?php if($error) {?>

					<div class="alert alert-danger" role="alert">
						<p class="mb-0">Вы ввели неверный логин или пароль.<br>Попробуйте еще раз</p>
					</div>

				<?php } ?>
				<form method="POST">
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text text-danger"><i class="fa fa-user"></i></span>
						</div>
							<input type="text" name="login" class="form-control form-control-lg" placeholder="Логин" >
					</div>
					<div class="input-group mb-5">
						<div class="input-group-prepend">
							<span class="input-group-text text-danger"><i class="fa fa-lock"></i></span>
						</div>
							<input type="password" name="password" class="form-control form-control-lg" placeholder="Пароль" >
					</div>
					<div class="mb-2">
						<button class="btn btn-lg btn-danger pl-5 pr-5"><b>Войти</b></button>
					</div>
				</form>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				var wow = new WOW({
                	mobile: true
            	});
            	wow.init();
			});
		</script>
	</body>
</html>