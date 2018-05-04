<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!isset($_GET['delpageid']) || $_GET['delpageid'] == NULL){
        header("Location:index.php");
    }
    else{
        $id = $_GET['delpageid'];
    }
?>

<?php 
	
	$delquery = "DELETE FROM tbl_page WHERE id = '$id'";
	$deldata = $db->delete($delquery);
	return $deldata;
?>

<?php include 'inc/footer.php';?>