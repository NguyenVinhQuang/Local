<?php if ($value == 'vote'): ?>
	<button value='unvote' class="btn-unvote" type="button" onclick="changeBtn(this.value,<?php echo $data['id']; ?>);"><?php echo $new_vote; ?> vote</button>
<?php else: ?>
	<?php if ($value=='unvote'): ?>
		<button value = 'vote' class="btn-vote" type="button" onclick="changeBtn(this.value,<?php echo $data['id']; ?>);"><?php echo $new_vote; ?> Vote</button>
	<?php endif ?>
<?php endif ?>