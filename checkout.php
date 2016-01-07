<!DOCTYPE html>
<?php
if(isset($_COOKIE['id']) && json_decode($_COOKIE['cart']) != null)
					{
						$ship = $_POST['ship'];
						$ship_met = $_POST['ship_met'];
						$bank = $_POST['bank'];
						$debit = $_POST['debit'];
						$address = $_POST['address'];
						$order = NULL;
						$cart = json_decode($_COOKIE['cart']);
						$total = $_POST['total'];
						$order_rec = null;
						$order_rec_amount = null;
						$myfile = fopen("data/inventory.txt", "r") or die("Unable to open file!");
						$file = fread($myfile,filesize("data/inventory.txt"));
						$inventory_l = json_decode($file);
						$inventory['Income'] = $inventory_l->Income;
						$inventory['Business'] = $inventory_l->Business;
						$inventory['Sales'] = $inventory_l->Sales;
						$inventory['Property'] = $inventory_l->Property;
						
						$total = $_POST['total'];
						$total = $total + 10;
						if($ship_met == "priority")
						$total = $total + 10;
					
						$order_ids = null;
						$order_payments = null;
						
						foreach ($cart as $value)
						{
								if($value->type == "installment")
								{
									$order[]=array('order_id' => $value->order_id, 'amount' => $value->Amount);
									$order_rec[] = $value->order_id;
									$order_rec_amount[$value->order_id] = $value->Amount;
									$order_ids[] = $value->order_id;
									$order_payments[] = $value->Amount;
								}
								else
								{
										$Sql_Query = $value->query;
										$file_name = $value->file_name;
										$id = "0320";
										$ins = 12;
										if($value->Total_Amount == $value->Amount)
										$ins = 1;
										$myfile = fopen("data/order_rec.txt", "r") or die("Unable to open file!");
													$file = fread($myfile,filesize("data/order_rec.txt"));
													$data = explode("$%$", $file);
													$id = $id.sprintf("%02d", (count($data) - 1));
													$inventory[$value->type]++;
													$id_s = $id."%$%".$_COOKIE['id'];
													$id_s = $id_s."%$%".$value->Total_Amount;
													$id_s = $id_s."%$%".$value->type;
													$id_s = $id_s."%$%".$value->Total_Amount;
													$id_s = $id_s."%$%".$ins."$%$\n";
													
													$file = $file.$id_s;
													$newF = fopen("data/order_rec.txt", "w");
													fwrite($newF,$file);
													
													fclose($newF);	
									
										$order[]=array('order_id' => $id, 'amount' => $value->Total_Amount);
										$Sql_Query = $Sql_Query.$id."$%$";
										$order_rec[] = $id;
										$order_rec_amount[0+$id] = $value->Amount;
										$order_ids[] = $id;
										$order_payments[] = $value->Amount;
										$myfile = fopen("data/".$file_name.".txt", "r") or die("Unable to open file!");
										$file = fread($myfile,filesize("data/".$file_name.".txt"));
										$newF = fopen("data/".$file_name.".txt", "w");
										fwrite($newF,$file.$Sql_Query);
										fclose($newF);
								}
						}
						$newF = fopen("data/inventory.txt", "w");
										fwrite($newF,json_encode($inventory));
										fclose($newF);
						
						setcookie("cart",json_encode(NULL),time()+3600,"/");
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
                    <h2 style="color:black">Checkout</h2>
						

<?php
		
?>
<?php
		
		$order_rec_merge = implode("," , $order_rec);
		$myfile = fopen("data/order_rec.txt", "r") or die("Unable to open file!");
		$file = fread($myfile,filesize("data/order_rec.txt"));
		$data = explode("$%$", $file);
		$print = $data[0]."$%$";
		unset($data[0]);

			$id = $_COOKIE['id'];
									
				foreach ($data as $value)
						{
							$exp = trim($value);
							if($exp != null)
							{
							$row = explode("%$%", $exp);
							
							if(in_array($row[0], $order_rec) )
								{
									 $print = $print.$row[0]."%$%";
									 $print = $print.$row[1]."%$%";
									 $print = $print.$row[2]."%$%";
									 $print = $print.$row[3]."%$%";
									 $key = array_search($row[0], $order_ids); 
									 $remaining = $row[4] - $order_payments[$key];
									
									 $print = $print.$remaining."%$%";
									 $ins = $row[5] - 1;
									 if($remaining == 0 )
										 $ins = 0;
									 $print = $print.$ins."$%$";
								}
								else
								{
									$print = $print.$exp."$%$\n";
								}
							}
							
						}
				$newF = fopen("data/order_rec.txt", "w");
				fwrite($newF,$print);						
				
		
		$myfile = fopen("data/payment_history.txt", "r") or die("Unable to open file!");
		$file = fread($myfile,filesize("data/payment_history.txt"));
		$print = $file;
		
		$data = explode("$%$", $file);
		$pay_id = "033".sprintf("%02d", (count($data) - 1));
		$print = $print.$pay_id."%$%".$_COOKIE['id']."%$%".$total."%$%Online%$%".time()."%$%".$order_rec_merge."%$%".$bank."%$%".$debit."%$% %$%".$ship."%$%".$ship_met."%$%".$address."%$% $%$";
		$newF = fopen("data/payment_history.txt", "w");
		fwrite($newF,$print);	
		
		$myfile = fopen("data/payment.txt", "r") or die("Unable to open file!");
		$file = fread($myfile,filesize("data/payment.txt"));
		$print = $file;
		$print = $print."\n".$pay_id."%$%".$_COOKIE['id']."%$%".$total."%$%".$bank."%$%".$debit."%$%".$ship."%$%".$ship_met."%$%".$address."$%$";
		$newF = fopen("data/payment.txt", "w");
		fwrite($newF,$print);
		echo "<h4>Confirmation Number: ".$pay_id."</h4>";
		exec("java payconf");
		?>

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
