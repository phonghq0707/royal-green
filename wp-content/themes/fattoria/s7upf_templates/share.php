<?php
$check_share = s7upf_get_option('post_single_share',array());
$check_share_page = s7upf_get_value_by_id('post_single_page_share');
$post_type = get_post_type();
if(in_array($post_type, $check_share) || $check_share_page == 'on'):
	$list_delault = array(
		array(
			'title'  => esc_html__('Total',"fattoria"),
		    'social' => 'total',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Facebook',"fattoria"),
		    'social' => 'facebook',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Twitter',"fattoria"),
		    'social' => 'twitter',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Google',"fattoria"),
		    'social' => 'google',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Pinterest',"fattoria"),
		    'social' => 'pinterest',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Linkedin',"fattoria"),
		    'social' => 'linkedin',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Tumblr',"fattoria"),
		    'social' => 'tumblr',
		    'number' => 'on',
			),
		array(
			'title'  => esc_html__('Email',"fattoria"),
		    'social' => 'envelope',
		    'number' => 'on',
			),
		);
	$list = s7upf_get_option('post_single_share_list',$list_delault);
	
?>
<div class="single-list-social" data-id="<?php echo esc_attr(get_the_ID())?>">
	<h3 class="title14 font-bold black"><?php echo esc_html__('Share:','fattoria')?></h3>
	<ul class="list-inline-block">
	<?php
		foreach ($list as $value) {
			switch ($value['social']) {
				case 'facebook':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('http://www.lacebook.com/sharer.php?u='.get_the_permalink()).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="la la-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
							</a></li>';
					break;

				case 'twitter':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('http://www.twitter.com/share?url='.get_the_permalink()).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="la la-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
							</a></li>';
					break;

				case 'google':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('https://plus.google.com/share?url='.get_the_permalink()).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="la la-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
							</a></li>';
					break;

				case 'pinterest':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.wp_get_attachment_url(get_post_thumbnail_id())).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="la la-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
							</a></li>';
					break;

				case 'envelope':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="mailto:?subject='.esc_attr__("I wanted you to see this site&amp;body=Check out this site","fattoria").' '.get_the_permalink().'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="la la-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
							</a></li>';
					break;

				case 'linkedin':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('https://www.linkedin.com/cws/share?url='.get_the_permalink()).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="la la-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
							</a></li>';
					break;

				case 'tumblr':
					$number = get_post_meta(get_the_ID(),'total_share_'.$value['social'],true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo 	'<li><a target="_blank" data-social="'.esc_attr($value['social']).'" title="'.esc_attr($value['title']).'" href="'.esc_url('https://www.tumblr.com/widgets/share/tool?canonicalUrl='.get_the_permalink().'&amp;title='.get_the_title()).'">
								<span class="share-icon '.esc_attr($value['social']).'-social"><i class="la la-'.esc_attr($value['social']).'" aria-hidden="true"></i>'.$number_html.'</span>
							</a></li>';
					break;
					
				delault:
					$number = get_post_meta(get_the_ID(),'total_share',true);
					if(empty($number)) $number = 0;
					if($value['number'] == 'on') $number_html = '<span class="number">'.esc_html($number).'</span>';
					else $number_html = '';
					echo '<li><span class="share-icon total-share"><i class="la la-share-alt" aria-hidden="true"></i>'.$number_html.'</span></li>';
					break;
			}			
		}
	?>
	</ul>
</div>
<?php endif;?>