<?php $this->load->view('includes/header'); ?>

<div class="block-header">
    <h2>DASHBOARD</h2>
</div>

<!-- Widgets -->
<div class="row clearfix">

    <div class="col-sm-6 col-xs-12">
        <div class="info-box bg-blue hover-expand-effect">
            <div class="icon">
                <i class="material-icons">people</i>
            </div>
            <div class="content">
                <div class="text">All Merchants</div>
                <div class="number count-to" data-from="0" data-to="<?php print $merchants_count ?>" data-speed="2000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class=" col-sm-6 col-xs-12">
        <div class="info-box bg-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">people_outline</i>
            </div>
            <div class="content">
                <div class="text">Merchants (Approved)</div>
                <div class="number count-to" data-from="0" data-to="<?php print $merchants_approved_count ?>" data-speed="2000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">people_outline</i>
            </div>
            <div class="content">
                <div class="text">Merchants (Unapproved)</div>
                <div class="number count-to" data-from="0" data-to="<?php print $merchants_pending_count ?>" data-speed="2000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xs-12">
        <div class="info-box bg-deep-purple hover-expand-effect">
            <div class="icon">
                <i class="material-icons">account_box</i>
            </div>
            <div class="content">
                <div class="text">User Accounts</div>
                <div class="number count-to" data-from="0" data-to="<?php print $user_count ?>" data-speed="2000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        //Widgets count
        $('.count-to').countTo();

    }
</script>
<!-- #END# Widgets -->
<?php $this->load->view('includes/footer'); ?>
