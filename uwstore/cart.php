<?php

	session_start();

	if(isset($_POST['id'])){
		$records = json_decode(file_get_contents('store.json'), true);
		if(!isset($_POST['remove'])&&!isset($_POST['action'])){
			if(isset($_SESSION['uw_store_cart']['records'][$_POST['id']])){
				$_SESSION['uw_store_cart']['records'][$_POST['id']]++;
				$_SESSION['uw_store_cart']['count']++;
				foreach($records['records'] as $rec){
					if($_POST['id'] == $rec['id']){
						$_SESSION['uw_store_cart']['total'] = $_SESSION['uw_store_cart']['total'] + $rec['price'];
					}
				}
			}else{
				$_SESSION['uw_store_cart']['records'][$_POST['id']] = 1;
				$_SESSION['uw_store_cart']['count']++;
				if(isset($_POST['image'])){
					$_SESSION['uw_store_cart']['images'][$_POST['id']] = $_POST['image'];
				}
				foreach($records['records'] as $rec){
					if($_POST['id'] == $rec['id']){
						$_SESSION['uw_store_cart']['total'] = $_SESSION['uw_store_cart']['total'] + $rec['price'];
					}
				}
			}
		}else if(!isset($_POST['action'])){
			if(isset($_SESSION['uw_store_cart']['records'][$_POST['id']])){
				$count = $_SESSION['uw_store_cart']['records'][$_POST['id']];
				$_SESSION['uw_store_cart']['count'] = $_SESSION['uw_store_cart']['count'] - $count;
				foreach($records['records'] as $rec){
					if($_POST['id'] == $rec['id']){
						$_SESSION['uw_store_cart']['total'] = $_SESSION['uw_store_cart']['total'] - ($rec['price']*$count);
					}
				}
				unset($_SESSION['uw_store_cart']['records'][$_POST['id']]);
			}
		}else{
			if(isset($_SESSION['uw_store_cart']['records'][$_POST['id']])){
				if($_POST['action']=='plus'){
					$_SESSION['uw_store_cart']['records'][$_POST['id']]++;
					$_SESSION['uw_store_cart']['count']++;
					foreach($records['records'] as $rec){
						if($_POST['id'] == $rec['id']){
							$_SESSION['uw_store_cart']['total'] = $_SESSION['uw_store_cart']['total'] + $rec['price'];
						}
					}
				}
				if($_POST['action']=='minus'){
					$_SESSION['uw_store_cart']['records'][$_POST['id']]--;
					if($_SESSION['uw_store_cart']['records'][$_POST['id']] == 0){
						$_SESSION['uw_store_cart']['count']--;
						foreach($records['records'] as $rec){
							if($_POST['id'] == $rec['id']){
								$_SESSION['uw_store_cart']['total'] = $_SESSION['uw_store_cart']['total'] - $rec['price'];
							}
						}
						unset($_SESSION['uw_store_cart']['records'][$_POST['id']]);
					}else{

						$_SESSION['uw_store_cart']['count'] = $_SESSION['uw_store_cart']['count'] - 1;
						foreach($records['records'] as $rec){
							if($_POST['id'] == $rec['id']){
								$_SESSION['uw_store_cart']['total'] = $_SESSION['uw_store_cart']['total'] - $rec['price'];
							}
						}

					}
					
				}

				if($_POST['action']=='count'){
					$_SESSION['uw_store_cart']['count'] = $_SESSION['uw_store_cart']['count'] - $_SESSION['uw_store_cart']['records'][$_POST['id']] + $_POST['count'];
					$_SESSION['uw_store_cart']['records'][$_POST['id']] = $_POST['count'];
					$_SESSION['uw_store_cart']['total'] = 0;
					foreach($records['records'] as $rec){
						if($_POST['id'] == $rec['id']){
							$_SESSION['uw_store_cart']['total'] = $_SESSION['uw_store_cart']['total'] + ($_POST['count']*$rec['price']);
						}else{
							$_SESSION['uw_store_cart']['total'] = $_SESSION['uw_store_cart']['total'] + ($_SESSION['uw_store_cart']['records'][$rec['id']] * $rec['price']);
						}
					}
				}
			}
		}

	}

	if(isset($_POST['clear'])){
		unset($_SESSION['uw_store_cart']);
	}

	if(!isset($_SESSION['uw_store_cart'])){
		$cart = '{
			"count": 0,
			"total": 0,
			"records": []
		}';
	}else{
		if(!isset($_POST['list'])){
			$cart = json_encode($_SESSION['uw_store_cart']);
		}else{
			$records = json_decode(file_get_contents('store.json'), true);
			
			foreach($records['records'] as $rec){
				$items[$rec['id']] = $rec;
			}


			foreach($_SESSION['uw_store_cart']['records'] as $id=>$count){
				$item_record = $items[$id];
				$item_record['count'] = $count;
				$item_record['total'] = $count * $items[$id]['price'];

				$item_records[] = $item_record;

			}

			$cart['total'] = $_SESSION['uw_store_cart']['total'];
			$cart['count'] = $_SESSION['uw_store_cart']['count'];
			$cart['records'] = $item_records;

			if(isset($_SESSION['uw_store_cart']['images'])){
				$cart['images'] = $_SESSION['uw_store_cart']['images'];
			}

			$cart = json_encode($cart);
		}
	}

	echo $cart;

?>