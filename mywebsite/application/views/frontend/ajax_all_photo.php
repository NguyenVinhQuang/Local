	<script src="<?php echo base_url(); ?>resources/scripts/event_photo.js" type="text/javascript"></script>
	<table border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td class="photos">
					<div id="photo-thumbnails" class="clearfix">
						<?php foreach ($all_image as $data): ?>
							<div class="photo" id="photo_<?php echo $data['id']; ?>">
								<div class="thumb-wrap">
									<div class="photo-box biz-photo-box pb-ms">
										<a href="/biz_photos/nuoc-singapore?select=UoLpU3bgGJx_BlrmgJi1_Q">
											<img alt="Deepfried spring roll" class="photo-box-img" height="100" src="<?php echo base_url(); ?>/resources/images/place/place_<?php echo $data['place_id']; ?>/<?php echo $data['name']; ?>" width="100">
										</a>
									</div>
								</div>
								<div class="caption">
									<p class="smaller">From <a href="<?php echo base_url(); ?>index.php/user/displayUser/<?php echo $data['user_id']; ?>"><?php echo ucfirst($data['account']); ?>.</a></p>
								</div>
								<div class="button">
									<form action="" method="post">
										<?php $vote = $this->m_user_image->select($this->session->userdata('user_id'),$data['id']); ?>
										<?php if ($this->session->userdata('user_id')): //co tai khoan?>
											<?php if (count($vote) > 0): //neu da vote ?>
												<div id="btn_vote_<?php echo $data['id']; ?>" class="vote clearfix">
													<button value='unvote' class="btn-unvote" type="button" onclick="changeBtn(this.value,<?php echo $data['id']; ?>);"><?php echo $data['vote']; ?> vote</button>
												</div>
											<?php else: //chua vote?>
												<div id="btn_vote_<?php echo $data['id']; ?>" class="vote clearfix">
													<button value = 'vote' class="btn-vote" type="button" onclick="changeBtn(this.value, <?php echo $data['id'] ?>);"><?php echo $data['vote']; ?> Vote</button>
												</div>
											<?php endif ?>
										<?php else: //khong co tai khoan?>
											<div id="btn_vote_<?php echo $data['id']; ?>" class="vote clearfix">
												<button value = 'vote' class="btn-vote" type="button"><?php echo $data['vote']; ?> Vote</button>
											</div>
										<?php endif ?>
										
										<div class="clearfix"></div>
										<?php if ($this->session->userdata('user_level') == 1): //tai khoan admin?>
											<div class="remove clearfix" id="remove_<?php echo $data['id'] ?>">
												<button value = 'remove' class="btn-remove" type="button" onclick="confirm(<?php echo $data['id'] ?>);">Remove</button>
											</div>
										<?php endif ?>
										
									</form>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</td>
			</tr>
			<tr>
				<td id="photo-pagination" class="pagination">
					<div id="pagination-controls">
						<table cellpadding="0" cellspacing="0" border="0" width="95%" class="fs_pagination_controls">
							<tbody>
								<tr>
									<td class="range-of-total" id="all-link">
										<span><?php echo $this->pagination->create_links(); ?></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
		</tbody>
	</table>