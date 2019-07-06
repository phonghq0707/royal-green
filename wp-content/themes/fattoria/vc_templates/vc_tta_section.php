<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $this WPBakeryShortCode_VC_Tta_Section
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$this->resetVariables( $atts, $content );
WPBakeryShortCode_VC_Tta_Section::$self_count ++;
WPBakeryShortCode_VC_Tta_Section::$section_info[] = $atts;
$isPageEditable = vc_is_page_editable();
$output = '';
if(!empty($atts['style'])){
	extract($atts);
	if($tab_active == $tab_id) $active = 'active';
	else $active = '';
	if(($tab_ajax == 'on' && $tab_active == $tab_id) || $tab_ajax != 'on'){
		$output .= 	'<div id="'.esc_attr($tab_id).'" class="vc_tta-panel tab-pane '.esc_attr($active).'">';
		$output .= 		'<div class="vc_tta-panel-body">';
		if ( $isPageEditable ) {
			$output .= 		'<div data-js-panel-body>'; // fix for fe - shortcodes container, not required in b.e.
		}
		$output .= wpb_js_remove_wpautop($content, true);
		if ( $isPageEditable ) {
			$output .= 		'</div>';
		}
		$output .= 		'</div>';
		$output .= 	'</div>';
	}
}
else{
	$output .= '<div class="' . esc_attr( $this->getElementClasses() ) . '"';
	$output .= ' id="' . esc_attr( $this->getTemplateVariable( 'tab_id' ) ) . '"';
	$output .= ' data-vc-content=".vc_tta-panel-body">';
	$output .= '<div class="vc_tta-panel-heading">';
	$output .= $this->getTemplateVariable( 'heading' );
	$output .= '</div>';
	$output .= '<div class="vc_tta-panel-body">';
	if ( $isPageEditable ) {
		$output .= '<div data-js-panel-body>'; // fix for fe - shortcodes container, not required in b.e.
	}
	$output .= $this->getTemplateVariable( 'content' );
	if ( $isPageEditable ) {
		$output .= '</div>';
	}
	$output .= '</div>';
	$output .= '</div>';
}

echo apply_filters('s7upf_output_content',$output);
