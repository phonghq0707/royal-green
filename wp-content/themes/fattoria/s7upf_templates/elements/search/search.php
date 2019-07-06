<div class="block-element block-search-element <?php echo esc_attr($el_class)?>">
    <?php if(!empty($title)):?>
        <h3 class="title18 font-bold text-uppercase"><?php echo esc_html($title)?></h3>
    <?php endif?>
    <form class="search-form <?php echo esc_attr($el_class)?> live-search-<?php echo esc_attr($live_search)?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
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