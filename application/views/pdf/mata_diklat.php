<table class="table">
	<thead>
		<tr>
			<?php foreach ($field as $column) 
			{
				echo "<th>".$column."</th>";
			} 
			?>
		</tr>
	</thead>
	<tbody>
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
				</tr>
				</tbody>
				<?php
			}
			?>
		</tbody>
	</table>

