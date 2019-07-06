<div class="wrap-search-overlay <?php echo esc_attr($el_class)?>">
	<a href="javascript:void(0)" id="trigger-overlay" class="black title24"><i class="la la-search"></i></a>
	<div class="overlay overlay-genie" data-steps="m 701.56545,809.01175 35.16718,0 0,19.68384 -35.16718,0 z;m 698.9986,728.03569 41.23353,0 -3.41953,77.8735 -34.98557,0 z;m 687.08153,513.78234 53.1506,0 C 738.0505,683.9161 737.86917,503.34193 737.27015,806 l -35.90067,0 c -7.82727,-276.34892 -2.06916,-72.79261 -14.28795,-292.21766 z;m 403.87105,257.94772 566.31246,2.93091 C 923.38284,513.78233 738.73561,372.23931 737.27015,806 l -35.90067,0 C 701.32034,404.49318 455.17312,480.07689 403.87105,257.94772 z;M 51.871052,165.94772 1362.1835,168.87863 C 1171.3828,653.78233 738.73561,372.23931 737.27015,806 l -35.90067,0 C 701.32034,404.49318 31.173122,513.78234 51.871052,165.94772 z;m 52,26 1364,4 c -12.8007,666.9037 -273.2644,483.78234 -322.7299,776 l -633.90062,0 C 359.32034,432.49318 -6.6979288,733.83462 52,26 z;m 0,0 1439.999975,0 0,805.99999 -1439.999975,0 z">
		<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1440 806" preserveAspectRatio="none">
			<path class="overlay-path" d="m 701.56545,809.01175 35.16718,0 0,19.68384 -35.16718,0 z"/>
		</svg>
		<a href="javascript:void(0)" class="overlay-close white title40"><i class="la la-times"></i></a>
		<div class="block-search-element">
			<form class="search-form live-search-<?php echo esc_attr($live_search)?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if($show_cat !== 'off' && !empty($search_in)):?>
					<div class="dropdown-box">
						<span class="dropdown-link current-search-cat"><?php esc_html_e("All Categories","fattoria")?></span>
						<ul class="list-none dropdown-list">
							<li class="active"><a class="select-cat-search" href="#" data-filter=""><?php esc_html_e("All Categories",'fattoria')?></a></li>
							<?php
								$taxonomy = 'category';
								$tax_key = 'category_name';
								if($search_in == 'product') $taxonomy = $tax_key = 'product_cat';
								if(!empty($cats)){
									$custom_list = explode(",",$cats);
									foreach ($custom_list as $key => $cat) {
										$term = get_term_by( 'slug',$cat, $taxonomy );
										if(!empty($term) && is_object($term)){
											if(!empty($term) && is_object($term)){
												echo '<li><a class="select-cat-search" href="#" data-filter=".'.$term->slug.'">'.$term->name.'</a></li>';
											}
										}
									}
								}
								else{
									$product_cat_list = get_terms($taxonomy);
									if(is_array($product_cat_list) && !empty($product_cat_list)){
										foreach ($product_cat_list as $cat) {
											echo '<li><a class="select-cat-search" href="#" data-filter=".'.$cat->slug.'">'.$cat->name.'</a></li>';
										}
									}
								}
							?>
						</ul>
					</div>
					<input class="cat-value" type="hidden" name="<?php echo esc_attr($tax_key)?>" value="" />
				<?php endif;?>
				<input name="s" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="<?php echo esc_attr($search_val);?>" type="text">
				<?php if(!empty($search_in)):?>
					<input type="hidden" name="post_type" value="<?php echo esc_attr($search_in)?>" />
				<?php endif;?>
				<div class="submit-form">
					<input type="submit" value="">
				</div>
				<div class="list-product-search">
					<p class="text-center"><?php esc_html_e("Please enter key search to display results.","fattoria")?></p>
				</div>
			</form>
		</div>
	</div>
</div>