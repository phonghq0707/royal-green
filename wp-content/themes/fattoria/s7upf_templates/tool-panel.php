<?php
$show = s7upf_get_option('show_too_panel');
$tool_id = s7upf_get_option('tool_panel_page');
if($show == 'on' && !empty($tool_id)){
	echo S7upf_Template::get_vc_pagecontent($tool_id,true);
}