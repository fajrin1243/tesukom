<?php 
$i = 1;
foreach ($query as $row)
{
	# code...
	?>
	<tbody>
		<tr>
			<td width="1" align="center"><?php echo $i++ ?></td>
			<td><?php echo $row['nama'] ?></td>
			<td>
			<a href="<?php echo base_url()?>index.php/mata_diklat/add/<?php echo $row['id'] ?>">Edit</a> 
			<a href="<?php echo base_url()?>index.php/mata_diklat/delete/<?php echo $row['id'] ?>">Delete</a></td>
		</tr>
	</tbody>
	<?php
}
?>