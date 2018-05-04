<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!isset($_GET['delslider']) || $_GET['delslider'] == NULL){
        header("Location:sliderlist.php");
    }
    else{
        $id = $_GET['delslider'];
    }
?>

<?php 
	
	$query = "SELECT * FROM tbl_slider WHERE id ='$id'";
	$getdata = $db->select($query);

	if($getdata){
		while($imgdelete = $getdata->fetch_assoc()){
             $dellink = $imgdelete['image'];
             unlink($dellink);
		}
	}

	$delquery = "DELETE FROM tbl_slider WHERE id = '$id'";
	$deldata = $db->delete($delquery);

	if($deldata){
		echo"<script>alert('delete slider successfully.');</script>";
		echo"<script>window.location = 'sliderlist.php';</script>";
	}
	else{

		echo"<script>alert('not delete successfully.');</script>";
		echo"<script>window.location = 'sliderlist.php';</script>";
	}


?>

<?php include 'inc/footer.php';?>