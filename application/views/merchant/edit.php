<?php $this->load->view('includes/header'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="header">
				<div class="block-header">
					<h2>Merchant Information</h2>
				</div>
				<div class="row">
					<div class="col-md-4">
						Status: <?php
						switch($merchant->merchant_status){
							case 0: print '<label class="label label-info">Pending</label>'; break;
							case 1: print '<label class="label label-success">Approved</label>'; break;
							case 2: print '<label class="label label-danger">Rejected</label>'; break;
						}
						?>
					</div>
					<div class="col-md-4">
						Created by : <?php print @$merchant->register_by ?><br>
						Date: <?php print @$merchant->date_of_reg ?>
					</div>
					<div class="col-md-4">
						<?php if($merchant->merchant_status == 1): ?>
							Approved by : <?php print @$merchant->approved_by ?><br>
							Date: <?php print @$merchant->date_validated ?>
						<?php endif; ?>
					</div>
				</div>



				Approved by : <?php print @$merchant->approved_by ?>
			</div>
			<div class="body">
				<form action="" method="post" >

					<?php $this->load->view('merchant/form') ?>
					<button class="btn btn-success">Update</button>
				</form>
			</div>
		</div>

	</div>

</div>
<?php $this->load->view('includes/footer'); ?>
