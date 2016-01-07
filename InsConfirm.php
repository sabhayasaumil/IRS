<?php
								if(isset($_POST['Name']))
								{
									require_once 'template/DatabaseConn.php';
								// Check connection
										$max = $_POST['max_value'];
										$min = $_POST['min_value'];
										$user= $_POST['amountpl'];
										if($user < $min)
											$amount = $min;
										else if($user < $max)
											$amount = $user;
										else	
											$amoung = $max;
										$ship_met = $_POST['amount']
										$total = $amount;
										if($ship_met == 'p')
											$total = $total + 2;
										$address = $_POST['address'];
										$debit = $_POST['debit'];
										
									//B2b with bank and get confirmation number, payemtn info
									// insert into payment =_history table,
									// decrement an installment number by 1
									// order confirmation number
									//update required database
										
										
										
								}

?>
