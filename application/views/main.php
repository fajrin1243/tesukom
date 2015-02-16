<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistem Akademik</title>
	<?php 
	echo load_css('bootstrap.css','',FALSE);
	echo load_css('font-awesome.css','',FALSE);
	echo empty($this->session->userdata('username'))  ? load_css('style.css','',FALSE) : "";
	echo load_js('jquery.min.js','',FALSE);
	echo load_js('bootstrap.min.js','',FALSE);
	?>
</head>
<body>
	<?php 
	if($this->session->userdata('username')==TRUE)
	{
		echo load_view('template/navigation','',FALSE); 
		foreach ($level as $value) {

		}
		$levels = $value['level'];
		if ($levels==0) {
			echo 'a';
		}
	}
	else
	{

	}
	echo load_view($content,'',FALSE);
	?>

</body>
</html>