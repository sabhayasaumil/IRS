
<?php
										$inventory['cust_id'] = "\\\\place you customer id here";
										$inventory['hash'] = "\\\\place identifier given when you get b2b";
										$inventory['ret_port'] = "\\\\place port address which you listen to";
										$newF = fopen("b2b.conf", "w");
										echo fwrite($newF,json_encode($inventory));
										fclose($newF)

?>