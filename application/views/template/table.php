<table class="table">
<a href="<?php echo base_url()?>index.php/mata_diklat/add"><button type="button" class="btn btn-primary">Tambah Data</button></a>
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
		<?php echo load_view($data, '', FALSE) ?>
	</tbody>
</table>

