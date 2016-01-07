<!DOCTYPE html>
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
                    <h2 style="color:black">Sign up</h2>
						<form action="signing.php" method="post" name="signup" id="contact-form" onsubmit="return validateForm()">
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
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name: <input type="text" value="" class="input-text m-wrap m-ctrl-large" id="Name" name="Name" placeholder="Name" Required pattern="[a-zA-Z ]{3,}"/>
                                    </div>
                                    <div class="field span8">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password: <input type="Password" value="" class="input-text m-wrap m-ctrl-large" id="password" name="password" placeholder="password" required pattern="[a-z0-9A-Z_]{6,}"/>
                                    </div>
                                    <div class="field span8">
                                        Confirm Password: <input type="Password" value="" class="input-text m-wrap m-ctrl-large" id="confPass" name="confPassword" placeholder="Confirm Password"/>
                                    </div>
									<div class="field span8">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address: <textarea name="Address" class="input-textarea m-wrap m-ctrl-large" placeholder = "Address" rows = 5 ></textarea>
									</div>
                                    <div class="field span8">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Debit Card: <input type="text" value="" class="input-text m-wrap m-ctrl-large" id="debit" name="Debit" placeholder="debit Card" required pattern="[0-9]{4,16}"/>
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
