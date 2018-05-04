<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

 <?php
    if(!isset($_GET['replyid']) || $_GET['replyid'] == NULL){
        header("Location:inbox.php");
    }
    else{
        $id = $_GET['replyid'];
    }
?>

<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $to = $fm->validation($_POST['toEmail']);
        $fromEmail = $fm->validation(md5($_POST['fromEmail']));
        $subject = $fm->validation(md5($_POST['subject']));
        $message = $fm->validation(md5($_POST['message']));
        
        $to = mysqli_real_escape_string($db->link, $to);
        $fromEmail = mysqli_real_escape_string($db->link, $fromEmail);
        $subject = mysqli_real_escape_string($db->link, $subject);
        $message = mysqli_real_escape_string($db->link, $message);

        $sendemail = mail($to,$fromEmail,$subject,$message);

        if ($sendemail) {
             echo "<span class='success'>Message Send Successfully.
             </span>";
            }else {
             echo "<span class='error'>Message Not Send!</span>";
           }
       
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>View Message</h2>
        <div class="block"> 

        <?php 

            $query = "SELECT * FROM tbl_contact WHERE id = '$id'";
            $msgsend  = $db->select($query);
            if($msgsend){
               
                while($result = $msgsend->fetch_assoc()){
                  
         ?>    

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                

                <tr>
                    <td>
                        <label>To</label>
                    </td>
                    <td>
                        <input readonly type="text" name="toEmail" value="<?php echo $result['email'];?>"  class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>From</label>
                    </td>
                    <td>
                        <input type="text" name="fromEmail" class="medium" />
                    </td>
                </tr>

                 <tr>
                    <td>
                        <label>Subject</label>
                    </td>
                    <td>
                        <input type="text" name="subject" class="medium" />
                    </td>
                </tr>
                
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Message</label>
                    </td>
                    <td>
                        <textarea name="message" class="tinymce"></textarea>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Send" />
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


