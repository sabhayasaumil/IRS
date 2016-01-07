<?php
	if(isset($_COOKIE['id']) && isset($_POST))
		{
								$id = $_COOKIE['id'];
								$an_inc = $_POST['an_inc'];
								$mar_status = $_POST['mar_status'];
								$mar_status_Bol = 1;
								if($mar_status == 'single')
									$mar_status_Bol = 0;
								$dependent = $_POST['dependent'];
								$ssn = $_POST['ssn'];
								$age  = $_POST['age'];
								$exemption = $_POST['exemption'];
								$installment = $_POST['installment'];
								$cart = json_decode($_COOKIE['cart']);
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
											<h3>Income Tax Return</h3>
											<h4>Annual Income: $<?php echo $an_inc;?>
											</br> Marrital Status: <?php echo $mar_status;?>
											</br> Number of Dependents: <?php echo $dependent;?>
											</br> Age: <?php echo $age;?>
											</br> SSN: <?php echo $ssn;?> 
											</br> Exemption: $<?php echo $exemption;?>
											</br> Applied for Installments: <?php echo $installment;?>
											</br> Total Tax To be Paid: $
											<?php
												$taxable_income = $an_inc;
												$taxable_income = $taxable_income - $exemption;
												$taxable_income = $taxable_income - 3650 * $dependent;
													$tax = 0;
													$total = 0;
												if($taxable_income < 0)
														$taxable_income = 0;
												else
												{
														if($taxable_income < 13150)
														{
															$tax = $taxable_income / 10;
														}
														else
														{
															$tax = 1315;
															$total = 13150;
															$taxable_income = $taxable_income - 13150;
															if($taxable_income+$total < 49400)
															{
																$tax = $tax + $taxable_income * 0.15;	
															}
															else
															{
															$new_Tax = (49400-13150)*0.15;
															$tax = $tax + $new_Tax;
															$total = $total+49400 - 13150;
															$taxable_income = $taxable_income - 49400 + 13150 ;
															
															if($taxable_income+$total < 127550)
															{
																$tax = $tax + $taxable_income * 0.25;	
															}
															else
															{
															$new_Tax = (127550-49400)*0.25;
															$tax = $tax + $new_Tax;
															$total = $total+127550 - 49400;
															$taxable_income = $taxable_income - 127550 + 49400;
															
															if($taxable_income+$total < 206600)
															{
																$tax = $tax + $taxable_income * 0.28;	
															}
															else
															{
															$new_Tax = (206600-127550)*0.28;
															$tax = $tax + $new_Tax;
															$total = $total+206600 -127550;
															$taxable_income = $taxable_income - 206600+127550 ;
															
															if($taxable_income+$total < 405100)
															{
																$tax = $tax + $taxable_income * 0.33;	
															}
															else
															{
															$new_Tax = (405100-206600)*0.33;
															$tax = $tax + $new_Tax;
															$total = $total+405100 - 206600;
															$taxable_income = $taxable_income - 405100+ 206600 ;
															
															if($taxable_income+$total < 432200)
															{
																$tax = $tax + $taxable_income * 0.35;	
															}
															else
															{
															$new_Tax = (432200-405100)*0.35;
															$tax = $tax + $new_Tax;
															$total = $total+432200-405100;
															$taxable_income = $taxable_income - 432200 +405100;
															$tax = $tax + $taxable_income*0.396;
															
															}
															
															}
																
															}
															}
															}
														}
												}
												
												echo $tax;
													$new_tax['Amount'] = $tax;
													$new_tax['Total_Amount'] = $tax;
													$new_tax['type'] = "Income";
													
												if($installment == 'Yes')
												{
													
													echo "</br> Monthly Installments Value: " . round($tax/12.00 , 2);
													$new_tax['Amount'] = round($tax/12.00 , 2);
												}
														$query = $_COOKIE['id']."%$%".$an_inc."%$%".$mar_status_Bol."%$%".$dependent."%$%".$ssn."%$%" .$age."%$%".$exemption."%$%";
														$new_tax['query'] = $query;
														$new_tax['file_name'] = "income_tax";
														setcookie("new",json_encode($new_tax),time()+60,"/");
											?>
											</br><input type = 'submit' value ='Back' name = 'Back' onclick="history.go(-1)">
											<a href = 'cart.php?add=1'>
												<input type = 'submit' value ='Add To Cart' name = 'Add To Cart'>
											</a>
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
