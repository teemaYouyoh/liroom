<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package liroom
 */

get_header(); ?>
	<div id="content" class="site-content container no-sidebar">
		<div class="content-inside">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

			  <div class="row">
			  <div class="col-md-8 col-sm-6">
				<header class="page-header">
					<h1 class="page-title"><span>Розділ: Групи</span></h1>
				</header><!-- .page-header -->
			  </div>
			  <div class="col-md-4 col-sm-6">
			  <form role="search" method="get" class="search-albums-form search-form" action="/bands?search">
				<input type="search" class="search-albums-field" value="" placeholder="Введіть назву групи" name="b" id="b">
				<input type="submit" class="search-albums-submit" value="Знайти">
			  </form>
			  </div>
			  </div>
				<?php
				
					$filter = '';
					if (isset($_GET['b']) && $_GET['b'] != '') {
						$posts = '';
						$posts[] = get_page_by_title( $_GET['b'], OBJECT, 'bands' );
					}else{
						$paged = 1;  
						if ( get_query_var('paged') ) $paged = get_query_var('paged');  
						if ( get_query_var('page') ) $paged = get_query_var('page');
						
							$args = array(
								'numberposts' => 12,
								'posts_per_page' => 12,
								'paged' => $paged,
								'category'    => 0,
								'include'     => array(),
								'exclude'     => array(),
								'meta_key'    => '',
								'meta_value'  =>'',
								'orderby'  =>'title',
								'order' => 'ASC',
								'order'  =>'',
								'post_type'   => 'bands'
							);	

							$posts = get_posts( $args );
					}
					if ( $posts ) : 
					
						echo '<div class="block1 block1_list">';
						foreach($posts as $post){ setup_postdata($post);
							get_template_part( 'template-parts/block', 'band' );
						}

						wp_reset_postdata(); // сброс
						
							/**
							 * Show pagination if more than 1 page.
							 */
							if (  $wp_query->max_num_pages > 1 && !isset($_GET['b']) || $_GET['b'] == '') {
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
