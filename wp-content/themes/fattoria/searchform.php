<form role="search" class="wg-search-form" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
    <input type="text" value="<?php echo get_search_query() ?>"  name="s" placeholder="<?php echo esc_attr__('Search..','fattoria')?>">
    <input type="submit" value="">
</form>