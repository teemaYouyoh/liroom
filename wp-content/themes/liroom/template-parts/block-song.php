<?php
/**
 * Template part for displaying posts with list style.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package liroom
 */

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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('songs type-songs'); ?>>

		<div class="song-content">
			<a href="<?php the_permalink(); ?>" class="overlay-link head-s">
				<?php echo $liroom_album_img; ?>
				<h1 class="entry-title"><?php the_title( '', '' ); ?>
				<div class="the_views"><?php
					if(function_exists('the_views')) { 
            			echo '<span ><i class="fa fa-eye"></i> ';
            				the_views();
            			echo '</span>';
            		}
				?></div></h1>
			</a>
			<div class="albums">Альбом: <a href="<?php echo $liroom_album_url;?>"><?php echo $liroom_albumTitle;?></a></div>
			<div class="formats">Формат альбома: <?php echo $format;?></div>
			<div class="bands">Группа: <a href="<?php echo $liroom_album_group_url;?>"><?php echo $grTitle;?></a></div>
		</div>
</article><!-- #post-## -->
