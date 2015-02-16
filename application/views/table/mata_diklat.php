<?php 
$i = 1;
foreach ($query as $row)
{
	# code...
	?>
	<tr>
		<td width="1" align="center"><?php echo $i++ ?></td>
		<td><?php echo $row['nama'] ?></td>
		<td>
			<!-- Single button -->
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					Action <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
				<?php echo action('mata_diklat',$row['id']) ?>
				</ul>
			</div>
		</tr>
		<?php
	}
	?>