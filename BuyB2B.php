<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>IRS</title>
        <?php require_once 'template/commonJS.php'; ?>
    </head>

    <body background="images/6.png"  style=" background-attachment:fixed;">
        <?php require_once 'template/header.php'; ?>
        <div class="row-fluid section" id="about">
            <div class="container"> 

                <div class="explain" style="margin-left:400px">
                    <h2 style="color:black">Get B2B</h2>
									By B2B you can send sales tax at the moment you sell an item.
									
									format of B2B(B2B.conf file skeloton of this file is already given when you download b2b):</br>
									cust_id:030XX</br>
									out_port:103XX</br>
									bank_name(npz|hawksbank):</br>
									debit:</br>
									shipping_company_name(zest|quickship):</br>
									shipping_met(ground | priority):</br>
									shipping_address: </br>
									amount:</br>

									-this is the format of B2B file</br>
									-your output port will be 103XX where XX is the last 2 digits of our customer id.</br>
									-bank_name should be npz or hawksbank in small characters</br>
									-order of the data should not be altered.</br>
									-no new line character in Shipping address</br>
									-no comma in amount details.</br>
									-Output file will be the conformation number.</br>
									-if by chance the server crashes do inform us at 646-322-4614 soon as possible.</br>
									
                                    </br><a href="downloadb2b.php" target="_blank"><button>Download Client</button></a>
											
                    </div> 
                </div>
            </div>

        <!-- FOOTER -->
        <?php require_once 'template/footer.php'; ?>
    </body>
</html>
