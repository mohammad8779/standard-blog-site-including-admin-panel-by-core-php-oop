<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

       <div class="grid_10">
            <div class="box round first grid">
                <h2>Themes</h2>
               <div class="block copyblock"> 
                <?php 

                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                      $theme = $fm->validation($_POST['theme']);
                      $theme = mysqli_real_escape_string($db->link, $theme);

                        $query     = "UPDATE tbl_theme
                                        SET 
                                        theme = '$theme'
                                       WHERE id = '1'
                                     ";
                        $updatetheme = $db->update($query);

                        if($updatetheme){
                            echo"<span class='success'>Theme updated successfully!</span>";
                        }
                        else{
                            echo"<span class='error'>Theme not updated successfully!</span>";
                        }
                     }

                ?>

                <?php 

                   $query = "SELECT * FROM tbl_theme WHERE id ='1' ";
                    $chktheme = $db->select($query);
                    if($chktheme){
                        while($result = $chktheme->fetch_assoc()){ 
                ?>

                 <form action="" method="post" >
                    <table class="form">					
                        <tr>
                            <td>
                                <input <?php if($result['theme'] == 'default'){echo "checked";}?> type="radio" name="theme" value="default"/>Default
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if($result['theme'] == 'green'){echo "checked";}?> type="radio" name="theme" value="green" />Green
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <input <?php if($result['theme'] == 'red'){echo "checked";}?> type="radio" name="theme" value="red" />Red
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php  }} ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
