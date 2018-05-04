<?php include"config/config.php";?>
<?php include"lib/Database.php";?>
<?php include"helpers/Format.php";?>

<?php
	$db = new Database();
    $fm = new Format();
?>

<!DOCTYPE html>
<html>
<head>

	<!-- meta file -->
	<?php include"scripts/meta.php";?>
	
	<!-- css file -->
	<?php include"scripts/css.php";?>
	<!-- js file -->
	<?php include"scripts/js.php";?>

</head>

<body>
	<div class="headersection templete clear">
		<?php 

            $query = "SELECT * FROM title_slogan WHERE id = '1'";
            $getdata = $db->select($query);

            if($getdata){

                while($result = $getdata->fetch_assoc()){
        ?>
		<a href="#">
			<div class="logo">
				<img src="admin/<?php echo $result['logo'];?>" alt="Logo"/>
				<h2><?php echo $result['title'];?></h2>
				<p><?php echo $result['slogan'];?></p>
			</div>
		</a>
		<?php } }?>
		<div class="social clear">
			 <?php 
                    $query = "SELECT * FROM tbl_social WHERE id = '1'";
		            $socialdata = $db->select($query);
		            if($socialdata){
		                while($result = $socialdata->fetch_assoc()){
              ?>
			<div class="icon clear">
				<a href="<?php echo $result['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>

			<?php }}?>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<?php
		$path = $_SERVER['SCRIPT_FILENAME'];
        $currentpage = basename($path, '.php');
	?>
	<ul>
		<li><a
			<?php 
				if($currentpage == 'index'){ echo 'id="active"';}
			?>
		 href="index.php">Home</a></li>
		<?php 

            $query = "SELECT * FROM tbl_page";
            $page = $db->select($query);
            if($page){
                while($result = $page->fetch_assoc()){
        ?>
		<li><a 
			<?php 
				if(isset($_GET['pageid']) && $_GET['pageid'] == $result['id']){ 

						echo 'id="active"';
				 }
			?>
			href="page.php?pageid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
		<?php } }?>
		<li><a 
			<?php 
				if($currentpage == 'contact'){ echo 'id="active"';}
			?>
			href="contact.php">Contact</a></li>
	</ul>
</div>
