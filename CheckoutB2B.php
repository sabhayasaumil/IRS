<!DOCTYPE html>
<?php
if(isset($_COOKIE['id']))
					{
						
						if(isset($_COOKIE['buyB2B']))
						{
							//Do the process of buying and modify the table accordingly
							setcookie("buyB2B","false",time()-3600,"/");
						}
						$id = $_COOKIE['id'];
						$port = 103
						$hash = hash('ripemd160', $id.time());
						$myfile = fopen("data/B2B.txt", "r") or die("Unable to open file!");
										$file = fread($myfile,filesize("data/B2B.txt"));
										
										$data = explode("$%$", $file);
										$port = $port.sprintf("%02d", (count($data) - 1));
										
										$id_s = $id."%$%".$hash."%$%".$port."$%$\n";
										$file = $file.$id_s;
										
										$newF = fopen("data/B2B.txt", "w");
										echo fwrite($newF,$file);
										
										fclose($newF);	
						
?>
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
                    <h2 style="color:black">Details of B2B</h2>
							Customer ID: <?php echo $_COOKIE['id'];?>
							Identifier: <?php echo $port;?>
							Receiver Port: <?php echo $port;?>
							Request Port: 10300
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
