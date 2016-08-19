<!-- event_info.js -->
<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_vb_add_info.css">
<div class="box" >
	<!-- box / title -->
	<div class="title">
		<h5>Add Info</h5>
	</div>
	<!-- end box / title -->
	<form id="frmAddInfo" action="<?php echo base_url(); ?>index.php/info/insert" method="post">
		<input type="hidden" name="check" value="true">
	<div class="form">
		<div class="fields">

			<div class="field field-first">
				<div class="label">
					<label for="select">Type:</label>
				</div>
				<div class="select">
					<select id="select" name="select" onchange='displayAnswer(this.value);'>
						<option value="none">Select a type</option>
						<option value="yn">yes/no</option>
						<option value="mc">multichoices</option>
					</select>

				</div>
			</div>
			<div id="input_field">
				<div class="field  " >
					<div class="label">
						 <label for="input-small">Info:</label>
					</div>
					<div class="input">
						<input type="text" id="input-small" name="txtName" class="small" />
					</div>
				</div>
			</div>
			<div id="answerMultichoices" >
				<div class="field">
					<div class="label">
						<label for="answer1">Answer 1:</label>
					</div>
					<div class="input">
						<input type="text" id="answer1" name="txtAnswer1" class="small" />
					</div>
				</div>
				<div class="field">
					<div class="label">
						<label for="answer1">Answer 2:</label>
					</div>
					<div class="input">
						<input type="text" id="answer2" name="txtAnswer2" class="small" />
					</div>
				</div>
				<div class="field">
					<div class="label">
						<label for="answer1">Answer 3:</label>
					</div>
					<div class="input">
						<input type="text" id="answer3" name="txtAnswer3" class="small" />
					</div>
				</div>
				<div id="more">
					
				</div>
				<!-- more answer -->
				<div class="field">
					<div class="label">
						<button id = "btnshowmore"type="button" name="btnshowmore" value="4" onclick="showMore(this.value);">More Answer</button>
						<input type="hidden" name="btnHide" id="btnHide" value="4">
					</div>
				</div>
				<!-- end more answer -->
			</div>

			<div class="buttons">
				<input type="submit" name="submit" value="Add" />
				<input type="reset" name="reset" value="Reset" onlick=""/>
			</div>
		</div>
	</div>
	</form>
</div>