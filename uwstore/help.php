<?php
	session_start();
	if(!$_SESSION['uw_store_logged_in']){
		unset($_SESSION['uw_store_logged_in']);
		header('Location: index.php');
		exit();
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
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="assets/js/magnific.js"></script>

 		<title>Документация JS магазина | UWSTORE</title>

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
								<a class="dropdown-item text-danger" href="settings.php">Настройки</a>
								<a class="dropdown-item text-danger" href="cssgen.php">Внешний вид</a>
								<a class="dropdown-item text-light bg-danger active" href="help.php">Помощь</a>
							</div>
						</div>
						<ul class="main-menu d-none d-lg-inline-block">
							<li><a href="store.php"><i class="fa fa-table d-block d-lg-none"></i> <span class="d-none d-lg-inline">Каталог</span></a></li>
							<li><a href="orders.php"><i class="fa fa-table d-block d-lg-none"></i> <span class="d-none d-lg-inline">Заказы</span></a></li>
							<li><a href="settings.php"><i class="fa fa-cog d-block d-lg-none"></i> <span class="d-none d-lg-inline">Настройки</span></a></li>
							<li><a href="cssgen.php"><i class="fa fa-life-ring d-block d-lg-none"></i> <span class="d-none d-lg-inline">Внешний вид</span></a></li>
							<li class="active"><a href="help.php"><i class="fa fa-life-ring d-block d-lg-none"></i> <span class="d-none d-lg-inline">Помощь</span></a></li>
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
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
							    <i class="fa mr-2  fa-life-ring text-danger"></i> Документация
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-3">
										<div class="row mb-10">
											<div class="col">
												<h4>Содержание</h4>
											</div>
											<div class="col-auto d-block d-lg-none">
												<button class="btn" onclick="$('.help_content').toggle();"><i class="fa fa-bars"></i></button>
											</div>
										</div>
										<ul class="help_content">
											<li class="active" tab="#tab_default">Общее описание</a></li>
											<li tab="#tab_integration">Интеграция</li>
											<li tab="#tab_store">Управление каталогом</li>
											<li tab="#tab_settings">Настройки</li>
											<li tab="#tab_view">Внешний вид</li>
											<li tab="#tab_templates">Шаблоны писем</li>
										</ul>
									</div>
									<div class="col-sm-9 pt-30" id="help_tabs">
										<div class="help_tab active" id="tab_default">
											<h2>Общее описание</h2>
											<p>Перед вами система внешнего управления интернтет-магазином работающая на JS и PHP.  Система состоит из двух модулей: JS корзины и системы управления ценами. Для корректной работы на сайте должна быть подключена библиотека jQuery версии 2+, на сервере потребуется PHP версии не ниже 5.6. Система не требует базы данных.</p><p><b>Основное предназначение системы</b> — интеграция на HTML сайты, работающие без CMS, либо с ограниченными ресурсами CMS.</p>

											<h3><i>Управление ценами</i></h3>

											<div class="row align-items-center">
												<div class="col-lg-8">
													<figure>
														<a class="image_popup" href="assets/images/help/dafault_demo.jpg"><img src="assets/images/help/dafault_demo.jpg" class="w-100" style="max-width:900px;" /></a>
													</figure>
												</div>
												<div class="col-lg-3">
													<p class="font-16">После интеграции системы на ваш сайт, <b>цены товаров будут автоматически подгружаться из системы</b>, вам не придется менять цену товара каждый раз на каждой странице, где он находится.</p>
												</div>
											</div>
											<div class="alert alert-warning text-center">
												<p class="font-18"><i><b>Обратите внимание</b>, что цены на сайте меняются при помощи JS уже после загрузки страницы. Эти цены могут не индексироваться поисковыми системами</i></p>
											</div>

											<h3><i>Корзина</i></h3>

											<p><b>Корзина на сайте</b> содержит все стандартные модули управления. Пользователь может:</p>
											<div class="row align-items-center">
												<div class="col-lg-7">
													<figure>
														<a class="image_popup" href="assets/images/help/cart.jpg"><img src="assets/images/help/cart.jpg" class="w-100" style="max-width:900px;" /></a>
													</figure>
												</div>
												<div class="col-lg-5">
													<ul class="list-unstyled">
														<li class="p-1"><i class="fa text-danger fa-check mr-2"></i> Добавлять товары в корзину</li>
														<li class="p-1"><i class="fa text-danger fa-check mr-2"></i> Удалять товары из корзины</li>
														<li class="p-1"><i class="fa text-danger fa-check mr-2"></i> Менять количество товара в корзине</li>
														<li class="p-1"><i class="fa text-danger fa-check mr-2"></i> Просматривать содержимое корзины</li>
														<li class="p-1"><i class="fa text-danger fa-check mr-2"></i> Очищать корзину</li>
														<li class="p-1"><i class="fa text-danger fa-check mr-2"></i> Формировать и отправлять заказ</li>
													</ul>
												</div>
											</div>

											<div class="alert alert-success text-center">
												<p class="font-18 m-0"><i>Корзина работает в двух режимах: она может открываться во всплывающем окне или располагаться на отдельной странице</i></p>
											</div>

											<h3><i>Заказы</i></h3>

											<p>Заказы, оформленные на сайте, отправляются на почту, указанную в панели управления. Копия заказа уходит покупателю, если он указал электронную почту при оформлении.</p>

											<div class="row align-items-center">
												<div class="col-lg-7">
													<figure>
														<a class="image_popup" href="assets/images/help/order.jpg"><img src="assets/images/help/order.jpg" class="w-100" style="max-width:600px;" /></a>
													</figure>
												</div>
												<div class="col-lg-4">
													<figure>
														<img src="assets/images/help/code.jpg" class="w-100" style="max-width:600px;" />
													</figure>
													<p class="font-18"><i><b>Вы можете менять шаблоны писем</b>, для этого предусмотрена система шаблонизации, при минимальном знании HTML вы сможете создать уникальное письмо, которое увидит ваш покупатель при отправке заказа</i></p>
												</div>
											</div>
											<div class="row align-items-center mt-20">
												<div class="col-6 text-left">
													
												</div>
												<div class="col-6 text-right">
													<button class="btn" onclick="getTab('#tab_integration');">Интеграция <i class="fa fa-angle-right ml-2"></i></button>
												</div>
											</div>
										</div>
										<div class="help_tab" id="tab_integration">
											<h2>Интеграция</h2>
											<p>Каталог <span class="font-14 badge badge-secondary">uwstore/</span> должен находиться в корневом каталоге сайта и быть доступен по адресу <span class="font-14 badge badge-secondary">https://your-site.ru/uwstore/</span>, это важно так как все внутренние ссылки построены исходя из этого.</p>
											<p>Файлы JS и CSS, относящиеся к системе находятся в каталоге <span class="font-14 badge badge-secondary">uwstore/app/</span>, но это не принципиально, при необходимости их можно переносить.</p>
											<h3><i>Интеграция файлов</i></h3>
											<p>Для того, чтобы запустить систему на странице сайта, необходмо для начала включить JS файл в код вашего сайта:</p>
											<div class="alert alert-info">
												<p class="m-0">&lt;script type="text/javascript" src="/uwstore/app/uwcart.js" defer&gt;&lt;/script&gt;</p>
											</div>
											<p>Если вы используете один из предустановленных стилей корзины, нужно добавить один из файлов CSS, если вы оформляете корзину самостоятельно — пропустите этот шаг</p>
											<div class="alert alert-info">
												<p class="m-0">&lt;link href="/uwstore/app/uwcart.css" rel="stylesheet" /&gt;</p>
											</div>
											<h3><i>Установка аттрибутов на страницах</i></h3>
											<div class="alert alert-warning text-center">
												<p class="font-18 m-0"><i>Для удобства отладки, рекомендуется сначала заполнить каталог, чтобы знать все идентификаторы товаров.</i></p>
											</div>
											<p>В системе предусмотрен набор аттрибутов и классов HTML, предназначенных для определения элементов страницы, отвечающих за те или иные функции. Так как система не генерирует товары на страницах, вам придется расставить эти аттрибуты самостоятельно.</p>
											<p class="font-24"><b>Аттрибуты товара</b></p>
											<p>У товара два ключевых элемента: цена и кнопка добавления в корзину.</p>
											<div class="row mb-20 align-items-center">
												<div class="col-lg-5">
													<figure>
														<a class="image_popup" href="assets/images/help/elements.jpg"><img src="assets/images/help/elements.jpg" class="w-100" style="max-width:3880px;" /></a>
													</figure>
												</div>
												<div class="col-lg-7">
													<h4><b>Элемент цены</b></h4>
													<p>Для того, чтобы цена могла меняться при загрузке скрипта, нужно добавить к элементу цены два аттрибута: <span class="font-14 badge badge-secondary">data-uw-store-id</span> и <span class="font-14 badge badge-secondary">data-uw-store-field</span>. Первый указывает ID товара, который вы можете узнать в таблице управления товарами, второй — тип выводимого поля. Чтобы получить значение цены в элементе нужно задать:</p>
													<div class="alert alert-info">
														<p class="m-0">&lt;span data-uw-store-id="1" data-uw-store-field="price"&gt;&lt;/span&gt; Руб.</p>
													</div>
													<p>Этот код сообщит скрипту, что в <span class="font-14 badge badge-secondary">&lt;span&gt;</span> нужно поместить занчение поля ЦЕНА (<span class="font-14 badge badge-secondary">price</span>) для товара с ID = 1. Вместо span может быть любой элемент, скорее всего на вашем сайте уже есть элемент, куда помещается цена.</p>
													<div class="alert alert-warning text-center">
														<p class="m-0"><i><b>Обратите внимание</b>, что в элемент будет помещена только цифра без занка валюты или любой другой подписи. Поэтому в примере выше «Руб.» находится за элементом</i></p>
													</div>
												</div>
											</div>
											<div class="row mb-20 align-items-center">
												<div class="col-lg-7">
													<h4><b>Элемент добавления</b></h4>
													<p>Для того, чтобы при нажатии на элемент товар добавился в корзину нужно добавить к элементу добавления несколько аттрибутов: <span class="font-14 badge badge-secondary">data-uw-store-addtocart</span>, <span class="font-14 badge badge-secondary">data-uw-store-id</span> и <span class="font-14 badge badge-secondary">data-uw-store-image</span>. Первый указывает, что при клике на элемент товар будет добавлен в корзину, второй указывает ID товара, который вы можете узнать в таблице управления товарами, третий — прикладывает картинку к товару в корзине. Элемент должен выглядть так:</p>
													<div class="alert alert-info">
														<p class="m-0">&lt;button data-uw-store-addtocart  data-uw-store-id="1" data-uw-store-image="https://fullurl/to/image.jpg" &gt;&lt;/button&gt;</p>
													</div>
													<p>Этот код сообщит скрипту, что при нажатии на кнопку нужно положить в корзину товар с ID=1 и прикрепить к товару картинку с адресом «https://fullurl/to/image.jpg». Можно не добавлять аттрибут <span class="font-14 badge badge-secondary">data-uw-store-image</span>, тогда картинка отображаться не будет</p>
													<div class="alert alert-warning text-center">
														<p class="m-0"><i><b>Обратите внимание</b>, картинку лучше добавлять с абсолютным адресом, начинающимся с полного адреса сайта, тогда картинки будут приходить на почту, в противном случае, картинки на почту не придут.</i></p>
													</div>

												</div>
												<div class="col-lg-5">
													<figure>
														<a class="image_popup" href="assets/images/help/elements_2.jpg"><img src="assets/images/help/elements_2.jpg" class="w-100" style="max-width:380px;" /></a>
													</figure>
												</div>
											</div>

											<p class="font-24"><b>Аттрибуты корзины</b></p>

											<div class="alert alert-warning text-center">
												<p class="font-18"><i><b>Обратите внимание</b>, этот блок информации нужен вам только если на вашем сайте уже есть корзина. Если ее нет — пропустите его, он вам не понадобится.</i></p>
											</div>

											<p>У корзины есть два типа вывода: мини-корзина и полноценная. <b>Мини-корзина</b> содержит только два параметра: общее количество товаров в корзине и общая сумма заказа. <b>Полноценная корзина</b> содержит список всех товаров и позволяет управлять ими.</p>
											<p>Аттрибуты корзины понадобятся вам только если у вас на сайте уже есть сверстанная корзина. Тогда вы можете интегрировать активные элементы в имеющуюся верстку</p>

											<div class="row align-items-center">
												<div class="col-lg-7">
													<figure>
														<a class="image_popup" href="assets/images/help/cart_example.jpg"><img src="assets/images/help/cart_example.jpg" class="w-100" style="max-width:700px;" /></a>
													</figure>
												</div>
												<div class="col-lg-5">
													<h4><b>Активация корзины</b></h4>
													<p>Для того, чтобы ваша корзина была активной, нужно добвить к ее элементам несколько аттрибутов и кассов.</p><p>Класс <span class="badge badge-primary font-14">uw_store_cart_mini</span> нужно добавить элементу, при клике на который нужно будет перейти к полноценной корзине.</p><p>Аттрибут <span class="font-14 badge badge-secondary">uw-store-cart-count</span> нужно добавить элементу, в который нужно выводить общее количество товаров.</p><p>Аттрибут <span class="font-14 badge badge-secondary">uw-store-cart-total</span> нужно добавить элементу, в который нужно выводить общую стоимость.</p>
												</div>
											</div>
											<p>Таким образом, общий вид элемента корзины будет выглядть так:</p>
											<div class="alert alert-info">
<pre>&lt;div class="uw_store_cart_mini"&gt;
	&lt;div&gt;
		Количество товаров: &lt;span uw-store-cart-count&gt;0&lt;span&gt;
	&lt;/div&gt;
	&lt;div&gt;
		Общая стоимость: &lt;span uw-store-cart-total&gt;0&lt;span&gt;
	&lt;/div&gt;
&lt;/div&gt;</pre></div>

											<h3><i>Запуск системы</i></h3>
											<p>Для запуска системы нужно запустить стартовую функцию. Добавив следующий код в конец страницы или после запуска jQuery и uwcart.js</p>
											<div class="alert alert-info">
<pre>&lt;script type="text/javascript"&gt;
	$(document).ready(function(){
		uw_store.cart.start();
	});	
&lt;/script&gt;</pre>
												
											</div>
											<p>Она считает данные из каталога и расставит цены по местам, а так же заполнит корзину, если вы интегрировали ее вручную при помощи аттрибутов.</p>

											<h3><i>Генерация корзины</i></h3>

											<h4><b>Мини-корзина</b></h4>

											<p>Вы можете сгенерировать корзину средствами системы, если она не предусмотренна в шаблоне вашего сайта. Чтобы сгенерировать мини-корзину воспользуйтесь функцией <span class="font-14 badge badge-secondary">uw_store.cart.render.mini(target, config)</span>. Функция принимает 2 параметра: <span class="font-14 badge badge-secondary">taget</span> и <span class="font-14 badge badge-secondary">config</span></p>
											<p>Парметр <span class="font-14 badge badge-secondary">taget</span> указывает на элемент в который следует поместить корзину. Например, если указать <span class="font-14 badge badge-secondary">uw_store.cart.render.mini('#minicart');</span>, то корзина будет помещена в элемент с id="minicart". Если оставить target пустым, то корзина будет сгенерирована в &lt;body&gt;</p>

											<div class="alert alert-info">
<pre>&lt;script type="text/javascript"&gt;
	$(document).ready(function(){
		uw_store.cart.render.mini('#minicart');
	});
&lt;/script&gt;</pre>
											</div>
											<p>В парметр <span class="font-14 badge badge-secondary">config</span> можно поместить специальные настройки корзины для данной страницы. Подробнее о настройках вы можете узнать в разделе «<a class="text-danger" href="#" onclick="getTab('#tab_settings');return false;">Настройки</a>»</p>
											<div class="alert alert-info">
<pre>&lt;script type="text/javascript"&gt;
	$(document).ready(function(){
		uw_store.cart.render.mini('#minicart', {type:'page'});
	});
&lt;/script&gt;</pre>
												
											</div>
											<p>В данном случае в элемент #minicart будет добавлена мини-корзина, а параметр {type:'page'} скажет скрипту, что полноразмерную корзину нужно открывать не во всплывающем окне, а на отдельной странице.</p>

											<p><i><b>Пример</b></i>. Вы хотите запустить замену цен на странице и сгенерировать мини-корзину на вашей странице в элемент id="minicart":</p>
											<div class="alert alert-info">
<pre>&lt;script type="text/javascript"&gt;
	$(document).ready(function(){
		uw_store.cart.start();	
		uw_store.cart.render.mini('#minicart');	
	});
&lt;/script&gt;</pre>
												
											</div>

											<h4><b>Полноразмерная корзина</b></h4>

											<p>Полноразмерная корзина генерируется функцией <span class="font-14 badge badge-secondary">uw_store.cart.render.full(target, config)</span>. Функция аналогична <span class="font-14 badge badge-secondary">uw_store.cart.render.mini()</span> и принимает те же параметры: <span class="font-14 badge badge-secondary">taget</span> и <span class="font-14 badge badge-secondary">config</span></p>

											<div class="alert alert-info">
<pre>&lt;script type="text/javascript"&gt;
	$(document).ready(function(){
		uw_store.cart.render.full('#fullcart');
	});
&lt;/script&gt;</pre>
												
											</div>

											<p>Этот скрипт сгенерирует полноразмерную корзину в элемент с id="fullcart"</p>

											<p>Вы можете сгенерировать полноразмерную корзину на любой странице в любой элемент. Это понадрбится вам в двух случаях: если в вашей верстке уже предусмотренно место под полноразмерную корзину или если вы планируете делать отдельную страницу корзины. В этом случае вам нужно будет передать в config два параметра: {type:'page', page_link:'https://your-site.ru/cart/'}. Где параметр type говорит о том, что корзина будет запущенна на отдельной старнице, а page_link сообщит адрес этой страницы.</p>

											<p><i><b>Пример</b></i>. Вы хотите запустить замену цен на странице, сгенерировать мини-корзину на вашей странице в элемент id="minicart", а так же поместить полноразмерную корзину в элемент id="fullcart":</p>

											<div class="alert alert-info">
<pre>&lt;script type="text/javascript"&gt;
	$(document).ready(function(){
		uw_store.cart.start();
		uw_store.cart.render.mini('#minicart');
		uw_store.cart.render.mini('#fullcart');
	});
&lt;/script&gt;</pre>
											</div>

											<div class="row align-items-center mt-20">
												<div class="col-6 text-left">
													<button class="btn" onclick="getTab('#tab_default');"> <i class="fa fa-angle-left mr-2"></i> Общее описание</button>
												</div>
												<div class="col-6 text-right">
													<button class="btn" onclick="getTab('#tab_store');">Управление каталогом <i class="fa fa-angle-right ml-2"></i></button>
												</div>
											</div>

										</div>
										<div class="help_tab" id="tab_store">
											<h2>Управление каталогом</h2>

											<figure>
												<a class="image_popup" href="assets/images/help/catalog.png"><img src="assets/images/help/catalog.png" class="w-100" style="max-width:700px;" /></a>
											</figure>

											<p>Управление каталогом осуществляется при помощи интерактивной таблицы. Таблица содержит 3 пункта:</p>

											<table class="table">
												<tr>
													<td class="align-middle"><b>ID</b></td>
													<td class="align-middle">Это идентификатор товара, который будет использоваться на страницах для изменения его цены и добавления в корзину. Он добавляется в аттрибут <span class="font-14 badge badge-secondary">data-uw-store-id</span> элемента цены товара и элемента добавления. Может принимать любые значения, в том числе текстовые, по умолчанию — порядковое число (1,2,3,4,5 и т.д.)</td>
												</tr>
												<tr>
													<td class="align-middle"><b>Наименование</b></td>
													<td class="align-middle">Это название товара. Оно не используется на страницах сайта, но именно оно будет выводиться в корзине и будет в списке товаров при отправке заказа.</td>
												</tr>
												<tr>
													<td class="align-middle"><b>Цена</b></td>
													<td class="align-middle">Это стоимость товара. <b>Обратите внимание</b>, десятичные отделяются при помощи симола точки, а не запятой. то есть цена должна быть <span class=" font-16 badge badge-success">13 265.26</span> а не <span class=" font-16 badge badge-danger">13 265,26</span></td>
												</tr>
											</table>

											<h3><i>Элементы управления</i></h3>

											<figure>
												<a class="image_popup" href="assets/images/help/toolbar.jpg"><img src="assets/images/help/toolbar.jpg" class="w-100" style="max-width:630px;" /></a>
											</figure>

											<table class="table">
												<tr scope="row">
													<td class="align-middle">
														<img src="assets/images/help/reload.jpg">
													</td>
													<td class="align-middle"><b>Обновить данные</b></td>
													<td class="align-middle">
														Перезагрузит сохраненные данные и обновит таблицу. При этом все несохраненные данные пропадут.
													</td>
												</tr>
												<tr scope="row">
													<td class="align-middle">
														<img src="assets/images/help/cols.jpg">
													</td>
													<td class="align-middle"><b>Управление столбцами</b></td>
													<td class="align-middle">Позволяет прятать или показывать столбцы таблицы.</td>
												</tr>
												<tr scope="row">
													<td class="align-middle">
														<img src="assets/images/help/add.jpg">
													</td>
													<td class="align-middle"><b>Новая запись</b></td>
													<td class="align-middle">Добавляет новую запись в конец таблицы. ID заполняется порядковым номером.</td>
												</tr>
												<tr scope="row">
													<td class="align-middle">
														<img src="assets/images/help/del.jpg">
													</td>
													<td class="align-middle"><b>Удалить</b></td>
													<td class="align-middle">Удаляет выбранные записи. <b>Обратите внимание</b> при удалении данных происодит сохранение внесенных изменений.</td>
												</tr>
												<tr scope="row">
													<td class="align-middle">
														<img src="assets/images/help/save.jpg">
													</td>
													<td class="align-middle"><b>Сохранить</b></td>
													<td class="align-middle">Сохраняет внесенные изменения. <b>Сделите внимательно</b>, без нажатия этой кнопки внесенные изменения не сохранятся.</td>
												</tr>
												<tr scope="row">
													<td class="align-middle">
														<img src="assets/images/help/import.jpg">
													</td>
													<td class="align-middle"><b>Импорт</b></td>
													<td class="align-middle">Позволяет загрузить данные из файла <span class="font-14 badge badge-secondary">.csv</span>. Рекомендуем сначала воспользоваться экспортом, чтобы не ошибиться в формате файла.</td>
												</tr>
												<tr scope="row">
													<td class="align-middle">
														<img src="assets/images/help/export.jpg">
													</td>
													<td class="align-middle"><b>Экспорт</b></td>
													<td class="align-middle">Выгружает данные в файл формата <span class="font-14 badge badge-secondary">.csv</span></td>
												</tr>
											</table>

											<h3><i>Управление записями</i></h3>

											<figure>
												<a class="image_popup" href="assets/images/help/table.jpg"><img src="assets/images/help/table.jpg" class="w-100" style="max-width:900px;" /></a>
											</figure>

											<h4><b>Редактирование</b></h4>

											<p>Двойной клик по любой ячейке переводит ее в режим редактирования. После того, как ячейика заполнена, можно либо кликнуть в любое место за пределами ячейки, либо нажать <span class="font-14 badge badge-secondary">Enter</span></p>

											<p>После того, как вы измените значение той или иной ячейки, она будет помеченна, как отредактированная, но не сохраненная красным уголком в право верхнем углу:</p> 

											<figure>
												<a class="image_popup" href="assets/images/help/marked.jpg"><img src="assets/images/help/marked.jpg" class="w-100" style="max-width:1100px;" /></a>
											</figure>

											<p>Чтобы применить именения, нажмите на кнопку <span class="font-14 badge badge-secondary">Сохранить</span> на панели управления таблицы.</p> 

											<h4><b>Удаление</b></h4>

											<p>Вы можете выбрать одну или несколько строк в таблице для этого следует кликнуть либо по самой строке, либо по чекбоксу слева от записи. Для удаления выбранных записей из таблицы, воспользуйтесь кнокой <span class="font-14 badge badge-secondary">Удалить</span> на панели управления таблицы.</p>

											<div class="alert alert-warning text-center">
												<p class="font-18"><i><b>Обратите внимание</b>, что при удалении записей происходит автоматическое сохранение изменений. То есть, если вы внесли никие изменения в таблицу, но не сохранили их, при этом запустили процедуру удаления, то все внесенные изменения автоматически сохранятся.</i></p>
											</div>

											<figure>
												<a class="image_popup" href="assets/images/help/delete.jpg"><img src="assets/images/help/delete.jpg" class="w-100" style="max-width:1100px;" /></a>
											</figure>

											<h4><b>Импорт/экспорт</b></h4>

											<p>Система экспорта данных предназначенна в первую очередь для удобства внесения изменений в таблицу. В том смысле, что сначала вы выгружаете файл, вносите нужные изменения и загружаете обратно. Однако, выгрузив данные, вы поучите полноценный файл формата <span class="font-14 badge badge-secondary">.csv</span>, содержащий данные о товарах магазина.</p>

											<p>Импорт позволяет загрузить данные из файла <span class="font-14 badge badge-secondary">.csv</span> в таблицу. формат файла должен соответствовать ячейкам таблицы и содержать 3 столбца: ID;Наименование;Цена. Разделителем выступает точка с запятой (<span class="font-14 badge badge-secondary">;</span>)</p>

											<p>Импорт рассчитан на то, что вы работаете с Excell, поэтому при загрузке кновертирует кодировку из Windows-1251 в UTF8, при экспорте происходит обратное кодирование. Если вы пользуетесь другим редактором, то имейте это в виду.</p>

											<div class="alert alert-warning text-center">
												<p class="font-18"><i><b>Обратите внимание</b>, что система рассчитана и тестировалась в режиме<br><span class="badge badge-danger">Экспорт</span> <span class="fa fa-long-arrow-right"></span> <span class="badge badge-danger">Внесение изменений</span> <span class="fa fa-long-arrow-right"></span> <span class=" badge badge-danger">Импорт</span> </i></p>
												<p><i>При использовании этого подхода, вы не ошибетесь в формате и скорее всего не нарушите работу системы.</i></p>
											</div>

											<div class="row align-items-center mt-20">
												<div class="col-6 text-left">
													<button class="btn" onclick="getTab('#tab_integration');"> <i class="fa fa-angle-left mr-2"></i> Интеграция</button>
												</div>
												<div class="col-6 text-right">
													<button class="btn" onclick="getTab('#tab_settings');">Настройки <i class="fa fa-angle-right ml-2"></i></button>
												</div>
											</div>
										</div>
										<div class="help_tab" id="tab_settings">
											<h2>Настройки</h2>

											<p>В системе предусмотренно три блока настроек: Настройки пользователя, настройки системы и настройки внешнего вида.</p>

											<h3><i>Настройки пользователя</i></h3>

											<div class="row mb-10 align-items-center">
												<div class="col-lg-5">
													<figure>
														<a class="image_popup" href="assets/images/help/user.jpg"><img src="assets/images/help/user.jpg" class="w-100" style="max-width:380px;" /></a>
													</figure>
												</div>
												<div class="col-lg-7">
													
													<p>Настройки пользователя аключают в себя 3 параметра:</p>

													<ul class="list-unstyled">
														<li class="p-1"><i class="fa text-danger fa-check mr-2"></i> Логин для входа в систему управления</li>
														<li class="p-1"><i class="fa text-danger fa-check mr-2"></i> Пароль для входа в систему управления</li>
														<li class="p-1"><i class="fa text-danger fa-check mr-2"></i> Электронная почта для оповещения о заказах</li>
													</ul>

													<p>По логину и паролю нет никаких ограничений, вы выбираете их на свой страх и риск. Рекомендуем использовать пароль хотчбы из 6 симаолов, сочетающий буквы и цифры, а в идеале и мелкие и заглавные буквы</p>

													<p>Поле <span class="badge badge-danger">e-mail</span> нужно для отправки вам заказов из вашего магазина. Можно написать несколко адресов через запятую.</p>

													<div class="alert alert-warning text-center">
														<p><i><b>Обратите внимание</b>, что при сохранении настроек пользователя, они сохраняются все вместе, поэтому, будте аккруратны, не сотрите случайно символ из поля, которое не собирались редактировать</i></p>
													</div>

												</div>
											</div>

											<h3><i>Настройки системы</i></h3>

											<p>Эти настройки связаны в основном с отображением корзины.</p>

											<table class="table">
												<thead scope="row">
													<tr>
														<th>Настройка</th>
														<th>Назанчение</th>
														<th>Ключ</th>
													</tr>
												</thead>
												<tbody>
													<tr scope="row">
														<td class="align-middle" width="20%">
															<b>Режим корзины</b>
														</td>
														<td class="align-middle">
															Принимает два значения Всплывающее окно ("popup") и Отдельная страница ("page"). В первом случае будет сгенерировано всплывающее окно, открывающееся по клику на мини-корзину, во втором — вам придется сгенерировать полноценную корзину самостоятельно.
														</td>
														<td class="align-middle">
															type
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Страница корзины</b>
														</td>
														<td class="align-middle">
															Ссылка на страницу корзины. Нужна, если вы выбрали режим Отдельная страница ("page"). 
														</td>
														<td class="align-middle">
															page_link
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Режим вывода корзины</b>
														</td>
														<td class="align-middle">
															Принимает два значения Таблица ("table") или Слои ("div"). Зачем это нужно: во многих шаблонах сайтов таблицам заданы специфичные стили, что может исказить отображение корзины. В этих случаях лучше использовать Слои, с ними такой проблемы не будет.
														</td>
														<td class="align-middle">
															fullcart_mode
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Закрыть корзину</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться внутри кнопки закрытия корзины.
														</td>
														<td class="align-middle">
															cart_popup_close
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Удалить из корзины</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться внутри кнопки удаления товара из корзины.
														</td>
														<td class="align-middle">
															cart_remove
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>+1 товар</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться внутри кнопки увеличения количества товара в корзине.
														</td>
														<td class="align-middle">
															cart_plus
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>-1 товар</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться внутри кнопки уменьшения количества товара в корзине.
														</td>
														<td class="align-middle">
															cart_minus
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Всего товаров (mini)</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться перед количеством товаров в мини-корзине
														</td>
														<td class="align-middle">
															count_caption
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Общая сумма (mini)</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться перед общей суммой в мини-корзине
														</td>
														<td class="align-middle">
															total_caption
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Заголовок корзины</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться как заголовок в полноразмерной корзине
														</td>
														<td class="align-middle">
															cart_caption
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Оформление заказа</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться как заголовок в блоке оформления заказа
														</td>
														<td class="align-middle">
															order_caption
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Корзина пуста</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться в полноразмерной корзине, если корзина пуста
														</td>
														<td class="align-middle">
															empty_cart_caption
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Очистить корзину</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться в кнопке очистки корзины
														</td>
														<td class="align-middle">
															clear_cart_caption
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Вернуться к корзине</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться в кнопке возврата от оформления заказа к управлению корзиной
														</td>
														<td class="align-middle">
															back_to_cart
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Оформить заказ</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться в кнопке перехода к оформлению заказа
														</td>
														<td class="align-middle">
															order_caption
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Отправить заказ</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться в кнопке, которая отправит форму заказа
														</td>
														<td class="align-middle">
															send_order
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Общая стоимость</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться как подпись общей стоимости заказа в таблице
														</td>
														<td class="align-middle">
															full_total_caption
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Валюта</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться, как подпись к цене в полноразмерной корзине
														</td>
														<td class="align-middle">
															price_currency
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Добавление в корзину</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться в блоке, возникающем после успешного добавления товра в корзину
														<td class="align-middle">
															cart_success
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Отправка заказа</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться в блоке, возникающем после успешной отправки заказа
														<td class="align-middle">
															order_success
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Политика конфиденциальности</b>
														</td>
														<td class="align-middle">
															HTML код, который будет выводиться под формой оформления заказа. Его требует законодательство некторых стран.
														<td class="align-middle">
															confidention
														</td>
													</tr>
													<tr scope="row">
														<td class="align-middle">
															<b>Отправлять письмо с заказом клиенту</b>
														</td>
														<td class="align-middle">
															Если включено, то клиенту будет отправлено подтверждение заказа, при условии, что он указал e-mail при оформлении заказа
														<td class="align-middle">
															usermail
														</td>
													</tr>
												</tbody>
											</table>

											<h4><b>Установка настроек</b></h4>

											<p>В разделе «Настройки» системы управления можно изменить все настройки, которые представлены в таблице выше и после сохранения они сразу будут применены на странице.</p>

											<p>Есть, однако, еще возможность использовать некоторые настройки прямо в процессе интеграции корзины. Для этого в фнукциях <span class="font-14 badge badge-secondary">uw_store.cart.render.mini()</span> и <span class="font-14 badge badge-secondary">uw_store.cart.render.full()</span> есть опция <span class="font-14 badge badge-secondary">config</span>. Она позволяет изменять некоторые настройки для конкретного вывода корзины.</p>

											<div class="row mb-10 align-items-center">
												<div class="col-lg-6">
													<figure>
														<a class="image_popup" href="assets/images/help/cart_config.jpg"><img src="assets/images/help/cart_config.jpg" class="w-100" style="max-width:500px;" /></a>
													</figure>
												</div>
												<div class="col-lg-6">
													<p>Например, при генерации мини-корзины можно помяенять настройки «Всего товаров (mini)» <span class="font-14 badge badge-secondary">count_caption</span> и «Общая сумма (mini)» <span class="font-14 badge badge-secondary">total_caption</span>. Причем, для каждого вызова корзины эти параметры могут быть свои.
												</div>
											</div>

											<div class="alert alert-info">
<pre>&lt;script type="text/javascript"&gt;
	$(document).ready(function(){	
		uw_store.cart.render.mini('#minicart');
		uw_store.cart.render.mini('#minicart_other', {
			total_caption:'Измененный заголовок корзины'
		});
	});
&lt;/script&gt;</pre>
											</div>

											<p>В данном случае на странице генерируется две корзины. Они обе будут активны, и не будут конфликтовать между собой. Теоретически, таких корзин может быть любое количество.</p>

											<p>Первая корзина запущена с базовыми настройками, вторая — с изменением настройки «Общая сумма (mini)» <span class="font-14 badge badge-secondary">total_caption</span></p>

											<p>В функции генерации полноценной корзины (<span class="font-14 badge badge-secondary">uw_store.cart.render.full()</span>) можно использовать:</p>

											<ul class="list-unstyled pl-20">
												<li class="p-1"><i class="fa text-danger fa-circle mr-2"></i> Заголовок корзины <span class="font-14 badge badge-secondary">cart_caption</span></li>
												<li class="p-1"><i class="fa text-danger fa-circle mr-2"></i> Заголовок оформления заказа <span class="font-14 badge badge-secondary">order_caption</span></li>
												<li class="p-1"><i class="fa text-danger fa-circle mr-2"></i> HTML пустой корзины <span class="font-14 badge badge-secondary">empty_cart_caption</span></li>
												<li class="p-1"><i class="fa text-danger fa-circle mr-2"></i> Содержимое кнопки оформления заказа <span class="font-14 badge badge-secondary">make_order</span></li>
												<li class="p-1"><i class="fa text-danger fa-circle mr-2"></i> Содержимое кнопки отправки заказа <span class="font-14 badge badge-secondary">send_order</span></li>
												<li class="p-1"><i class="fa text-danger fa-circle mr-2"></i> Содержимое кнопки возврата к корзине <span class="font-14 badge badge-secondary">back_to_cart</span></li>
												<li class="p-1"><i class="fa text-danger fa-circle mr-2"></i> Содержимое кнопки очистки корзины <span class="font-14 badge badge-secondary">clear_cart_caption</span></li>
												<li class="p-1"><i class="fa text-danger fa-circle mr-2"></i> Подпись общей стоимости заказа <span class="font-14 badge badge-secondary">full_total_caption</span></li>
												<li class="p-1"><i class="fa text-danger fa-circle mr-2"></i> Содержимое кнопки закрытия всплывающей корзины <span class="font-14 badge badge-secondary">cart_popup_close</span></li>
												<li class="p-1"><i class="fa text-danger fa-circle mr-2"></i> HTML подписи под формой заказа <span class="font-14 badge badge-secondary">confidention</span></li>
											</ul>

											<div class="alert alert-info">
<pre>&lt;script type="text/javascript"&gt;
	$(document).ready(function(){
		uw_store.cart.render.full('#fullcart', {
			cart_caption:'Новый заголовок корзины',
			order_caption:'Новый заголовок формы заказа'
		});
	});
&lt;/script&gt;</pre>
											</div>


											<div class="row align-items-center mt-20">
												<div class="col-6 text-left">
													<button class="btn" onclick="getTab('#tab_store');"> <i class="fa fa-angle-left mr-2"></i> Управление каталогом</button>
												</div>
												<div class="col-6 text-right">
													<button class="btn" onclick="getTab('#tab_view');">Внешний вид <i class="fa fa-angle-right ml-2"></i></button>
												</div>
											</div>
										</div>
										<div class="help_tab" id="tab_view">
											<h2>Внешний вид</h2>

											<p>Данный раздел предусматривает, что вы разбираетесь в HTML и CSS. Если это не так, воспользуйтесь генератором CSS, находящимся в разделе «<a class="text-danger font-bold" href="cssgen.php">Внешний вид</a>» системы управления.</p>

											<h3 class="mt-20 mb-20"><i>Использование генератора CSS</i></h3>

											<div class="row align-items-center">
												<div class="col-lg-8">
													<figure>
														<a class="image_popup" href="assets/images/help/cssgen.jpg"><img src="assets/images/help/cssgen.jpg" class="w-100" style="max-width:800px;" /></a>
													</figure>
												</div>
												<div class="col-lg-4">
													<p class="font-16"><i>В гереаторе CSS представлены 3 способа расположения мини-корзины, 3 способа расположения полноценной корзины и 7 цветовых схем. Выбрав нужное сочетание, вы можете сохранить файл .css на сервере или скачать его на свой компьютер.</i></p>
													<a href="cssgen.php"><button class="btn font-bold btn-danger">Перейти к генератору</button></a>
												</div>
											</div>

											<p>Сохраненный на сервер файл будет находиться в папке: <span class="font-14 badge badge-secondary">uwstore/app/</span>. После сохранения вам будет предложен элемент вида <span class="font-14 badge badge-primary">&lt;link rel="stylesheet" href="/uwstore/app/yourfilename.css" &gt;</span>, который следует поместить в HEAD вашего сайта.</p>

											<div class="alert alert-warning text-center">
												<p class="font-18"><i><b>Обратите внимание!</b></i></p><p class="font-18">Статичные элементы лучше интегрировать в предназначенные для них элементы в верстке вашего сайта: <span class="font-14 badge badge-secondary">uw_store.cart.render.mini('#minicart');</span>.</p><p class="font-18">Остальные элементы лучше интегрируются в BODY: <span class="font-14 badge badge-secondary">uw_store.cart.render.mini('body');</span></i></p>
											</div>

											<h3 class="mt-20 mb-20"><i>Структура HTML и CSS элементов корзины</i></h3>

											<div class="mb-20">
												<button type="button" target="#css_tab_minicart" class="btn btn-outline-danger css_tab_btn active">Мини-корзина</button>
												<button type="button" target="#css_tab_fullcart"  class="btn css_tab_btn btn-outline-danger">Полноразмерная корзина</button>
												<button type="button" target="#css_tab_addpopup"  class="btn css_tab_btn btn-outline-danger">Товар добавлен в корзину</button>
												<button type="button" target="#css_tab_sendpopup"  class="btn css_tab_btn btn-outline-danger">Заказ отправлен</button>
											</div>
											<div class="css_tab active" id="css_tab_minicart">
												<h4><b>HTML код мини-корзины</b></h4>
												<div class="alert alert-info">
<pre>&lt;div class="uw_store_cart_mini"&gt;
	&lt;div class="uw_store_cart_mini_line"&gt;
		&lt;div uw-store-cart-count-caption&gt;
			<span class="font-14 badge badge-light">Подпись общего количества товаров</span>
		&lt;/div&gt;
		&lt;div uw-store-cart-count&gt;
			<span class="font-14 badge badge-light">Общее количества товаров</span>
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class="uw_store_cart_mini_line"&gt;
		&lt;div uw-store-cart-total-caption&gt;
			<span class="font-14 badge badge-light">Подпись общей стоимости заказа</span>
		&lt;/div&gt;
		&lt;div uw-store-cart-total&gt;
			<span class="font-14 badge badge-light">Общая стоимость заказа</span>
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;</pre>
												</div>

												<h4 class="mt-20"><b>CSS код мини-корзины</b></h4>
												<div class="alert alert-info">
<pre>.uw_store_cart_mini{
	/* Внешний слой */
}
.uw_store_cart_mini_line{
	/* Слои количества и стоимости */
}
[uw-store-cart-count-caption]{
	/* Слой подписи количества товаров */
}
[uw-store-cart-count]{
	/* Слой количества товаров */
}
[uw-store-cart-total-caption]{
	/* Слой подписи общей стоимости */
}
[uw-store-cart-total]{
	/* Слой общей стоимости */
}</pre>
												</div>
											</div>
											<div class="css_tab " id="css_tab_fullcart">
												<h4 class="mb-10"><b>HTML код полноценной корзины</b></h4>
												<button type="button" target="#code_tab_table" class="btn code_tab_btn active btn-outline-info">Вывод таблицей</button>
												<button type="button" target="#code_tab_div" class="btn code_tab_btn btn-outline-info">Вывод слоями</button>
												<div class="alert alert-info mt-10 code_tab active" id="code_tab_table">
<pre>&lt;div class="uw_store_cart_popup_cover"&gt;
	&lt;div class="uw_store_cart uw_store_cart_popup"&gt;
		&lt;div class="uw_store_cart_popup_close"&gt;
			<span class="font-14 badge badge-light">Html закрытия popup</span>
		&lt;/div&gt;
		&lt;div class="uw_store_cart_list"&gt;
			&lt;div uw-store-cart-caption&gt;
				<span class="font-14 badge badge-light">Заголовок корзины</span>
			&lt;/div&gt;
			&lt;table class="uw-store-cart-table" uw-store-cart-table&gt;
				&lt;tr class="uw-cart-table-row"&gt;
					&lt;td class="uw-cart-table-image"&gt;
						&lt;figure&gt;
							<span class="font-14 badge badge-light">Картинка товара, если картинки нет, тэг img не формируется</span>
							&lt;img src=""&gt;
						&lt;/figure&gt;
					&lt;/td&gt;
					&lt;td class="uw-cart-table-title"&gt;
						<span class="font-14 badge badge-light">Название товара</span>
					&lt;/td&gt;
					&lt;td class="uw-cart-table-count"&gt;
						&lt;button data-uw-store-id="" data-uw-store-cartminus&gt;
							<span class="font-14 badge badge-light">Кнопка минус</span>
						&lt;/button&gt;
						&lt;input data-uw-store-cartcount data-uw-store-id=""&gt;
						<span class="font-14 badge badge-light">Input в котором будет меняться количество товара</span>
						&lt;button data-uw-store-id="4" data-uw-store-cartplus&gt;
							<span class="font-14 badge badge-light">Содержимое кнопки плюс</span>
						&lt;/button&gt;
					&lt;/td&gt;
					&lt;td class="uw-cart-table-price"&gt;
						<span class="font-14 badge badge-light">Цена товара</span>
					&lt;/td&gt;
					&lt;td class="uw-cart-table-remove"&gt;
						&lt;button data-uw-store-id="" data-uw-store-removefromcart&gt;
							<span class="font-14 badge badge-light">Кнопка удаления из корзины</span>
						&lt;/button&gt;
					&lt;/td&gt;
				&lt;/tr&gt;
				&lt;tr class="uw-store-total-tr"&gt;
					&lt;td class="uw-store-total-caption" colspan="2"&gt;
						<span class="font-14 badge badge-light">Подпись общей стоимости</span>
					&lt;/td&gt;
					&lt;td class="uw-store-total-count"&gt;
						<span class="font-14 badge badge-light">Общая стоимость</span>
					&lt;/td&gt;
				&lt;/tr&gt;
				&lt;tr class="uw-store-buttons-tr"&gt;
					&lt;td class="uw-store-table-order" colspan="3"&gt;
						&lt;button uw-store-order-button&gt;
							<span class="font-14 badge badge-light">Кнопка оформить заказ</span>
						&lt;/button&gt;
						&lt;button data-uw-store-clearcart&gt;
							<span class="font-14 badge badge-light">Кнопка очистить корзину</span>
						&lt;/button&gt;
					&lt;/td&gt;
				&lt;/tr&gt;
			&lt;/table&gt;
			&lt;div class="uw-store-cart-empty" uw-store-cart-empty&gt;
				<span class="font-14 badge badge-light">HTML пустой корзины</span>
			&lt;/div&gt;
		&lt;/div&gt;
		&lt;div class="uw_store_order_form"&gt;
			&lt;div class="uw-store-order-caption" uw-store-order-caption&gt;
				<span class="font-14 badge badge-light">Заголовок оформления заказа</span>
			&lt;/div&gt;
			&lt;div class="uw-store-order-form-box" uw-store-order-form-box&gt;
				&lt;input uw-store-order-form-input name="person" placeholder="Ваше имя"&gt;
				&lt;input uw-store-order-form-input name="phone" placeholder="Номер телефона"&gt;
				&lt;input uw-store-order-form-input name="email" placeholder="Электронная почта"&gt;
				&lt;textarea uw-store-order-form-input name="comment" placeholder="Комментарий к заказу"&gt;&lt;/textarea&gt;
				&lt;div class="uw-store-order-confidention"&gt;
					<span class="font-14 badge badge-light">Подпись под формой заказа</span>
				&lt;/div&gt;
				&lt;button uw-store-order-send&gt;
					<span class="font-14 badge badge-light">Отправка заказа</span>
				&lt;/button&gt;
				&lt;button uw-store-order-backtocart&gt;
					<span class="font-14 badge badge-light">Вернуться в корзину</span>
				&lt;/button&gt;
			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;</pre>
												</div>

												<div class="alert alert-info mt-10 code_tab" id="code_tab_div">
<pre>&lt;div class="uw_store_cart_popup_cover"&gt;
	&lt;div class="uw_store_cart uw_store_cart_popup"&gt;
		&lt;div class="uw_store_cart_popup_close"&gt;
			<span class="font-14 badge badge-light">Html закрытия popup</span>
		&lt;/div&gt;
		&lt;div class="uw_store_cart_list"&gt;
			&lt;div uw-store-cart-caption&gt;
				<span class="font-14 badge badge-light">Заголовок корзины</span>
			&lt;/div&gt;
			&lt;div uw-store-cart-table class="uw-store-cart-table"&gt;
				&lt;div class="uw-cart-table-row"&gt;
					&lt;div class="uw-cart-table-image"&gt;
						&lt;figure&gt;
							<span class="font-14 badge badge-light">Картинка товара, если картинки нет, тэг img не формируется</span>
							&lt;img src=""&gt;
						&lt;/figure&gt;
					&lt;/div&gt;
					&lt;div class="uw-cart-table-title"&gt;
						<span class="font-14 badge badge-light">Название товара</span>
					&lt;/div&gt;
					&lt;div class="uw-cart-table-count"&gt;
						&lt;button data-uw-store-id="" data-uw-store-cartminus&gt;
							<span class="font-14 badge badge-light">Кнопка минус</span>
						&lt;/button&gt;
						&lt;input data-uw-store-cartcount data-uw-store-id=""&gt; 
						<span class="font-14 badge badge-light">Input в котором будет меняться количество товара</span>
						&lt;button data-uw-store-id="3" data-uw-store-cartplus&gt;
							<span class="font-14 badge badge-light">Содержимое кнопки плюс</span>
						&lt;/button&gt;
					&lt;/div&gt;
					&lt;div class="uw-cart-table-price"&gt;
						<span class="font-14 badge badge-light">Цена товара</span>
					&lt;/div&gt;
					&lt;div class="uw-cart-table-remove"&gt;
						&lt;button data-uw-store-id="" data-uw-store-removefromcart&gt;
							<span class="font-14 badge badge-light">Кнопка удаления из корзины</span>
						&lt;/button&gt;
					&lt;/div&gt;
				&lt;/div&gt;
				&lt;div class="uw-store-total-tr"&gt;
					&lt;div class="uw-store-total-caption"&gt;
						<span class="font-14 badge badge-light">Подпись общей стоимости</span>
					&lt;/div&gt;
					&lt;div class="uw-store-total-count"&gt;
						<span class="font-14 badge badge-light">Общая стоимость</span>
					&lt;/div&gt;
				&lt;/div&gt;
				&lt;div class="uw-store-buttons-tr"&gt;
					&lt;div class="uw-store-table-order"&gt;
						&lt;button uw-store-order-button&gt;
							<span class="font-14 badge badge-light">Кнопка оформить заказ</span>
						&lt;/button&gt;
						&lt;button data-uw-store-clearcart&gt;
							<span class="font-14 badge badge-light">Кнопка очистить корзину</span>
						&lt;/button&gt;
					&lt;/div&gt;
				&lt;/div&gt;
			&lt;/div&gt;
			&lt;div uw-store-cart-empty class="uw-store-cart-empty"&gt;
				<span class="font-14 badge badge-light">HTML пустой корзины</span>
			&lt;/div&gt;
		&lt;/div&gt;
		&lt;div class="uw_store_order_form"&gt;
			&lt;div uw-store-order-caption class="uw-store-order-caption"&gt;
				<span class="font-14 badge badge-light">Заголовок оформления заказа</span>
			&lt;/div&gt;
			&lt;div uw-store-order-form-box class="uw-store-order-form-box"&gt;
				&lt;input uw-store-order-form-input name="person" placeholder="Ваше имя"&gt;
				&lt;input uw-store-order-form-input name="phone" placeholder="Номер телефона"&gt;
				&lt;input uw-store-order-form-input name="email" placeholder="Электронная почта"&gt;
				&lt;textarea uw-store-order-form-input name="comment" placeholder="Комментарий к заказу"&gt;&lt;/textarea&gt;
				&lt;div class="uw-store-order-confidention"&gt;
					<span class="font-14 badge badge-light">Подпись под формой заказа</span>
				&lt;/div&gt;
				&lt;button uw-store-order-send&gt;
					<span class="font-14 badge badge-light">Отправка заказа</span>
				&lt;/button&gt;
				&lt;button uw-store-order-backtocart&gt;
					<span class="font-14 badge badge-light">Вернуться в корзину</span>
				&lt;/button&gt;
			&lt;/div&gt;
		&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;</pre>
												</div>

												<h4 class="mt-20"><b>CSS код полноценной корзины</b></h4>
												<div class="alert alert-info">
<pre>.uw_store_cart_popup_cover{
	<span class="text-black-50">/* Обертка блока корзины в режиме Popup */</span>
}
.uw_store_cart{
	<span class="text-black-50">/* Блок корзины */</span>
}
.uw_store_cart.uw_store_cart_popup{
	<span class="text-black-50">/* Блок корзины если включен режим Popup */</span>
}
.uw_store_cart_popup_close{
	<span class="text-black-50">/* Кнопка закрытия всплывающей корзины (есть только в режиме popup) */</span>
}
.uw_store_cart_list{
	<span class="text-black-50">/* Обертка блока корзины */</span>
}
[uw-store-cart-caption]{
	<span class="text-black-50">/* Заголовок корзины */</span>
}
.uw-store-cart-table{
	<span class="text-black-50">/* Обертка списка товаров в корзине */</span>
}
.uw-cart-table-row{
	<span class="text-black-50">/* Блок отдельного товара в корзине */</span>
}
.uw-cart-table-image{
	<span class="text-black-50">/* Блок картинки товара */</span>
}
.uw-cart-table-image figure{
	<span class="text-black-50">/* Обертка картинки товара, выводится всегда */</span>
}
.uw-cart-table-image figure img{
	<span class="text-black-50">/* Картинка товара, выводится только если есть картинка */</span>
}
.uw-cart-table-title{
	<span class="text-black-50">/* Блок наименования товара */</span>
}
.uw-cart-table-count{
	<span class="text-black-50">/* Блок количества товара */</span>
}
[data-uw-store-cartminus]{
	<span class="text-black-50">/* Кнопка уменьшения количества товара */</span>
}
input[data-uw-store-cartcount}{
	<span class="text-black-50">/* Поле количества товара */</span>
}
[data-uw-store-cartplus]{
	<span class="text-black-50">/* Кнопка увеличения количества товара */</span>
}
.uw-cart-table-price{
	<span class="text-black-50">/* Блок центы товара */</span>
}
.uw-cart-table-remove{
	<span class="text-black-50">/* Блок удаления товара из корзины */</span>
}
[data-uw-store-removefromcart]{
	<span class="text-black-50">/* Кнопка удаления товара из корзины */</span>
}
.uw-store-total-tr{
	<span class="text-black-50">/* Обертка блока общей стоимости */</span>
}
.uw-store-total-caption{
	<span class="text-black-50">/* Блок подписи общей стоимости товаров в корзине */</span>
}
.uw-store-total-count{
	<span class="text-black-50">/* Блок вывода общей стоимости товаров в корзине */</span>
}
.uw-store-buttons-tr{
	<span class="text-black-50">/* Обертка блока с кнопками под корзиной */</span>
}
.uw-store-table-order{
	<span class="text-black-50">/* Блок с кнопками под корзиной */</span>
}
[uw-store-order-button]{
	<span class="text-black-50">/* Кнопка перехода к оформлению заказа */</span>
}
[data-uw-store-clearcart]{
	<span class="text-black-50">/* Кнопка очистки корзины */</span>
}
.uw-store-cart-empty{
	<span class="text-black-50">/* Блок пустой корзины */</span>
}
.uw_store_order_form{
	<span class="text-black-50">/* Блок оформления заказа */</span>
}
.uw-store-order-caption{
	<span class="text-black-50">/* Заголвок формы заказа */</span>
}
.uw-store-order-form-box{
	<span class="text-black-50">/* Обертка формы заказа*/</span>
}
input[uw-store-order-form-input]{
	<span class="text-black-50">/* Поля формы заказа */</span>
}
textarea[uw-store-order-form-input]{
	<span class="text-black-50">/* Поле комментария в форме заказа */</span>
}
.uw-store-order-confidention{
	<span class="text-black-50">/* Html блок под формой заказа */</span>
}
[uw-store-order-send]{
	<span class="text-black-50">/* Кнопка отправки заказа */</span>
}
[uw-store-order-backtocart]{
	<span class="text-black-50">/* Кнопка возврата от оформления заказа к корзине */</span>
}</pre>
												</div>

											</div>

											<div class="css_tab" id="css_tab_addpopup">
												<h4 class="mb-10"><b>HTML код блока добавления товара в корзину</b></h4>
												<p>Этот блок добавляется в body и показывается при добавлении товара в корзину. Блок исчезает сам через 1,5 секунды</p>
												<div class="alert alert-info mt-10">
<pre>&lt;div class="uw-store-cart-success"&gt;
	<span class="font-14 badge badge-light">HTML код настройки «Добавление в корзину»</span>
&lt;/div&gt;</pre>
												</div>
												<h4 class="mb-10"><b>CSS код блока добавления товара в корзину</b></h4>
												<div class="alert alert-info mt-10">
<pre>.uw-store-cart-success{
	/* Блок добавления товара в корзину */
}</pre>
												</div>
											</div>

											<div class="css_tab" id="css_tab_sendpopup">
												<h4 class="mb-10"><b>HTML код блока отправки закза</b></h4>
												<p>Этот блок добавляется в body и показывается при отправке заказа. Блок исчезает сам через 2,5 секунды</p>
												<div class="alert alert-info mt-10">
<pre>&lt;div class="uw-store-order-success"&gt;
	<span class="font-14 badge badge-light">HTML код настройки «Отправка заказа»</span>
&lt;/div&gt;</pre>
												</div>
												<h4 class="mb-10"><b>CSS код блока отпраки заказа</b></h4>
												<div class="alert alert-info mt-10">
<pre>.uw-store-order-success{
	/* Блок успешной отпраки заказа */
}</pre>
												</div>
											</div>

											<div class="row align-items-center mt-20">
												<div class="col-6 text-left">
													<button class="btn" onclick="getTab('#tab_settings');"> <i class="fa fa-angle-left mr-2"></i> Настройки</button>
												</div>
												<div class="col-6 text-right">
													<button class="btn" onclick="getTab('#tab_templates');">Шаблоны писем <i class="fa fa-angle-right ml-2"></i></button>
												</div>
											</div>
										</div>
										<div class="help_tab" id="tab_templates">
											<h2>Шаблоны писем</h2>

											<p>При отправке заказа система формирует два письма, одно отправляется владельцу сайта по адресу, указанному в настройках пользователя, второе — клиенту, если он указал e-mail в форме заказа. Для этих писем можно изменить шаблон офромления.</p>

											<p>Шаблоны хранятся в папке <span class="badge badge-secondary font-14">uwcart/templates/</span>, изменить шаблон можно в любом текстовом редакторе. В коде содержатся переменные, которые при генерации письма будут заменены на соответсвующие значения. Не удаляйте их, если хотите получать сведения.</p>


											<div class="alert alert-warning text-center">
												<p class="font-18"><i><b>Обратите внимание</b>, разные почтовые сервисы по-разному относятся к оформлению HTML писем, так что чем проще будет код, тем больше вероятность одинакового отображения писем</i></p>
											</div>

											<h4><b>Файл adminmail.tpl</b></h4>

											<p>Этот код отправляется администратору сайта и содержит сведения о заказе и контактные данные клиента. в шаблоне доступны перменные:</p>

											<table class="table mb-20">
												<tr>
													<td class="align-middle"><b>{{site_url}}</b></td>
													<td class="align-middle">Домен вашего сайта, генерируется из переменной сервера. Например mysite.ru</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_date}}</b></td>
													<td class="align-middle">Дата отправки заказа. Берется время сервера, которое может не совпадать с вашим по временной зоне</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_list}}</b></td>
													<td class="align-middle">Список заказанных товаров, генерируется автоматически по шаблону mail_item.tpl</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_total}}</b></td>
													<td class="align-middle">Общая сумма заказа</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_person}}</b></td>
													<td class="align-middle">Имя клиента</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_phone}}</b></td>
													<td class="align-middle">Номер телефона</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_mail}}</b></td>
													<td class="align-middle">Электронная почта</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_comment}}</b></td>
													<td class="align-middle">Комментарий к заказу</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_url}}</b></td>
													<td class="align-middle">Адрес страницы вашего сайта, с которой был отправлен заказ</td>
												</tr>
											</table>

											<h4><b>Файл usermail.tpl</b></h4>

											<p>Этот код отправляется покупателю и содержит сведения о заказе. в шаблоне доступны перменные:</p>

											<table class="table mb-20">
												<tr>
													<td class="align-middle"><b>{{site_url}}</b></td>
													<td class="align-middle">Домен вашего сайта, генерируется из переменной сервера. Например mysite.ru</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_date}}</b></td>
													<td class="align-middle">Дата отправки заказа. Берется время сервера, которое может не совпадать с вашим по временной зоне</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_list}}</b></td>
													<td class="align-middle">Список заказанных товаров, генерируется автоматически по шаблону mail_item.tpl</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{order_total}}</b></td>
													<td class="align-middle">Общая сумма заказа</td>
												</tr>
											</table>

											<h4><b>Файл mail_item.tpl</b></h4>

											<p>Этот код нужен для генерации состава заказа. Он используется при генерации и письма администратору и письма клиенту. Каждый товар из корзины будет обернут в этот код:</p>

											<table class="table mb-20">
												<tr>
													<td class="align-middle"><b>{{image}}</b></td>
													<td class="align-middle">Картнка товара, используйте полный url, начиная с http:// или https:// т.к. картинки будут оторажаться на другом сервере.</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{title}}</b></td>
													<td class="align-middle">Название товара</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{count}}</b></td>
													<td class="align-middle">Количество товара</td>
												</tr>
												<tr>
													<td class="align-middle"><b>{{total}}</b></td>
													<td class="align-middle">Общая стоимость этого товара</td>
												</tr>
											</table>


											<div class="row align-items-center mt-20">
												<div class="col-6 text-left">
													<button class="btn" onclick="getTab('#tab_view');"> <i class="fa fa-angle-left mr-2"></i> Внешний вид</button>
												</div>
												<div class="col-6 text-right">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="go_top" onclick="go_top();"><i class="fa fa-angle-up"></i></div>

		<script type="text/javascript">

			function getTab(tab){
				$('.help_content li[tab="'+tab+'"]').trigger('click');
			}

			function go_top(){
				$('body,html').animate({scrollTop:0},'slow');
			}

			$(document).ready(function(){
				$('.help_content li').click(function(){
					if(!$(this).hasClass('active')){
						$('.help_content li').removeClass('active');
						$(this).addClass('active');
						$('.help_tab').removeClass('active');
						$($(this).attr('tab')).addClass('active');
						$('body,html').animate({scrollTop:$('#help_tabs').offset().top},'slow');
					}
				});

				$('.image_popup').magnificPopup({
					type:'image'
				});

				$('.code_tab_btn').click(function(){
					if(!$(this).hasClass('active')){
						$('.code_tab_btn').removeClass('active');
						$(this).addClass('active');
						$('.code_tab').removeClass('active');
						$($(this).attr('target')).addClass('active');
					}
				});

				$('.css_tab_btn').click(function(){
					if(!$(this).hasClass('active')){
						$('.css_tab_btn').removeClass('active');
						$(this).addClass('active');
						$('.css_tab').removeClass('active');
						$($(this).attr('target')).addClass('active');
					}
				});

				$('[name="minitype"], [name="fulltype"]').change(function(){
					showif = $(this).next('.hidden_sub_select').attr('showif');

					if(showif.indexOf($(this).val()) > -1){
						$(this).next('.hidden_sub_select').show();
					}else{
						$(this).next('.hidden_sub_select').hide();
					}
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