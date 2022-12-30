<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package liroom
 */

get_header(); ?>
	<div id="content" class="site-content container <?php // echo liroom_sidebar_position(); ?>">
		<div class="content-inside">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" >
					<section class="error-404 not-found">

						<div class="page-content">
							
						  <div class="<?php echo esc_attr( $class ); ?> main-wp">
							<?php
							  get_template_part( 'template-parts/content', 'none' );
							?>
									<div class="row">
							  <div class="col-md-6">
								<?php 
									the_widget( 'WP_Widget_Categories', 'count=1&hierarchical=1', array(
									'before_title' => '<h3 class="block-title"><span>', 
									'after_title' => '</span></h3>'
									) ); 
								  ?>
							  </div>

							  <div class="col-md-6">
								  <?php 
									the_widget( 'WP_Widget_Tag_Cloud', '', array(
									'before_title' => '<h3 class="block-title"><span>', 
									'after_title' => '</span></h3>'
									) );
								  ?>
							  </div>
							</div>

						  </div>

						</div><!-- .page-content -->
					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
