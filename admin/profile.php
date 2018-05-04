<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

 <?php
    
   $userId   =  Session::get('userId');
   $userRole =  Session::get('userRole');

 ?>


<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name      = $fm->validation($_POST['name']);
        $name      = mysqli_real_escape_string($db->link, $name);
        $username  = $fm->validation($_POST['username']);
        $username  = mysqli_real_escape_string($db->link, $username);
        $email     = $fm->validation($_POST['email']);
        $email     = mysqli_real_escape_string($db->link, $email);
        $details   = $fm->validation($_POST['details']);
        $details   = mysqli_real_escape_string($db->link, $details);
        
        if($name == "" || $username == "" || $email == "" || $details == "") {
         echo "<span class='error'>fields must not be empty !</span>";
         
        }else{ 
          
          $query = "UPDATE tbl_user
                            SET 
                            name = '$name',
                            username   = '$username',
                            email  = '$email',
                            details      = '$details'
                            WHERE id = '$userId' ";
                $updated_row = $db->update($query);
                if ($updated_row) {
                 echo "<span class='success'>User Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>User Not Updated !</span>";
               }

        

     }


   }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update User</h2>
        <div class="block"> 

        <?php 

            $query = "SELECT * FROM tbl_user WHERE id ='$userId' AND role = '$userRole'";
            $user = $db->select($query);
            if($user){
                while($userresult = $user->fetch_assoc()){
        ?>  


         <form action="" method="post">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $userresult['name'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Username</label>
                    </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $userresult['username'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $userresult['email'];?>" class="medium" />
                    </td>
                </tr>

               <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Details</label>
                    </td>
                    <td>
                        <textarea  name="details" class="tinymce"><?php echo $userresult['details'];?></textarea>
                    </td>
                </tr>
				
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
             </table>
            </form>

            <?php } }?>

        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


