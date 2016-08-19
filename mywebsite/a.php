<?php 
	$fibo = array();
	$fibo[0] = 0;
	$fibo[1] = 1;
	for($i = 2; $i<10; $i++){
		$fibo[$i] = $fibo[$i-2] + $fibo[$i-1];
	}
	for ($i= 0; $i < 10; $i++) { 
		echo ($fibo[$i]."<br />");
	}
 ?>