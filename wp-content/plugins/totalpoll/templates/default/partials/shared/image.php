<?php
if ( defined( 'ABSPATH' ) === false ) :
	exit;
endif; // Shhh
$supports_full = $choice['content']['image']['url'] != $choice['content']['thumbnail']['url'] ? ' totalpoll-supports-full' : '';

$thumb_id = $choice['content']['thumbnail']['id'];
$thumb_url = wp_get_attachment_image_src($thumb_id,'featured_small', true);
if ( !empty( $choice['content']['thumbnail']['html'] ) ) {
?>
<div class="totalpoll-choice-image<?php echo $supports_full; ?>" itemscope itemtype="http://schema.org/ImageObject">
	<a <?php echo empty($supports_full) ? '' : 'href="#choise-popup-' . $choice['index'] . '"'; ?> target="_blank" class="open-popup-link">
		<img src="<?php echo $thumb_url[0]; ?>" alt="" itemprop="contentUrl">
		<div class="totalpoll-choice-title"><?php echo $choice['content']['label']; ?></div>
	</a>
	<div class="mfp-hide">
		<div id="choise-popup-<?php echo $choice['index'];?>" class="">
		  <?php print_r($choice['content']['thumbnail']['html']);?>
		</div>
	</div>
</div>
<style>
</style>
<?php } else { ?>
<div class="totalpoll-choice-image<?php echo $supports_full; ?>" itemscope itemtype="http://schema.org/ImageObject">
		<img src="<?php echo esc_attr( empty( $choice['content']['thumbnail']['url'] ) ? $choice['content']['image']['url'] : $choice['content']['thumbnail']['url'] ); ?>" itemprop="contentUrl">
	
</div>
<?php } ?>