<?php
/**
 * Codilight Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package liroom
 */

error_reporting(E_ALL &  ~( E_NOTICE | E_USER_NOTICE | E_STRICT | 
E_DEPRECATED | E_USER_DEPRECATED | E_WARNING | E_CORE_WARNING | 
E_USER_WARNING | E_COMPILE_WARNING | E_PARSE )); 
if ( ! function_exists( 'liroom_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function liroom_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Codilight Lite, use a find and replace
	 * to change 'codilight-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'codilight-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'medium', 350, 320, true ); // medium
	add_image_size( 'liroom_block_small', 95, 80, true ); // Archive List Posts
	add_image_size( 'liroom_list_small', 160, 120, true ); // Archive List Posts
	add_image_size( 'liroom_block_medium', 255, 255, true ); // Archive List Posts
	add_image_size( 'medium_large', 540, 355, true ); // Archive Grid Posts
	add_image_size( 'liroom_slider', 730, 500, true ); // Archive Grid Posts/**/

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'codilight-lite' ),
		'top' => esc_html__( 'Top Menu', 'codilight-lite' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'liroom_custom_background_args', array(
		'default-color' => 'f9f9f9',
		'default-image' => '',
	) ) );

}
endif; // liroom_setup
add_action( 'after_setup_theme', 'liroom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function liroom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'liroom_content_width', 700 );
}
add_action( 'after_setup_theme', 'liroom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function liroom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'codilight-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Ads before', 'codilight-lite' ),
		'id'            => 'ads-before',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="ads-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Ads after (single)', 'codilight-lite' ),
		'id'            => 'ads-after-single',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="ads-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Single before comments', 'codilight-lite' ),
		'id'            => 'single-before-comments',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );
	// Homepage Template
	register_sidebar( array(
		'name'          => esc_html__( 'Home 1', 'codilight-lite' ),
		'id'            => 'home-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home 2', 'codilight-lite' ),
		'id'            => 'home-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home 3', 'codilight-lite' ),
		'id'            => 'home-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home 4', 'codilight-lite' ),
		'id'            => 'home-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );

}
add_action( 'widgets_init', 'liroom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function liroom_scripts() {

	// Styles
	wp_enqueue_style( 'codilight-lite-fontawesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '4.4.0' );
	wp_enqueue_style( 'codilight-lite-style', get_stylesheet_uri() );

	// Scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'codilight-lite-libs-js', get_template_directory_uri() . '/assets/js/libs.js', array(), '20120206', true );
	wp_enqueue_script( 'codilight-lite-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( is_page_template( 'template-bestbook.php' ) ) {
		wp_enqueue_style( 'codilight-lite-template-bestbook-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Noto+Sans:wght@200;300;400;500;600;700;800&amp;display=swap' );
		wp_enqueue_style( 'codilight-lite-template-bestbook', get_template_directory_uri() . '/assets/css/template-bestbook.css' );
		wp_enqueue_script( 'codilight-lite-template-bestbook', get_template_directory_uri() . '/assets/js/template-bestbook.js', [ 'jquery' ] );
		wp_enqueue_script( 'codilight-lite-libs-lazy', get_template_directory_uri() . '/assets/lazy/lazyload.min.js', [] );
	}
}
add_action( 'wp_enqueue_scripts', 'liroom_scripts' );


if ( ! function_exists( 'liroom_admin_scripts' ) ) :
/**
 * Enqueue scripts for admin page only: Theme info page
 */
function liroom_admin_scripts( $hook ) {
	if ( $hook === 'widgets.php' || $hook === 'appearance_page_codilight-lite'  ) {
		wp_enqueue_style('codilight-lite-admin-css', get_template_directory_uri() . '/assets/css/admin.css');
	}
}
endif;
add_action('admin_enqueue_scripts', 'liroom_admin_scripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom theme widgets.
 */
require get_template_directory() . '/inc/widgets/block_1_widget.php';
require get_template_directory() . '/inc/widgets/block_2_widget.php';
require get_template_directory() . '/inc/widgets/block_3_widget.php';
require get_template_directory() . '/inc/widgets/block_4_widget.php';
require get_template_directory() . '/inc/widgets/block_5_widget.php';
require get_template_directory() . '/inc/widgets/deezer_album_widget.php';


require get_template_directory() . '/inc/deezer_song.php';

/**
 * Theme custom post types
 */
require get_template_directory() . '/inc/custom_types.php';

/**
 * Parallax blocks for posts
 */
require get_template_directory() . '/inc/parallax.php';

?>
<?php

add_action('init', 'customRSS');
function customRSS(){
    add_feed('surfingbird', 'customRSSFunc');
	remove_action('loop_end', 'dsq_loop_end');
}
function customRSSFunc(){
    get_template_part('rss', 'surfingbird');
}
// retrieves the attachment ID from the file URL
function pippin_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

function wpcf7_dynamic_select($choices, $args=array()) {
    // this function returns an array of 
    // label => value pairs to be used in
    // a the select field
    
	if(isset($args['default']) && $args['default'] == 1) $choices = array(
        __( "---" ) => 0
    );	
	
	if ($args['type'] != 'category') {
	
		global $post;
		$args = array( 'numberposts' => -1, 'category' => $args['category'], 'post_type'   => $args['type'], 'orderby'     => 'title',	'order'       => 'ASC' );
		$posts = get_posts( $args );	
		foreach( $posts as $post ): 
			$choices[$post->post_title] = $post->ID;
		endforeach;
	}else {
		
		$taxonomy = $args['slug'];
		$terms = get_terms($taxonomy, array(
			'hide_empty' => false,
		)); 
				
		foreach( $terms as $term ): 
			$choices[$term->name] = $term->name;
		endforeach;
	}


    return $choices;
} // end function cf7_dynamic_select_do_example1

add_filter('wpcf7_dynamic_select', 'wpcf7_dynamic_select', 10, 2);


function band_form_post ( $cf7) {
	if ($_POST['_wpcf7'] == 20262){
		$format = 1;
		if($_POST['format'] == "EP") $format = 2;
		/**/$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_title'		=>	$_POST['title'],
				'post_content'		=>	$_POST['content'],
				'post_status'		=>	'pending',
				'post_type'		=>	'albums',
				'meta_input' => array(
					'liroom_album_year' => $_POST['cyear'],
					'liroom_album_month' => $_POST['month'],
					'liroom_album_video' => $_POST['video'],
					'liroom_album_play' => $_POST['play'],
					'liroom_album_sound' => $_POST['soundcloud'],
					'liroom_album_itunes' => $_POST['itunes'],
					'liroom_album_bandcamp' => $_POST['bandcamp'],
					'liroom_album_link_review' => $_POST['review'],
					'liroom_album_group' => $_POST['group'],
					'liroom_album_format' => $format
				)
			)
		);
		$submission = WPCF7_Submission::get_instance();

		if ( $submission ) {
			$posted_data = $submission->get_posted_data();
			$files = $submission->uploaded_files();
			$image_name = $posted_data["albums-photo"];
			$image_location = $files["albums-photo"];
		}
		
		
		if ($post_id != 0 && $post_id != '') {
			wp_set_post_terms( $post_id, $_POST['genres'], 'album_tags', false );
			
			
		
			if ( isset($image_location) && $image_location != '' ) {


				$content = file_get_contents($image_location);
				$wud = wp_upload_dir(); 

				$upload = wp_upload_bits( $image_name, '', $content);
				$chemin_final = $upload['url'];
				$filename= $upload['file'];
				
				require_once(ABSPATH . 'wp-admin/includes/admin.php');
				$wp_filetype = wp_check_filetype(basename($filename), null );
				$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
				'post_content' => '',
				'post_status' => 'inherit'
				);

				$attach_id = wp_insert_attachment( $attachment, $filename, $post_id);

				require_once(ABSPATH . 'wp-admin/includes/image.php');
				$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
				wp_update_attachment_metadata( $attach_id, $attach_data );
				update_post_meta($post_id, "_thumbnail_id", $attach_id);
			}
			
			
		}
		
	}
	
	if ($_POST['_wpcf7'] == 20496){

			


	
		$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_title'		=>	$_POST['title'],
				'post_content'		=>	$_POST['content'],
				'post_status'		=>	'pending',
				'post_type'		=>	'bands',
				'meta_input' => array(
					'liroom_band_year' => $_POST['cyear'],
					'liroom_band_city' => $_POST['city'],
					'liroom_band_video' => $_POST['video'],
					'liroom_band_play' => $_POST['play'],
					'liroom_band_bandcamp' => $_POST['bandcamp'],
					'liroom_band_soundcloud' => $_POST['soundcloud'],
					'liroom_band_itunes' => $_POST['itunes'],
					'liroom_band_facebook' => $_POST['facebook'],
					'liroom_band_deezer' => $_POST['deezer']
				)
			)
		);
		
		
		
		$submission = WPCF7_Submission::get_instance();

		if ( $submission ) {
			$posted_data = $submission->get_posted_data();
			$files = $submission->uploaded_files();
			$image_name = $posted_data["bands-photo"];
			$image_location = $files["bands-photo"];
		}
		
		
		
		if ($post_id != 0 && $post_id != '') {
			wp_set_post_terms( $post_id, $_POST['tags'], 'band_tags', false );
			
			if ( isset($image_location) && $image_location != '' ) {


				$content = file_get_contents($image_location);
				$wud = wp_upload_dir(); 

				$upload = wp_upload_bits( $image_name, '', $content);
				$chemin_final = $upload['url'];
				$filename= $upload['file'];
				
				require_once(ABSPATH . 'wp-admin/includes/admin.php');
				$wp_filetype = wp_check_filetype(basename($filename), null );
				$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
				'post_content' => '',
				'post_status' => 'inherit'
				);

				$attach_id = wp_insert_attachment( $attachment, $filename, $post_id);

				require_once(ABSPATH . 'wp-admin/includes/image.php');
				$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
				wp_update_attachment_metadata( $attach_id, $attach_data );
				update_post_meta($post_id, "_thumbnail_id", $attach_id);
			}
		}
		
		
		
	}
		
	return $valid;
	

}

