<!DOCTYPE html>
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
		
	
		<!--<script src="js/jquery.isotope.min.js"></script>
        <script src="js/custom.js"></script>-->
		
    </head>
<body>
        <!-- HEADER CONTAINER -->
        <?php require_once 'template/header.php'; ?>
        <!-- PORTFOLIO -->
        <div class="row-fluid section" id="portfolio">
            <div class="container"> 
                <div class="explain"><br/>
                    <span class="intro">Products</span>
                    <!-- Start Portfolio Navigation -->
                    </br>
					<img src="images/back.jpg">
					<nav class="primary m-btn-group toggle-buttons clearfix"> 
                        <br/>
						<ul> 
							<?php
								
								$con=mysqli_connect("localhost","root","","honey");
								// Check connection
								if (mysqli_connect_errno())
									{
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
									}
								else
								{
									$Sql_Query="select id,Main_Title from plastic order by Priority";
									$result = mysqli_query($con,$Sql_Query);
									while($row = mysqli_fetch_array($result))
									{
										?><li> <a class="fancybox fancybox.iframe m-btn" style="width:550px" href='product.php?product_id=<?php echo $row['id']."' >".$row['Main_Title'];?></a></li>
										<?php
									}
								}
							?>
							
                        </ul> 
                    </nav>
                </div>
            </div>
        </div>
        <!-- End PORTFOLIO -->
       <?php require_once 'template/footer.php'; ?> 
		<script>
				$(document).ready(function() {
				
					$('.fancybox').fancybox({
							
						"padding": 0,

						"overlayColor": "#000000",  // here you set the background black
						"overlayOpacity": 1,
						

						"openEffect" : 'elastic',
						"openSpeed"  : 150,

						"closeEffect" : 'elastic',
						"closeSpeed"  : 150,

						"closeClick" : true,
						
						helpers : { 
							   overlay: {
									css: {'background' : 'rgba(0, 0, 0, .8)'} // or your preferred hex color value
							   } // overlay 
							  }
					});
					
					<?php
						if(isset($_GET['hp']))
							{
								echo '$(".fancybox").first().fancybox().trigger("click");';
							}
					
					?>
				});
		</script>
    </body>
</html>
