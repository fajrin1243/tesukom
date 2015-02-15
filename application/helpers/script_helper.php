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






