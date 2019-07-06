<div class="block-element newsletter-form <?php echo esc_attr($el_class);?> sv-mailchimp-form" data-placeholder="<?php echo esc_attr($placeholder);?>" data-submit="<?php echo esc_attr($submit);?>">
    <?php 
    if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="mail-desc desc-block">'.esc_html($des).'</p>';
    if(!empty($form_html)) echo '<div class="form-newsletter">'.apply_filters('s7upf_output_content',$form_html).'</div>';
    ?>
</div>