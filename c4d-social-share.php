<?php
/*
Plugin Name: C4D Social Share
Plugin URI: http://coffee4dev.com/
Description: Create share button like facebook, twitter, google, pinterest for your posts
Author: Coffee4dev.com
Author URI: http://coffee4dev.com/category/products/wordpress/
Text Domain: c4d-social-share
Version: 2.0.0
*/
add_shortcode('c4d-social-share', 'c4d_social_share_button');
function c4d_social_share_button() {
	$url        = esc_url(get_the_permalink());
    $title      = urlencode(get_the_title());
    $thumbnail  = urlencode(wp_get_attachment_url( get_post_thumbnail_id()));
    $facebook   = 'http://www.facebook.com/sharer/sharer.php?u='.$url;
    $twitter    = 'http://twitter.com/intent/tweet/?url='.$url.'&amp;text='.$title;
    $google     = 'https://plus.google.com/share?url='.$url;
    $pinterest  = 'http://pinterest.com/pin/create/button/?url='.$url.'&amp;media='.$thumbnail.'&amp;description='.$title;
    ob_start();
?>
	<div class="c4d-social-share">
		<label><?php esc_html_e('Share this:', 'c4d-social-share'); ?></label>
		<a class="facebook" target="blank" href="<?php echo esc_attr($facebook); ?>"><i class="fa fa-facebook"></i></a>
		<a class="twitter" target="blank" href="<?php echo esc_attr($twitter); ?>"><i class="fa fa-twitter"></i></a>
		<a class="google" target="blank" href="<?php echo esc_attr($google); ?>"><i class="fa fa-google"></i></a>
		<a class="pinterest" target="blank" href="<?php echo esc_attr($pinterest); ?>"><i class="fa fa-pinterest"></i></a>
	</div>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}