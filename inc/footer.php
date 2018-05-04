<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>

	   <?php 
            $query = "SELECT * FROM tbl_footer WHERE id = '1'";
            $copyright = $db->select($query);
            if($copyright){
                while($result = $copyright->fetch_assoc()){
        ?>

	        <p>&copy; <?php echo $result['name'];?>.</p>
       <?php } }?>

	</div>

	 <?php 
        $query = "SELECT * FROM tbl_social WHERE id = '1'";
        $socialdata = $db->select($query);
        if($socialdata){
            while($result = $socialdata->fetch_assoc()){
      ?>
	<div class="fixedicon clear">
		<a href="<?php echo $result['fb'];?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result['tw'];?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result['ln'];?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result['gp'];?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
	<?php } }?>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>