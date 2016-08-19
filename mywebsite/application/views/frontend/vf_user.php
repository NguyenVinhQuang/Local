<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_user.css">
<script src="<?php echo base_url(); ?>resources/scripts/event_user.js" type="text/javascript"></script>
<div id="user_header">
	<ul id="userTabs" class="clearfix">
		<li class="selected"><a href="/user_details?userid=4JLWtFE77CE1FLK_11bs-Q">Profile Home</a></li>
	</ul>

	<div class="boxAmbientYellow about-connections">
	    <h1>
	        <?php echo ucfirst ($user['account']); ?>.'s Profile
	    </h1>
	</div>
</div>

<div class="container" id="user-details">
	<div class="clearfix layout-block layout-o layout-border equalize-columns">
		<div class="column column-alpha " id="user_main_content">
			<div class="clearfix layout-block layout-sub-a">
				<div class="column column-sub-alpha " id="user_reviews_list">
					<div id="review_lister_header" class="clearfix">
						<h3 id="recentReviews">Recent Reviews</h3>
						
					</div>
					<?php foreach ($review as $data): ?>
						<div class="review clearfix" id="review_<?php echo $data['id']; ?>">
						<div class="biz_info">
					        <address class="smaller">
					            <?php echo $data['address']; ?>
					        </address>
					        <h4>
					            <a href="/biz/pho-bo-ga-mekong-vietnam-singapore?hrid=VvD2NvLCfcdalXk3_SzrQw#src:self">
					            	<?php echo $data['name']; ?>
					            </a>&nbsp;
					        </h4>
					    </div>
					    <div class="review-meta">
			                <div class="rating-container">
			                    <div class="rating">
						            <i class="star-img stars_5" title="5.0 star rating">
						            </i>
					        	</div>
			                </div>
			                <span class="smaller date">
			                    <?php 
			                      echo date('d/m/Y',strtotime($data['date_start']));
			                     ?>
			                </span>
			            </div>
			            <div class="review_comment">
			                <?php echo $data['text']; ?>
                        </div>
                        <?php if ($this->session->userdata('user_id') == $user['id']): ?>
                        	<p class="reviewActions smallest">
						        <a  class="i-wrap ig-wrap-common i-x-close-gray-small-common-wrap" onclick="remove_review(<?php echo $data['id']; ?>);">
						        	<i class="i ig-common i-x-close-gray-small-common"></i>
						        	Remove
						        </a>
						    </p>
                        <?php endif ?>
                        	
					</div>
					<?php endforeach ?>
					<div id="pagination" style="font-size:12px;">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>

			</div>
		</div>
		<div class="column column-beta ">
			<div id="user-profile-photos" class="clearfix">
				<div id="user-main-photo">
					<div class="photo-box pb-ms">
			            <a href="/user_photos?return_url=%2Fuser_details%3Fuserid%3D4JLWtFE77CE1FLK_11bs-Q&amp;select=ArJu1dvHicLSvi2kLjLzCg&amp;userid=4JLWtFE77CE1FLK_11bs-Q">
			                <img alt="Photo of <?php echo $user['account'] ?>." class="photo-box-img" height="100" id="main_user_photo_in_about_user_column" 
			                <?php if ($user['photo'] != null): ?>
			                src="<?php echo base_url(); ?>resources/images/user/user_<?php echo $user['id'] ;?>/<?php echo $user['photo']; ?>"
			            	<?php else: ?>
			            	src="<?php echo base_url(); ?>resources/images/user_medium_square.png"
			                <?php endif ?>
			                 width="100">
			            </a>
				    </div>
				</div>
			</div>
			<?php if ($this->session->userdata('user_id') == $user['id']): ?>
				<div id="upload_photos">
					<div id="error">
						<?php echo $error; ?>
					</div>
					<form action="<?php echo base_url(); ?>index.php/user/do_upload" method="post" enctype="multipart/form-data">
						<input type="file"  name="userfile" size="" onchange="this.form.submit()"/>
					</form>
				</div>
			<?php endif ?>
			<ul id="user_stats">
	            <li>
	                <a href="/user_details_reviews_self?userid=4JLWtFE77CE1FLK_11bs-Q" class="i-wrap ig-wrap-common i-star-orange-common-wrap">
	                	<i class="i ig-common i-star-orange-common"></i>
	                	<?php echo count($review); ?> Review
	                </a>
	            </li>
	        </ul>
	        <div id="set-level">
	        	<?php if ($this->session->userdata('user_level') == 1 and $this->session->userdata('user_id')!= $user['id']): ?>
	        		<?php if ($user['level'] == 1): ?>
	        			<span class="btn-set-level">
	        				<a class="set-member" onclick="change_level(<?php echo $user['id']; ?>,<?php echo $user['level']; ?>);">
	        					<span>Set Member</span>
	        				</a>
	        			</span>
	        		<?php else: ?>
	        			<span class="btn-set-level">
	        				<a class="set-admin" onclick="change_level(<?php echo $user['id']; ?>,<?php echo $user['level']; ?>)">
	        					<span>Set Admin</span>
	        				</a>
	        			</span>
	        		<?php endif ?>
	        	<?php endif ?>
	        </div>
		</div>
	</div>
</div>
