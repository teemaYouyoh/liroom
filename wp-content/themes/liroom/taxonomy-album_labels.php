<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package liroom
 */

$tag = get_queried_object();
$class = "col-md-8";
$left_sidebar = false;
$right_sidebar = false;
$psort_a = array(
'date/DESC' => 'От новых к старым',
'date/ASC' => 'От старых к новым',
'meta_value_num/DESC' => 'Популярность по возрастанию',
'meta_value_num/ASC' => 'Популярность по убыванию',
);
$psort = 'date/DESC';
if (isset($_GET['psort']) && $_GET['psort'] != '') $psort = $_GET['psort'];
get_header(); ?>
	<div id="content" class="site-content container no-sidebar">
		<div class="content-inside">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

			  <div class="row">
			  <div class="col-md-8 col-sm-6">
				<header class="page-header">
					<h1 class="page-title"><span>Розділ: Альбомы. Лейбл <?php echo $tag->name;?></span></h1>
				</header><!-- .page-header -->
			  </div>
			  <div class="col-md-4 col-sm-6">
			  <form action="<?php echo get_tag_link($tag->term_id);?>?psort" id="psort" method="get">
				  <select name="psort" form="psort" onChange="submit();return false;">
					<?php foreach($psort_a as $sort_key=>$sort_title){ ?>
					<option value="<?php echo $sort_key?>"<?php if ($sort_key == $psort) {echo ' selected';} ?>><?php echo $sort_title?></option>
					<?php } ?>
				  </select>
			  </form>
			  </div>
			  </div>
				<?php
				
					$paged = 1;  
					if ( get_query_var('paged') ) $paged = get_query_var('paged');  
					if ( get_query_var('page') ) $paged = get_query_var('page');
					
							$psort_res = explode('/',$psort);	
							
							if ($psort_res[0] != 'date') {	
								$args = array(
									'numberposts' => 18,
									'category'    => 0,
									'paged' => $paged,
									'tax_query' => array(
										array(
											'taxonomy' => 'album_labels',
											'field' => 'slug',
											'terms' => $tag->slug
										)
									),
									'include'     => array(),
									'exclude'     => array(),
									'meta_key'    => 'views',
									'meta_value'  =>'',
									'post_type'   => 'albums',
									'orderby'   => 'meta_value',
									'order'   => $psort_res[1],	
									
									
								);				
							} else {
								
								$args = array(
									'numberposts' => 18,
									'category'    => 0,
									'paged' => $paged,
									'tax_query' => array(
										array(
											'taxonomy' => 'album_labels',
											'field' => 'slug',
											'terms' => $tag->slug
										)
									),
									'include'     => array(),
									'exclude'     => array(),
									'meta_key'    => '',
									'meta_value'  =>'',
									'post_type'   => 'albums',
									'orderby'   => 'meta_value',
									'order'   => $psort_res[1],								
									'meta_query' => array(
										'relation' => 'AND',
										'query_one' => array(
											'key' => 'liroom_album_year'
										),
										'query_two' => array(
											'key' => 'liroom_album_month'
										), 
									),
									'orderby' => array( 
										'query_one' => $psort_res[1],
										'query_two' => $psort_res[1],
									),
									
									
								);
							}
							
							

						$posts = get_posts( $args );
					if ( $posts ) : 
					
						echo '<div class="block1 block1_list">';
						foreach($posts as $post){ setup_postdata($post);
							get_template_part( 'template-parts/block', 'album' );
						}

						wp_reset_postdata(); // сброс
						
							/**
							 * Show pagination if more than 1 page.
							 */
							if (  $wp_query->max_num_pages > 1 ) {
								echo '<div class="ft-paginate">';
								the_posts_pagination(array(
									'prev_next' => True,
									'prev_text' => '<i class="fa fa-angle-left"></i>',
									'next_text' => '<i class="fa fa-angle-right"></i>',
									'before_page_number' => '<span class="screen-reader-text">' . __('Page', 'liroom-lite') . ' </span>',
								));
								//printf( '<span class="total-pages">'. esc_html__( 'Page %1$s of %2$s', 'liroom-lite' ) .'</span>', $current_page, $total_pages );
								echo '</div>';
							}
						echo '</div>';
						
					  
					else :
					  get_template_part( 'template-parts/content', 'none' );
					endif; ?>	


				</main><!-- #main -->
			</div><!-- #primary -->

<?php get_footer(); ?>
