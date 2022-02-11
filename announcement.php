<br><br><div class="container-fluid">
	
	<div class="row">
	<div class="col-lg-12">
			<button class="btn btn-success float-right btn-md" id="Add_announcement"><i class="fa fa-plus"></i>Add Announcement</button>
	</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center"></th>
					<th class="text-center">Announcement</th>
					<th class="text-center">Oragnization</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$user = $conn->query("SELECT * FROM announcement order by id desc");
 					while($row= $user->fetch_assoc()):
				 ?>
				 <tr>
				 	<td  class="text-center">
				 		<?php echo $row['subject'] ?>
				 	</td>
				 	<td  class="text-center">
				 		<?php echo $row['date'] ?>
				 	</td>
				 	<td  class="text-center">
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-success">Action</button>
								  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
								  </div>
								</div>
								</center>
				 	</td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
<script>
	
$('#Add_announcement').click(function(){
	uni_modal('Add Announcement','manage_announcement.php')
})
$('.edit_user').click(function(){
	uni_modal('Update','manage_announcement.php?id='+$(this).attr('data-id'))
})

</script>