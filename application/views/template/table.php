<table class="table">
<a href="<?php echo base_url()."index.php/".$controller."/add"?>"><button type="button" class="btn btn-primary"><i class='fa fa-plus-circle'></i> Tambah Data</button></a>
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
		echo load_view($data, '', FALSE);
		?>
	</tbody>
</table>

 <div class="halaman">Halaman : <?php echo $halaman;?></div>
