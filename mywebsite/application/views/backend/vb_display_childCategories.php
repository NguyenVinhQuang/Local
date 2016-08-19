<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_vb_display_childCategories.css">
<script src="<?php echo base_url(); ?>resources/scripts/event_display_childCategories.js" type="text/javascript"></script>
<!-- table -->
<div class="box">
	<!-- box / title -->
	<div class="title">
		<h5>Child Categories</h5>
	</div>
	<!-- end box / title -->
	<div class="table">
		<!-- form display -->
		<form name="frmDisplayParentCategories" action="<?php echo base_url(); ?>index.php/child_categories/modify" method="post">
		<!-- find parent -->
		<div id="findParent" class="clearfix">
			<label for="slParent">Parent:</label>
			<select name="slParent" id="slParent" onchange="changeTable(this.value);">
				<!-- parent selected -->
				<?php foreach ($parentSelect as $data): ?>
					<option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
				<?php endforeach ?>
				<?php foreach ($parent as $data): ?>
					<option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
				<?php endforeach ?>
				
			</select>
			<!-- <div id="inputParent">
				<input type="text" id="txtFindParent" name="txtFindParent" class="" />
				<ul>
					<li onlick="alert('sdf')">1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
					<li>5</li>
				</ul>
			</div> -->
			
		</div>
		<div id="tableChild">
			<table id="products">
				<thead>
					<tr>
						<th class="left">Id</th>
						<th>Name</th>
						<th class="selected last"><input type="checkbox" class="checkall" /></th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($child as $data) { ?>
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
					<span>showing results <?php echo $start ?> - <?php echo $end ?> of <?php echo $totalRows ?></span>
				</div>
				<div style="clear:both; text-align:center; font-size:14px;"><?php echo $this->pagination->create_links(); // tạo link phân trang?></div>
			</div>
			<!-- end pagination -->
		</div> <!-- end tableChild -->
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