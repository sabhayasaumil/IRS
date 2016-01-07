<?php
	$min = $_POST['min_value'];
	$max = $_POST['max_value'];
	$value = $_POST['user_amount'];
	if($value < $min)
		$value = $min;
	else if($value > $max)
		$value = $max;
	
	$new_tax['Amount'] = $value;
	$new_tax['type'] = "installment";
	$new_tax['order_id'] = $_POST['order_id'];
	setcookie("new",json_encode($new_tax),time()+60,"/");
	header( 'Location: cart.php?add=1' ) ;
?>