<?php
	if(isset($_COOKIE['id']) && isset($_POST))
		{
								$id = $_COOKIE['id'];
								$profit = $_POST['profit'];
								$address = $_POST['address'];
								
								?>
								
							<!DOCTYPE html>
							<html>
								<head>
									<meta charset="utf-8">
									<title>IRS</title>
									<meta name="viewport" content="width=device-width, initial-scale=1.0">
									<meta name="description" content="Twitter Bootstrap Template. This starter template is a great place to start your Bootstrap Projects.">
									<meta name="author" content="LittleSparkVT">
									<?php require_once 'template/commonJS.php'; ?>
									<style>
										[class^="icon-"], [class*=" icon-"]{vertical-align:middle!important;}
										li [class^="icon-"], li [class*=" icon-"]{text-align:left;}
									</style>
								</head>
								<body>
									<!-- HEADER CONTAINER -->
									<?php require_once 'template/header.php'; ?>
									<!-- CONTACT -->
									<div class="row-fluid section" style="padding-left:180px;" id="contact">
											</br>
											<h3>Business Tax Return</h3>
											<h4>Profit: $<?php echo $profit;?>
											</br> Address: $<?php echo $address;?>
											</br> Total Tax To be Paid: $
											<?php
												$tax = $profit * 0.07;
												
												echo $tax;
												$new_tax['Amount'] = $tax;
												$new_tax['Total_Amount'] = $tax;
												$new_tax['type'] = "Business";
											?>
											</br><input type = 'submit' value ='Back' name = 'Back' onclick="history.go(-1)">
											<a href = 'cart.php?add=1'>
												<input type = 'submit' value ='Add To Cart' name = 'Add To Cart'>
											</a>
											<?php
														$query = $_COOKIE['id']."%$%".$address."%$%".$profit."%$%";
														$new_tax['query'] = $query;
														$new_tax['file_name'] = "business_tax";
														setcookie("new",json_encode($new_tax),time()+60,"/");
														
												?>
											</h4>
											
												
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
