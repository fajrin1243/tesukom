<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistem Akademik</title>
	<?php 
	echo load_css('bootstrap.css','',FALSE);
	echo load_js('jquery.min.js','',FALSE);
	echo load_js('bootstrap.min.js','',FALSE);
	?>
</head>
<body>
	<?php 
	//echo $this->session->userdata('username');
	foreach ($level as $value) {
		
	}
	$levels = $value['level'];
	if ($levels==1) {
		echo 'a';
	}
	echo load_view('template/navigation','',FALSE); 
	echo load_view($content,'',FALSE);
	?>

</body>
</html>