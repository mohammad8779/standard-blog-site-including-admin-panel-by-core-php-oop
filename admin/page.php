<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style>
    .deletepage{margin-left:10px;}
    .deletepage a{ border: 1px solid #ddd;color: #444;cursor: pointer;font-size:20px;
  padding: 2px 10px; font-weight:normal; background: #F0F0F0;}
</style>
<?php
    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
        header("Location:index.php");
    }
    else{
        $id = $_GET['pageid'];
    }
?>


<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name  = $fm->validation($_POST['name']);
        $name  = mysqli_real_escape_string($db->link, $name);
        $body  = $fm->validation($_POST['body']);
        $body  = mysqli_real_escape_string($db->link, $body);
        if($name == "" || $body == "") {
         echo"<span class='error'>fields must not be empty !</span>";
        
        } else{
          
            $query = "UPDATE tbl_page
                            SET 
                            name   = '$name',
                            body    = '$body'
                           WHERE id = '$id' ";
                $updated_row = $db->update($query);
                if ($updated_row) {
                 echo "<span class='success'>Page Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Page Not Updated !</span>";
               }
        }
   }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Page</h2>
        <div class="block"> 

         <?php 

            $query = "SELECT * FROM tbl_page WHERE id = '$id'";
            $page = $db->select($query);
            if($page){
                while($result = $page->fetch_assoc()){
         ?>
        
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                    </td>
                </tr>

               <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea  name="body" class="tinymce"><?php echo $result['body'];?></textarea>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                        <span class="deletepage"><a onclick="return confirm('are you sure to delete!');" href="deletepage.php?delpageid=<?php echo $result['id'];?>">Delete</a></span>
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


