<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_create_place.css">
<script src="<?php echo base_url(); ?>resources/scripts/event_create_place.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script>
function initialize() {
  var mapOptions = {
    center: new google.maps.LatLng(<?php echo $place['map_lat']; ?>, <?php echo $place['map_long']; ?>),
    zoom: 16
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);

  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));

  var types = document.getElementById('type-selector');
  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    position: mapOptions.center,
    title:"<?php echo $place['name'] ;?>",
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
    document.getElementById('txtLat').value = marker.getPosition().lat();
    document.getElementById('txtLng').value = marker.getPosition().lng();
  });

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    google.maps.event.addDomListener(radioButton, 'click', function() {
      autocomplete.setTypes(types);
    });
  }

  setupClickListener('changetype-all', []);
  setupClickListener('changetype-establishment', ['establishment']);
  setupClickListener('changetype-geocode', ['geocode']);
}

google.maps.event.addDomListener(window, 'load', initialize);   

    </script>
<div id="content">
    <div id="create-place">
    	<h2><?php echo $place['name']; ?></h2>
    	<form action="" method="post" onkeypress="return event.keyCode != 13";>
            <input id='txtLat' type="hidden" name='txtLat' value="<?php echo $place['map_lat']; ?>">
            <input id='txtLng' type="hidden" name='txtLng' value="<?php echo $place['map_long']; ?>">
    		<ul >
    			<li class="place-name clearfix">
    				<label for="txtname">Name</label>
            <div class="alert"><?php echo form_error('txtName'); ?></div>
    				<input type="text" name="txtName" id="txtname"  placeholder="Enter a name" value="<?php echo $place['name']; ?>">
    			</li>
    			<li class="place-address clearfix">
    				<label for="txtaddress">Address</label>
            <div class="alert"><?php echo form_error('txtAddress'); ?></div>
            <input id="pac-input" name="txtAddress" class="controls" type="text" placeholder="Enter a location" value="<?php echo $place['address'] ?>">
    			</li>
    			<li class="place-phone clearfix">
    				<label for="txtphone">Phone Number</label>
            <div class="alert"><?php echo form_error('txtPhone'); ?></div>
    				<input type="text" name="txtPhone" id="txtphone" placeholder="Enter a phone number" value="<?php echo $place['phone_number']; ?>">
    			</li>
    			<li class="place-website clearfix">
    				<label for="txtwebsite">Website</label>
    				<input type="text" name="txtWebsite" id="txtwebsite" placeholder="Enter a site" value="<?php echo $place['website']; ?>">
    			</li>
    			<li class="place-categories clearfix">
    				<label for="">Categories</label>
            <div class="alert"><?php if (isset($error_cate)) { echo $error_cate;} ?></div>
    				
    				<div id="add-new">
              <?php $count = count($place_cate); 
              ?>
              <?php 
                for ($i=0; $i < $count; $i++) { ?>
                  <div class="new-category" id="new-cate-<?php echo $i+1; ?>">
                    <select name="sl-parent-<?php echo $i+1; ?>" id="sl-parent-<?php echo $i+1; ?>" onchange="displayChild(this.value,<?php echo $i+1; ?>);" >
                      <option value="none"></option>
                      <?php foreach ($parent as $data): ?>
                        <option value="<?php echo $data['id']; ?>" <?php if($data['id'] == $place_cate[$i]['id_parent']) echo 'selected'; ?>><?php echo $data['name']; ?></option>
                      <?php endforeach ?>
                    </select>
                    <span id="child-cate-<?php echo $i+1; ?>">
                        <select name="sl-child-<?php echo $i+1; ?>" id="sl-child-<?php echo $i+1; ?>" onchange="submitSelectChild(<?php echo $i+1; ?>)">
                          <option value="none"></option>
                          <?php $child = $this->m_category->select_child_id_parent($place_cate[$i]['id_parent']); ?>
                          <?php foreach ($child as $data): ?>
                            <option value="<?php echo $data['id']; ?>" <?php if($data['id'] == $place_cate[$i]['id']) echo 'selected'; ?>><?php echo $data['name']; ?></option>
                          <?php endforeach ?>
                        </select>
                    </span>
                    <span class="remove" onclick="rmv(<?php echo $i+1; ?>);">Remove</span>
                  </div>  
              <?php }
               ?>
    				</div>
    				<input type="hidden" name="txtCount" id="txtCount" value="<?php echo $count; ?>">
            <input type="hidden" name="txtdem" id="txtdem" value="<?php echo $count; ?>">
    				<button type="button" name="btn-add-category" id="btn-add-category" value="<?php echo $count; ?>" onclick="addCategory(this.value);" <?php if($count == 3) echo 'style="visibility:hidden;"'; ?>>more category</button>
    			</li>
    			
    		</ul>
    		
    		<div class="form-footer">
    			<button type="submit" name="submit">Submit</button>
          <a href="<?php echo base_url(); ?>index.php/place/update/<?php echo $place['id']; ?>" class="cancel">Undo</a>
    			<a href="<?php echo base_url(); ?>index.php/place/displayPlace/<?php echo $place['id']; ?>" class="cancel">Cancel</a>

    		</div>
    		
    	</form>
    </div>
</div> <!-- end content -->


<div id="side-bar">
    
        <div id="map-canvas"></div>

</div> <!-- end side bar -->

