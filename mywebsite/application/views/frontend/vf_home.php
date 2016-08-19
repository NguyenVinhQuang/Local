<div id="content">
    <div class="most-view">
        <h2 class="titlebig">
            Best of place in Singapore
        </h2>
        <?php foreach ($parent as $data): ?>
            <?php 
            $id_parent = $data['id'];
            //lay 5 dia diem thuoc parent category
            $txt = '
                SELECT DISTINCT a.place_id, b.id_parent, c . * 
                FROM place_category AS a
                INNER JOIN category AS b ON a.id_category = b.id
                INNER JOIN places AS c ON a.place_id = c.id
                WHERE b.id_parent ='.$id_parent.'
                ORDER BY c.review_quantity DESC 
                LIMIT 5
            ';
            $query = $this->db->query($txt);
            $place = $query->result_array();
            ?>
            <div class="featuredCategory">
                <h4>
                    <a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $id_parent; ?>">
                        <i <?php switch ($data['id']) {
                            case 1:
                            case 5:
                            case 6:
                                echo "style='background-position: -3px -555px;'";
                                break;
                            case 2:
                                echo "style='background-position: -3px -256px;'";
                                break;
                            case 3:
                                echo "style='background-position: -3px -578px;'";
                                break;
                            case 4:
                            case 8:
                                echo "style='background-position: -3px -417px;'";
                                break;
                            case 7:
                                echo "style='background-position: -3px -141px;'";
                                break;
                            case 9:
                                echo "style='background-position: -3px -118px;'";
                                break;
                            case 10:
                                echo "style='background-position: -3px -279px;'";
                                break;
                            case 11:
                                echo "style='background-position: -3px -371px;'";
                                break;
                            case 12:
                                echo "style='background-position: -3px -302px;'";
                                break;
                            case 13:
                                echo "style='background-position: -3px -49px;'";
                                break;
                            case 14:
                                echo "style='background-position: -3px -325px;'";
                                break;
                            case 15:
                                echo "style='background-position: -3px -26px;'";
                                break;
                            case 16:
                                echo "style='background-position: -3px -210px;'";
                                break;
                            case 17:
                                echo "style='background-position: -3px -3px;'";
                                break;
                            case 18:
                                echo "style='background-position: -3px -348px;'";
                                break;
                            case 19:
                                echo "style='background-position: -3px -486px;'";
                                break;
                            case 20:
                                echo "style='background-position: -3px -187px;'";
                                break;
                            case 21:
                                echo "style='background-position: -3px -440px;'";
                                break;
                            case 22:
                                echo "style='background-position: -3px -463px;'";
                                break;
                            case 23:
                                echo "style='background-position: -3px -532px;'";
                                break;
                            case 24:
                                echo "style='background-position: -3px -233px;'";
                                break;
                            case 25:
                                echo "style='background-position: -3px -509px;'";
                                break;
                            case 26:
                                echo "style='background-position: -3px -394px;'";
                                break;
                            default:
                                break;
                        } ?>></i>
                        <span><?php echo ucwords(strtolower($data['name'])); ?></span>
                    </a>
                </h4>
                <ul class="places">
                    <?php foreach ($place as $place): ?>
                        <li class="placeLink">
                            <div class="media-avatar">
                                <div class="photos-box pb-60s">
                                    <a href="<?php echo base_url() ?>index.php/place/displayPlace/<?php echo $place['id']; ?>">
                                        <?php if ($place['photo'] == null): ?>
                                            <img src="<?php echo base_url(); ?>resources/images/business_medium_square.png" alt="" class="photos-box-img">
                                        <?php else: ?>
                                            <img src="<?php echo base_url(); ?>resources/images/place/place_<?php echo $place['id']; ?>/<?php echo $place['photo'] ?>" alt="" class="photos-box-img">
                                        <?php endif ?>
                                        
                                    </a>
                                </div>
                            </div>
                            <div class="media-name">
                                <a  href="<?php echo base_url() ?>index.php/place/displayPlace/<?php echo $place['id']; ?>"><?php echo substr($place['name'],0,38); ?></a>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endforeach ?>
    </div> <!-- end most-view -->
</div> <!-- end content -->

<div id="side-bar">
    <div class="new-places">
        <h3>Địa điểm mới</h3>
        <ul>
            <?php foreach ($new_places as $data): ?>
                <li><a href="<?php echo base_url(); ?>index.php/place/displayPlace/<?php echo $data['id'] ?>"><?php echo $data['name']; ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</div> <!-- end side bar -->
