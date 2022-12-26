<?php
	session_start();

	require_once('login.php');

	function get_order_file($date,$num){
		if(!file_exists(dirname(__FILE__).'/orders/'.$date.$num.'.json')){
			return $date.$num;
		}else{
			return get_order_file($date,$num+1);
		}
	}

	$config = json_decode(file_get_contents('config.json'), true);
	$records = json_decode(file_get_contents('store.json'), true);
	if(isset($_SESSION['uw_store_cart'])&&isset($_POST['order'])){

		foreach($records['records'] as $rec){
			$items[$rec['id']] = $rec;
		}
		foreach($_SESSION['uw_store_cart']['records'] as $id=>$count){
			$item_record = $items[$id];
			if(isset($_SESSION['uw_store_cart']['images'][$id])){
				$item_record['img_url'] = $_SESSION['uw_store_cart']['images'][$id];
				$item_record['image'] = '<img src="'.$_SESSION['uw_store_cart']['images'][$id].'" width="60">';
			}else{
				$item_record['img_url'] = '';
				$item_record['image'] = '<div style="width:60px; height:60px; display:inline-block; background:#f7f7f7;"></div>';
			}
			$item_record['count'] = $count;
			$item_record['total'] = number_format($count * $items[$id]['price'], 2, ',', ' ');

			$item_records[] = $item_record;
		}

		$order_list = '';
		foreach($item_records as $rec){
			$patterns = [];
			$replace = [];
			foreach($rec as $key=>$val){
				$patterns[] = '/{{'.$key.'}}/';
				$replace[] = $val;
			}
			$patterns[] = '/\{{(.+?)\}}/';;
			$replace[] = '';

			$order_list .= preg_replace($patterns, $replace, file_get_contents('templates/mail_item.tpl'));
		}

		$order = get_order_file(date('ym'),1);

		$mailarr = [
			'site_url' => $_SERVER['HTTP_HOST'],
			'order_num' => $order,
			'order_arr' => $item_records,
			'order_list' => $order_list,
			'order_date' => date('d.m.Y H:i:s'),
			'order_total' => number_format($_SESSION['uw_store_cart']['total'], 2, ',', ' '),
			'order_person' => $_POST['order']['person'],
			'order_phone' => $_POST['order']['phone'],
			'order_mail' => $_POST['order']['mail'],
			'order_comment' => nl2br($_POST['order']['comment']),
			'order_url' => $_POST['order']['url']
		]; 

		file_put_contents(dirname(__FILE__).'/orders/'.$order.'.json', json_encode($mailarr));

		$patterns = [];
		$replace = [];

		foreach($mailarr as $key=>$val){
			$patterns[] = '/{{'.$key.'}}/';
			$replace[] = $val;
		}

		$patterns[] = '/\{{(.+?)\}}/';;
		$replace[] = '';

		$mail_text = preg_replace($patterns, $replace, file_get_contents('templates/adminmail.tpl'));

		$ml_title="Заявка с сайта ".$_SERVER['HTTP_HOST'];
		$ml_header="Content-Type: text/html; charset=utf-8\n";
		$ml_header .="From: no_reply@".$_SERVER['HTTP_HOST'];
		$ml_cmail  = $user['email'];

		mail($ml_cmail, $ml_title, $mail_text, $ml_header);

		if(isset($_POST['order']['mail'])&&$config['usermail']){
			$mail_text = preg_replace($patterns, $replace, file_get_contents('templates/usermail.tpl'));
			$ml_title="Ваш заказ на сайте ".$_SERVER['HTTP_HOST'];
			$ml_header="Content-Type: text/html; charset=utf-8\n";
			$ml_header .="From: no_reply@".$_SERVER['HTTP_HOST'];
			$ml_cmail  = $_POST['order']['mail'];

			mail($ml_cmail, $ml_title, $mail_text, $ml_header);
		}
	}
?>