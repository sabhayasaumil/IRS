<?php
								if(isset($_POST['Name']))
								{
										$id = "0300";
										$myfile = fopen("data/cust_rec.txt", "r") or die("Unable to open file!");
										$file = fread($myfile,filesize("data/cust_rec.txt"));
										$data = explode("$%$", $file);
										$id = $id.sprintf("%02d", (count($data) - 1));
										
										$id_s = $id."%$%".$_POST['password'];
										$id_s = $id_s."%$%".$_POST['Name'];
										$id_s = $id_s."%$%".$_POST['Address'];
										$id_s = $id_s."%$%".$_POST['Debit']."$%$\n";
										
										$file = $file.$id_s;
										$newF = fopen("data/cust_rec.txt", "w");
										echo fwrite($newF,$file);
										
										fclose($newF);	
											
											setcookie("id", $id, time() + 1800, "/");
											setcookie("name", $_POST['Name'], time() + 1800, "/");
											setcookie("su","your user id is ".$id,time()+300,"/");
											setcookie("cart",json_encode(null),time()+36000,"/");
											
										
								}
								
								header( 'Location: index.php' ) ;
?>
