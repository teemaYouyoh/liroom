<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package liroom
 */

function filter_dsq_can_load( $script_name ) {
    // $script_name is either 'count' or 'embed'.
	if ( is_page() ) {
		return false;
	}

	return true;
}
add_filter( 'dsq_can_load', 'filter_dsq_can_load' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function liroom_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'liroom_body_classes' );


if ( ! function_exists( 'liroom_sidebar_position' ) ) :
/**
 * The site default sidebar position.
 *
 * @param string $characters
 * @return string
 */
function liroom_sidebar_position(){
	$layout_sidebar = get_theme_mod( 'layout_sidebar', 'right' );
	echo $layout_sidebar . '-sidebar';
}
endif;

/**
 * Add a count class to category counter number.
 *
 * @param string $characters
 * @return string
 */
add_filter('wp_list_categories', 'liroom_cat_count_inline');
function liroom_cat_count_inline($links) {
	$links = str_replace('</a> (', '</a><span class="cat-count">', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}

if ( ! function_exists( 'liroom_link_to_menu_editor' ) ) :
/**
 * Menu fallback. Link to the menu editor if that is useful.
 *
 * @param  array $args
 * @return string
 */
function liroom_link_to_menu_editor( $args )
{
    if ( ! current_user_can( 'edit_theme_options' ) )
    {
        return;
    }

    // see wp-includes/nav-menu-template.php for available arguments
    extract( $args );

    $link = $link_before
        . '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . $before . esc_html__( 'Add a menu', 'liroom-lite' ) . $after . '</a></li>'
        . $link_after;

    // We have a list
    if ( FALSE !== stripos( $items_wrap, '<ul' )
        or FALSE !== stripos( $items_wrap, '<ol' )
    )
    {
        $link = "<li>$link</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( ! empty ( $container ) )
    {
        $output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
    }

    if ( $echo )
    {
        echo $output;
    }

    return $output;
}
endif;


// Add the custom columns to the book post type:
add_filter( 'manage_songs_posts_columns', 'set_custom_songs_columns' );
function set_custom_songs_columns($columns) {
    $columns['song_group'] = __( 'Group', 'your_text_domain' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_songs_posts_custom_column' , 'custom_songs_column', 10, 2 );
function custom_songs_column( $column, $post_id ) {
    switch ( $column ) {

        case 'song_group' :
            $gid = get_post_meta( $post_id , 'liroom_album_group' , true ); 
			if(!empty($gid)){
				$gpost = get_post( $gid ); 
				$urlPost = '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '&liroom_album_group='.$gid; 
				echo '<a href="'.$urlPost.'">' . $gpost->post_title . '</a>';
			}
            break;

    }
}

//defining the filter that will be used to select posts by 'post formats'
function add_post_formats_filter_to_post_administration(){

    //execute only on the 'post' content type
    global $post_type;
    if($post_type == 'songs'){

		$args = array(
			'numberposts' => -1,
			'orderby'  =>'title',
			'order' => 'DESC',
			'order'  =>'',
			'post_type'   => 'bands'
		);	

		$posts = get_posts( $args );
		$views['metakey'] = '<div class="alignleft actions">
			<label for="liroom_album_group" class="screen-reader-text">Фильтр по группе</label>
			<select name="liroom_album_group" id="liroom_album_group">';
		if(isset($_GET['liroom_album_group']) && $_GET['liroom_album_group'] != 0){
			$views['metakey'] .= '<option value="0">Все песни</option>';
		}else{
			$views['metakey'] .= '<option selected="selected" value="0">Все группы</option>';
		}
		foreach($posts as $post){	
			$selected = '';
			if(isset($_GET['liroom_album_group']) && $_GET['liroom_album_group'] == $post->ID){
				$selected = ' selected="selected"';
			}
			$views['metakey'] .= '<option'.$selected.' value="'.$post->ID.'">'.$post->post_title.'</option>';
		}
		$views['metakey'] .= '</select>		</div>';
		echo $views['metakey'];

    }
}
add_action('restrict_manage_posts','add_post_formats_filter_to_post_administration');

add_filter( 'parse_query', 'wpse45436_posts_filter' );
/**
 * if submitted filter by post meta
 * 
 * make sure to change META_KEY to the actual meta key
 * and POST_TYPE to the name of your custom post type
 * @author Ohad Raz
 * @param  (wp_query object) $query
 * 
 * @return Void
 */
function wpse45436_posts_filter( $query ){
    global $pagenow;
    global $post_type;
    if($query->query_vars['post_type'] == 'songs'){
		$liroom_album_group = 0;
		if (isset($_GET['liroom_album_group'])) {
			$liroom_album_group = $_GET['liroom_album_group'];
		}
		if (!empty($liroom_album_group) && is_admin() && $pagenow=='edit.php') {
			$query->query_vars['meta_key'] = 'liroom_album_group';
			$query->query_vars['meta_value'] = $liroom_album_group;
		}
    }
}


add_action('pre_get_posts','alter_query');
 
function alter_query($query) {
	//gets the global query var object
	global $wp_query;
	
	if($wp_query->query['post_type'] != 'songs')
		return;
	
	
	$query->set('posts_per_page',18);	
	$psort = 'date/all';
	if (isset($_GET['psort']) && $_GET['psort'] != '') $psort = $_GET['psort'];
	$psort_res = explode('/',$psort);

	if ($psort_res[0] == 'date') {	
		switch(true){
			case($psort_res[1] == 'year'):$value = date('Y');break;
			case($psort_res[1] == 'month'):$value = date('n');break;
			case($psort_res[1] == 'week'):$value = date('W');break;
			
		}
		
		//print_r();
		if( isset($psort_res[1]) && isset($value) ){
		
						
			$query->set('orderby','date');				
			$query->set('order','DESC');
			$query->set('date_query',array(
				array(
					$psort_res[1]     => $value,
					'inclusive' => true,
				),
			));/**/
		}
	}
 
	//we remove the actions hooked on the '__after_loop' (post navigation)
	remove_all_actions ( '__after_loop');
}