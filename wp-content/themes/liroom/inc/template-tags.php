<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package liroom
 */

if ( ! function_exists( 'liroom_copyright' ) ) :
/**
 * Post meta information style 1
 */
function liroom_copyright() {
    echo get_theme_mod('Copyright') . ' 2012-'.date('Y').' © <a href="//theyarewanted.com/" target="_blank" class="&quot; title=&quot;&quot;Технічний супровід сайту: Wanted agency&quot;">Технічний супровід сайту: Wanted agency</a>';
}
endif;

if ( ! function_exists( 'liroom_social' ) ) :
/**
 * Post meta information style 1
 */
function liroom_social($addC = false,$addP = false) {
	$addPos = 'top';
	$addClass = '';
	if ($addP == true) $addPos = 'bottom';
	if ($addC == true) $addClass = ' fa-lg';
    echo '<ul class="social-list">';
    echo '<li class="social-facebook"><a href="'.get_theme_mod('liroom_fb').'" data-toggle="tooltip" target="_blank" data-placement="'.$addPos.'" title="" data-original-title="Facebook"><i class="fa fa-facebook'.$addClass.'"></i></a></li>';
    echo '<li class="social-twitter"><a href="'.get_theme_mod('liroom_tw').'" data-toggle="tooltip" target="_blank" data-placement="'.$addPos.'" title="" data-original-title="Twitter"><i class="fa fa-twitter'.$addClass.'"></i></a></li>';
    echo '<li class="social-telegram"><a href="'.get_theme_mod('liroom_vk').'" data-toggle="tooltip" target="_blank" data-placement="'.$addPos.'" title="" data-original-title="Telegram"><?xml version="1.0" encoding="UTF-8" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><img src="\wp-content\themes\liroom\assets\images\iconmonstr-telegram-w.svg" class="white" title="" alt="" /><img src="\wp-content\themes\liroom\assets\images\iconmonstr-telegram-g.svg" title="" class="grey none" alt="" /></a></li>';
	echo '<li class="social-youtube"><a href="'.get_theme_mod('liroom_ytb').'" data-toggle="tooltip" target="_blank" data-placement="'.$addPos.'" title="" data-original-title="Youtube"><i class="fa fa-youtube-play'.$addClass.'"></i></a></li>';
	echo '<li class="social-instagram"><a href="'.get_theme_mod('liroom_inst').'" data-toggle="tooltip" target="_blank" data-placement="'.$addPos.'" title="" data-original-title="Instagram"><i class="fa fa-instagram'.$addClass.'"></i></a></li>';
	echo '</ul>';
}
endif;

if ( ! function_exists( 'liroom_posted_on' ) ) :
/**
 * Post meta information style 1
 */
