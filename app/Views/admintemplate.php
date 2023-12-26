<?php echo view('admin/header');  ?> 
<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/jquery/jquery.min.js'); ?>"></script>
<?php echo $contents ?>
<?php echo view('admin/footer'); ?>
 </div>
</div>
	<!-- JAVASCRIPT -->
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/metismenu/metisMenu.min.js'); ?>"></script>
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/simplebar/simplebar.min.js'); ?>"></script>
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/node-waves/waves.min.js'); ?>"></script>

	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/parsleyjs/parsley.min.js'); ?>"></script>
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/js/pages/form-validation.init.js'); ?>"></script>

	<!-- Peity chart-->
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/peity/jquery.peity.min.js'); ?>"></script>

	<!-- Plugin Js-->
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/chartist/chartist.min.js'); ?>"></script>
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js'); ?>"></script>

	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/js/pages/dashboard.init.js'); ?>"></script>
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js'); ?>"></script>

	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/js/app.js'); ?>"></script>

	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/js/custom.js'); ?>"></script>
	

	<!-- Sweet Alerts js -->
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>

	<!-- Sweet alert init js-->
	<script src="<?php echo base_url(PUBLIC_FOLDER.'admin/js/pages/sweet-alerts.init.js'); ?>"></script>

	<!-- JAVASCRIPT -->

	<?php echo view('admin/_calendar'); ?>



	</body>
</html>