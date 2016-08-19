<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_upload.css">
<div class="column column-alpha clearfix">
	<div id="user_biz_photo_intro">
	    <h2><a href="<?php echo base_url(); ?>index.php/place/displayPlace/<?php echo $place['id']; ?>"><?php echo $place['name']; ?>:</a> Add Photos</h2>
	    <a class="view-all" href="/biz_photos/tian-tian-hainanese-chicken-rice-singapore-2">View all photos</a><br><br>
	</div>
	<div id="swf-uploader">
	    <div id="upload-area" class="biz-uploader">
	    	<div class="error">
	    		<?php echo $error;?>
	    	</div>
	        <div id="upload-title" class="biz-uploader">Upload Photos</div>
	        <form id="upload-info-area" method="post" action="<?php echo base_url() ?>index.php/upload/do_upload/<?php echo $place['id']; ?>" enctype="multipart/form-data">
	            <p class="clearfix">
	                <input type="file"  name="userfile" size="20"/>
	                <input type="submit" value="upload" class="ybtn ybtn-primary btn-submit" />
	            </p>
	        </form>
	    </div>
	</div>
</div>