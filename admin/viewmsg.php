<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

 <?php
    if(!isset($_GET['viewid']) || $_GET['viewid'] == NULL){
        header("Location:inbox.php");
    }
    else{
        $id = $_GET['viewid'];
    }
?>

<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        echo"<script>window.location = 'inbox.php'</script>";
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>View Message</h2>
        <div class="block"> 

        <?php 

            $query = "SELECT * FROM tbl_contact WHERE id = '$id'";
            $user  = $db->select($query);
            if($user){
               
                while($result = $user->fetch_assoc()){
                  
         ?>    

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input readonly type="text" name="firstname" value="<?php echo $result['firstname'].' '.$result['lastname'] ;?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Emali</label>
                    </td>
                    <td>
                        <input readonly type="text" name="email" value="<?php echo $result['email'];?>"  class="medium" />
                    </td>
                </tr>
                
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Body</label>
                    </td>
                    <td>
                        <textarea readonly  name="body" class="tinymce"><?php echo $result['body'];?></textarea>
                    </td>
                </tr>

                 <tr>
                    <td>
                        <label>Status</label>
                    </td>
                    <td>
                        <input type="text" readonly name="status" value="<?php echo $result['status'];?>" class="medium" />
                    </td>
                </tr>

                 <tr>
                    <td>
                        <label>Date</label>
                    </td>
                    <td>
                        <input type="text" readonly name="date" value="<?php echo $result['date'];?>" class="medium" />
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


