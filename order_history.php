<?php
								$myfile = fopen("data/payment_history.txt", "r") or die("Unable to open file!");
										$file = fread($myfile,filesize("data/payment_history.txt"));
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
												//echo $row[1]."---".$id."</br>";

											if($row[1] == $id)
												{
													$tab_cont = $tab_cont."<tr><th>".$row[0]."</th><th>".$row[2]."</th><th>".$row[3]."</th><th>".date("m-d-Y", $row[4])."</th><th>".$row[5]."</th><th>".$row[8]."</th><th>".$row[12]."</th></tr>"; 
												}
											}
										}

								
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
									<title>Payment History</title>
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
											<th>Confirmation</th>
											<th>Amount</th>
											<th>Method</th>
											<th>Date</th>
											<th>Order</th>
											<th>Payment Confirmation</th>
											<th>Shipping Confirmation</th>
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


