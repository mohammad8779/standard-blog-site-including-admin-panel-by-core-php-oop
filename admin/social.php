<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>

        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
               $fb  = $fm->validation($_POST['fb']);
               $fb  = mysqli_real_escape_string($db->link, $fb);
               $tw  = $fm->validation($_POST['tw']);
               $tw  = mysqli_real_escape_string($db->link, $tw);
               $ln  = $fm->validation($_POST['ln']);
               $ln  = mysqli_real_escape_string($db->link, $ln);
               $gp  = $fm->validation($_POST['gp']);
               $gp  = mysqli_real_escape_string($db->link, $gp);

               if($fb == "" || $tw == "" || $ln == "" || $ln == ""  ) {
                 echo "<span class='error'>fields must not be empty !</span>";
                }

               else{

                    $query = "UPDATE tbl_social
                            SET 
                            fb  = '$fb',
                            tw  =  '$tw',
                            ln  = '$ln',
                            gp  = '$gp'
                            WHERE id = '1' ";
                        $updated_row = $db->update($query);
                        if ($updated_row) {
                         echo "<span class='success'>Social Link Updated Successfully.
                         </span>";
                        }else {
                         echo "<span class='error'>Social Link Not Updated !</span>";
                       }
               }
           }
        ?>

        <?php 

            $query = "SELECT * FROM tbl_social WHERE id = '1'";
            $socialdata = $db->select($query);
            if($socialdata){
                while($result = $socialdata->fetch_assoc()){
        ?>
        <div class="block">               
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="fb" value="<?php echo $result['fb'];?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="tw" value="<?php echo $result['tw'];?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input type="text" name="ln" value="<?php echo $result['ln'];?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="gp" value="<?php echo $result['gp'];?>" class="medium" />
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
        </div>
        <?php } }?>
    </div>
</div>
<?php include 'inc/footer.php';?>