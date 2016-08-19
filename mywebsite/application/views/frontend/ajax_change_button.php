<?php if ($value == 1): ?>
	<button class="btn-unvote" value="2" type="button" onclick="changeBtn(this.value,<?php echo $data['id']; ?>);">
	  <span>
	    <i></i>
	    <span class="vote-type">Usefull</span>
	    <span class="count"><?php if ($useful != 0) {
                                echo $useful;
                              } ?></span>
	  </span>
	</button>
<?php else: ?>
	<?php if ($value == 2): ?>
		<button  value="1" class="btn-vote" type="button" onclick="changeBtn(this.value,<?php echo $data['id']; ?>);" >
	        <span>
	          <i></i>
	          <span class="vote-type">Usefull</span>
	          <span class="count"><?php if ($useful != 0) {
                                echo $useful;
                              } ?></span>
	        </span>
	      </button>
	<?php endif ?>
<?php endif ?>
