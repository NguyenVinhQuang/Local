<script src="<?php echo base_url(); ?>resources/scripts/event_add_childCategories.js" type="text/javascript"></script>
<!-- forms add-->
<div class="box" >
	<!-- box / title -->
	<div class="title">
		<h5>Add child categories</h5>
	</div>
	<!-- end box / title -->
	<form id="form" action="<?php echo base_url(); ?>index.php/child_categories/insert" method="post">
	<div class="form">
		<div class="fields">
			<!-- quantity -->
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

			<!-- parent -->
			<div class="field">
				<div class="label">
					<label for="selectParent" id="lblParent">Parent:</label>
				</div>
				<div class="select">
					<select id="selectParent" name="selectParent" size="20" onclick="changeLable(this.value)">
						<?php foreach ($parentAll as $data): ?>
							<option  value="<?php echo $data['name'] ?>"><?php echo $data['name'] ?></option>
						<?php endforeach ?>
					</select>

				</div>
			</div>
			
			<!-- name: -->
			<div id="input_field">
				<div class="field  " >
					<div class="label">
						 <label for="input-small">Child:</label>
					</div>
					<div class="input">
						<input type="text" id="input-small" name="txtName" class="small" />
					</div>
				</div>
			</div>
			
			<div class="buttons">
				<div class="highlight">
					<input type="submit" name="submit.highlight" value="ADD" />
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
<!-- end forms add