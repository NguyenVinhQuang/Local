<?php if ($this->session->userdata('user_level') == 1 and $this->session->userdata('user_id')!= $user_id): ?>
	<?php if ($level == 1): ?>
		<span class="btn-set-level">
			<a class="set-member" onclick="change_level(<?php echo $user_id; ?>,<?php echo $level; ?>);">
				<span>Set Member</span>
			</a>
		</span>
	<?php else: ?>
		<span class="btn-set-level">
			<a class="set-admin" onclick="change_level(<?php echo $user_id; ?>,<?php echo $level; ?>)">
				<span>Set Admin</span>
			</a>
		</span>
	<?php endif ?>
<?php endif ?>