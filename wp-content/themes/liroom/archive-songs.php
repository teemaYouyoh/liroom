<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package liroom
 */

$psort_a = array(
'views/DESC' => 'Популярність за зростанням',
'views/ASC' => 'Популярність за спаданням',
'date/all' => 'За весь період',
'date/yesr' => 'За рік',
'date/month' => 'За місяць',
);
$psort = 'date/all';
if (isset($_GET['psort']) && $_GET['psort'] != '') $psort = $_GET['psort'];

$paged = 1;  
if ( get_query_var('paged') ) $paged = get_query_var('paged');  
if ( get_query_var('page') ) $paged = get_query_var('page');
	
$sep = '?';
$urlPost = home_url( $wp->request ); 
$psort_res = explode('/',$psort);
get_header(); ?>
	<div id="content" class="site-content container <?php echo liroom_sidebar_position(); ?>">
		<div class="content-inside">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				  <div class="row">
				  <div class="col-md-12 col-sm-12">
					<header class="page-header">
						<h1 class="page-title"><span>Розділ: Пісні</span></h1>
					</header><!-- .page-header -->
				  </div>
				  <div class="col-md-12 col-sm-12">
				  <ul class="filters">
						<li><strong>Фильтрувати пісні:</strong></li>
						<?php $i=1; foreach($psort_a as $sort_key=>$sort_title){ 
						$psort_ = explode('/',$sort_key);
						$urlPost_ = $urlPost.$sep.'psort='.$sort_key;?>
						<li class="item_<?php echo $i;?>"><a href="<?php echo $urlPost_?>" <?php if ($sort_key == $psort) {echo ' class="selected"';} ?>><?php echo $sort_title?></a></li>
						
						<?php if($i == 2){?>
						<li class="item_<?php echo $i;?>">|</li>
						<?php } ?>
						<?php $i++;} ?>
				  </ul>
				  </div>
				  </div>
					<?php			
					if ($psort_res[0] != 'date') {	
						$args = array(
							'posts_per_page' => 18,
							'paged' => $paged,
							'include'     => array(),
							'exclude'     => array(),
							'meta_key'    => 'views',
							'meta_value'  =>'',
							'post_type'   => 'songs',
							'orderby'   => 'meta_value',
							'order'   => $psort_res[1],	
							
							
						);				
					} else {
						$args = array(
							'posts_per_page' => 18,
							'paged' => $paged,
							'include'     => array(),
							'exclude'     => array(),
							'meta_key'    => '',
							'meta_value'  =>'',
							'post_type'   => 'songs',
							'orderby'   => 'date',
							'order'   => 'DESC',		
							
							
						);
						switch(true){
							case($psort_res[1] == 'year'):$value = date('Y');break;
							case($psort_res[1] == 'month'):$value = date('n');break;
							case($psort_res[1] == 'week'):$value = date('W');break;
							
						}
						//print_r();
						if( isset($psort_res[1]) && isset($value) ){
							$args['date_query'] = array(
								array(
									$psort_res[1]     => $value,
									'inclusive' => true,
								),
							);
						}
					}

				$posts = get_posts( $args );
				//print_r($args);
				if ( $posts ) : 
				
					echo '<div class="block1 block1_list">';
					foreach($posts as $post){ setup_postdata($post);
						get_template_part( 'template-parts/block', 'song' );
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
				endif;?>
					

				</main><!-- #main -->
			</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
