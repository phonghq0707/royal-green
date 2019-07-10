<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$tabs_args = array(
	'settings'       => esc_html__( 'Settings', '7up-together' ),
	'responsive'     => esc_html__( 'Responsive', '7up-together' )
);

$active_tab = 'settings';
if ( isset( $_REQUEST['tab'] ) ) {
	if ( array_key_exists( $_REQUEST['tab'], $tabs_args ) ) {
		$active_tab = $_REQUEST['tab'];
	}
}

$tab_head_html = '';
foreach ( $tabs_args as $tab_id => $tab_name ) {
	$nav_class     = $tab_id == $active_tab ? 'nav-tab nav-tab-active' : 'nav-tab';
	$tab_head_html .= '<a data-tab_id="' . esc_attr( $tab_id ) . '" href="?page=s7up_together&tab=' . esc_attr( $tab_id ) . '" class="' . $nav_class . '">' . $tab_name . '</a>';
}

$all_options = famibt_get_all_options();

$all_hooks = array(
	'woocommerce_product_tabs'                  => esc_html__( 'In Single Product Tabs', '7up-together' ),
	'woocommerce_after_single_product_summary'  => esc_html__( 'After single product summary', '7up-together' ),
	's7upf_fami_single'  						=> esc_html__( 'Fami Together Product', '7up-together' ),
);

$all_hooks = apply_filters( 'famibt_all_hooks', $all_hooks );

$default_hook = 'woocommerce_product_tabs';
$default_hook = apply_filters( 'famibt_default_hook', $default_hook );
$saved_hook   = isset( $all_options['famibt_hook'] ) ? $all_options['famibt_hook'] : $default_hook; // get_option( 'famibt_hook', $default_hook );

if ( trim( $saved_hook ) == '' ) {
	$saved_hook = $default_hook;
}

if ( ! array_key_exists( $default_hook, $all_hooks ) ) {
	$all_hooks[ $default_hook ] = $default_hook;
}
if ( ! array_key_exists( $saved_hook, $all_hooks ) ) {
	$saved_hook = $default_hook;
}

$add_to_cart_text         = isset( $all_options['famibt_add_to_cart_text'] ) ? $all_options['famibt_add_to_cart_text'] : esc_html__( 'Add All To Cart', '7up-together' );
$adding_to_cart_text      = isset( $all_options['famibt_adding_to_cart_text'] ) ? $all_options['famibt_adding_to_cart_text'] : esc_html__( 'Adding To Cart...', '7up-together' );
$view_cart_text           = isset( $all_options['famibt_view_cart_text'] ) ? $all_options['famibt_view_cart_text'] : esc_html__( 'View cart', '7up-together' );
$no_product_selected_text = isset( $all_options['famibt_no_product_selected_text'] ) ? $all_options['famibt_no_product_selected_text'] : esc_html__( 'You must select at least one product', '7up-together' );
$col_xl                   = isset( $all_options['famibt_col_xl'] ) ? $all_options['famibt_col_xl'] : 'display_col_4'; // Default display 4 columns on large screen
$col_lg                   = isset( $all_options['famibt_col_lg'] ) ? $all_options['famibt_col_lg'] : 'display_col_4'; // Default display 4 columns on large screen
$col_md                   = isset( $all_options['famibt_col_md'] ) ? $all_options['famibt_col_md'] : 'display_col_4'; // Default display 4 columns on medium screen
$col_sm                   = isset( $all_options['famibt_col_sm'] ) ? $all_options['famibt_col_sm'] : 'display_col_3'; // Default display 3 columns on small screen
$col_xs                   = isset( $all_options['famibt_col_xs'] ) ? $all_options['famibt_col_xs'] : 'display_col_2'; // Default display 2 columns on small screen
$col_xxs                  = isset( $all_options['famibt_col_xxs'] ) ? $all_options['famibt_col_xxs'] : 'display_col_1'; // Default display 1 column on small screen

?>

