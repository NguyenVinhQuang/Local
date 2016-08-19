<script src="<?php echo base_url(); ?>resources/scripts/event_add_parentCategories.js" type="text/javascript"></script>
<!-- forms add-->
<div class="box" >
	<!-- box / title -->
	<div class="title">
		<h5>Add categories</h5>
	</div>
	<!-- end box / title -->
	<form id="form" action="<?php echo base_url(); ?>index.php/parent_categories/insertParentCategories" method="post">
	<div class="form">
		<div class="fields">

			<div class="field field-first">
				<div class="label">
					<!-- <label for="select">Quantity:</label> -->
					<?php echo form_label('Quantity:','select') ?>
				</div>
				<div class="select">
					<select id="select" name="select" onchange='displayInput(this.value)'>
						<option value="1">1</option>
						<option value="5">5</option>
						<option value="10">10</option>
					</select>

				</div>
			</div>
			<div id="input_field">
				<div class="field  " >
					<div class="label">
						 <label for="input-small">Name:</label>
					</div>
					<div class="input">
						<input type="text" id="input-small" name="txtName" class="small" />
					</div>
				</div>
			</div>
			
			<div class="buttons">
				<input type="submit" name="submit" value="Add" />
				<input type="reset" name="reset" value="Reset" />
			</div>
		</div>
	</div>
	</form>
</div>
<!-- end forms add