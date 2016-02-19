<table class="table table-bordered">
	<tr>
	 	<th>ฃื่อหน่วยงาน</th>
	<tr>
	<?php foreach ($show_group_data as $key => $row) { ?>
	<tr>
		<td style = 'text-align:center;'><?php echo get_name_instutition($row['institution_id'],$row['institution_level']); ?></td>
	<tr>
	<?php }?>
</table>