function liroom_meta_1($view = false) {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$time_string = liroom_get_time_format();
	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'liroom-lite' ),
		'<span class="entry-date">- ' . $time_string . '</span>'
	);
	$byline = sprintf(
		esc_html_x( 'Автор: %s', 'post author', 'liroom-lite' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<div class="entry-meta entry-meta-1">';

		echo $byline.$posted_on;
		if(function_exists('the_views') && $view == true) { 
			echo '<span ><i class="fa fa-eye"></i> ';
				the_views();
			echo '</span>';
		}
		

	echo '</div>';
}
endif;

// Print post published time
if ( !function_exists( 'liroom_get_time_format' ) ):
	function liroom_get_time_format() {
		$datetime = '<span class="article-date"><i class="fa fa-clock-o"></i> '.get_the_time( get_option('date_format') ) . ' ' . get_the_time( get_option('time_format') ) . '</span>';


		$args = array(
			'1' => 3600,
			'2' => 86400,
			'3' => 604800,
			'4' => 31104000,
			'5' => 0
		);

		//$time_ago_type = absint( dt_get_option( 'dt-time-ago-type' ) );
		$time_ago_type = 4;

		if( empty($time_ago_type) || !is_numeric( $time_ago_type ) ){
			return $datetime;
		}

		if ( isset( $args[$time_ago_type] ) ) {
			if ( ( current_time( 'timestamp' ) - get_the_time( 'U' ) <= $args[$time_ago_type] ) ) {
				
				$time_string = '<span class="article-date"><i class="fa fa-clock-o"></i> <time class="entry-date published updated" datetime="%1$s">%2$s</time> %3$s</span>';

				$time_string = sprintf( $time_string,
					esc_attr( get_the_date( 'c' ) ),
					human_time_diff( get_the_time('U'), current_time('timestamp') ),
					'назад'
				);

				return $time_string;
			}
		}

		return $datetime;
	}
endif;

// Print album date
if ( !function_exists( 'liroom_get_album_date' ) ):
	function liroom_get_album_date($id) {
		$liroom_album_year = get_post_meta( $id, 'liroom_album_year', true ) ; 
		$curr_year = date("Y");
		if ($liroom_album_year == '') $liroom_album_year = $curr_year;
		
		$liroom_album_month = get_post_meta( $id, 'liroom_album_month', true ) ; 
				if ($liroom_album_month == '') $liroom_album_month = 0;
		$months = array( 0 => '', 1 => 'январь', 2 => 'февраль', 3 => 'март', 4 => 'апрель', 5 => 'май', 6 => 'июнь', 7 => 'июль', 8 => 'август', 9 => 'сентябрь', 10 => 'октябрь', 11 => 'ноябрь', 12 => 'декабрь' );

		$datetime = '<span class="article-date"><i class="fa fa-clock-o"></i> '. $months[intval($liroom_album_month)] . ' ' . $liroom_album_year . '</span>';


		return $datetime;
	}
endif;


if ( ! function_exists( 'liroom_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function liroom_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'liroom-lite' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'liroom-lite' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'liroom_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function liroom_entry_footer() {

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$tag_list      = get_the_tag_list( '<ul class="post-tags"><li>', "</li>\n<li>", '</li></ul>' );
		if ( $category_list != '' || $tag_list != '' ) {
			echo '<div class="entry-taxonomies">';

			if ( $tag_list ) {
				echo '<div class="entry-tags">';
					echo '<span>'. esc_html__( 'Tags', 'liroom-lite' ) .'</span>';
					echo $tag_list;
				echo '</div>';
			}
			echo '</div>';
		}
	}
}
endif;


if( ! function_exists( 'liroom_the_author_box' ) ):
	function liroom_the_author_box( $id = 0, $boxed = true ){
		if( !isset( $id ) || !is_numeric( $id ) || $id == 0 )
			return;

		$class = 'author-widget';
		
		if($boxed){
			$class = 'author-box';
		}
?>
	<div class="<?php echo esc_attr( $class ); ?> clearfix">
	   <div class="author-avatar">
	      <a href="<?php echo esc_url( get_author_posts_url( $id ) ); ?>">
	        <?php echo get_avatar( $id, 110 ); ?>
	      </a>
	   </div>
	   <div class="author-info">
	      <div class="h3"><a href="<?php echo get_author_posts_url( $id ); ?>"><?php the_author_meta('display_name', $id); ?></a></div>
			<?php 
				$career = trim(get_the_author_meta( 'career', $id )); 
				if( $career != ""){
					echo '<p class="author-position">'.esc_html( $career ).'</p>';
				}
			?>
	      
	      <?php echo wpautop(get_the_author_meta('description', $id)); ?>
	      <div class="author-contact">
	         <?php
	            $links = liroom_get_social_links();

	            foreach ($links as $link_id => $link_name) {
	            	$link = trim( get_the_author_meta( $link_id, $id ) );

	               if( !empty( $link ) ){
	                  echo '<a href="'.esc_url( $link ).'" target="_blank"><i class="fa fa-'.esc_attr( $link_id ).' fa-lg" title="'.esc_attr( $link_name ).'"></i></a>';
	               }
	            }
	         ?>
	      </div>
	   </div>
	</div>
<?php
	}
endif;

// Get user social links array
if ( !function_exists( 'liroom_get_social_links' ) ){
   function liroom_get_social_links( ) {
      $return_array = array(
         'facebook' => esc_html__('Facebook', 'liroom-lite'),
         'twitter' => esc_html__('Twitter', 'liroom-lite'),
         'google-plus' => esc_html__('Google+', 'liroom-lite'),
         'youtube' => esc_html__('Youtube', 'liroom-lite'),
         'vimeo' => esc_html__('Vimeo', 'liroom-lite'),
         'linkedin' => esc_html__('Linkedin', 'liroom-lite'),
         'behance' => esc_html__('Behance', 'liroom-lite'),
         'tumblr' => esc_html__('Tumblr', 'liroom-lite'),
         'pinterest' => esc_html__('Pinterest', 'liroom-lite'),
         'dribbble' => esc_html__('Dribbble', 'liroom-lite'),
         'instagram' => esc_html__('Instagram', 'liroom-lite'),
         'flickr' => esc_html__('Flickr', 'liroom-lite'),
         'soundcloud' => esc_html__('SoundCloud', 'liroom-lite'),
         'spotify' => esc_html__('Spotify', 'liroom-lite'),
         'vine' => esc_html__('Vine', 'liroom-lite'),
         'github' => esc_html__('Github', 'liroom-lite'),
         'vk' => esc_html__('VK', 'liroom-lite')
      );

      return $return_array;
   }
}


if ( ! function_exists( 'dt_album_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Level = 1 means only get time info
 * Level = 2 means only get time and author info
 * Level = 3 means get time, author, category info
 * Level = 4 means get views only
 * Level = 5 means get time, author, category info without anchor tag
 * Level = 6 means get reviews only
 */
function liroom_album_meta($level = 2, $review = false) {
	
	if($level == 4){
		echo '<p class="simple-share"><i class="fa fa-eye"></i> ';
			the_views();
		echo '</p>';
		return;
	}

	$post_cat = "";
	$byline = "";
	$posted_on = "";
	$rev = "";


	if($level != 1 && $level != 5 ){
		$grId = get_post_meta( get_the_ID(), 'liroom_album_group', true );
		$gr = get_post( $grId );
		$grUrl = get_post_permalink( $grId ); 
		$byline = sprintf(
			'Автор: %s',
			'<span class="author vcard"><a class="url fn n" href="' . $grUrl . '">' . $gr->post_title . '</a></span>'
		);
	}

	if( $level == 5 ){
		$grId = get_post_meta( get_the_ID(), 'liroom_album_group', true );
		$gr = get_post( $grId );
		$byline = sprintf(
			__dt( 'by').' %s - ',
			'<span class="author vcard">'. $gr->post_title . '</span>'
		);
	}

	echo '<p class="simple-share">' . $post_cat . $byline . liroom_get_album_date(get_the_ID()) . $rev . '</p>';

}
endif;


if ( ! function_exists( 'liroom_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own liroom_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @return void
 */
function liroom_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
        // Display trackbacks differently than normal comments.
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <p><?php esc_html_e( 'Pingback:', 'liroom-lite' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'liroom-lite' ), '<span class="edit-link">', '</span>' ); ?></p>
    <?php
            break;
        default :
        // Proceed with normal comments.
        global $post;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment clearfix">
            <?php echo get_avatar( $comment, 60 ); ?>
            <div class="comment-wrapper">
                <header class="comment-meta comment-author vcard">
                    <?php
                        printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
                            get_comment_author_link(),
                            // If current post author is also comment author, make it known visually.
                            ( $comment->user_id === $post->post_author ) ? '<span>' . esc_html__( 'Post author', 'liroom-lite' ) . '</span>' : ''
                        );
                        printf( '<a class="comment-time" href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                            esc_url( get_comment_link( $comment->comment_ID ) ),
                            get_comment_time( 'c' ),
                            /* translators: 1: date, 2: time */
                            sprintf( esc_html__( '%1$s', 'liroom-lite' ), get_comment_date() )
                        );
                        comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'liroom-lite' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                        edit_comment_link( esc_html__( 'Edit', 'liroom-lite' ), '<span class="edit-link">', '</span>' );
                    ?>
                </header><!-- .comment-meta -->

                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'liroom-lite' ); ?></p>
                <?php endif; ?>

                <div class="comment-content">
                    <?php comment_text(); ?>
                    <?php  ?>
                </div><!-- .comment-content -->
            </div><!--/comment-wrapper-->
        </article><!-- #comment-## -->
    <?php
        break;
    endswitch; // end comment_type check
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function liroom_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'liroom_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'liroom_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so liroom_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so liroom_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in liroom_categorized_blog.
 */
function liroom_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'liroom_categories' );
}
add_action( 'edit_category', 'liroom_category_transient_flusher' );
add_action( 'save_post',     'liroom_category_transient_flusher' );
