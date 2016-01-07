<?php
								if(isset($_POST['username']))
								{
									
								// Check connection
										$username = $_POST['username'];
										$password = $_POST['password'];
										$myfile = fopen("data/cust_rec.txt", "r") or die("Unable to open file!");
										$file = fread($myfile,filesize("data/cust_rec.txt"));
										$set = "";
										$data = explode("$%$", $file);
										$boolean = true;
										unset($data[0]);
										foreach ($data as $value)
										{
											$exp = trim($value);
											$set = explode("%$%", $value);
											if($set[1] == $password && $set[0]== $username)
											{
												setcookie("id", trim($set[0]), time() + 18000, "/");
												setcookie("name", $set[2], time() + 18000, "/");
												setcookie("cart",json_encode(NULL),time()+18000,"/");
												$boolean = false;
												break;
											}
										}
												if($boolean)
												setcookie("Error", "Invalid Username And Password", time() + 5, "/");
												
										
								}
								
								header( 'Location: index.php' ) ;
?>
