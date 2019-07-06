<?php
$page_id = apply_filters('s7upf_footer_page_id',s7upf_get_value_by_id('s7upf_footer_page'));
if(!empty($page_id)) {?>
	<div id="footer" class="footer-page">
        <div class="container">
            <?php echo S7upf_Template::get_vc_pagecontent($page_id);?>
        </div>
    </div>
<?php
}
else{
?>
	<div id="footer" class="footer-default">
		<div class="container">
			<p class="copyright desc white"><?php esc_html_e("Copyright by 7up. All Rights Reserved.","fattoria")?></p>
		</div>
	</div>
<?php
}