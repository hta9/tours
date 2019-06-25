<?php

function _post($str)
{
	$ci =& get_instance();
	$result = $ci->input->post($str);
	return $result;


}



?>