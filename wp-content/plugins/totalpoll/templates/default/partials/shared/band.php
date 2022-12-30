<?php
if ( defined( 'ABSPATH' ) === false ) :
	exit;
endif; // Shhh

$bID = $choice['content']['band'];
$btitle = get_the_title($bID);
$thumb_url = get_the_post_thumbnail_url( $bID, 'vote_thumb' );

$liroom_band_city = esc_attr( get_post_meta( $bID, 'liroom_band_city', true ) );
$liroom_band_facebook = esc_attr( get_post_meta( $bID, 'liroom_band_facebook', true ) );
$liroom_band_vk = esc_attr( get_post_meta( $bID, 'liroom_band_vk', true ) );
$liroom_band_soundcloud = esc_attr( get_post_meta( $bID, 'liroom_band_soundcloud', true ) );
$liroom_band_track = esc_attr( get_post_meta( $bID, 'liroom_band_track', true ) );
$liroom_band_video = explode('?v=',esc_attr( get_post_meta( $bID, 'liroom_band_video', true ) ));
$liroom_band_person = esc_attr( get_post_meta( $bID, 'liroom_band_person', true ) );
$liroom_band_rider = esc_attr( get_post_meta( $bID, 'liroom_band_rider', true ) );
$liroom_band_email = esc_attr( get_post_meta( $bID, 'liroom_band_email', true ) );

?>
<div class="totalpoll-choice-band totalpoll-supports-full" id="band<?php echo $choice['index'];?>" itemscope itemtype="http://schema.org/ImageObject">
	<a href="#choise-popup-<?php echo $choice['index'];?>" target="_blank" class="open-popup-link">
		<img src="<?php echo $thumb_url; ?>" alt="<?php echo $btitle;?>" class="copy" itemprop="contentUrl" />
		<div class="totalpoll-choice-title"><?php echo $btitle;?></div>
	</a>
	<div class="mfp-hide">
		<div id="choise-popup-<?php echo $choice['index'];?>" class="white-popup">
		  <div class="band-box">
		  <div class="band-info">
		  <h2><?php echo $btitle;?></h2>
		  <?php if($liroom_band_city != ''){ ?><h5 class="city">Город: <?php echo $liroom_band_city;?></h5><?php } ?>
		  <div class="img"></div>
			<?php if(isset($liroom_band_video[1]) && $liroom_band_video[1] != ''){ ?>
			  <div class="box"><h3>Видео:</h3>
				<input type="hidden" id="video<?php echo $choice['index'];?>" name="video<?php echo $choice['index'];?>" value="<?php echo $liroom_band_video[1];?>" />
				<div class="video"></div>
			  </div><?php } ?>
			<!-- <?php if($liroom_band_track != ''){ ?>
			  <div class="box"><h3>Трек:</h3>
				<input type="hidden" id="track<?php echo $choice['index'];?>" name="track<?php echo $choice['index'];?>" value="<?php echo $liroom_band_track;?>" />
				<div class="track"></div>
			  </div><?php } ?>-->
			  <div class="band-contact"> 			
				<?php if($liroom_band_email != ''){ ?><a href="mailto:<?php echo $liroom_band_email;?>" target="_blank"><i class="fa fa-envelope fa-lg" title="Email"></i></a><?php } ?>
				<?php if($liroom_band_facebook != ''){ ?><a href="<?php echo $liroom_band_facebook;?>" target="_blank"><i class="fa fa-facebook fa-lg" title="Facebook"></i></a><?php } ?>
				<?php if($liroom_band_vk != ''){ ?><a href="<?php echo $liroom_band_vk;?>" target="_blank"><i class="fa fa-vk fa-lg" title="Twitter"></i></a><?php } ?>
				<?php if($liroom_band_soundcloud != ''){ ?><a href="<?php echo $liroom_band_soundcloud;?>" target="_blank"><i class="fa fa-soundcloud fa-lg" title="SoundCloud"></i></a><?php } ?>
		       </div>
		  </div>
			</div>
		</div>
	</div>
</div>
<style>
</style>