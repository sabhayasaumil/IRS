<?php
								$myfile = fopen("data/order_rec.txt", "r") or die("Unable to open file!");
										$file = fread($myfile,filesize("data/order_rec.txt"));
										$tab_cont = "";
										$data = explode("$%$", $file);
										unset($data[0]);
										$id = $_COOKIE['id'];
										
										foreach ($data as $value)
										{
											
											$exp = trim($value);
											if($exp != null)
											{
											$row = explode("%$%", $value);

											if($row[1] == $id)
												{
													$tab_cont = $tab_cont."<tr><th>".$row[0]."</th><th>".$row[3]."</th><th>".$row[2]."</th><th>".$row[5]."</th><th>".$row[4]."</th><th><a href='payment_history.php?o_i=".$row[0]."&rem=".$row[4]."&ins=".$row[5]."' >History</a>";
													if($row[5]>0)
													{
															$tab_cont = $tab_cont."</br><a href='payInstallments.php?o_i=".$row[0]."&rem=".$row[4]."&ins=".$row[5]."' >pay Here</a>";
													}
													$tab_cont = $tab_cont."</th></tr>";
												}
											}
										}
										
								//echo "";
								
								
?>

<?php
	if(isset($_COOKIE['id']) && isset($_POST))
		{
								$id = $_COOKIE['id'];

								
								?>
								
							<!DOCTYPE html>
							<html>
								<head>
									<meta charset="utf-8">
									<title>Remaining Installments</title>
									<meta name="viewport" content="width=device-width, initial-scale=1.0">
									<meta name="description" content="Twitter Bootstrap Template. This starter template is a great place to start your Bootstrap Projects.">
									<meta name="author" content="LittleSparkVT">
									<?php require_once 'template/commonJS.php'; ?>
								</head>
								<body>
									<!-- HEADER CONTAINER -->
									</br>
									<?php require_once 'template/header.php'; ?>
									<!-- CONTACT -->
									<div class="row-fluid section" style="padding-left:180px;" id="contact">
											<table border = 1 cellpadding = 10>
											<tr>
											<th>Order Id</th>
											<th>Type of Tax</th>
											<th>Amount</th>
											<th>number of installments remaining</th>
											<th>Remaining  Balance</th>
											<th>Link to pay</th>
											</tr>

											<?php
												echo $tab_cont;
 											?>

											</table>
										</div>


									<?php require_once 'template/footer.php'; ?>

									<script src="js/jquery.js"></script>
									<script src="js/bootstrap.js"></script>
								</body>
							</html>
<?php								

		}
		else
		{						
								header( 'Location: index.php' ) ;
		}
?>


