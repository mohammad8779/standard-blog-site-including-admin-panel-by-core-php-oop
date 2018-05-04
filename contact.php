<?php include"inc/header.php";?>
   
   <?php 

   	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $fn  = $fm->validation($_POST['firstname']);
        $fn  = mysqli_real_escape_string($db->link, $fn);
        $ln  = $fm->validation($_POST['lastname']);
        $ln  = mysqli_real_escape_string($db->link, $ln);
        $email  = $fm->validation($_POST['email']);
        $email  = mysqli_real_escape_string($db->link, $email);
        $body  = $fm->validation($_POST['body']);
        $body  = mysqli_real_escape_string($db->link, $body);

        $error = "";

        if(empty($fn)){

        	$error = "First Name Must Not Be Empty!";
        }elseif(empty($ln)){

        	$error = "Last Name Must Not Be Empty!";
        }elseif(empty($email)){

        	$error = "Email Must Not Be Empty!";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        	$error = "Invalid Email!";
        }elseif(empty($body)){

        	$error = "Body Must Not Be Empty!";
        }

        else{
        	
        	$query     = "INSERT INTO tbl_contact(firstname,lastname,email,body) VALUES('$fn','$ln','$email','$body')";
                        $insertmsg = $db->insert($query);

                        if($insertmsg){
                            $msg = "<span class='success'>Message inserted successfully!</span>";
                           
                        }
                        else{
                            $error = "<span class='error'>Message not inserted successfully!</span>";
                             
                        }
        }
    }
 ?>
   

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

				<h2>Contact us</h2>
				<?php 

					if(isset($error)){

						echo "<span style='color:red;font-size:18px'>$error</span>";
					}

					if(isset($msg)){

						echo "<span style='color:green;font-size:18px'>$msg</span>";
					}
				?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

       </div>
		<?php include"inc/sidebar.php";?>
	</div>

<?php include"inc/footer.php";?>