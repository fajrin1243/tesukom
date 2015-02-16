<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('load_css'))
{
	function load_css($file="")
	{
		$var = "<link rel='stylesheet' type='text/css' href='".base_url()."assets/css/".$file."'>\n\r";
		return $var;
	}
}

if(!function_exists('load_js'))
{
	function load_js($file="")
	{
		$var = "<script src='".base_url()."assets/js/".$file."'></script>\n\r";
		return $var;
	}
}

if(!function_exists('load_view'))
{
	function load_view($file="",$object="",$condition="")
	{
		$ci =& get_instance();
		$var = $ci->load->view($file,$object,$condition);
		return $var;
	}
}

function div_open($file="")
{
	$var = "<div class='".$file."'>";
	return $var;
}

function div_close()
{
	$var = "</div>";
	return $var;
}

function action($controller = '',$row='')
{
	
	$var = "<li><a href='".base_url()."index.php/".$controller."/add/".$row."'><i class='fa fa-pencil'> </i>  Edit</a></li>
	<li><a href='".base_url()."index.php/".$controller."/delete/".$row."'><i class='fa fa-trash-o'> </i>  Delete</a></td></li>";
	return $var;
}

function pdf_create($html, $filename='', $paper, $orientation, $stream=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->set_paper($paper,$orientation);
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}






