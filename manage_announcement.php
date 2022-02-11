<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM announcement where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	
	<form action="" id="manage-announcement">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="subject">Subject</label>
			<textarea  name="subject" id="subject" class="form-control" value="<?php echo isset($meta['subject']) ? $meta['subject']: '' ?>" required></textarea>
		</div>
		<div class="form-group">
			<label for="date">Date</label>
			<input type="date" name="date" id="date" class="form-control" value="<?php echo isset($meta['date']) ? $meta['date']: '' ?>" required>
		</div>
	</form>
</div>
<script>
	$('#manage-announcement').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_announcement',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})
</script>