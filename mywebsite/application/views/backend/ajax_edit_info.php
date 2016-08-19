<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_edit_info.css">
<script type="text/javascript" src="<?php echo base_url(); ?>resources/scripts/event_info.js"></script>
<div id="right">
	<!-- forms add-->
	<div class="box" >
		<!-- box / title -->
		<div class="title">
			<h5>Edit Info</h5>
		</div>
		<!-- end box / title -->
		<form id="form" action="<?php echo base_url(); ?>index.php/info/excEdit" method="post">
			<input type="hidden" name="id" value ="<?php echo $id ?>">
		<div class="form">
			<div class="fields">

				<div class="field field-first">
					<div class="label">
						<label for="select">Type:</label>
					</div>
					<div class="select">
						<select id="select" name="select" onchange='displayAnswer(this.value);'>
							<option value="none" <?php if($type == null) echo 'selected = "selected"'?> >Select a type</option>
							<option value="yn" <?php if($type == 1) echo 'selected = "selected"'?>>Yes/No</option>
							<option value="mc" <?php if($type == 2) echo 'selected = "selected"'?>>Multi Choices</option>
						</select>

					</div>
				</div>
				<div id="input_field">
					<div class="field  " >
						<div class="label">
							 <label for="input-small">Info:</label>
						</div>
						<div class="input">
							<input type="text" id="input-small" name="txtName" class="small" value="<?php echo $info; ?>"/>
						</div>
					</div>
				</div>
				<div id="answerMultichoices" <?php if ($type == null or $type == 1): ?>
						style="display:none;"
					<?php endif ?>>
					<?php $i = 1; ?>
					<?php foreach ($answer as $data): ?>
						<div class="field">
							<div class="label">
								<label for="answer<?php echo $i; ?>">Answer <?php echo $i; ?>:</label>
							</div>
							<div class="input">
								<input type="text" id="answer<?php echo $i; ?>" name="txtAnswer<?php echo $i; ?>" class="small" value="<?php echo $data['answer'] ?>"/>
								<input type="hidden" id="" name="txtHide<?php echo $i; ?>" value="<?php echo $data['answer'] ?>"/>
							</div>
						</div>
						<?php ++$i; ?>
					<?php endforeach ?>
					
					<div id="more">
						
					</div>
					<!-- more ans -->
					<div class="field">
						<div class="label">
							<button type="button" name="btnshowmore" id="btnshowmore" value ="<?php echo $i; ?>" onclick="showMore(this.value)">More Answer</button>
							<input id="btnHide"type="hidden" name="btnHide" value="<?php echo $i; ?>">
						</div>
					</div>
					<!-- end more ans -->
				</div> <!-- end ans multichoices -->
				<div class="buttons">
					<input type="submit" name="submit" value="Update" />
					<input type="reset" name="reset" value="Reset" />
				</div>
			</div>
		</div>
		</form>
	</div>
	<!-- end forms add -->
</div>