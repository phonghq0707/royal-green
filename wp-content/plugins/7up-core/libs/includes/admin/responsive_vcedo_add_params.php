<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( 'S7upfResVCAddParams' ) ) {
	/**
	 * VC S7upfResVCAddParams Class
	 *
	 * @since	1.0
	 */
	class S7upfResVCAddParams {

		function __construct() {
			add_action( 'init', array( $this, 'init' ) );
		}

		public function init(){
			if ( ! defined( 'WPB_VC_VERSION' ) ) {
                return;
            }

			$group = S7upfResVCHelper::$tab_option;
			$devices = S7upfResVCHelper::$devices_array;

			$tabs = array();
			foreach ($devices as $id => $device) {
				$tabs[$id] = $device;
			}

			$shortcodes = S7upfResVCHelper::$shortcodes_active;

			foreach ($shortcodes as $key => $shortcode) {
				$shortcode = trim($shortcode);
				vc_add_param( $shortcode, array(
					'type' => 'device_tab',
					'param_name' => 'bb_tab_container',
					'active' => S7upfResVCHelper::$tab_active,
					'tabs' => $tabs,
					'suffix' => array('typo', 'show_hide'),
					'class' => S7upfResVCHelper::$menu_tab_position,
					'group' => $group,
				));

				foreach ($devices as $id => $device) {
					vc_add_param( $shortcode, array(
						'type' => 'css_editor',
						'heading' => $device['label'],
						'param_name' => $id,
						'group' => $group,
					));

					vc_add_param( $shortcode, array(
						'type' => 's7upf_toggle',
						'heading' => esc_html__('Show/Hide on ', '7up-core') . $device['label'],
						'param_name' => $id. 'show_hide',
						'group' => $group,
						'value' => 'yes',
					));

					vc_add_param( $shortcode, array(
						'type' => 's7upf_typography',
						'heading' => S7upfResVCHelper::$typo_label . ' - ' . $device['label'],
						'param_name' => $id . 'typo',
						'group' => $group,
					));					

				}

			}
		}

	}

	new S7upfResVCAddParams();
}