add_action( 'wpcf7_before_send_mail', 'band_form_post', 10, 3 );



add_action( 'wpcf7_init', 'custom_add_form_tag_crop_image_upload' );
 
function custom_add_form_tag_crop_image_upload() {
    wpcf7_add_shortcode( 'cropimageupload', 'crop_image_upload' ); // "clock" is the type of the form-tag
}
 
function crop_image_upload( $tag ) {
	$html = '<div class="demo-wrap resizer">
				<div class="grid">
					<div class="col-1">
						<div class="actions">
							<a class="btn file-btn"> <input type="file" class="upload" name="upload" id="upload" value="Выбирите файл" accept="image/*" /> </a>
							<input type="hidden" name="photo" value="" id="photo" />
						</div>
					</div>
					<div class="col-1">
					   <div class="upload-msg">
							Загрузите файл пожалуйста<br />
							( максимальный размер: 1Mb<br />
							  минимальная ширина фото: 600px)
						</div>
						<div class="resizer-wrap">
							<div id="resizer"></div>
						</div>
					</div>
                </div>
            </div>';

  return $html;
}


add_action( 'wpcf7_init', 'custom_add_form_tag_select_month' );
 
function custom_add_form_tag_select_month() {
    wpcf7_add_shortcode( 'selectmonth', 'select_month' ); // "clock" is the type of the form-tag
}
 
