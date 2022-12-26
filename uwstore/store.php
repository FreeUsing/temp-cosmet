<?php
	session_start();
	if(!$_SESSION['uw_store_logged_in']){
		unset($_SESSION['uw_store_logged_in']);
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['save'])&&isset($_POST['result'])){
		$f = fopen('store.json', "w");
		fwrite($f, $_POST['result']);
		fclose($f);
		echo '{"result": "ok", "answer":"Сохранение прошло успешно"}';
		exit;
	}	

	if(isset($_GET['export'])){
		$result = json_decode(file_get_contents('store.json'), true);
		header('Content-Disposition: attachment; filename="uwstore_'.$_SERVER['HTTP_HOST'].'_'.date('d.m.Y_H:i:s').'.csv";');
		$f = fopen('php://output', 'w');
		foreach ($result["records"] as $line) {
			unset($line['recid']);
			unset($line['w2ui']);
			$line['title'] = iconv("UTF-8", "Windows-1251", $line['title']);
			$line['title'] = str_replace('"', '', $line['title']);
		    fputcsv($f, $line, ';');
		}
		fclose($f);
		exit;
	}	

	if(isset($_POST['import'])){

		if(isset($_FILES['file'])){
			if(mime_content_type($_FILES['file']['tmp_name']) == 'text/plain'){
				$handle = fopen($_FILES['file']['tmp_name'], "r");
				$output = [];
				while (($data = fgetcsv($handle, 2200, ";")) !== FALSE) {
					$num = count($data);
					if(count($data)!=3){
						echo '{"result": false, "answer":"<b>Ошибка</b><br>Структура файла не соответствует таблице"}';
						exit;
					}
				    $output[] = [
				    	'id' => $data[0],
				    	'title' => str_replace('"', '', iconv("Windows-1251", "UTF-8", $data[1])),
				    	'price' => $data[2],
				    	'w2ui' => []
				    ];
				}
				echo json_encode(['result'=>true, 'answer' => '', 'fields' => $output]);
			}else{
				echo '{"result": false, "answer":"<b>Ошибка</b><br>Тип файла не поддерживается"}';
			}
		}
		exit;
	}

	if(isset($_POST['delete'])&&isset($_POST['result'])&&isset($_POST['delete_list'])){
		$dlist = json_decode($_POST['delete_list'], true);
		$result = json_decode($_POST['result'], true);

		$result['total'] = $result['total']-count($dlist);

		$recid = 1;
		$new_records = [];
		foreach($result['records'] as $key => $rec){
			if(!in_array($rec['recid'], $dlist)){
				$rec['recid'] = $recid;
				$new_records[] = $rec;
				$recid++;
			}
		}

		$result['records'] = $new_records;

		$f = fopen('store.json', "w");
		fwrite($f, json_encode($result));
		fclose($f);
		echo '{"result": "ok", "answer":"Удаление прошло успешно"}';
		exit;
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
								<a class="dropdown-item text-light bg-danger active" href="store.php">Каталог</a>
								<a class="dropdown-item text-danger" href="orders.php">Заказы</a>
								<a class="dropdown-item text-danger" href="settings.php">Настройки</a>
								<a class="dropdown-item text-danger" href="cssgen.php">Внешний вид</a>
								<a class="dropdown-item text-danger" href="help.php">Помощь</a>
							</div>
						</div>
						<ul class="main-menu d-none d-lg-inline-block">
							<li class="active"><a href="store.php"><i class="fa fa-table d-block d-lg-none"></i> <span class="d-none d-lg-inline">Каталог</span></a></li>
							<li><a href="orders.php"><i class="fa fa-table d-block d-lg-none"></i> <span class="d-none d-lg-inline">Заказы</span></a></li>
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
							    <i class="fa mr-2 fa-table text-danger"></i> Управление каталогом
							</div>
							<div class="card-body">
								<div id="main-grid" style="min-height:200px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="assets/w2ui/w2ui.js" type="text/javascript"></script>

		<div class="go_top" onclick="go_top();"><i class="fa fa-angle-up"></i></div>

			
		<script type="text/javascript">

			function go_top(){
				$('body,html').animate({scrollTop:0},'slow');
			}
			
			w2utils.locale({
                dateFormat     : "dd-mm-yyyy",
                currencyPrefix    : "",
                shortmonths       : ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
                fullmonths        : ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                shortdays        : ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
                fulldays        : ["Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресение"],
                dataType       : 'RESTFULLJSON',
                dateStartYear  : 1990
            });
            w2obj.grid.prototype.buttons.add.text = 'Новая запись';
            w2obj.grid.prototype.buttons.add.tooltip = 'Добавить запись в таблицу';
            w2obj.grid.prototype.buttons.edit.text = 'Редактировать';
            w2obj.grid.prototype.buttons.edit.tooltip = 'Открыть в редакторе';
            w2obj.grid.prototype.buttons.delete.text = 'Удалить';
            w2obj.grid.prototype.buttons.save.text = 'Сохранить';
            w2obj.grid.prototype.msgDelete = 'Уверены, что хотите удалить эти записи?';
            w2obj.grid.prototype.buttons.delete.tooltip = 'Удалить выбранные записи';
            w2obj.grid.prototype.buttons.reload.tooltip = 'Обновить таблицу';
            w2obj.grid.prototype.buttons.columns.tooltip = 'Управление столбцами';
            w2obj.grid.prototype.buttons.save.tooltip = 'Сохранить записи';

            var hash = new Date();

           	$(document).ready(function(){

           		$('#main-grid').w2grid({ 
                    name: 'product_grid', 
                    show: { 
                        toolbar: true,
                        
                        toolbarReload   : true,
                        toolbarColumns  : true,
                        toolbarSearch   : true,
                        toolbarAdd      : true,
                        toolbarEdit      : false,
                        toolbarDelete   : true,
                        toolbarSave     : true,
                        selectionBorder : false,
                        skipRecords     : false,
                        saveRestoreState: false,
                        lineNumbers: true,
                        selectColumn: true,

                    },
                    recordHeight:30,
        			fixedBody: false,
        			multiSearch: false,
			        searches: [
			        	
			        ],
                    toolbar: {
                        /*items: [
                            { type: 'break' },
                            { type: 'button', id: 'export', caption: 'Выгрузить записи', tooltip: 'Выгрузить всю таблицу в CSV', img: 'icon-download' }
                        ],
                        onClick: function (target, data) {
                            console.log(target);
                        }*/
                    },
                    url: 'store.json?hash='+hash,
                    method: 'GET',
                    columns: [      
                       { 
							field: 'id',
							caption: 'ID',
							size: '2%',
							editable:
								{ type: 'text' }
						},{ 
							field: 'title',
							caption: 'Наименование',
							size: '13%',
							resizable: true, 
							editable:{ 
								type: 'text' 
							}
						},{
							field: 'price',
							caption: 'Цена',
							size: '7%', 
							editable:
								{ type: 'float' }
						},
                    ],
                    onReload: function(e){
                    	//console.log(e);
                    },
                    onSelect: function(){
                    	save = w2ui['product_grid_toolbar'].items[6].disabled;
                    	w2ui['product_grid'].refresh();
                    	if(!save){
                    		w2ui['product_grid_toolbar'].items[6].disabled = false;
                    		w2ui['product_grid_toolbar'].refresh();
                    	}
                    	
                    },
                    onAdd: function(){
                        var g = w2ui['product_grid'].records.length;
                        

						if(w2ui['product_grid'].records.length>0){
							var ids = [];
							w2ui['product_grid'].records.forEach(function(element){
							    ids.push(element.id);
							});
							id = Math.max.apply(null, ids);
						}else{
							id = 0;
						}

    					w2ui['product_grid'].add( { recid: g + 1, id: id+1, title: '', price: 0 });
    					w2ui['product_grid_toolbar'].items[6].disabled = false;
    					w2ui['product_grid_toolbar'].refresh();
                    },
                    delete: function(){

                    	w2confirm({
                    		msg          : 'Вы уверены, что хотите удалить записи?<br>Учтите, при этом произойдет сохранение данных',
						    title        : 'Удаление',
						    width        : 450, 
						    height       : 220,     
						    btn_yes      : {
						        text     : 'Да',   // text for yes button (or yes_text)
						        callBack : function(){

						        	var del_list = w2ui["product_grid"].getSelection();
						        	var records = [];
						        	for(i=0; i<w2ui['product_grid'].records.length;i++){
			                    		records.push(w2ui['product_grid'].records[i]);
			                    		records[i].w2ui = [];
			                    	}

			                    	var result = {
			                    		total: w2ui['product_grid'].records.length,
			                    		records: records
			                    	}
			                    	im = $.ajax({
			                    		url: 'store.php',
			                    		async:false,
			                    		type: 'post',
			                    		data: {
			                    			delete: 'yes',
			                    			result: JSON.stringify(result),
			                    			delete_list: JSON.stringify(del_list)
			                    		}
			                    	});

			                    	ans = JSON.parse(im.responseText);

			                    	w2ui["product_grid"].message(ans.answer);
			                    	selection = w2ui["product_grid"].getSelection();
			                    	selection.forEach(function(el){
										w2ui["product_grid"].unselect(el);
			                    	});
			                    	w2ui['product_grid'].reload();
			                    	location.reload(true);
						        }
						    },
						    btn_no       : {
						        text     : 'Нет'
						    },
                    	});

                    	
                    },
                    save: function(){
                    	w2ui['product_grid'].mergeChanges();
                    	var records = [];
                    	for(i=0; i<w2ui['product_grid'].records.length;i++){
                    		records.push(w2ui['product_grid'].records[i]);
                    		records[i].w2ui = [];
                    	}

                    	var result = {
                    		total: w2ui['product_grid'].records.length,
                    		records: records
                    	}

                    	im = $.ajax({
                    		url: 'store.php',
                    		async:false,
                    		type: 'post',
                    		data: {
                    			save: 'yes',
                    			result: JSON.stringify(result)
                    		}
                    	});

                    	ans = JSON.parse(im.responseText);
                    	w2ui["product_grid"].message(ans.answer);
	                	w2ui['product_grid'].reload();
	                	location.reload(true);
                    }
                });   
             
            	w2ui['product_grid_toolbar'].remove("w2ui-search");
            	w2ui['product_grid_toolbar'].remove("w2ui-break1");
            	w2ui['product_grid_toolbar'].add([
            		{type: 'break', },
            		{ type: 'button',  id: 'import',  group: '1', text: 'Импорт', icon: 'fa fa-cloud-upload', 
						onClick:function(event){
							$('[name="importFile"]').click();
						}, tooltip: 'Импорт из CSV'
					},
            		{ type: 'button',  id: 'export_2',  group: '1', text: 'Экспорт', icon: 'fa fa-cloud-download', 
	            		onClick:function(event){
	            			location.href = location.href+'?export=true'; 
						}, tooltip: 'Экспорт в CSV'
            		}
            	]);

            	$('[name="importFile"]').change(function(){
            		var fd = new FormData;
            		fd.append('file', $('[name="importFile"]').prop('files')[0]);
            		fd.append('import', true);

            		im = $.ajax({
                		url: 'store.php',
                		async:false,
                		type: 'post',
                		processData: false,
        				contentType: false,
                		data: fd
                	});

                	var ans = JSON.parse(im.responseText);
                	if(!ans.result){
                		w2ui["product_grid"].message(ans.answer);
                	}else{

                		w2confirm({
                			title: 'Способ добавления данных',
                			msg: '<div class="p-3"><div class="row mt-3"><div class="col-sm-6 text-left"><div class="form-check"><input class="form-check-input" type="radio" name="import_method" id="import_replace" value="replace" checked><label class="form-check-label" for="import_replace"><b>Заменить данные</b><p><small>Удалит записи в таблице и заменит их новыми</small></p></label></div></div><div class="col-sm-6 text-left"><div class="form-check"><input class="form-check-input" type="radio" name="import_method" id="import_append" value="append"><label class="form-check-label" for="import_append"><b>Дополнить данные</b><p><small>Добавит новые записи в конец талицы</small></p></label></div></div></div></div>',

                			btn_yes      : {
						        text     : 'Загрузить',    
						        callBack : function(){
						        	var counter = 0;
						        	var recid = 0;

						        	if($('[name="import_method"]:checked').val() == 'replace'){
						        		w2ui["product_grid"].clear();
						        	}else{
						        		recid = w2ui["product_grid"].records.length;
						        	}

						        	ans.fields.forEach(function(element){
					        			ans.fields[counter].recid = recid+1;
					        			ans.fields[counter].price = parseFloat(ans.fields[counter].price);
					        			ans.fields[counter].w2ui = [
					        				{
					        					class:'w2ui-changed'
					        				}];
					        			ans.fields[counter].w2ui['changes'] = {
				        					id:ans.fields[counter].id,
				        					title:ans.fields[counter].title, 
				        					price:ans.fields[counter].price
				        				};
					        			
					        			counter++;
					        			recid++;
					        		});

						        	w2ui["product_grid"].add(ans.fields);
						        	w2ui['product_grid_toolbar'].items[6].disabled = false;
    								w2ui['product_grid'].refresh();						        	
						        } 
						    },
						    btn_no       : {
						        text     : 'Отмена'
						    }
						});
                	}

            		$('[name="importFile"]').val('');
            	});

           	});

		</script>
		<div class="" id="importBox">
			<input type="file" name="importFile" accept="csv" />
		</div>
	</body>
</html>