<select name="sl-child-<?php echo $count; ?>" id="sl-child-<?php echo $count; ?>" onchange="submitSelectChild(<?php echo $count; ?>)">
	<option value="none"></option>
	<?php foreach ($child as $data): ?>
		<option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
	<?php endforeach ?>
</select>