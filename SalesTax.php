<!DOCTYPE html>
<?php
if(isset($_COOKIE['id']))
					{
?>	
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>IRS</title>
        <?php require_once 'template/commonJS.php'; ?>
		<script>
			function validateForm() {
				var x = document.forms["signup"]["password"].value;
				var y = document.forms["signup"]["confPassword"].value;
				if (x != y) {
					alert("Confirm Password should match");
					return false;
				}
			}
		</script>
    </head>

    <body background="images/6.png"  style=" background-attachment:fixed;">
        <?php require_once 'template/header.php'; ?>
        <div class="row-fluid section" id="about">
            <div class="container"> 

                <div class="explain" style="margin-left:400px">
                    <h2 style="color:black">Sales Tax</h2>
						<form action="SalesTaxProcess.php" method="post" name="signup" id="contact-form" onsubmit="return validateForm()">
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
                                        Total Sales: <input type="text" value="" class="input-text m-wrap m-ctrl-large" id="sales" name="sales" placeholder="Total Sales Amount" Required pattern="[0-9]{1,}"/>
                                    </div>
                                    <div class="field span8">
                                        <input type="submit" class="m-btn" value="Submit" />
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