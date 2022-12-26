<?php
	session_start();
	if(!$_SESSION['uw_store_logged_in']){
		unset($_SESSION['uw_store_logged_in']);
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['save'])){
		if($_POST['mode']!='user'){
			$f = fopen('config.json', "w");
			fwrite($f, $_POST['config']);
			fclose($f);
		}else{

			$output = '<?php'."\n\t".'$user = ['."\n\t\t".'"login" => "'.$_POST['login'].'",'."\n\t\t".'"password"=>"'.$_POST['password'].'",'."\n\t\t".'"email" => "'.$_POST['email'].'"'."\n\t".'];'."\n".'?>';
			$f = fopen('login.php', "w");
			fwrite($f, $output);
			fclose($f);

		}
		echo '{"result": "ok", "answer":"Сохранение прошло успешно"}';
		exit;
	}	

	require_once('login.php');
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
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

 		<title>Насройки JS магазина | UWSTORE</title>

 		<!--[if IE 9]>
	      <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie9.min.css" rel="stylesheet">
	    <![endif]-->
	    <!--[if lte IE 8]>
	      <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie8.min.css" rel="stylesheet">
	      <script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3"></script>
	    <![endif]-->
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row pt-10 pb-10 align-items-center">
					<div class="col-auto">
						<div class="main-logo">
							<img src="assets/images/logo.svg" class="w-100" />
						</div>
					</div>
					<div class="col text-right">
						<div class="dropdown d-inline-block d-lg-none">
							<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Меню
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item text-danger" href="store.php">Каталог</a>
								<a class="dropdown-item text-danger" href="orders.php">Заказы</a>
								<a class="dropdown-item text-light bg-danger active" href="settings.php">Настройки</a>
								<a class="dropdown-item text-danger" href="cssgen.php">Внешний вид</a>
								<a class="dropdown-item text-danger" href="help.php">Помощь</a>
							</div>
						</div>
						<ul class="main-menu d-none d-lg-inline-block">
							<li><a href="store.php"><i class="fa fa-table d-block d-lg-none"></i> <span class="d-none d-lg-inline">Каталог</span></a></li>
							<li><a href="orders.php"><i class="fa fa-table d-block d-lg-none"></i> <span class="d-none d-lg-inline">Заказы</span></a></li>
							<li class="active"><a href="settings.php"><i class="fa fa-cog d-block d-lg-none"></i> <span class="d-none d-lg-inline">Настройки</span></a></li>
							<li><a href="cssgen.php"><i class="fa fa-life-ring d-block d-lg-none"></i> <span class="d-none d-lg-inline">Внешний вид</span></a></li>
							<li><a href="help.php"><i class="fa fa-life-ring d-block d-lg-none"></i> <span class="d-none d-lg-inline">Помощь</span></a></li>
						</ul>
					</div>
					<div class="col-auto">
						<a href="index.php?logout=1"><button class="btn btn-danger btn-outline-danger"><i class="fa fa-sign-out d-block d-lg-none"></i> <span class="d-none d-lg-inline">Выйти</span></button></a>
					</div>
				</div>
			</div>
		</header>
		<section class="pt-20 pb-20">
			<div class="container">
				<div class="row mt-4">
					<div class="col-lg-8">
						<div class="card">
							<div class="card-header">
							    <i class="fa mr-2 fa-shopping-cart text-danger"></i> Настройки корзины
							</div>
							<div class="card-body" id="cart_settings">
								<div class="row">
									<div class="col-lg-4 mb-4">
										<label for="config_type">Режим корзины</label>
										<select class="custom-select" id="config_type">
											<option value="popup">Всплывающее окно</option>
											<option value="page">Отдельная страница</option>
										</select>
										<small>Действие при клике на корзину</small>
									</div>
									<div class="col-lg-4 mb-4">
										<label for="config_page_link">Страница корзины</label>
										<input class="form-control" id="config_page_link" />
										<small>Полный url страницы с корзиной, нужен если режим — отдельная страница</small>
									</div>
									<div class="col-lg-4 mb-4">
										<label for="config_fullcart_mode">Режим вывода корзины</label>
										<select class="custom-select" id="config_fullcart_mode">
											<option value="table">Таблицей (TABLE)</option>
											<option value="div">Слоями (DIV)</option>
										</select>
										<small>Способ построения полной корзины HTML таблицей или слоями DIV</small>
									</div>
									<div class="col-lg-3 mb-4">
										<label for="config_cart_popup_close">Закрыть корзину</label>
										<input class="form-control" id="config_cart_popup_close" />
										<small>Html внутри кнопки закрытия корзины</small>
									</div>
									<div class="col-lg-3 mb-4">
										<label for="config_cart_remove">Удалить из корзины</label>
										<input class="form-control" id="config_cart_remove" />
										<small>Html внутри кнопки удаления товара</small>
									</div>
									<div class="col-lg-3 mb-4">
										<label for="config_cart_plus">+1 товар</label>
										<input class="form-control" id="config_cart_plus" />
										<small>Html внутри кнопки увеличения количества товара</small>
									</div>
									<div class="col-lg-3 mb-4">
										<label for="config_cart_minus">-1 товар</label>
										<input class="form-control" id="config_cart_minus" />
										<small>Html внутри кнопки уменьшения количества товара</small>
									</div>
									<div class="col-lg-6 mb-4">
										<label for="config_count_caption">Всего товаров (mini)</label>
										<input class="form-control" id="config_count_caption" />
										<small>Html подпись количества товаров в мини корзине</small>
									</div>
									<div class="col-lg-6 mb-4">
										<label for="config_total_caption">Общая сумма (mini)</label>
										<input class="form-control" id="config_total_caption" />
										<small>Html подпись общей суммы в мини корзине</small>
									</div>
									<div class="col-lg-6 mb-4">
										<label for="config_cart_caption">Заголовок корзины</label>
										<input class="form-control" id="config_cart_caption" />
										<small>Html подпись к полноразмерной корзине</small>
									</div>
									<div class="col-lg-6 mb-4">
										<label for="config_order_caption">Оформление заказа</label>
										<input class="form-control" id="config_order_caption" />
										<small>Html заголовок оформления заказа</small>
									</div>
									<div class="col-lg-12 mb-4">
										<label for="config_empty_cart_caption">Корзина пуста</label>
										<textarea class="form-control" id="config_empty_cart_caption" rows="4"></textarea>
										<small>Html, выводимый, если корзина пуста</small>
									</div>
									
									<div class="col-lg-4 mb-4">
										<label for="configg_clear_cart_caption">Очистить корзину</label>
										<input class="form-control" id="config_clear_cart_caption" />
										<small>Html подпись в кнопке очистки корзины</small>
									</div>
									<div class="col-lg-4 mb-4">
										<label for="config_back_to_cart">Вернуться к корзине</label>
										<input class="form-control" id="config_back_to_cart" />
										<small>Html подпись в кнопке возврата к корзине из оформления заказа</small>
									</div>
									<div class="col-lg-4 mb-4">
										<label for="config_make_order">Оформить заказ</label>
										<input class="form-control" id="config_make_order" />
										<small>Html подпись в кнопке перехода к оформлению заказа</small>
									</div>
									<div class="col-lg-4 mb-4">
										<label for="config_send_order">Отправить заказ</label>
										<input class="form-control" id="config_send_order" />
										<small>Html подпись в кнопке отправки заказа</small>
									</div>
									<div class="col-lg-4 mb-4">
										<label for="config_full_total_caption">Общая стоимость</label>
										<input class="form-control" id="config_full_total_caption" />
										<small>Html подпись общей стоимости заказа в таблице</small>
									</div>
									<div class="col-lg-4 mb-4">
										<label for="config_price_currency">Валюта</label>
										<input class="form-control" id="config_price_currency" />
										<small>Html подпись к ценам в таблице корзины</small>
									</div>
									<div class="col-lg-6 mb-4">
										<label for="config_cart_success">Добавление в корзину</label>
										<textarea class="form-control" id="config_cart_success" rows="4" ></textarea>
										<small>Html подпись в блоке успешного добавления в корзину</small>
									</div>
									<div class="col-lg-6 mb-4">
										<label for="config_order_success">Отправка заказа</label>
										<textarea class="form-control" id="config_order_success" rows="4" ></textarea>
										<small>Html подпись в блоке успешной отправки заказа</small>
									</div>

									<div class="col-lg-12 mb-4">
										<label for="config_confidention">Политика конфиденциальности</label>
										<textarea class="form-control" id="config_confidention" rows="4" /></textarea>
										<small>Html подпись под формой отправки заказа</small>
									</div>

									<div class="col-lg-12 mb-4">
										 <div class="pretty p-svg p-curve">
											<input type="checkbox" id="config_usermail" />
											<div class="state p-success">
												<svg class="svg svg-icon" viewBox="0 0 20 20">
													<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
												</svg>
												<label for="config_usermail">Отправлять письмо с заказом клиенту</label>
											</div>
										</div>
									</div>
									
									<div class="col-lg-12 text-center mb-3">
										<button id="configSaveBtn" class="btn w-100 btn-lg btn-success"><i class="fa fa-save"></i> <span class="d-lg-inline d-sm-none d-md-inline ml-2">Сохранить</span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card mb-20">
							<div class="card-header">
							    <i class="fa mr-2 fa-user text-danger"></i> Настройки пользователя
							</div>
							<div class="card-body">

								<label for="config_login_input">Логин</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="config_login"><i class="fa fa-user text-danger"></i></span>
									</div>
									<input type="text" class="form-control" id="config_login_input" placeholder="Ваш логин" aria-describedby="config_login" value="<? echo $user['login'] ?>">
								</div>
								<small>Для входа в систему управления</small>
								<label class="mt-3 d-block" for="config_password_input">Пароль</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="config_password"><i class="fa fa-lock text-danger"></i></span>
									</div>
									<input type="password" class="form-control" id="config_password_input" placeholder="Ваш пароль" aria-describedby="config_password" value="<? echo $user['password'] ?>">
									<div class="input-group-append">
										<button class="btn btn-secodary show_password" type="button"><i class="fa fa-eye"></i></button>
									</div>
								</div>
								<small>Для входа в систему управления</small>
								<label class="mt-3 d-block" for="config_password_confirm_input">Повторите пароль</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="config_password_confirm"><i class="fa fa-lock text-danger"></i></span>
									</div>
									<input type="password" class="form-control" id="config_password_confirm_input" placeholder="Повторите пароль" aria-describedby="config_password_confirm" value="<? echo $user['password'] ?>">
									<div class="input-group-append">
										<button class="btn btn-secodary show_password" type="button"><i class="fa fa-eye"></i></button>
									</div>
								</div>
								<small>Чтобы не ошибиться</small>

								<label class="mt-3 d-block" for="config_email_input">Электронная почта</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="config_password_confirm"><i class="fa fa fa-envelope-open text-danger"></i></span>
									</div>
									<input type="email" class="form-control" id="config_email_input" placeholder="Электронная почта" aria-describedby="config_email" value="<? echo $user['email'] ?>" />
								</div>
								<small>На эту почту будут приходить заказы. Можно несколько через запятую</small>

								<button id="userSaveBtn" class="btn mt-3 d-block w-100 btn-success"><i class="fa fa-save"></i> <span class="d-lg-inline d-sm-none d-md-inline ml-2">Сохранить</span></button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>

		<div class="modal fade" tabindex="-1" id="error_dialog" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content text-center">
					<i class="fa fa-exclamation-triangle mt-3 text-danger" style="font-size:52px"></i>
					<div class="mb-3 p-2 text-center alert_content" style="font-size:18px">
					
					</div>
					<button class="btn  mt-2 btn-lg" onclick="$('#error_dialog').modal('hide');">OK</button>
				</div>
			</div>
		</div>

		<div class="modal fade" tabindex="-1" id="alert_dialog" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content text-center">
					<i class="fa fa-check mt-3 text-success" style="font-size:52px"></i>
					<div class="mb-3 p-2 text-center alert_content" style="font-size:18px">
					
					</div>
					<button class="btn  mt-2 btn-lg" onclick="$('#alert_dialog').modal('hide');">OK</button>
				</div>
			</div>
		</div>

		<div class="go_top" onclick="go_top();"><i class="fa fa-angle-up"></i></div>

			
		<script type="text/javascript">

			function go_top(){
				$('body,html').animate({scrollTop:0},'slow');
			}

			
			$(document).ready(function(){
				$('.show_password').click(function(){
					$(this).toggleClass('btn-secodary btn-danger');
					if($(this).parent().prev().attr('type') == 'text'){
						$(this).parent().prev().attr('type', 'password');
					}else{
						$(this).parent().prev().attr('type', 'text');
					}
				});


				var hash = new Date();

				config = $.ajax({
					url: 'config.json?hash='+hash,
					async:false,
					dataType: 'json'
				});
				for (let [key, value] of Object.entries(config.responseJSON)) {
					if(key=='usermail'){
						if(value){
							$('#config_'+key).attr('checked', true);
						}
					}else{
						$('#config_'+key).val(value);
					}
				}

				$('#userSaveBtn').click(function(){
					if($('#config_login_input').val() == ''){
						$('#error_dialog .modal-content .alert_content').html('Нужно указать логин');
						$('#error_dialog').modal('show');
						return false;
					}
					if($('#config_password_input').val() == ''){
						$('#error_dialog .modal-content .alert_content').html('Нужно указать пароль');
						$('#error_dialog').modal('show');
						return false;
					}
					if($('#config_password_input').val() != $('#config_password_confirm_input').val()){
						$('#error_dialog .modal-content .alert_content').html('Введенные пароли не совпадают');
						$('#error_dialog').modal('show');
						return false;
					}
					if($('#config_email_input').val() == ''){
						$('#error_dialog .modal-content .alert_content').html('Введите хотябы один email');
						$('#error_dialog').modal('show');
						return false;
					}

					save = $.ajax({
						url: 'settings.php',
						async:false,
						type: 'post',
						data: {
							login: $('#config_login_input').val(),
							password: $('#config_password_input').val(),
							email: $('#config_email_input').val(),
							mode: 'user',
							save: true
						},
						dataType: 'json'
					});

					$('#alert_dialog .modal-content .alert_content').html(save.responseJSON.answer);
					$('#alert_dialog').modal('show');

				});

				$('#configSaveBtn').click(function(){
					var result = {};
					$('#cart_settings input, #cart_settings textarea, #cart_settings select').each(function(){
						if($(this).attr('type')!='checkbox'){
							result[$(this).attr('id').replace('config_', '')] = $(this).val();
						}else{
							result[$(this).attr('id').replace('config_', '')] = $(this).is(':checked');
						}
						
					});

					save = $.ajax({
						url: 'settings.php',
						async:false,
						type: 'post',
						data: {
							save: true,
							config: JSON.stringify(result),
							mode: 'cart'
						},
						dataType: 'json'
					});

					$('#alert_dialog .modal-content .alert_content').html(save.responseJSON.answer);
					$('#alert_dialog').modal('show');

				});

				$('#cssgen').click(function(){
					mini = $('[name="minitype"]').val();
					if($('[name="minitype"]').next('.hidden_sub_select').is(':visible')){
						mini = mini+'|'+$('[name="minitype"]').next('.hidden_sub_select').find('select').val();
					}
					mini = mini+'|'+$('[name="minicolor"]').val();

					full = $('[name="fulltype"]').val();
					if($('[name="fulltype"]').next('.hidden_sub_select').is(':visible')){
						full = full+'|'+$('[name="fulltype"]').next('.hidden_sub_select').find('select').val();
					}
					full = full+'|'+$('[name="fullcolor"]').val();
					location.href = 'cssgen.php?mini='+mini+'&full='+full;

				});

				$('[name="minitype"], [name="fulltype"]').change(function(){
					showif = $(this).next('.hidden_sub_select').attr('showif');

					if(showif.indexOf($(this).val()) > -1){
						$(this).next('.hidden_sub_select').show();
					}else{
						$(this).next('.hidden_sub_select').hide();
					}
				});

				$('.mini_selctors select').change(function(){
					mini = $('[name="minitype"]').val();
					if($('[name="minitype"]').next('.hidden_sub_select').is(':visible')){
						mini = mini+'_'+$('[name="minitype"]').next('.hidden_sub_select').find('select').val();
					}
					mini = mini+'_'+$('[name="minicolor"]').val()+'.jpg';

					$('#mini-css-image').attr('src', 'assets/images/css/mini/'+mini);
					$('#mini-css-image').parent('a').attr('href', 'assets/images/css/mini/'+mini);
				});

				$('.full_selctors select').change(function(){
					full = $('[name="fulltype"]').val();
					if($('[name="fulltype"]').next('.hidden_sub_select').is(':visible')){
						full = full+'_'+$('[name="fulltype"]').next('.hidden_sub_select').find('select').val();
					}
					full = full+'_'+$('[name="fullcolor"]').val()+'.jpg';

					$('#full-css-image').attr('src', 'assets/images/css/full/'+full);
					$('#full-css-image').parent('a').attr('href', 'assets/images/css/full/'+full);
				});
			});
		</script>
	</body>
</html>