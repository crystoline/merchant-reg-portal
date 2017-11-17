</div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url()?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url()?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
		

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url()?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()?>plugins/node-waves/waves.js"></script>
		

    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url()?>plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url()?>plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url()?>plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url()?>plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url()?>plugins/chartjs/Chart.bundle.js"></script>

  
    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url()?>plugins/jquery-sparkline/jquery.sparkline.js"></script>

  <!-- Jquery DataTable Plugin Js -->
  <script src="<?php echo base_url()?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()?>js/admin.js"></script>
    <!-- <script src="<?php echo base_url()?>js/pages/index.js"></script> -->

    <!-- Demo Js -->
    <!-- <script src="<?php echo base_url()?>js/demo.js"></script> -->
		<script>
		
			function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
				if (colorName === null || colorName === '') { colorName = 'bg-black'; }
				if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
				if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
				if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
				var allowDismiss = true;

				$.notify({
						message: text
				},
				{
						type: colorName,
						allow_dismiss: allowDismiss,
						newest_on_top: true,
						timer: 1000,
						placement: {
								from: placementFrom,
								align: placementAlign
						},
						animate: {
								enter: animateEnter,
								exit: animateExit
						},
						template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
						'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">Ã—</button>' +
						'<span data-notify="icon"></span> ' +
						'<span data-notify="title">{1}</span> ' +
						'<span data-notify="message">{2}</span>' +
						'<div class="progress" data-notify="progressbar">' +
						'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
						'</div>' +
						'<a href="{3}" target="{4}" data-notify="url"></a>' +
						'</div>'
				});
			}
		
				<?php
			if(	$msg = $this->session->flashdata('notification') ){
print <<<SCRIPT
$(function(){
	showNotification('bg-green','$msg', 'top', 'right', 'animated bounceInRight', 'animated bounceOutRight');
})
SCRIPT;
			}
			?>
		
			
		</script>
		<script>
		
		
			
		</script>
</body>

</html>
