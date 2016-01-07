<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>IRS</title>
        <?php require_once 'template/commonJS.php'; ?>
    </head>

    <body background="images/6.png"  style=" background-attachment:fixed;">
        <?php require_once 'template/header.php'; ?>

		<?php
		if(!isset($_COOKIE['id']))
		{
				if(isset($_COOKIE['Error']))
					{
						?>
							<div class="row-fluid section" id="about">
							<div class="container">
						<?php
						echo "<h3 style='color:red'>".$_COOKIE["Error"]."</h3>";
					}
					require('loginpage.php');
						
						

            
				
		}
		else
		{
				if(isset($_COOKIE['su']))
					{
						?>
							<div class="row-fluid section" id="about">
							<div class="container">
						<?php
						echo "<h3 style='color:red'>".$_COOKIE["su"]."</h3></div></div>";
					}
		
		?>
		
		
			<?php require_once 'TaxSelector.php'; ?>
        

		
		<?php
				}
		?>
        <?php require_once 'template/footer.php'; ?>
    </body>
</html>
