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
                    <h2 style="color:black">Income Tax</h2>
						<form action="IncomeTaxProcess.php" method="post" name="incometax" id="contact-form" onsubmit="return validateForm()">
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
                                        Annual Income: <input type="text" value="" class="input-text m-wrap m-ctrl-large" id="an_inc" name="an_inc" placeholder="Annual Income" Required pattern="[0-9]{1,}[.]{0,1}[0-9]{0,2}"/>
                                    </div>
                                    <div class="field span8">
                                        Marrital Status: <select name = "mar_status" required placeholder="Marrital Status">
											<option Value="single">Single</option>
											<option Value="married">Married</option>
										</select>
                                    </div>
                                    <div class="field span8">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dependent: <input type="text" value="" class="input-text m-wrap m-ctrl-large" id="confPass" name="dependent" placeholder="Number of dependent" required pattern="[0-9]{0,2}"/>
                                    </div>
									<div class="field span8">
                                        &nbsp;&nbsp;Social Security: <input type="text" value="" class="input-text m-wrap m-ctrl-large" id="SSN" name="ssn" placeholder="Social Security" required/>
                                    </div>
                                    <div class="field span8">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Age: <input type="text" value="" class="input-text m-wrap m-ctrl-large" id="confPass" name="age" placeholder="Age" required pattern="[0-9]{0,2}"/>
                                    </div>
									<div class="field span8">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Exemption: <input type="text" value="" class="input-text m-wrap m-ctrl-large" id="confPass" name="exemption" placeholder="Exemption" required pattern="[0-9]{0,5}"/>
                                    </div>
									<div class="field span8">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Installments: <select name = "installment" required placeholder="Installment">
											<option Value="no">no</option>
											<option Value="Yes">Yes</option>
										</select>
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
