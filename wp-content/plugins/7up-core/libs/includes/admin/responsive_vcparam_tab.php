<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
if(!class_exists('S7upf_VcParam_Tab'))
{
	class S7upf_VcParam_Tab
	{
		function __construct()
		{
			if ( class_exists( 'WpbakeryShortcodeParams' ) )
			{

				WpbakeryShortcodeParams::addField('device_tab' , array($this, 'device_tab'), CORE7UP_PLUGIN_URL . 'libs/assets/admin/js/res-vcparam-tab-design.js');

				wp_enqueue_style( 's7upf_admin_responsive', CORE7UP_PLUGIN_URL . 'libs/assets/admin/css/admin.css' );
			}
		}

		function device_tab($settings, $value){

			$output = $checked = '';

			if( isset($settings['suffix']) && !empty($settings['suffix']) ) {
				$suffix = implode('|', $settings['suffix']);
			} else {
				$suffix = '';
			}

			$output = '<div class="bb-tabs-container '.esc_attr($settings['class']).'" data-tab-active="'.esc_attr($settings['active']).'" data-suffix="'.esc_attr($suffix).'"><ul>';

			$flag = true;
			foreach ($settings['tabs'] as $param_name => $tab) {
				$class = '';
				if($settings['active'] == $param_name) {
					$class = 'active';
					$flag = false;
				}

				if($settings['class'] == 'top') {
					$bbhelp_class = 'bbhelp--bottom';
				} elseif($settings['class'] == 'right') {
					$bbhelp_class = 'bbhelp--left';
				}

				if($tab['icon'] == 'class_icon' && !empty($tab['class_icon'])) {
					$icon = '<span class="'.esc_attr($tab['class_icon']).'"></span>';
				} elseif($tab['icon'] == 'image_icon' && !empty($tab['image_icon'])) {
					$icon = '<div class="img"><img src="'.esc_attr($tab['image_icon']).'" alt="" /></div>';
				} else {
					$icon = '<span class="dashicons dashicons-image-rotate-right"></span>';
				}

				$output .= '<li class="'.$class.' bb-tab-item-container"><a bbhelp-label="'.$tab['label'].'" class="'.esc_attr($bbhelp_class).'" href="#" data-bb-tab-target="'.$param_name.'">'.$icon.'</a></li>';
			}

			$output .= '</ul></div>';

			return $output;

		}

	}

	new S7upf_VcParam_Tab();
}
