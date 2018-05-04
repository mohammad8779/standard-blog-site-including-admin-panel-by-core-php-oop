<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

 <?php
    if(!isset($_GET['userid']) || $_GET['userid'] == NULL){
        header("Location:userlist.php");
    }
    else{
        $id = $_GET['userid'];
    }
?>

<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        echo"<script>window.location = 'userlist.php'</script>";
     }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update User</h2>
        <div class="block"> 

        <?php 

            $query = "SELECT * FROM tbl_user WHERE id ='$id'";
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
                        <input type="text" readonly name="name" value="<?php echo $userresult['name'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Username</label>
                    </td>
                    <td>
                        <input type="text" readonly name="username" value="<?php echo $userresult['username'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" readonly name="email" value="<?php echo $userresult['email'];?>" class="medium" />
                    </td>
                </tr>

               <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Details</label>
                    </td>
                    <td>
                        <textarea readonly  name="details" class="tinymce"><?php echo $userresult['details'];?></textarea>
                    </td>
                </tr>
				
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Ok" />
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