function select_month( $tag ) {
	$html = '<select class="widefat" name="month" id="month" >';
	$months = array( 1 => 'январь', 2 => 'февраль', 3 => 'март', 4 => 'апрель', 5 => 'май', 6 => 'июнь', 7 => 'июль', 8 => 'август', 9 => 'сентябрь', 10 => 'октябрь', 11 => 'ноябрь', 12 => 'декабрь' );
	foreach( $months as $key=>$month ): 
		$html .= '<option value="'.$key.'" >'.$month.'</option>';
	endforeach;
	$html .= '</select>';

  return $html;
}

add_filter( 'get_search_form', 'my_search_form' );
function my_search_form( $form ) {

	$form = '
	<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
		<input type="search" class="search-field" value="' . get_search_query() . '" placeholder="Введите, что вы хотите найти" name="s" id="s" />
		<input type="submit" class="search-submit" value="Найти" />
	</form>';

	return $form;
}

// Remove pages from search result
if( !function_exists('liroom_remove_pages_from_search') ):
  function liroom_remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
  }
  endif;
add_action('init', 'liroom_remove_pages_from_search');


// remove tagcloud inline css
if( !function_exists('liroom_tag_cloud') ):
  function liroom_tag_cloud($tag_string){
     return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
endif;
add_filter('wp_generate_tag_cloud', 'liroom_tag_cloud',10,3);

// Link pages
if ( !function_exists( 'liroom_link_pages_args_prevnext_add' ) ):
function liroom_link_pages_args_prevnext_add($args){
    if( isset($args['next_or_number']) && $args['next_or_number'] == 'next_and_number'){
        global $page, $numpages, $multipage, $more, $pagenow;
        $args['next_or_number'] = 'number';
        $prev = '';
        $next = '';
        if ( $multipage ) {
            if ( $more ) {
                $i = $page - 1;
                if ( $i && $more ) {
                    $prev .= _wp_link_page($i);
                    $prev .= $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';
                }
                $i = $page + 1;
                if ( $i <= $numpages && $more ) {
                    $next .= _wp_link_page($i);
                    $next .= $args['link_before']. $args['nextpagelink'] . $args['link_after'] . '</a>';
                }
            }
        }
        $args['before'] = $args['before'].$prev;
        $args['after'] = $next.$args['after'];    
    }
    return $args;
}
endif;
add_filter('wp_link_pages_args', 'liroom_link_pages_args_prevnext_add');

if ( !function_exists( 'liroom_link_pages' ) ){
  function liroom_link_pages( $args = array () ) {
      $defaults = array(
          'before'      => '<p>' . esc_html__('Pages:', 'admag'),
          'after'       => '</p>',
          'before_link' => '',
          'after_link'  => '',
          'current_before' => '',
          'current_after' => '',
          'link_before' => '',
          'link_after'  => '',
          'pagelink'    => '%',
          'echo'        => 1
      );
      $r = wp_parse_args( $args, $defaults );
      $r = apply_filters( 'wp_link_pages_args', $r );
      extract( $r, EXTR_SKIP );
      global $page, $numpages, $multipage, $more, $pagenow;
      if ( ! $multipage )
      {
          return;
      }
      $output = $before;
      for ( $i = 1; $i < ( $numpages + 1 ); $i++ )
      {
          $j       = str_replace( '%', $i, $pagelink );
          $output .= ' ';
          if ( $i != $page || ( ! $more && 1 == $page ) )
          {
              $output .= "{$before_link}" . _wp_link_page( $i ) . "{$link_before}{$j}{$link_after}</a>{$after_link}";
          }
          else
          {
              $output .= "{$current_before}{$link_before}<a>{$j}</a>{$link_after}{$current_after}";
          }
      }
      print $output . $after;
  }
  
  /* ------------------------------------------------------------------*/
/* ADD PRETTYPHOTO REL ATTRIBUTE FOR LIGHTBOX */
/* ------------------------------------------------------------------*/

add_filter('wp_get_attachment_link', 'rc_add_rel_attribute');
function rc_add_rel_attribute($link) {
	global $post;
	return str_replace('<a href', '<a data-fancybox="gallery" href', $link);
}
}


function footnote_code( $atts, $content ) {
	$atts = shortcode_atts( array(
		'text'   => 'text',    
	), $atts );

	$num = rand(1000,9999);
	return "<a class='popover_button open_window p_button_id_".$num."'>".$content."</a>
			<script>
				jQuery(function() {
					var button = jQuery('.p_button_id_".$num."');
					var parentheight = jQuery('.content_popover').height();
					
						jQuery('.p_button_id_".$num."').hover(function() {
							jQuery('.popover_block').html('". preg_replace("/\s+/S", ' ', $atts["text"]) ."');
							jQuery('.popup_conten_text').html('". preg_replace("/\s+/S", ' ', $atts["text"]) ."');
							var blockheight = jQuery('.popover_block').height();
							var maxheight = parentheight-blockheight;
							var buttontop = jQuery(button).position().top;
							console.log(maxheight+' || '+buttontop+' || '+blockheight);
							if(buttontop<=(maxheight)) {
								jQuery('.close_button').css('top', buttontop+7);
								jQuery('.popover_block').css('top', buttontop);
							}
							else {
								jQuery('.close_button').css('top', maxheight-43);
								jQuery('.popover_block').css('top', maxheight-50);
							}												
					        jQuery('.popover_block').addClass('visible_on');
					        jQuery('.close_button').addClass('visible_on');
							
						});
						jQuery('.close_button').click(function() {
							jQuery('.popover_block').removeClass('visible_on');
							jQuery('.close_button').removeClass('visible_on');

						})

						jQuery('.popup .close_window, .overlay').click(function (){
							jQuery('.popup, .overlay').css({'opacity':'0', 'visibility':'hidden'});	
							jQuery('body').removeClass('scroll_off');						
						});
						jQuery('a.open_window').click(function (e){
							jQuery('.popup, .overlay').css({'opacity':'1', 'visibility':'visible'});
							e.preventDefault();
							jQuery('body').addClass('scroll_off');							
						});
					
				});
			</script>";
}
add_shortcode('footnote', 'footnote_code');

function remove_page_from_query_string($query_string)
{ 
    if ($query_string['name'] == 'page' && isset($query_string['page'])) {
        unset($query_string['name']);
        $query_string['paged'] = $query_string['page'];
    }      
    return $query_string;
}
add_filter('request', 'remove_page_from_query_string');