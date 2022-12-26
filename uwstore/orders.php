<?php
	session_start();
	if(!$_SESSION['uw_store_logged_in']){
		unset($_SESSION['uw_store_logged_in']);
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['delete'])){
		$del = json_decode($_POST['delete'], true);
		foreach($del as $order){
			unlink(dirname(__FILE__).'/orders/'.$order.'.json');
		}
	}

	if(isset($_GET['order'])){
		if(file_exists(dirname(__FILE__).'/orders/'.$_GET['order'].'.json')){
			$order = json_decode(file_get_contents(dirname(__FILE__).'/orders/'.$_GET['order'].'.json'), true);
			echo '<div class="white-popup"><h1 class="mb-20"><b>Заказ №'.$_GET['order'].'</b></h1>';
			echo '<div class="row">';
			echo '<div class="col-lg-4 mb-30 col-md-5 col-12"><h4 class="mb-20"><b>Даные клиента</b></h4>';
			echo '<p class="font-16">Имя: <b>'.$order['order_person'].'</b></p>';
			echo '<p class="font-16">Номер телефона: <b>'.$order['order_phone'].'</b></p>';
			echo '<p class="font-16">E-mail: <b>'.$order['order_mail'].'</b></p>';
			echo '<p class="font-16">Комменатрий к заказу:</p><p><b>'.nl2br($order['order_comment']).'</b></p>';
			echo '</div><div class="col-lg-8 mb-20 col-md-7 col-12"><h4 class="mb-20"><b>Состав заказа</b></h4>';
			echo '<table class="table">';
			echo $order['order_list'];
			echo '<tr><td colspan="4" align="right"><h4> Итого: <b>'.$order['order_total'].'</b></h4></td></tr>';
			echo '</table></div><div class="col">Дата заказа: <b>'.$order['order_date'].'</b></div><div class="col-auto">Отправлен со страницы: <a class="font-bold" href="'.$order['order_url'].'">'.$order['order_url'].'</a></div></div></div>';
		}
		exit;
	}

	$orders = [];
	if ($handle = opendir(dirname(__FILE__).'/orders')) {

	    /* Именно такой способ чтения элементов каталога является правильным. */
	    while (false !== ($entry = readdir($handle))) {
	        if($entry!='.'&&$entry!='..'&&$entry!='.htaccess'){
	        	$orders[str_replace('.json', '', $entry)] = json_decode(file_get_contents(dirname(__FILE__).'/orders/'.$entry), true);
	        }
	    }
	    krsort($orders);

	    closedir($handle);
	}

	//var_dump($orders);
	
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
		<link href="assets/w2ui/w2ui.css" rel="stylesheet" />


		<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700,700italic,400italic&subset=latin,cyrillic" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="assets/js/magnific.js"></script>

 		<title>Управление JS магазином | UWSTORE</title>

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
								<a class="dropdown-item text-light bg-danger active" href="orders.php">Заказы</a>
								<a class="dropdown-item text-danger" href="settings.php">Настройки</a>
								<a class="dropdown-item text-danger" href="cssgen.php">Внешний вид</a>
								<a class="dropdown-item text-danger" href="help.php">Помощь</a>
							</div>
						</div>
						<ul class="main-menu d-none d-lg-inline-block">
							<li><a href="store.php"><i class="fa fa-table d-block d-lg-none"></i> <span class="d-none d-lg-inline">Каталог</span></a></li>
							<li class="active"><a href="orders.php"><i class="fa fa-table d-block d-lg-none"></i> <span class="d-none d-lg-inline">Заказы</span></a></li>
							<li><a href="settings.php"><i class="fa fa-cog d-block d-lg-none"></i> <span class="d-none d-lg-inline">Настройки</span></a></li>
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
					<div class="col-12">
						<div class="card">
							<div class="card-header">
							    <i class="fa mr-2 fa-shopping-cart text-danger"></i> Заказы
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col"></div>
									<div class="col-auto">
										<button class="btn btn-danger" disabled id="order_del_btn"><i class="fa fa-trash"></i> Удалить</button>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-hover table-striped" style="min-width:600px;" width="100%">
										<thead>
											<tr>
												<th width="10">
													<input type="checkbox" name="order_select_all" />
												</th>
												<th>
													Номер
												</th>
												<th>
													Дата
												</th>
												<th>
													Клиент
												</th>
												<th>
													Телефон
												</th>
												<th>
													Сумма
												</th>
											</tr>
										</thead>
										
										<?php foreach($orders as $order){?>
											<tr ordernum="<?php echo $order['order_num'];?>">
												<td width="10">
													<input type="checkbox" value="<?php echo $order['order_num'];?>" name="order_select" />
												</td>
												<td>
													<a href="orders.php?order=<?php echo $order['order_num'];?>" class="ajax-link text-danger"><?php echo $order['order_num'];?></a>
												</td>
												<td>
													<?php echo $order['order_date'];?>
												</td>
												<td>
													<?php echo $order['order_person'];?>
												</td>
												<td>
													<?php echo $order['order_phone'];?>
												</td>
												<td>
													<b><?php echo $order['order_total'];?></b>
												</td>
											</tr>
										<?php }?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="modal fade" tabindex="-1" id="confirm_dialog" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content text-center">
					<div class="p-2">
						<i class="fa fa-exclamation-triangle mt-3 text-danger" style="font-size:52px"></i>
						<div class="mb-1 p-2 text-center alert_content" style="font-size:18px">
							<p><b>Вы уверены, что хотите удалить записи? Удаление безвозратно.</b></p>
						</div>
						<div class="row">
							<div class="col-6">
								<button class="btn btn-danger w-100 mt-2 btn-lg" onclick="orders_checked_delete();">Удалить</button>
							</div>
							<div class="col-6">
								<button class="btn w-100  mt-2 btn-lg" onclick="$('#confirm_dialog').modal('hide');">Отмена</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="go_top" onclick="go_top();"><i class="fa fa-angle-up"></i></div>

			
		<script type="text/javascript">

			function go_top(){
				$('body,html').animate({scrollTop:0},'slow');
			}

			function orders_checked_delete(){
				deleteble = [];
				$('#confirm_dialog').modal('hide');
				$('[name="order_select"]:checked').each(function(){
					deleteble.push($(this).parent().parent().attr('ordernum'));
					$(this).parent().parent().remove();
				});
				$('[name="order_select_all"]').prop('checked', false);

				$.ajax({
					type:'post',
					data:{
						delete: JSON.stringify(deleteble)
					},
					url: 'orders.php'
				});
			}

			$(document).ready(function(){
				$('.ajax-link').magnificPopup({
					type:'ajax'
				});

				$('[name="order_select_all"]').click(function(){
					if($(this).is(':checked')){
						$('[name="order_select"]').prop('checked', true);
						$('#order_del_btn').prop('disabled',false);
					}else{
						$('[name="order_select"]').prop('checked', false);
						$('#order_del_btn').prop('disabled',true);
					}
				});
				$('[name="order_select"]').click(function(){
					if($('[name="order_select"]:not(:checked)').length>0){
						$('[name="order_select_all"]').prop('checked', false);
					}else{
						$('[name="order_select_all"]').prop('checked', true);
					}
					if($('[name="order_select"]:checked').length>0){
						$('#order_del_btn').prop('disabled',false);
					}else{
						$('#order_del_btn').prop('disabled',true);
					}
				});

				$('#order_del_btn').click(function(){
					if(!$(this).prop('disabled')){
						$('#confirm_dialog').modal('show');
					}
				});
			});

		</script>
	</body>
</html>