<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!isset($_GET['delpost']) || $_GET['delpost'] == NULL){
        header("Location:postlist.php");
    }
    else{
        $id = $_GET['delpost'];
    }
?>

<?php 
	
	$query = "SELECT * FROM tbl_post WHERE id ='$id'";
	$getdata = $db->select($query);

	if($getdata){
		while($imgdelete = $getdata->fetch_assoc()){
             $dellink = $imgdelete['image'];
             unlink($dellink);
		}
	}

	$delquery = "DELETE FROM tbl_post WHERE id = '$id'";
	$deldata = $db->delete($delquery);

	if($deldata){
		echo"<script>alert('delete post successfully.');</script>";
		echo"<script>window.location = 'postlist.php';</script>";
	}
	else{

		echo"<script>alert('not delete successfully.');</script>";
		echo"<script>window.location = 'postlist.php';</script>";
	}


?>

<?php include 'inc/footer.php';?>