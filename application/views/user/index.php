<?php $this->load->view('includes/header'); ?>
<div class="block-header">
	<h2>Users</h2>
	
</div>
<div class="row">
<div class="card">
    <div class="body">
	<a href="<?php print site_url('user/create') ?>" class="btn btn-primary pull-right">
	<i></i>
	Create User</a>
	<table class="table table-striped table-hover table-responsive datatable-user">
		<thead>
			<tr style="text-transform: uppercase;">
				<th>ID</th>
				<th>firstname</th> 
				<th>lastname</th> 
				<th>email</th>
				<th>status</th> 
				<th>user type</th>
				<th>date registered</th>
				<th>date modified</th>
			</tr>
		</thead>
		<body>
		<?php foreach($users as $user): ?>
			<tr>
				<td><?php print $user->id ?></td>
				<td><?php print $user->first_name ?></td> 
				<td><?php print $user->last_name ?></td> 
				<td><?php print $user->email ?></td> 
				<td><?php print $user->status ?></td> 
				<td><?php print $user->user_type ?></td>
				<td><?php print $user->date_registered ?></td>
				<td><?php print $user->date_modified ?></td>
			</tr>
		<?php endforeach; ?>	
		</body>
	</table>
	</div>
	</div>
</div>
<script>
window.onload = function(){
	$('.datatable-user').DataTable({
        responsive: true
    });
};

</script>
<?php $this->load->view('includes/footer'); ?>
