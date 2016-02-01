<?php
	
	function active($path, $active = 'active') {
	    return call_user_func_array('Request::is', (array)$path) ? $active : '';
	}
	
	function clean($text, $length, $finaly = ' ...')
	{
	    if(strlen($text) <= $length)
		{
			return $text;
		}
		$str = substr($text,0,$length-strlen($finaly)+1);
		return substr($str,0,strrpos($str,' ')).$finaly;	
	}
	
?>