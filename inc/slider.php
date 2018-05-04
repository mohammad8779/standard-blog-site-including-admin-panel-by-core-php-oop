<div class="slidersection templete clear">

	
        <div
        f










        jjjjjj]]v id="slider">
        	<?php 

				$query = "SELECT * FROM tbl_slider ORDER BY id LIMIT 3";
				$slider  = $db->select($query);
				if($slider){
					
					while($result = $slider->fetch_assoc()){
			?>
            <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['title']; ?>" title="<?php echo $result['title']; ?>" /></a>
            <?php } }?>
66666










\


144444444444444444444

6ugft''        </div>
       
</div>