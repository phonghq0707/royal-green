<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$style          = s7upf_get_option('shop_default_style','grid');
$grid_type      = s7upf_get_option('shop_grid_type');
$item_style     = s7upf_get_option('shop_grid_item_style');
$item_style_list= s7upf_get_option('shop_list_item_style');
$column         = s7upf_get_option('shop_grid_column',4);
$size           = s7upf_get_option('shop_grid_size');
$size_list      = s7upf_get_option('shop_list_size');
$animation      = s7upf_get_option('shop_thumb_animation');
if(isset($_GET['type'])) $style = $_GET['type'];
$size = s7upf_get_size_crop($size);
$size_list = s7upf_get_size_crop($size_list);
$slug = $item_style;
if($style == 'list') $slug = $item_style_list;
$attr  = array(
	'size'		=> $size,
	'size_list'	=> $size_list,
	'column'	=> $column,
	'animation'	=> $animation,
	);
?>
<?php s7upf_get_template_woocommerce('loop/'.$style.'/'.$style,$slug,$attr,true);?>
