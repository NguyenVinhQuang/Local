<link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/style_result.css">
<div class="column column-alpha">
	<div class="search-header clearfix">
		<h1>
			<?php echo $keyword_space; ?>
			<span class="query-location">Singapore</span>
		</h1>
		<?php if (count($result) > 0 ): ?>
			<span class="pagination-results-window">
				Showing <?php echo $start; ?>-<?php echo $end; ?> of <?php echo $total; ?>
			</span>
		<?php endif ?>
		<?php if (count($result) > 0 ): ?>
			<div class="call-to-action">
				Showing results for "<?php echo $keyword_space; ?>".
			</div>
		<?php else: ?>
			<div class="call-to-action">
				No results found for "<?php echo $keyword_space; ?>".
			</div>	
		<?php endif ?>
		
	</div>
</div>

<div class="result-column">
	<ul class="ylist ylist-bordered search-results"->
		<?php $i = $start; ?>
		<?php foreach ($result as $data): ?>
			<li class="clearfix">
				<div class="search-result natural-search-result biz-listing-large">
					<div class="media-block clearfix media-block-large main-attributes">
						<div class="media-avatar">
							<div class="photo-box pb-90s">
								<a href="<?php echo base_url(); ?>index.php/place/displayPlace/<?php echo $data['place_id']; ?>">
									<?php if ($data['photo'] == null): ?>
										<img alt="Imperial Treasure Super Peking Duck" class="photo-box-img" height="90" src="<?php echo base_url(); ?>resources/images/business_medium_square.png" width="90">
									<?php else: ?>
										<img alt="Imperial Treasure Super Peking Duck" class="photo-box-img" height="90" src="<?php echo base_url(); ?>resources/images/place/place_<?php echo $data['place_id'] ?>/<?php echo $data['photo']; ?>" width="90">
									<?php endif ?>
								</a>
							</div>
						</div>
						<div class="media-story">
							<h3 class="search-result-title">
								<span class="indexed-biz-name">
									<?php echo $i; $i++; ?>.
									<a href="<?php echo base_url(); ?>index.php/place/displayPlace/<?php echo $data['place_id']; ?>" class="biz-name"><?php echo $data['name'] ?></a>
								</span>
							</h3>
							<div class="biz-rating biz-rating-large clearfix">
								<div class="rating-large">
									<i
										<?php 
							                $star_quan = $data['star_quantity'];
							                if ($star_quan < 0.7) {
							                  echo "style='background-position: -3px -303px;'";
							                }elseif ($star_quan<1.4) {
							                  echo "style='background-position: -3px -324px;'";
							                }elseif ($star_quan<1.7) {
							                  echo "style='background-position: -3px -345px;'";
							                }elseif ($star_quan<2.4) {
							                  echo "style='background-position: -3px -366px;'";
							                }elseif ($star_quan<2.7) {
							                  echo "style='background-position: -3px -387px;'";
							                }elseif ($star_quan<3.4) {
							                  echo "style='background-position: -3px -408px;'";
							                }elseif ($star_quan<3.7) {
							                  echo "style='background-position: -3px -429px;'";
							                }elseif ($star_quan<4.4) {
							                  echo "style='background-position: -3px -450px;'";
							                }elseif ($star_quan<4.7) {
							                  echo "style='background-position: -3px -471px;'";
							                }else echo "style='background-position: -3px -492px;'";
										?>
									></i>
								</div>
								<span class="review-count rating-qualifier">
								    <?php echo $data['review_quantity']; ?> reviews
							    </span>
							</div>
							<div class="price-category">
								<span class="category-str-list">
									<?php  
										$category = $this->m_place_category->select_category($data['place_id']);
									?>
									<?php foreach ($category as $category): ?>
										<a href="#"><?php echo $category['name']; ?></a>
									<?php endforeach ?>
								</span>
							</div>
						</div>
					</div>
					<div class="secondary-attributes">
						<address>
						    <?php echo $data['address']; ?>
						</address>
						<span class="biz-phone">
						        <?php 
						        if ($data['phone_number'] != null) {
						        	echo '+'.$data['phone_number'];
						        }
						        ?>
						</span>
					</div>
				</div>
			</li>	
		<?php endforeach ?>
	</ul>
	<?php if (count($result) > 0 ): ?>
		<div class="search-pagination">
			<div class="pagination-block clearfix">
				<div class="page-of-pages">
				        <?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>	
	<?php else: ?>
		<div class="no-result">
			<strong>Suggestions for improving the results:</strong>
			<ul>
                <li>Check the spelling or try alternate spellings.</li>
                <li>Try a more general search.</li>
            </ul>
		</div>
	<?php endif ?>
	
</div>