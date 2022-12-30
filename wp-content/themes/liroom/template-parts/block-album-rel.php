<?php
/**
 * The template used for displaying album content in home or archive page
 *
 * @package admag
 */
$classes = array(
  'album',
  'simple-post',
  'col-lg-3 col-md-3 col-sm-4 col-xs-6',
  'clearfix'
);
$grId = get_post_meta( get_the_ID(), 'liroom_album_group', true );
$gr = get_post( $grId );
?>

<article <?php post_class( $classes ); ?>>
  <a href="<?php the_permalink(); ?>" class="overlay-link">
    <figure class="image-overlay">
      <?php
	    if( get_post_meta( get_the_ID(), 'liroom_album_link_review', true ) != '' ) {echo ('<img src="http://placehold.it/70x40" class="album-link-review" alt="">') ;}
    
		if (has_post_thumbnail()) {
          the_post_thumbnail( 'liroom_block_medium' );
        }else{
          echo ('<img src="http://placehold.it/255x255" alt="" />') ;
        }
      ?>
    </figure>
  </a>
  <header class="news-details">
    <h3 class="news-title h2">
      <a href="<?php the_permalink(); ?>">
        <?php the_title( ); ?>
      </a>
    </h3>
    <?php liroom_album_meta(2, true); ?>
  </header>
</article><!-- Album block -->