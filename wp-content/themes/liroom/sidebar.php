<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package liroom
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

		<div id="secondary" class="widget-area sidebar " role="complementary">
			<div id="secondary_inner" >
				<aside id="custom_soc" class=" widget widget_custom_html">
    				<div class="widget-title"><span>Ми в соцмережах</span></div>
    				<div class="textwidget custom-html-widget">
    				    <?php liroom_social(); ?>
    				</div>
				</aside>
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- #secondary -->
		</div><!-- #secondary -->
