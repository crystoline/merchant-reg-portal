<?php $this->load->view('includes/header');
$l_user = $this->session->userdata('user');
?>

<div class="row">
    <div class="card">
        <div class="header">
            <div class="block-header">
                <h2>Merchants
                    <?php if($l_user->user_type != 'admin' and $l_user->user_type != 'Validator' ): ?>
                    <a href="<?php print site_url('merchant/create') ?>" class="btn btn-primary pull-right">Create Merchant</a></h2>
                    <?php endif; ?>
            </div>
        </div>
        <div class="body">

            <i></i>
            <div class="">
                <table class="table table-striped table-hover datatable-merchants display nowrap" style="width: 100%">
                    <thead>
                    <tr style="text-transform: uppercase">
                        <th>S/N</th>
                        <th>Mercahant Name</th>
                        <th>Mercahant Code</th>
                        <th>Date Registered</th>
                        <th>Register By</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <body>
                    <?php foreach($merchants as $i => $merchant): ?>
                        <tr>
                            <td><?php print $i+1 ?></td>
                            <td><?php print $merchant->company_name ?></td>
                            <td><?php print @$merchant->merchant_code ?></td>
                            <td><?php print $merchant->date_of_reg ?></td>
                            <td><?php print @$merchant->register_by ?></td>
                            <td><?php
                                switch($merchant->merchant_status){
                                    case 0: print '<label class="label label-info">Pending</label>'; break;
                                    case 1: print '<label class="label label-success">Approved</label>'; break;
                                    case 2: print '<label class="label label-danger">Rejected</label>'; break;
                                }

                                ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="<?php print site_url('merchant/view/'.$merchant->id) ?>">View</a>

                                <?php if($merchant->merchant_status == 0 and $l_user->user_type == 'Validator'): ?>
                                    <form method="post" style="display: inline-block" onsubmit="reason.value = prompt('Enter More information', '')">
                                        <input type="hidden" name="merchant_id" value="<?php print $merchant->id ?>">
                                        <input type="hidden" name="reason" value="">
                                        <button type="submit" class="btn btn-sm btn-success" name="merchant_change_status" value="1">Approve</button>
                                        <button type="submit" class="btn btn-sm btn-danger" name="merchant_change_status" value="2">Reject</button>
                                    </form>
                                <?php endif;?>

                                <?php if($merchant->merchant_status == 2 and $l_user->user_type != 'admin' and $l_user->user_type != 'Validator'): ?>
                                    <a class="btn btn-sm bg-blue-grey" href="<?php print site_url('merchant/edit/'.$merchant->id) ?>">Edit</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </body>
                </table>
            </div>

        </div>
    </div>
</div>
<script>
window.onload = function(){
    $(function () {
        $('.datatable-merchants').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    })

};

</script>
<?php $this->load->view('includes/footer'); ?>
