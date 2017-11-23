<?php $this->load->view('includes/header');
$l_user = $this->session->userdata('user');
?>
<script>
    window.onload = function () {
       $(".disabled_field input, disabled_field select, disabled_field textarea, disabled_field button").prop({
           "readonly": true,
           'disabled': true
       })
       $('button').prop({
           "readonly": true,
           'disabled': true
       });

	   $('textarea').attr('readonly','readonly');
	   $('textarea').prop('disabled', true);
        $("div.form-inline").removeClass('focused');

    };
</script>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="header">
                <div class="block-header">
                    <h2>Merchant Information
	                    <?php if($merchant->merchant_status == 2 and ($l_user->user_type != 'admin') and ($l_user->user_type != 'Validator')): ?>
                            <a class="btn btn-sm btn-info pull-right" href="<?php print site_url('merchant/edit/'.$merchant->id) ?>">Edit</a>
	                    <?php endif; ?>
                    </h2>
                </div>
                <?php
                $this->load->view('merchant/info');
                ?>

            </div>
            <div class="body">
                <form action="" method="post" novalidate >

                  <?php $this->load->view('merchant/form') ?>

                </form>
            </div>
        </div>

    </div>

</div>
<?php $this->load->view('includes/footer'); ?>


