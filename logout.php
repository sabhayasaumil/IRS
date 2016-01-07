<!DOCTYPE html>
<?php
	setcookie('id','',time()-3600,"/");
	setcookie('name','',time()-3600,"/");
	setcookie("cart","",time()-1800,"/");
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>IRS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Starter Twitter Bootstrap Template. This starter template is a great place to start your Bootstrap Projects.">
        <meta name="author" content="LittleSparkVT">
        <?php require_once 'template/commonJS.php'; ?>
		        <!-- Javascripts -->
        <!--<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>-->
		<!--<script src="js/jquery.fancybox.pack.js"></script>-->
		<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.5"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
		

		
    </head>
<body>
        <!-- HEADER CONTAINER -->
		<div class="row header">
    <!-- NAV --> 
    <nav class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar btntop" data-toggle="collapse" data-target=".nav-collapse" style="background-color:white;"><img src="images/logox.png" style="height:60px"></a>
                <h1 class="brand hidden-phone hidden-tablet">
                    <a href="index.php">
                        <img src="images/IRSlogo.jpg" style="height:60px">
                    </a>                            
                </h1>
                <div class="nav-collapse">
                    <ul class="nav pull-right">
					<li><a>Welcome, Guest"
					
					
                    </a><li>    
						
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

		
		
		
		
		
		
		
        <!-- PORTFOLIO -->
        <div class="row-fluid section" id="portfolio">
            <div class="container"> 
                <div class="explain"><br/>
                    <span class="intro">Logget Out SuccessFully</span>
                    <!-- Start Portfolio Navigation -->
				</div>
            </div>
        </div>
        <!-- End PORTFOLIO -->
       <?php require_once 'template/footer.php'; ?> 
    </body>
</html>
