<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package liroom
 */

get_header(); 
 

$liroom_album_id = get_post_meta( get_the_ID(), 'liroom_song_album', true ) ; 
$liroom_album_format =  get_post_meta( $liroom_album_id, 'liroom_album_format', true ) ; 
$format = "LP";
if($liroom_album_format == 2) $format = "EP";
$liroom_album = get_post( $liroom_album_id );
$liroom_albumTitle = $liroom_album->post_title;
$liroom_album_url = get_post_permalink( $liroom_album_id ); 
$liroom_album_img = get_the_post_thumbnail( $liroom_album_id, 'thumbnail');
if ($liroom_album_group_img == '') {
	$liroom_album_group_img = '<img src="http://placehold.it/150x150" alt="" class="album_thumb_left attachment-album_small_thumb size-album_small_thumb wp-post-image"/>';
} 
	
$grId = get_post_meta( $liroom_album_id, 'liroom_album_group', true );
$gr = get_post( $grId );
$grTitle = $gr->post_title;
$liroom_album_group_url = get_post_permalink( $grId ); 
$deeser_song = deeser_song(get_the_title(),$liroom_albumTitle,$grTitle);


?>
	<div class="song-banner">
		<div class="song-inner">
			<div class="song-content">
				<?php echo $liroom_album_img; ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="albums">Альбом: <a href="<?php echo $liroom_album_url;?>"><?php echo $liroom_albumTitle;?></a></div>
				<div class="formats">Формат альбома: <?php echo $format;?></div>
				<div class="bands">Группа: <a href="<?php echo $liroom_album_group_url;?>"><?php echo $grTitle;?></a></div>
			</div>
			<?php if($deeser_song != '') { ?>
			<div class="song-deezer"><script>
				(function(d, s, id) { 
				var js, djs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return; 
				js = d.createElement(s); js.id = id; 
				js.src = "https://cdns-files.dzcdn.net/js/widget/loader.js"; 
				 djs.parentNode.insertBefore(js, djs);
			}(document, "script", "deezer-widget-loader"));</script>

			<div class="deezer-widget-player" data-src="https://www.deezer.com/plugins/player?format=classic&autoplay=false&playlist=true&width=280&height=60&color=ff6600&layout=dark&size=medium&type=tracks&id=<?php echo $deeser_song;?>&app_id=1" data-scrolling="no" data-frameborder="0" data-allowTransparency="true" data-width="280" data-height="60"></div>
				
			</div>
			<?php } ?>
		</div>
	</div>
	<div id="content" class="site-content container <?php echo liroom_sidebar_position(); ?>">
		<div class="content-inside">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'song' ); ?>


				<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
