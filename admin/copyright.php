<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Copyright Text</h2>

           <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
               $name  = $fm->validation($_POST['name']);
               $name  = mysqli_real_escape_string($db->link, $name);
            

               if($name == "") {
                 echo "<span class='error'>fields must not be empty !</span>";
                }

               else{

                    $query = "UPDATE tbl_footer
                            SET 
                            name  = '$name'
                            WHERE id = '1' ";
                        $updated_row = $db->update($query);
                        if ($updated_row) {
                         echo "<span class='success'>Copyright Updated Successfully.
                         </span>";
                        }else {
                         echo "<span class='error'>Copyright Not Updated !</span>";
                       }
               }
           }
        ?>


         <?php 
            $query = "SELECT * FROM tbl_footer WHERE id = '1'";
            $copyright = $db->select($query);
            if($copyright){
                while($result = $copyright->fetch_assoc()){
        ?>
        <div class="block copyblock"> 
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" value="<?php echo $result['name'];?>" name="name" class="large" />
                    </td>
                </tr>
				
				 <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <?php } }?>
    </div>
</div>
<?php include 'inc/footer.php';?>