<?php include"inc/header.php";?>


<?php
	if(!isset($_GET['search']) || $_GET['search'] == NULL){
      header("Location:404.php");
    }
    else{
      $search = $_GET['search'];
    }
?>

<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 

				$query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
				  $post = $db->select($query);
					if($post){
						while($result = $post->fetch_assoc()){
			?>  

			    <div class="samepost clear">
			    
			    <h2><a href="<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2> 
				<h4><?php echo $fm->formatDate($result['date']);?><a href="<?php echo $result['id'];?>"><?php echo $result['author'];?></a></h4>
				<a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				
				
				<?php echo $fm->textShorten($result['body']);?>
				</div>

				<?php 
					$catId = $result['cat'];
					$relatedquery = "SELECT * FROM tbl_post WHERE cat = '$catId' ORDER BY rand() LIMIT 6";
					$relatedpost = $db->select($relatedquery);
					if($relatedpost){
						while($relatedresult = $relatedpost->fetch_assoc()){
				 ?>
			     
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<a href="post.php?id=<?php echo $relatedresult['id'];?>"><img src="admin/uploads/<?php echo $relatedresult['image'];?>" alt="post image"/></a>
					
				</div>
				<?php } }else{ echo"No Related Post.";}?>


             <?php } }else{?>
                <p>Search Query Not Found!</p>
             <?php }?>
		</div>
	<?php include"inc/sidebar.php";?>
</div>

<?php include "inc/footer.php";?>