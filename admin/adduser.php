<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php if(!Session::get('userRole') == '0'){?>
  echo "<script>window.location = 'index.php'</script>";
<?php }?>  
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
                <?php 

                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                      $username = $fm->validation($_POST['username']);
                      $username = mysqli_real_escape_string($db->link, $username);
                      $password = $fm->validation(md5($_POST['password']));
                      $password = mysqli_real_escape_string($db->link, $password);
                      $email = $fm->validation($_POST['email']);
                      $email = mysqli_real_escape_string($db->link, $email);
                      $role = $fm->validation($_POST['role']);
                      $role = mysqli_real_escape_string($db->link, $role);

                     if($username == ""|| $password == ""|| $email == "" || $role == ""){
                        echo"<span class='error'>Field Must Not Be Empty!</span>";
                     }else{ 

                         $mailquery = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
                         $mailcheck = $db->select($mailquery);
                         if($mailcheck != false){

                            echo "<span class='error'>Email Already Exist!</span>";
                         }

                         else{
                            $query     = "INSERT INTO tbl_user(username,password,email,role) VALUES('$username','$password','$email','$role')";
                            $insertcat = $db->insert($query);

                            if($insertcat){
                                echo"<span class='success'>User inserted successfully!</span>";
                            }
                            else{
                                echo"<span class='error'>Usr not inserted successfully!</span>";
                            }
                          }
                     }
               
                }

                ?>
                 <form action="" method="post" >
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="username" placeholder="Enter User Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="password" placeholder="Enter Password..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="text" name="email" placeholder="Enter Email..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <select id="select" name="role">
                                    <option>Select User Role</option>
                                    <option value="0">admin</option>
                                    <option value="1">author</option>
                                    <option value="2">editor</option>
                                </select>
                            </td>
                        </tr>

                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                 </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
