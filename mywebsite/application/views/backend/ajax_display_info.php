<?php 
	$total = $this->m_info->count_all();
	$number = ($total/3)+1;
	$offset = 0;
	$this->load->model('m_info');
	$data = $this->m_info->select_asc_name($number,$offset);
	$count = $this->m_info->count_asc_name($number,$offset);
	while ($count > 0) {
		$data = $this->m_info->select_asc_name($number,$offset);?>
		<ul class="">
			<?php foreach ($data as $data): ?>
				<li class="clearfix">
					<div><?php echo $data['name'] ?></div>
					<div id="<?php echo $data['id'] ?>"><button type='submit' value="<?php echo $data['id'] ?>">edit</button><button type='button' value="<?php echo $data['id'] ?>" onclick="confirmDelete(this.value);">delete</button></div>
				</li>
			<?php endforeach ?>
		</ul>
		<?php $offset += $number;
		$count = $this->m_info->count_asc_name($number,$offset);
	}
 ?>