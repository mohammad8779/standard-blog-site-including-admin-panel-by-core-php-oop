<?php include"inc/header.php";?>

<?php
    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
        header("Location: 404.php");
    }
    else{
        $id = $_GET['pageid'];
    }
?>

<?php 

$query = "SELECT * FROM tbl_page WHERE id = '$id'";
$page = $db->select($query);
if($page){
    while($result = $page->fetch_assoc()){
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $result['name'];?></h2>
				
				<?php echo $result['body'];?>
				
			</div>

		</div>
		<?php include"inc/sidebar.php";?>
	</div>

	<?php }}?>
 <?php include"inc/footer.php";?>