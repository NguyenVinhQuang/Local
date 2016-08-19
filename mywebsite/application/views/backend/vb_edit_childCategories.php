<div id="right">	
	<!-- forms edit-->
	<div class="box">
		<!-- box / title -->
		<div class="title">
			<h5><?php foreach ($parentSelect as $data): ?>
			<?php echo $data['name'] ?>
		<?php endforeach ?></h5>
		</div>
		<!-- end box / title -->
		<div class="table">
			<form name = 'frmEdit' action="<?php echo base_url(); ?>index.php/child_categories/excUpdate" method="post">
			<input type="hidden" name="check" value="true">
			<table id="products">
				<thead>
					<tr>
						<th class="left">Id_Child_Categories</th>
						<th>Name_Child_Categories</th>
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
	<!-- end forms edit-->

	<!-- forms add-->
	<?php $this->load->view('backend/vb_add_childCategories'); ?>
	<!-- end forms add-->
	
	

	
</div>