<span class="btn-edit">
  <a href="<?php echo base_url(); ?>index.php/place/update/<?php echo $place_id; ?>" class="edit-place-btn">
    <span>
       Edit Info
    </span>
  </a>
</span>
<span class="btn-edit">
  <a class="edit-place-btn" onclick="confirm_delete(<?php echo $place_id; ?>);">
    <span>
       Delete
    </span>
  </a>
</span>