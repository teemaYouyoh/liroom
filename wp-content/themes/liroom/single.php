<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package liroom
 */

get_header(); ?>

	<div id="content" class="site-content container <?php echo liroom_sidebar_position(); ?>">
		<div class="content-inside">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
					
					<?php
            if(get_the_post_thumbnail_url()){
                $img_url = get_the_post_thumbnail_url();
            }else{
                $img_url = "https://liroom.com.ua/wp-content/uploads/2016/02/12669251_935347223186120_1549878932_o-e1454413532364.jpg";
            }
        ?>
        <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://google.com/article"
  },
  "headline": "<?php the_title(); ?>",
  "image": {
    "@type": "ImageObject",
    "url": "<?php echo $img_url; ?>"
  },
  "datePublished": "<?php the_date('Y-m-d'); ?>",
  "dateModified": "<?php the_modified_date('Y-m-d'); ?>",
  "author": {
    "@type": "Person",
    "name": "Liroom"
  },
   "publisher": {
    "@type": "Organization",
    "name": "Liroom",
    "logo": {
      "@type": "ImageObject",
      "url": "https://liroom.com.ua/wp-content/uploads/2018/03/Logo_rgb_small.png",
      "width": 121,
      "height": 40
    }
  }
}
</script>

				<?php endwhile; // End of the loop. ?>
				
				</main><!-- #main -->
			</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
