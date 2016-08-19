<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_review.css">
<script src="<?php echo base_url(); ?>resources/scripts/event_review.js" type="text/javascript"></script>
<form action="" method="post">
	<div class="alert-error">
		<?php echo validation_errors(); ?>			
	</div>
	<div id="review_header" class="clearfix">
		<h2>
			<strong>Complete Your Review:</strong>
			<a href="<?php echo base_url(); ?>index.php/place/displayPlace/<?php echo $place['id'];?>"><?php echo $place['name']; ?></a>
		</h2>
		<address><?php echo $place['address']; ?></address>
	</div>



	<ul class="write-a-review clearfix">
		<li class="clearfix">
			<label for=""><strong>Rating</strong></label>
			<div class="primary">
				<fieldset class="star-rating-widget">
					<ul class="start-0" id='star' >
						<li>
							<input id="rating-1" type="radio" name="rating" value="1" onmouseover="changeBg(this.value)" onmouseout="returnBg()">
						</li>
						<li>
							<input id="rating-2" type="radio" name="rating" value="2" onmouseover="changeBg(this.value)" onmouseout="returnBg()">
						</li>
						<li>
							<input id="rating-3" type="radio" name="rating" value="3" onmouseover="changeBg(this.value)" onmouseout="returnBg()">
						</li>
						<li>
							<input id="rating-4" type="radio" name="rating" value="4" onmouseover="changeBg(this.value)" onmouseout="returnBg()">
						</li>
						<li>
							<input id="rating-5" type="radio" name="rating" value="5" onmouseover="changeBg(this.value)" onmouseout="returnBg()">
						</li>
					</ul>
				</fieldset>
				<p id="ratingDescription">Roll over stars, then click to rate.</p>
			</div>
		</li>
		<li class="clearfix">
			<label for=""><strong>Your Review</strong></label>
			<div class="primary">
				<textarea name="txtReview" id="" cols="40" rows="8"></textarea>	
			</div>
		</li>
	</ul>


	<div id="review-footer" class="clearfix">
		<p class="clearfix">
			<a href="<?php echo base_url(); ?>index.php/place/displayPlace/<?php echo $place['id']; ?>">Cancel</a>
			<button type="submit">
				<span->Post</span>
			</button>
		</p>
		<p></p>
	</div>
</form>
