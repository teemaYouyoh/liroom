<script type="text/javascript">
   admixerML.fn.push(function () {


       admixerML.defineSlot({
           z: 'ae0f3c68-ec4b-4a6d-97d4-1ce2c14b7ea7',
           ph: 'admixer_ae0f3c68ec4b4a6d97d41ce2c14b7ea7_zone_12255_sect_3677_site_3331',
           i: 'inv-nets'
       });
       admixerML.singleRequest();
   });
</script>
<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package liroom
 */
 
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlCur = str_replace( 'luxurybalance.com','com.ua',$actual_link );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header entry-header-single">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php liroom_meta_1(true); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="social-share top">
			<div class="fb-like" data-href="<?php echo $urlCur; ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
			<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			<g:plusone action="share" href="<?php echo $urlCur; ?>" annotation="bubble" size="tall"></g:plusone>
		</div>		
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'liroom-lite' ),
				'after'  => '</div>',
			) );
		?>
		<?php echo do_shortcode('[mistape]'); ?>
	</div><!-- .entry-content -->

	<?php if ( is_active_sidebar( 'ads-after-single' ) ) { ?>
	<div class="ads widget">
		<?php dynamic_sidebar( 'ads-after-single' ); ?>
	</div>
	<?php } ?>
	
	<footer class="entry-footer">
		<?php liroom_entry_footer(); ?>

		<div class="social-share bottom">
			<div class="fb-share-button" data-href="<?php echo $urlCur; ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $urlCur; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Поделиться</a></div>
			<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
		
		<?php liroom_the_author_box( get_the_author_meta('ID'), true ); ?>
		
		<?php
		$prev_link = get_previous_post_link( '%link', '%title', true );
		$next_link = get_next_post_link( '%link', '%title', true );
		?>
		<?php if ( $prev_link || $next_link ) : ?>
		<div class="post-navigation row">
			<div class="col-md-6 col-sm-12 previous-post">
				<?php if ( $prev_link ) { ?>
				<span><?php _e( 'Previous article', 'liroom-lite' ) ?></span>
				<h2 class="h5"><?php echo $prev_link; ?></h2>
				<?php } ?>
			</div>
			<div class="col-md-6 col-sm-12 post-navi-next">
				<?php if ( $next_link ) { ?>
				<span><?php _e( 'Next article', 'liroom-lite' ) ?></span>
				<h2 class="h5"><?php echo $next_link; ?></h2>
				<?php } ?>
			</div>
		</div>
		<?php endif; ?>

	</footer><!-- .entry-footer -->
	<?php if ( is_active_sidebar( 'single-before-comments' ) ) { ?>
	<div class="related">
		<?php dynamic_sidebar( 'single-before-comments' ); ?>
	</div>
	<?php } ?>
</article><!-- #post-## -->
