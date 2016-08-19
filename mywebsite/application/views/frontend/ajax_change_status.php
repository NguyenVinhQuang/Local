<?php if ($value == 0): ?>
	<button  value="1" class="btn-status-on" type="button" onclick="changeStatus(this.value,<?php echo $data['id']; ?>);">
	  <span>
	    <i></i>
	    <span class="vote-type">ON</span>
	    <span class="count"></span>
	  </span>
	</button>
<?php else: ?>
	<?php if ($value == 1): ?>
		<button  value="0" class="btn-status-off" type="button" onclick="changeStatus(this.value,<?php echo $data['id']; ?>);">
		    <span>
		      <i></i>
		      <span class="vote-type">OFF</span>
		      <span class="count"></span>
		    </span>
		</button>
	<?php endif ?>
<?php endif ?>
