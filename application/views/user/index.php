<?php $this->load->view('includes/header'); ?>

<div class="row">
<div class="card">
    <div class="header">
        <div class="block-header">
            <h2>Users
            <a href="<?php print site_url('user/create') ?>" class="btn btn-primary pull-right">
                <i></i>
                Create User</a>
            </h2>
        </div>
    </div>
    <div class="body">

	<table class="table table-striped table-hover table-responsive datatable-user">
		<thead>
			<tr style="text-transform: uppercase;">
				<th>ID</th>
				<th>name</th>
				<th>email</th>
				<th>status</th> 
				<th>user type</th>
				<th>date registered</th>
				<th>date modified</th>
                <th>Action</th>
			</tr>
		</thead>
		<body>
		<?php foreach($users as $user): ?>
			<tr>
				<td><?php print $user->id ?></td>
				<td><?php print $user->first_name. ' '.$user->last_name ?></td>
				<td><?php print $user->email ?></td>
				<td><?php print $user->status? '<span class="label label-success">Active</span>': '<span class="label label-danger">Inactive</span>' ?></td>
				<td><?php print $user->user_type ?></td>
				<td><?php print $user->date_registered ?></td>
				<td><?php print $user->date_modified ?></td>
                <td><form method="post">
                        <input type="hidden" name="user_id" value="<?php print $user->id ?>">
                        <?php
                            print (!$user->status)?
                                '<button class="btn btn-success" type="submit" name="user_change_status" value="1">Activate</button>':
                                '<button class="btn btn-danger" name="user_change_status" value="0">Deactivate</button>'
                        ?>


                    </form>
                </td>
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
