<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php 

                	if(isset($_GET['seenid'])){

                		$seenid = $_GET['seenid'];

                		$query = "UPDATE tbl_contact
                            SET 
                            status  = '1'
                            WHERE id = '$seenid' ";
			                $updated_row = $db->update($query);
			                if ($updated_row) {
			                 echo "<span class='success'>Update Successfully.
			                 </span>";
			                }else {
			                 echo "<span class='error'>Not Updated !</span>";
			               }
                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">NO</th>
							<th width="15%">Name</th>
							<th width="15%">Email</th>
							<th width="15%">Message Body</th>
							<th width="10%">Status</th>
							<th width="20%">Date</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>

						<?php 

							$query = "SELECT * FROM tbl_contact WHERE status = '0' ORDER BY id DESC";
							$user  = $db->select($query);
							if($user){
								$i = 0;
								while($result = $user->fetch_assoc()){
									$i++
					     ?>

						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'];?> <?php echo $result['lastname'];?></td>
							
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textShorten($result['body'],30);?></td>
							<td><?php echo $result['status'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td>
								<a href="viewmsg.php?viewid=<?php echo $result['id'];?>">View</a> || 
								<a href="replymsg.php?replyid=<?php echo $result['id'];?>">Reply</a> || 
								<a onclick="return confirm('are you sure to move to seen box!')" href="?seenid=<?php echo $result['id'];?>">Seen</a>
							</td>
						</tr>
						
						<?php } }?>
						
						
						
					</tbody>
				</table>
               </div>
            </div>
            
            <!--this is for seen data of above information -->

            <div class="box round first grid">
                <h2>Seen Inbox</h2>
                <?php
				    if(isset($_GET['delid'])){
				        
				        $id = $_GET['delid'];
				    
				    
				    $delmsg = "DELETE FROM tbl_contact WHERE id = '$id'";
	                $deldata = $db->delete($delmsg);
	                if($deldata){
						echo"<script>alert('delete post successfully.');</script>";
						echo"<script>window.location = 'inbox.php';</script>";
	                 }
	                 else{

						echo"<script>alert('not delete successfully.');</script>";
						echo"<script>window.location = 'inbox.php';</script>";
	                 }
	               }
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">NO</th>
							<th width="15%">Name</th>
							<th width="15%">Email</th>
							<th width="15%">Message Body</th>
							<th width="10%">Status</th>
							<th width="20%">Date</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>

						<?php 

							$query = "SELECT * FROM tbl_contact WHERE status = '1' ORDER BY id DESC";
							$user  = $db->select($query);
							if($user){
								$i = 0;
								while($result = $user->fetch_assoc()){
									$i++
					     ?>

						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'];?> <?php echo $result['lastname'];?></td>
							
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textShorten($result['body'],30);?></td>
							<td><?php echo $result['status'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td>
								 
								<a onclick="return confirm('are you sure to delete!')" href="?delid=<?php echo $result['id'];?>">Delete</a>
							</td>
						</tr>
						
						<?php } }?>
						
						
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
