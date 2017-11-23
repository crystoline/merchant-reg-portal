<?php $this->load->view('includes/header'); ?>

<div class="block-header">
	<h2>Create User Account</h2>
</div>
<div class="row">
	<div class="col-sm-5">
		<div class="card">
			<div class="body">
				<form action="" method="post">
					<div class="form-group">
						<label for="first_name">Firstname</label>
						<div class="form-line ">
							<input class="form-control" type="text" name="first_name" id="first_name" placeholder="Enter firstname" required  value="<?php echo set_value('first_name'); ?>">
						</div>
						<label class="error"><?php echo form_error('first_name'); ?></label>
					</div>
					<div class="form-group">
						<label for="last_name">Lastname</label>
						<div class="form-line">
							<input class="form-control" type="text" name="last_name" id="last_name" placeholder="Enter Lastname" required  value="<?php echo set_value('last_name'); ?>">
						</div>
						<label class="error"><?php echo form_error('last_name'); ?></label>
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<div class="form-line">
							<input class="form-control" type="email" name="email" id="email" placeholder="Enter email" required  value="<?php echo set_value('email'); ?>">
						</div>
						<label class="error"><?php echo form_error('email'); ?></label>
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<div class="form-line">			
							<input class="form-control" type="password" name="password" id="password" placeholder="Enter password" required>
						</div>
						<label class="error"><?php echo form_error('password'); ?></label>
					</div>
					<div class="form-group">
						<div class="form-line">
							<b>User Type</b><br>
							<input type="radio" id="user_type_user" name="user_type" value="Inputer" require  />
							<label for="user_type_user">Inputer</label>
							<input type="radio" id="user_type_admin" name="user_type" value="admin" require />
							<label for="user_type_admin">Administrator</label>
							<input type="radio" id="user_type_validator" name="user_type" value="Validator" require />
							<label for="user_type_validator">Validator</label>
						</div>
						<label class="error"><?php echo form_error('account_type'); ?></label>

					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
		
	</div>

</div>
<?php $this->load->view('includes/footer'); ?>
