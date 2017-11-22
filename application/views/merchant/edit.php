<?php $this->load->view('includes/header'); ?>
<form method="post" enctype="multipart/form-data">
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="header">
				<div class="block-header">
					<h2>Merchant Information</h2>
				</div>
				<?php
				$this->load->view('merchant/info');
				?>
			</div>
			<div class="body">


					<?php $this->load->view('merchant/form') ?>
					<button class="btn btn-success"  type="submit">Update</button>

			</div>
		</div>

	</div>

</div>
</form>
<?php $this->load->view('includes/footer'); ?>
