<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_place.css">
<script src="<?php echo base_url(); ?>resources/scripts/event_place.js" type="text/javascript"></script>
<div id="content">
    <div class="place clearfix">
            <script
            src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
            </script>

            <script>
            var myCenter=new google.maps.LatLng(<?php echo $place['map_lat']; ?>, <?php echo $place['map_long']; ?>);

            function initialize()
            {
            var mapProp = {
              center: myCenter,
              zoom:17,
              mapTypeId: google.maps.MapTypeId.ROADMAP
              };

            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var marker = new google.maps.Marker({
              position: myCenter,
              title:"<?php echo $place['name'] ;?>",
              // animation:google.maps.Animation.BOUNCE
              });

            marker.setMap(map);

            // Zoom to 9 when clicking on marker

                 
            google.maps.event.addListener(map,'click',function(event) {
             // alert(event.latLng);
              //marker.setPosition(event.latLng);
            //3 seconds after the center of the map has changed, pan back to the marker
              window.setTimeout(function() {
                map.panTo(marker.getPosition());
              },0);
              });
            }
            google.maps.event.addDomListener(window, 'load', initialize);
            </script>
        <div class="place-header clearfix">
          <h1 class="titlebig place-header-left">
              <?php echo $place['name']; ?>
          </h1>
            <div class="place-header-right">
              <a href="<?php echo base_url(); ?>index.php/review/writeReview/<?php echo $place['id']; ?>" class="review-btn">
                <span>
                  <i></i>
                  Write a Review
                </span>
              </a>
              <span class="btn-right">
                <a href="<?php echo base_url() ?>index.php/upload/displayUpload/<?php echo $place['id']; ?>" class="add-photo-btn">
                  <span>
                    <i></i>
                     Add Photo
                  </span>

                </a>
              </span>
            </div>
          <div class="place-header-star">
            <i <?php 
                $star_quan = $place['star_quantity'];
                if ($star_quan < 0.7) {
                  echo "style='background-position: -3px -514px;'";
                }elseif ($star_quan<1.4) {
                  echo "style='background-position: -3px -539px;'";
                }elseif ($star_quan<1.7) {
                  echo "style='background-position: -3px -564px;'";
                }elseif ($star_quan<2.4) {
                  echo "style='background-position: -3px -589px;'";
                }elseif ($star_quan<2.7) {
                  echo "style='background-position: -3px -614px;'";
                }elseif ($star_quan<3.4) {
                  echo "style='background-position: -3px -639px;'";
                }elseif ($star_quan<3.7) {
                  echo "style='background-position: -3px -664px;'";
                }elseif ($star_quan<4.4) {
                  echo "style='background-position: -3px -689px;'";
                }elseif ($star_quan<4.7) {
                  echo "style='background-position: -3px -714px;'";
                }else echo "style='background-position: -3px -739px;'";
              ?>></i>
          </div>
        </div>
        

        <!-- photo -->
        <div class="place-photos clearfix">
          <a class="btn-prev prev" href="#">
              ◀
          </a>
          <div class="photos">
            <ul>
              <?php if (count($place_image)>0): ?>
                <?php foreach ($place_image as $data): ?>
                    <?php $full_path =  './resources/images/place/place_'.$data['place_id'].'/'.$data['name'];
                    ?>
                    <?php if (file_exists($full_path)): ?>
                      <li><a href="#"><img src="<?php echo base_url().$full_path; ?>" alt=""></a></li>
                    <?php endif ?>
                <?php endforeach ?>
              <?php else: ?>
                  <li><a href="#"><img src="<?php echo base_url() ?>resources/images/no-image.jpg" alt=""></a></li>
              <?php endif ?>
              
            </ul>
          </div>
          <a class="btn-next next" href="#">
              ▶
          </a>
          <script type="text/javascript">
              $(function() {
                  $(".photos").jCarouselLite({
                      btnNext: ".next",
                      btnPrev: ".prev",
                      speed: 500,
                      visible:4,
                      circular: false,
                      
                  });
              }); 
          </script>
          <a href="<?php echo base_url(); ?>index.php/photo/displayPhoto/<?php echo $place['id']; ?>" style="float:right; font-size:12px;">view all photos</a>
        </div>
        <div class="simple-info">
            <p><b>Địa chỉ: </b><span><?php echo $place['address']; ?></span></p>
            <p><b>Điện Thoại: </b><span><?php echo $place['phone_number']; ?></span></p>
            <p><b>Website: </b><a href="http://www.<?php echo $place['website']; ?>"><?php echo $place['website']; ?></a></p>
            <p>
              <b>Nhóm địa điểm: </b>
              <?php foreach ($category as $data): ?>
                <a href="#"><?php echo $data['name']; ?></a><span>, </span>
              <?php endforeach ?>
            </p>
            <p>
                <span class="comment-count"><b><?php echo $place['review_quantity']; ?></b></span> bình luận
                <span class="view-count"><b>26,140</b></span> lượt xem
            </p>
        </div> <!-- end simple-info -->

        <div id="googleMap">
            
        </div> <!-- end map -->
    </div> <!-- end place -->


    <div class="feed clearfix">
      <div class="feed-header clearfix">
        <h2>Reviews</h2>
      </div> <!-- end feed header -->
      <?php foreach ($pagination_review as $data): ?>
        <div class="review-list" id="review_<?php echo $data['id']; ?>">
          <ul class="review clearfix">
            <li class="review-detail clearfix">
              <div class="review-side-bar cleafix">
                <div class="passport cleafix">
                  <div class="media-avatar">
                      <a href="<?php echo base_url(); ?>index.php/user/displayUser/<?php echo $data['user_id']; ?>"><img 
                        <?php if ($data['photo'] != null): ?>
                          src="<?php echo base_url(); ?>resources/images/user/user_<?php echo $data['user_id'] ;?>/<?php echo $data['photo']; ?>"
                        <?php else: ?>
                          src="<?php echo base_url(); ?>resources/images/user_medium_square.png"
                        <?php endif ?>
                         alt="Photo of <?php echo $data['account'] ?>."></a>
                  </div>
                  <div class="media-story">
                    <ul class="user-passport-info">
                      <li class="user-name">
                        <a href="<?php echo base_url(); ?>index.php/user/displayUser/<?php echo $data['user_id']; ?>"><?php echo ucfirst($data['account']); ?>.</a>
                      </li>
                      <li class="user-location">
                        <b></b>
                      </li>
                    </ul>
                    <ul class="user-passport-stats">
                      <li class="review-count">
                        <span>
                          <i></i>
                          <b><?php echo count($this->m_review->review_user_id_onl($data['user_id']) ); ?></b>
                           reviews
                        </span>
                      </li>
                    </ul>
                  </div> <!-- end media-story -->
                </div>
              </div> <!-- end review-side-bar -->
              <div class="review-wrapper">
                <div class="review-content">
                  <div class="rating clearfix">
                    <i <?php switch ($data['star_quantity']) {
                            case '0':
                              echo "style='background-position: -3px -514px;'";
                              break;
                            case '1':
                              echo "style='background-position: -3px -539px;'";
                              break;
                            case '2':
                              echo "style='background-position: -3px -589px;'";
                              break;
                            case '3':
                              echo "style='background-position: -3px -639px;'";
                              break;
                            case '4':
                              echo "style='background-position: -3px -689px;'";
                              break;
                            case '5':
                              echo "style='background-position: -3px -739px;'";
                              break;
                            default:
                              # code...
                              break;
                          } ?>></i>
                    <span>
                      <?php 
                        echo date('d/m/Y',strtotime($data['date_start']));
                       ?>
                    </span>
                  </div>
                  <p class="review-comment">
                    <?php echo $data['text']; ?>
                  </p>
                </div>
                <div class="review-footer clearfix">
                  <div class="rate-review">
                    <p>Was this review …?</p>
                    <ul class="rate-review-btn">
                      <?php if ($this->session->userdata('logged_in')): ?>
                        <li id="btn_vote_<?php echo $data['id']; ?>">
                          <?php 
                            $user_review = $this->m_user_review->select($this->session->userdata('user_id'),$data['id']);
                           ?>
                           <?php if (count($user_review) > 0): ?>
                            <button class="btn-unvote" value="2" type="button" onclick="changeBtn(this.value,<?php echo $data['id']; ?>);">
                            <span>
                              <i></i>
                              <span class="vote-type">Useful</span>
                              <span class="count"><?php if ($data['useful'] != 0) {
                                echo $data['useful'];
                              } ?></span>
                            </span>
                          </button>
                            <?php else: ?>
                            <button  value="1" class="btn-vote" type="button" onclick="changeBtn(this.value,<?php echo $data['id']; ?>);" >
                              <span>
                                <i></i>
                                <span class="vote-type">Useful</span>
                                <span class="count"><?php if ($data['useful'] != 0) {
                                  echo $data['useful'];
                                } ?></span>
                              </span>
                            </button>
                           <?php endif ?>
                        </li>
                        <?php if ($this->session->userdata('user_level') == 1): ?>
                        <li id="btn_status_<?php echo $data['id']; ?>">
                            <?php if ($data['status'] == '1'): ?>
                              <button  value="1" class="btn-status-on" type="button" onclick="changeStatus(this.value,<?php echo $data['id']; ?>);">
                                <span>
                                  <i></i>
                                  <span class="vote-type">ON</span>
                                  <span class="count"></span>
                                </span>
                              </button>
                            <?php else: ?>
                              <button  value="0" class="btn-status-off" type="button" onclick="changeStatus(this.value,<?php echo $data['id']; ?>);">
                                <span>
                                  <i></i>
                                  <span class="vote-type">OFF</span>
                                  <span class="count"></span>
                                </span>
                              </button>
                            <?php endif ?>
                        </li>
                        <?php endif ?>
                      <?php else: ?>
                        <li>
                          <button  class="btn-vote" type="button">
                            <span>
                              <i></i>
                              <span class="vote-type">Usefull</span>
                              <span class="count"><?php if ($data['useful'] != 0) {
                                echo $data['useful'];
                              } ?></span>
                            </span>
                          </button>
                        </li>
                      <?php endif ?>
                    </ul>
                  </div>
                  <?php if ($this->session->userdata('user_level') == 1): ?>
                    <p class="reviewActions smallest">
                        <a class="i-wrap ig-wrap-common i-x-close-gray-small-common-wrap" onclick="remove_review(<?php echo $data['id']; ?>);">
                          <i class="i ig-common i-x-close-gray-small-common"></i>
                          Remove
                        </a>
                    </p>
                  <?php endif ?>
                </div>
              </div> <!-- end review-wrapper -->
            </li>
          </ul>
        </div> <!-- end review list -->
      <?php endforeach ?>
      
      <div class="review-pager">
        <?php if (count($pagination_review) > 0): ?>
          <?php echo $this->pagination->create_links(); // tạo link phân trang?>
        <?php endif ?>
      </div> <!-- end review-pager -->
    </div>
</div> <!-- end content -->




<div id="side-bar">
  <div id="modify-place" class="clearfix">
    <?php if ($this->session->userdata('user_level') == 1): ?>
      <span class="btn-edit">
        <a href="<?php echo base_url(); ?>index.php/place/update/<?php echo $place['id']; ?>" class="edit-place-btn">
          <span>
             Edit Info
          </span>
        </a>
      </span>
      <span class="btn-edit">
        <a class="edit-place-btn" onclick="confirm_delete(<?php echo $place['id']; ?>);">
          <span>
             Delete
          </span>
        </a>
      </span>
    <?php endif ?>
    

  </div>
</div>


