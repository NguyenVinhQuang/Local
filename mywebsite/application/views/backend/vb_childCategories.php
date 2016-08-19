<div id="right">
	<!-- table -->
	<!-- end table -->
	
	<!-- forms display-->
	<?php $this->load->view('backend/vb_display_childCategories'); ?>
	<!-- end forms display-->

	<!-- forms add-->
	<?php $this->load->view('backend/vb_add_childCategories'); ?>
	<!-- end forms add-->

	<div class="box" style="visibility: hidden;">
		<!-- box / title -->
		<div class="title">
			<h5>Product Sales</h5>
			<ul class="links">
				<li><a href="">Full Report</a></li>
			</ul>
		</div>
		<!-- end box / title -->
		<div class="sales">
			<div class="legend">
				<h6>Units Sold (April 1st to April 15th)</h6>
				<ul>
					<li class="monitors">Monitors</li>
					<li class="memory">Memory</li>
				</ul>
			</div>
			<div id="sales"></div>
		</div>
	</div>
</div>