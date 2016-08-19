<div id="right">
	<!-- table -->
	<div class="box">
		<!-- box / title -->
		<div class="title">
			<h5>Edit Parent categories</h5>
		</div>
		<!-- end box / title -->
		<div class="table">
			<form name = 'frmEdit' action="<?php echo base_url(); ?>index.php/parent_categories/excUpdate" method="post">
			<input type="hidden" name="check" value="true">
			<table id="products">
				<thead>
					<tr>
						<th class="left">Id</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($dataTable as $data) { ?>
						<tr>
							<td class="title"><?php echo $data["id"]; ?></td>
							<td class="price"><input type="text" name="<?php echo $data["id"]; ?>" value="<?php echo $data["name"]; ?>"></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<!-- table action -->
			<div class="action">
				<div class="button">
					<input type="submit" name="submit" value="Edit all" />
				</div>
			</div>
			<!-- end table action -->
			</form>
		</div>
	</div>
	<!-- end table -->
	

	<!-- forms add-->
	<?php $this->load->view('backend/vb_add_parentCategories'); ?>
	<!-- end forms add-->
	<div class="box" style="visibility:hidden;">
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