<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package liroom
 */

?>

<section class="no-results not-found" style="margin-bottom: 100px;">
	<header class="page-header">
		<p class="page-subtitle">404</p>
		<h1 class="page-title"><?php _e( 'Сторінка не знайдена', 'liroom-lite' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'liroom-lite' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'liroom-lite' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'Такої сторінки не існує на сервері. Можливо, ця сторінка видалена, перейменована або тимчасово недоступна.', 'liroom-lite' ); ?></p>
			<p>Спробуйте пошукати або повернутися на <a href="<?=home_url();?>">Головну</a>. </p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
