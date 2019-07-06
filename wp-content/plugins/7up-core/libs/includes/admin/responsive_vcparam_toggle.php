<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if(!class_exists('S7upf_VcParam_Toggle'))
{
	class S7upf_VcParam_Toggle
	{
		function __construct()
		{
			if ( class_exists( 'WpbakeryShortcodeParams' ) )
			{
				WpbakeryShortcodeParams::addField('s7upf_toggle' , array($this, 's7upf_toggle'), CORE7UP_PLUGIN_URL . 'libs/assets/admin/js/res-vcparam-toggle.js');
			}
		}

		function s7upf_toggle($settings, $value){

			$output = $checked = '';
			$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
			if(empty($value)) {
				$value = isset($settings['value']) ? $settings['value'] : '';
			}

			$output = '<label class="bestbug-switch">';

			$output .= '<input class="switch-checkbox" type="checkbox" '.(($value == "yes")?'checked':"").'><div class="bestbug-slider round"></div>';

			$output .= '<input class="switch-value wpb_vc_param_value" name="'.$param_name.'" type="text" value="'.$value.'" />';

			$output .= '</label>';

			return $output;
		}

	}

	new S7upf_VcParam_Toggle();
}
