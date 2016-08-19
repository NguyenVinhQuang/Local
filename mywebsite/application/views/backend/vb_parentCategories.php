<div id="right">
	<!-- table -->
	<div class="box">
		<!-- box / title -->
		<div class="title">
			<h5>Parent categories</h5>
			<!-- form search -->
			<div class="search">
				<form action="#" method="post">
					<div class="input">
						<input type="text" id="search" name="search" />
					</div>
					<div class="button">
						<input type="submit" name="submit" value="Search" />
					</div>
				</form> <!-- end search -->
			</div>
		</div>
		<!-- end box / title -->
		<div class="table">
			<!-- form display -->
			<form name="frmDisplayParentCategories" action="<?php echo base_url(); ?>index.php/parent_categories/modify" method="post">
			<table id="products">
				<thead>
					<tr>
						<th class="left">Id</th>
						<th>Name</th>
						<th class="selected last"><input type="checkbox" class="checkall" /></th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($pagination_parent as $data) { ?>
						<tr>
							<td class="title"><?php echo $data["id"]; ?></td>
							<td class="price"><?php echo $data["name"]; ?></td>
							
							<td class="selected last"><input type="checkbox" name="sl_id[]" value="<?php echo $data["id"]; ?>"/></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<!-- pagination -->
			<div class="pagination pagination-left">
				<div class="results">
					<span>showing results <?php echo $start ?>-<?php echo $end ?> of <?php echo $totalRows ?></span>
				</div>
				<span style="float:right; font-size:14px;"><?php echo $this->pagination->create_links(); // tạo link phân trang  ?> </span>
				
			</div>
			<!-- end pagination -->
			<!-- table action -->
			<div class="action">
				<select name="action">
					<option value="Delete" class="delete">Delete</option>
					<option value="Edit" class="edit">Edit</option>
				</select>
				<div class="button">
					<input type="submit" name="submit" value="Apply to Selected" />
				</div>
			</div>
			<!-- end table action -->
			</form> <!-- end from display -->
		</div>
	</div>
	<!-- end table -->
	

	<!-- forms add-->
	<?php $this->load->view('backend/vb_add_parentCategories'); ?>
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