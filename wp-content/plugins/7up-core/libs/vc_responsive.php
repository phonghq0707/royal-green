<?php
if ( ! class_exists( 'S7upfResVC' ) ) {
	/**
	 * VC Animation Showup Class
	 *
	 * @since	1.0
	 */
	class S7upfResVC {


		/**
		 * Constructor, checks for Visual Composer and defines hooks
		 *
		 * @return	void
		 * @since	1.0
		 */
		function __construct() {
            add_action( 'vc_before_init', array( $this, 'init' ) );
		}

		public function init() {            

			include_once( 'includes/responsive_helper.php' );

			$this->createShortcode();

			include_once( 'includes/responsive_filter.php' );

			if(is_admin()) {
				include_once( 'includes/admin/responsive_options.php' );
				include_once( 'includes/admin/responsive_build.php' );
				include_once( 'includes/admin/responsive_build_typo.php' );
			}

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueueScripts' ) );

        }

		public function adminEnqueueScripts() {
		}

		public function enqueueScripts() {
			wp_enqueue_style( 's7upf-vcedo', CORE7UP_PLUGIN_URL . '/libs/assets/css/res-vcedo.css' );
			wp_add_inline_style( 's7upf-vcedo', S7upfResVCHelper::$show_hide_css );
		}

		public function createShortcode() {

			include_once( 'includes/admin/responsive_vcparam_toggle.php' );
			include_once( 'includes/admin/responsive_vcparam_tab.php' );
			include_once( 'includes/admin/responsive_vcparam_typography.php' );

			if ( ! defined( 'WPB_VC_VERSION' ) || ! function_exists( 'vc_add_param' ) ) {
				return;
			}

			// Add option to elements
			include_once( 'includes/admin/responsive_vcedo_add_params.php' );
		}
	}
	new S7upfResVC();
}