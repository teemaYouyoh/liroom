<?php
/**
 * Template part for displaying posts with grid style.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package liroom
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-6 col-sm-12' ); ?>>
    <div class="entry-thumb">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title(); ?>">
			<?php
			if ( has_post_thumbnail( ) ) {
				the_post_thumbnail( 'liroom_block_big' );
			} else {
				echo '<img alt="'. esc_html( get_the_title() ) .'" src="'. esc_url( get_template_directory_uri() . '/assets/images/blank325_170.png' ) .'">';
			}
			?>
		</a>
        <?php
        $category = get_the_category();
        if($category[0]){
            echo '<a class="entry-category" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
        }
        ?>
    </div>
    <div class="entry-detail">
        <header class="entry-header">
    		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    		<?php if ( 'post' === get_post_type() ) liroom_meta_1();?>
    	</header><!-- .entry-header -->

    	<div class="entry-excerpt">
    		<?php echo liroom_excerpt(120); ?>
    	</div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->
