<?php include"inc/header.php";?>
<?php
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
      header("Location:404.php");
    }
    else{
      $id = $_GET['id'];
    }
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 

					$query = "SELECT * FROM tbl_post WHERE id = '$id'";
					$post = $db->select($query);
					if($post){
						while($result = $post->fetch_assoc()){
				 ?>
				<h2><?php echo $result['title'];?></h2>

				<h4><?php echo $fm->formatDate($result['date']);?><a href="<?php echo $result['id'];?>"><?php echo $result['author'];?></a></h4>
				<img src="admin/<?php echo $result['image'];?>" alt="post image"/>
				
				<?php echo $fm->textShorten($result['body'],400);?>
				
				
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

				<?php } }else{ header("Location:404.php"); }?>
	   </div>

		</div>
		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<ul>
						<li><a href="#">Category One</a></li>
						<li><a href="#">Category Two</a></li>
						<li><a href="#">Category Three</a></li>
						<li><a href="#">Category Four</a></li>
						<li><a href="#">Category Five</a></li>						
					</ul>
			</div>
			<div class="samesidebar clear">
				<h2>Popular articles</h2>
					<div class="popular clear">
						<h3><a href="#">Post title will be go here..</a></h3>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
					</div>
					
					<div class="popular clear">
						<h3><a href="#">Post title will be go here..</a></h3>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
					</div>
					
					<div class="popular clear">
						<h3><a href="#">Post title will be go here..</a></h3>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
					</div>
					
					<div class="popular clear">
						<h3><a href="#">Post title will be go here..</a></h3>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
					</div>				
				
			</div>
			
		</div>
	</div>

	
<?php include "inc/footer.php";?>