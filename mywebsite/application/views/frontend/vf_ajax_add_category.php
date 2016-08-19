<div class="new-category" id="new-cate-<?php echo $count; ?>">
	<select name="sl-parent-<?php echo $count; ?>" id="sl-parent-<?php echo $count; ?>" onchange="displayChild(this.value,<?php echo $count; ?>);">
		<option value="none"></option>
		<?php foreach ($parent as $data): ?>
			<option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
		<?php endforeach ?>
	</select>
	<span id="child-cate-<?php echo $count; ?>">
		
	</span>
	<span class="remove" onclick="rmv(<?php echo $count; ?>);">Remove</span>
</div>