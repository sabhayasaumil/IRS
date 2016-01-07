<!DOCTYPE html>
<?php
if(isset($_COOKIE['id']))
					{
						$cart = json_decode($_COOKIE['cart']);
						$total = 0;
						
						if(isset($_GET['add']) && isset($_COOKIE['new']))
						{
							$cart[] = json_decode($_COOKIE['new']);
							setcookie("new","",time()-2000,"/");
							setcookie("cart",json_encode($cart),time()+3600,"/");
							header( 'Location: cart.php' ) ;
						}
						else if(isset($_GET['delete']))
						{
							$i = 0;
							$cart_new = NULL;
							foreach ($cart as $value)
							{
								if($i++ != ($_GET['delete']))
								{
									$cart_new[] = $value;
								}
							}
							$cart = $cart_new;
							setcookie("cart",json_encode($cart),time()+18000,"/");
							header( 'Location: cart.php' ) ;
						}	


						
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>IRS</title>
        <?php require_once 'template/commonJS.php'; ?>
		<script>
			function myFunction() {
				var x = document.forms["checkout"]["amount"].value;
				var y = document.forms["signup"]["ship_met"].value;;
				if (y.equals("p")) {
					document.getElementById("amountpl").innerHTML = x + 2;
				}
				else
				{
					document.getElementById("amountpl").innerHTML = x;
				}
			}
		</script>
    </head>

    <body background="images/6.png"  style=" background-attachment:fixed;">
        <?php require_once 'template/header.php'; ?>
        <div class="row-fluid section" id="about">
            <div class="container"> 

                <div class="explain" style="margin-left:400px">
                    <h2 style="color:black">Checkout</h2>
					<?php
					if($cart != NULL)
					{
					?>
					<table border = 1 cellpadding = 10>
						<tr>
							<td>Type Of Tax</td>
							<td>Amount</td>
							<td></td>
						</tr>
						<?php
						$i = 0;
						$total = 0;
						foreach ($cart as $value)
							{
								//print_r($values)
							$total = $total + $value->Amount;
							echo "<tr><td>".$value->type." tax</td><td>".$value->Amount."</td><td><a href = 'cart.php?delete=".$i++."'> remove </a></td></tr>";
							}
						?>
					</table>
						<form action="checkout.php" method="post" name="checkout" id="contact-form">
                            <fieldset>
                                <div class="row"> 
                                    <div class="holder span8">
                                        <div class="message">
                                            <div class="top"></div>
                                            <div class="contents">
                                                <div id="alert"></div>
                                            </div>
                                            <div class="bottom"></div>
                                        </div>
                                    </div>
                                    <div class="field span8">
									
                                        <input type="Hidden" value="<?php echo $total?>" class="input-text m-wrap m-ctrl-large" id="an_inc" name="total"/>
										Amount To be Paid: <span name="amountplace" id="amountpl"><?php echo $total?></span>
                                    </div>
									<div class="field span8">
                                        Shipping Firm: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name = "ship" required placeholder="Shipping Method " onchange="myFunction()">"
											<option value="zest">ZEST</option>
											<option value="quickship">Quick Ship</option>
										</select>
                                    </div>
                                    <div class="field span8">
                                        Shipping Method: <select name = "ship_met" required placeholder="Shipping Method " onchange="myFunction()">"
											<option value="ground">Ground $10</option>
											<option value="priority">Priority $20</option>
										</select>
                                    </div>
                                    <div class="field span8">
									Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="address" class="input-textarea m-wrap m-ctrl-large" placeholder = "Address" rows = 5 ></textarea>
									</div>
                                    <div class="field span8">
                                    Bank Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name = "bank" required placeholder="Bank " onchange="myFunction()">"
											<option value="npz">NPZ Bank</option>
											<option value="hawksbank">Hawks Bank</option>
										</select>
                                    </div>
									<div class="field span8">
                                        Debit: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="" class="input-text m-wrap m-ctrl-large" id="debit" name="debit" placeholder="debit Card" required pattern="[0-9]{4,16}"/>
                                    </div>
									<div class="field span8">
                                        <input type="submit" class="m-btn" value="Confirm Payment" />
                                    </div>
                                </div>
                                    
                            </fieldset>
                        </form>
						<?php
							}
							else
							{
								echo "<b>Cart Is Empty</b></br><a href ='.' ><b>Add Some Products to cart</b></a>";
							}
						?>
                    </div> 
                </div>
            </div>

        <!-- FOOTER -->
        <?php require_once 'template/footer.php'; ?>
    </body>
</html>

<?php

	}
	else
	{
		header( 'Location: index.php' ) ;
		
	}
?>
