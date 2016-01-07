<!DOCTYPE html>
<?php
if(isset($_COOKIE['id']))
					{
						$order_id = $_GET['o_i'];
						$rem_amount = $_GET['rem'];
						$no_ins = $_GET['ins'];
						
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
                    <h2 style="color:black">Payment of Installments</h2>
						<form action="PayingIns.php" method="post" name="checkout" id="contact-form">
                            <fieldset>
                                <div class="row"> 
									<div class="field span8">
                                        <input type="Hidden" value="<?php echo round($rem_amount)?>" class="input-text m-wrap m-ctrl-large" id="max_value" name="max_value"/>
										<input type="Hidden" value="<?php echo $order_id?>" class="input-text m-wrap m-ctrl-large" id="order_id" name="order_id"/>
										<input type="Hidden" value="<?php echo round($rem_amount/$no_ins,2)?>" class="input-text m-wrap m-ctrl-large" id="min_value" name="min_value"/>
										Minimum Amount To be Paid: <span name="amountplace" id="amountpl"><?php echo round($rem_amount/$no_ins,2);?></span>
                                    </div>
									<div class="field span8">
                                        <input type="text" value="" class="input-text m-wrap m-ctrl-large" id="user_amount" name="user_amount" placeholder="Amount you like to pay" required pattern="[0-9]{0,11}"/>
                                    </div>
									<div class="field span8">
                                        <input type="submit" class="m-btn" value="Confirm Payment" />
                                    </div>
                                </div>
                                    
                            </fieldset>
                        </form>
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