<div class="wrap">
    <h1><?php esc_html_e( 'Buy Together Settings', '7up-together' ); ?></h1>
    <div class="famibt-page-desc">
        <p><?php esc_html_e( '7up Together is a plugin for WooCommerce that allows you to create one or more products that come with your main product. Make it more convenient for buyers and stimulate buying more of your products. Buyers just need a single click to buy all the products included.', '7up-together' ) ?></p>
    </div>

    <div class="fami-admin-page-content-wrap">
        <div class="famibt-tabs fami-all-settings-form">
            <h2 class="nav-tab-wrapper"><?php echo $tab_head_html; ?></h2>

            <div id="settings" class="famibt-tab-content tab-content">
                <div class="famibt-tab-connent-inner">
                    <table class="form-table">
                        <tbody>
                        <tr>
                            <th><?php esc_html_e( 'Hook', '7up-together' ); ?></th>
                            <td>
                                <select name="famibt_hook" class="famibt-field famibt-hook-select">
									<?php
									foreach ( $all_hooks as $hook => $hook_display_name ) {
										echo '<option ' . selected( true, $hook == $saved_hook, false ) . ' value="' . esc_attr( $hook ) . '">' . $hook_display_name . '</option>';
									}
									?>
                                </select>
                                <span class="description"><?php esc_html_e( 'Where would you like to show "Buy Together"?. Default: woocommerce_product_tabs (In Single Product Tabs)', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Add To Cart Text', 'fami7up-togetherbt' ); ?></th>
                            <td>
                                <input type="text" name="famibt_add_to_cart_text" class="famibt-field famibt-hook-input"
                                       placeholder="<?php esc_attr_e( 'Add to cart text', '7up-together' ); ?>"
                                       value="<?php echo esc_attr( $add_to_cart_text ); ?>"/>
                                <span class="description"><?php esc_html_e( 'Add to cart button text', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Adding To Cart Text', '7up-together' ); ?></th>
                            <td>
                                <input type="text" name="famibt_adding_to_cart_text"
                                       class="famibt-field famibt-hook-input"
                                       placeholder="<?php esc_attr_e( 'Adding to cart text', '7up-together' ); ?>"
                                       value="<?php echo esc_attr( $adding_to_cart_text ); ?>"/>
                                <span class="description"><?php esc_html_e( 'Adding to cart button text', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'View Cart Text', '7up-together' ); ?></th>
                            <td>
                                <input type="text" name="famibt_view_cart_text"
                                       class="famibt-field famibt-hook-input"
                                       placeholder="<?php esc_attr_e( 'View cart text', '7up-together' ); ?>"
                                       value="<?php echo esc_attr( $view_cart_text ); ?>"/>
                                <span class="description"><?php esc_html_e( 'Text displayed on the "View cart" button when adding "Buy Together" successfully', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'No Product Selected Message', '7up-together' ); ?></th>
                            <td>
                                <input type="text" name="famibt_no_product_selected_text"
                                       class="famibt-field famibt-hook-input"
                                       placeholder="<?php esc_attr_e( 'Enter message when no product is selected', '7up-together' ); ?>"
                                       value="<?php echo esc_attr( $no_product_selected_text ); ?>"/>
                                <span class="description"><?php esc_html_e( 'Message when no product is selected', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="responsive" class="famibt-tab-content tab-content">
                <div class="famibt-tab-connent-inner">
                    <h3><?php esc_html_e( 'Responsive Options', '7up-together' ); ?></h3>
                    <p class="description"><?php esc_html_e( 'Number of products per row on different screen sizes', '7up-together' ); ?></p>
                    <table class="form-table">
                        <tbody>
                        <tr>
                            <th><?php esc_html_e( 'Extra Large Screen', '7up-together' ); ?></th>
                            <td>
								<?php famibt_col_select_html( $col_xl, 'famibt-field', 'famibt_col_xl' ); ?>
                                <span class="description"><?php esc_html_e( 'The number of products per row if screen width >= 1500px', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Large Screen', '7up-together' ); ?></th>
                            <td>
								<?php famibt_col_select_html( $col_lg, 'famibt-field', 'famibt_col_lg' ); ?>
                                <span class="description"><?php esc_html_e( 'The number of products per row if 1200px <= screen width < 1500px', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Medium Screen', '7up-together' ); ?></th>
                            <td>
								<?php famibt_col_select_html( $col_md, 'famibt-field', 'famibt_col_md' ); ?>
                                <span class="description"><?php esc_html_e( 'The number of products per row if 992px <= screen width < 1200px', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Small Screen', '7up-together' ); ?></th>
                            <td>
								<?php famibt_col_select_html( $col_sm, 'famibt-field', 'famibt_col_sm' ); ?>
                                <span class="description"><?php esc_html_e( 'The number of products per row if 768px <= screen width < 1200px', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Extra Small Screen', '7up-together' ); ?></th>
                            <td>
								<?php famibt_col_select_html( $col_xs, 'famibt-field', 'famibt_col_xs' ); ?>
                                <span class="description"><?php esc_html_e( 'The number of products per row if 480px <= screen width < 768px', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Smallest Screen', '7up-together' ); ?></th>
                            <td>
								<?php famibt_col_select_html( $col_xxs, 'famibt-field', 'famibt_col_xxs' ); ?>
                                <span class="description"><?php esc_html_e( 'The number of products per row if screen width < 480px', '7up-together' ); ?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <button type="button"
                class="button-primary famibt-save-all-settings"><?php esc_html_e( 'Save All Settings', '7up-together' ); ?></button>
    </div>

</div>