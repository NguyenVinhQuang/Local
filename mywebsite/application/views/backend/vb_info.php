<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style_vb_info.css">
<script type="text/javascript" src="<?php echo base_url(); ?>resources/scripts/event_info.js"></script>
<div id="right">
	<!-- form add info -->
	<?php $this->load->view('backend/vb_add_info'); ?>
	<!-- end form add info -->
	<div class="box">
		<!-- box / title -->
		<div class="title">
			<h5>Info</h5>
		</div>
		<!-- end box / title -->
		<div class="table">
			<!-- form display -->
			<form name="frmDisplayParentCategories" action="<?php echo base_url(); ?>index.php/info/edit" method="post">
				<div id="displayInfo">
					<?php 
						$this->load->model('m_info');
						$total = $this->m_info->count_all();
						$number = ($total/3)+1;
						$offset = 0;
						
						$data = $this->m_info->select_asc_name($number,$offset);
						$count = $this->m_info->count_asc_name($number,$offset);
						while ($count > 0) {
							$data = $this->m_info->select_asc_name($number,$offset);?>
							<ul class="">
								<?php foreach ($data as $data): ?>
									<li class="clearfix">
										<div><?php echo $data['name'] ?></div>
										<div id="<?php echo $data['id'] ?>">
											<button onclick="loadEdit(this.value);" type='button' name ="btnEdit_<?php echo $data['id'] ?>" value="<?php echo $data['id'] ?>">edit</button>
											<button type='button' value="<?php echo $data['id'] ?>" onclick="confirmDelete(this.value);">delete</button>
										</div>
									</li>
								<?php endforeach ?>
							</ul>
							<?php $offset += $number;
							$count = $this->m_info->count_asc_name($number,$offset);
						}
					 ?>
				</div>
			</form> <!-- end from display -->
		</div>
	</div> <!-- end box -->
</div>