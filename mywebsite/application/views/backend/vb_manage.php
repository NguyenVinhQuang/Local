<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/960_24_col.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/style_fixed.css" />
		<link id="color" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/colors/blue.css" />
		<!-- scripts (jquery) -->
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
		<!--[if IE]><script language="javascript" type="text/javascript" src="resources/scripts/excanvas.min.js"></script><![endif]-->
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.flot.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
		<!-- scripts (custom) -->
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.menu.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.chart.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.table.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.form.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.dialog.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.autocomplete.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			$(document).ready(function () {
				style_path = "resources/css/colors";

				$("#date-picker").datepicker();

				$("#box-tabs, #box-left-tabs").tabs();
			});
		</script>
	</head>
	<body>
		<!-- header -->
		<?php $this->load->view("backend/vb_header") ?>
		<!-- end header -->
		<!-- content -->
		<div id="content">

			<!-- end content / left -->
			<?php $this->load->view("backend/vb_leftSideBar") ?>
			<!-- end content / left -->

			<!-- content / right -->
			<?php $this->load->view("backend/$template") ?>
			<!-- end content / right -->

		</div>
		<!-- end content -->
		<!-- footer -->
		<?php $this->load->view("backend/vb_footer") ?>
		<!-- end footer -->
	</body>
</html>