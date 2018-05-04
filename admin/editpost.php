<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

 <?php
    if(!isset($_GET['postid']) || $_GET['postid'] == NULL){
        header("Location:postlist.php");
    }
    else{
        $id = $_GET['postid'];
    }
?>


<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    

        $title  = $fm->validation($_POST['title']);
        $title  = mysqli_real_escape_string($db->link, $title);
        $cat    = $fm->validation($_POST['cat']);
        $cat    = mysqli_real_escape_string($db->link, $cat);
        $body   = $fm->validation($_POST['body']);
        $body   = mysqli_real_escape_string($db->link, $body);
        $tags   = $fm->validation($_POST['tags']);
        $tags   = mysqli_real_escape_string($db->link, $tags);
        $author = $fm->validation($_POST['author']);
        $author = mysqli_real_escape_string($db->link, $author);
       

        //image or file upload
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($title == "" || $cat == "" || $body == ""|| $tags == "" || $author == "") {
         echo "<span class='error'>fields must not be empty !</span>";
         
        }else{ 
          
          if(!empty($file_name)){ 

            if($file_size > 1048567) {
             echo "<span class='error'>Image Size should be less then 1MB!
             </span>";
             return $msg;
            } elseif(in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            } 

           else{
                move_uploaded_file($file_temp, $uploaded_image);
                
                $query = "UPDATE tbl_post
                            SET 
                            title   = '$title',
                            cat     =  '$cat',
                            body    = '$body',
                            tags    = '$tags',
                            author  = '$author',
                            body    = '$body',
                            image   = '$uploaded_image'
                           
                            WHERE id = '$id' ";
                $updated_row = $db->update($query);
                if ($updated_row) {
                 echo "<span class='success'>Post Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Post Not Updated !</span>";
               }
            }

        } else{

                  $query = "UPDATE tbl_post
                            SET 
                            title = '$title',
                            cat   = '$cat',
                            body  = '$body',
                            tags  = '$tags',
                            author      = '$author',
                            body        = '$body'
                            WHERE id = '$id' ";
                $updated_row = $db->update($query);
                if ($updated_row) {
                 echo "<span class='success'>Post Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Post Not Updated !</span>";
               }

        }

     }


   }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Post</h2>
        <div class="block"> 

        <?php 

            $query = "SELECT * FROM tbl_post WHERE id ='$id' ORDER BY id DESC ";
            $post = $db->select($query);
            if($post){
                while($postresult = $post->fetch_assoc()){
        ?>  


         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $postresult['title'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Tags</label>
                    </td>
                    <td>
                        <input type="text" name="tags" value="<?php echo $postresult['tags'];?>" class="medium" />
                    </td>
                </tr>

                 <tr>
                    <td>
                        <label>Author</label>
                    </td>
                    <td>
                        <input type="text" name="author" value="<?php echo $postresult['author'];?>" class="medium" />
                        
                        <input type="hidden" name="userid" class="medium" />
                    </td>
                </tr>

				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="cat">
                            <option>Select Category</option>
                            <?php 
                                $query = "SELECT * FROM tbl_category";
                                $category = $db->select($query);
                                if($category){
                                    while($result = $category->fetch_assoc()){
                            ?>
                            <option 
                            <?php 
                                if($postresult['cat'] == $result['id'] ){ ?>
                                    selected = "selected";
                           <?php } ?>    
                             value="<?php echo $result['id'];?>"><?php echo $result['name'];?>
                                 
                             </option>
                            <?php } }?>
                        </select>
                    </td>
                </tr>
			
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea  name="body" class="tinymce"><?php echo $postresult['body'];?></textarea>
                    </td>
                </tr>
				
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $postresult['image'];?>" height="50px" width="100px"><br/>
                        <input type="file" name="image"/>
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


