
<?php
										$inventory['income'] = 0;
										$inventory['property'] = 0;
										$inventory['sales'] = 0;
										$inventory['business'] = 0;
										$inventory['b2b'] = 0;
										$newF = fopen("data/inventory.txt", "w");
										echo fwrite($newF,json_encode($inventory));
										fclose($newF)

?>