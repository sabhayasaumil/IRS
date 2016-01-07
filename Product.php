<?php
	$inv['Income'] = 0;
	$inv['Business'] = 0;
	$inv['Sales'] = 0;
	$inv['Property'] = 0;
	$newF = fopen("data/inventory.txt", "w");
	fwrite($newF,json_encode($inv));
	fclose($newF);

?>