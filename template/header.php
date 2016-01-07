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
					<span float="right" class="nav pull-right"><b>Welcome, 
					<?php
					if(isset($_COOKIE['id']))
					{
						echo " ".$_COOKIE['name']."(".$_COOKIE['id']." )";
						echo " <a href=\"logout.php\">Logout</a>";
					}
					else
					{
						echo " Guest";
						
					}
					echo "</b>"
					?></span></br>
					<?php
					if(isset($_COOKIE['id']))
					{
					?>	
					
                    <ul class="nav pull-right">
					<li><a href="."><b>Catalogue</b></a></li>
                    <li><a href="info.php"><b>info</b></a></li>
					<li><a href="order_history.php"><b>Order History</b></a></li>
					<li><a href="cart.php"><b>Cart(<?php echo count(json_decode($_COOKIE['cart'])); ?>)</b></a></li>					
                    </ul>
					</b>
					<?php
					}
					?>
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="pagination-centered mobilelogo hidden-desktop">                  
    <a href="index.html">
        <h1 class="brand hidden-phone hidden-tablet">
                    <a href="index.php">
                        <span style="font-size:50.0pt;font-family:'HandelGotDBol','sans-serif';color:#dc050d"><b>IRS</b></span>
                    </a>                            
                </h1>
    </a>
</div>