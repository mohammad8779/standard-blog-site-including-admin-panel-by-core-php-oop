<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">
<!---for theme colors -->


    <?php 

       $query = "SELECT * FROM tbl_theme WHERE id ='1' ";
        $themes = $db->select($query);
        if($themes){
            while($result = $themes->fetch_assoc()){ 

            	if($result['theme'] == 'default'){ ?>
            	<link rel="stylesheet" href="themes/default.css">
                <?php }elseif($result['theme'] == 'green'){ ?>
                <link rel="stylesheet" href="themes/green.css">
                <?php }elseif($result['theme'] == 'themes/red.css'){ ?>
                <?php } ?>
        <?php } } ?>

<?php?>





