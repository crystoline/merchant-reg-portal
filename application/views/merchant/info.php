<div class="row">
	<div class="col-md-4">
		Status: <?php
		switch($merchant->merchant_status){
			case 0:
			    print '<label class="label label-info">Pending</label>';break;
			case 1: print '<label class="label label-success">Approved</label>'; break;
			case 2: print '<label class="label label-danger">Rejected</label>';
				print '<br>';
				if($merchant->reason)
					print 'Reason: <em class="text text-warning">'.$merchant->reason.'</em>';

				break;
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
<?php
    if($merchant->merchant_status == 1):
?>
<div class="row">
    <div class="col-md-6">
        <span><em>Terminal ID:</em> <span class="label bg-purple"><?php print $merchant->terminal_id? :'None' ?></span> </span>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
            <a href="#"  class="toggle-terminal-id">+
                <?php
                if($merchant->terminal_id){
                    print 'Change Terminal ID';
                }
                else{
                    print 'Enter Terminal ID';
                }
                ?>
            </a>
            <form method="post"  class="toggle-terminal-id-form" style="display: none">
            <a href="#" class="toggle-terminal-id" style="display: none">- Hide</a>
            <input type="hidden" name="merchant_id" value="<?php print $merchant->id?>">
            <div class="form-group">
                <label for="terminal_id">Terminal ID</label>
                <div class="aform-inline">
                    <input type="text" class="aform-control" title="You must enter a terminal id"
                           required name="terminal_id" id="terminal_id" value="<?php print $merchant->terminal_id ?>">
                </div>
                <button>Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        $(document).on("click",".toggle-terminal-id", function (e) {
            e.preventDefault();
            $('.toggle-terminal-id').toggle();
            $(".toggle-terminal-id-form").toggle();

        });
    };
</script>
<?php endif; ?>