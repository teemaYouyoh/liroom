<script type="text/javascript">
   admixerML.fn.push(function () {


       admixerML.defineSlot({
           z: 'ae0f3c68-ec4b-4a6d-97d4-1ce2c14b7ea7',
           ph: 'admixer_ae0f3c68ec4b4a6d97d41ce2c14b7ea7_zone_12255_sect_3677_site_3331',
           i: 'inv-nets'
       });
       admixerML.singleRequest();
   });
</script>
<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package liroom
 */
 
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlCur = str_replace( 'local','com.ua',$actual_link );
$liroom_band_id = get_the_ID() ;   
$liroom_band_city = esc_attr( get_post_meta( $liroom_band_id, 'liroom_band_city', true ) );
$liroom_band_year = esc_attr( get_post_meta( $liroom_band_id, 'liroom_band_year', true ) ); 
$liroom_band_soundcloud = esc_attr( get_post_meta( $liroom_band_id, 'liroom_band_soundcloud', true ) ); 
$liroom_band_video = esc_attr( get_post_meta( $liroom_band_id, 'liroom_band_video', true ) ); 
$liroom_band_play = esc_attr( get_post_meta( $liroom_band_id, 'liroom_band_play', true ) ); 
$liroom_band_itunes = esc_attr( get_post_meta( $liroom_band_id, 'liroom_band_itunes', true ) ); 
$liroom_band_bandcamp = esc_attr( get_post_meta( $liroom_band_id, 'liroom_band_bandcamp', true ) ); 
$liroom_band_facebook = esc_attr( get_post_meta( $liroom_band_id, 'liroom_band_facebook', true ) ); 
	$curr_year = date("Y");
	if ($liroom_band_year == '') $liroom_band_year = $curr_year;
$band_tags = get_the_term_list($liroom_band_id, 'band_tags', '<li>', '</li><li>', '</li>');
$band_labels = get_the_term_list($liroom_band_id, 'band_labels', '<li>', '</li><li>', '</li>');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header entry-header-single">
		<?php the_title( '<h1 class="entry-title">Група: ', '</h1>' ); ?>
		<?php liroom_meta_1(true); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

	
        <figure class="image-overlay">
          <?php
          if( function_exists( 'has_post_video' ) && has_post_video() ){
            the_post_video( "large" );
          }elseif ( has_post_thumbnail() ) {
            the_post_thumbnail( "large" );
          }
          ?>
        </figure>
		
		<div class="social-share top">
			<div class="fb-like" data-href="<?php echo $urlCur; ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
			<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			<g:plusone action="share" href="<?php echo $urlCur; ?>" annotation="bubble" size="tall"></g:plusone>
		</div>
		
   <div class="content-wrapper clearfix"><?php the_content( );?></div>
   <div class="box-wrapper-2 clearfix margin0">
	   <?php if($liroom_band_city != ''){ ?>
		<div class="clearfix"><b>Місто: </b><?php echo $liroom_band_city;?></div>
	   <?php } ?>
	   <?php if($liroom_band_year != ''){ ?>
		<div class="clearfix"><b>Рік заснування: </b><?php echo $liroom_band_year;?></div>
	   <?php } ?>
		<div class="box-wrapper clearfix">
			<h2 class="block-title"><span>Купити музику:</span></h2>
			  <div class="band-contact"> 			
				<?php if($liroom_band_facebook != ''){ ?><a href="<?php echo $liroom_band_facebook;?>" target="_blank"><i class="fa fa-facebook fa-lg" title="facebook"></i></a><?php } ?>
				<?php if($liroom_band_soundcloud != ''){ ?><a href="<?php echo $liroom_band_soundcloud;?>" target="_blank"><i class="fa fa-soundcloud fa-lg" title="soundcloud"></i></a><?php } ?>
				<?php if($liroom_band_video != ''){ ?><a href="<?php echo $liroom_band_video;?>" target="_blank"><i class="fa fa-youtube fa-lg" title="youtube"></i></a><?php } ?>
				<?php if($liroom_band_play != ''){ ?><a href="<?php echo $liroom_band_play;?>" class="play" target="_blank"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMi4xMjcgNTEyLjEyNyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyLjEyNyA1MTIuMTI3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ2My45MTksMjAyLjY1NUwxMTEuODIzLDguMjg3Yy0yMC42MDgtMTEuMzYtNDUuMDI0LTExLjA0LTY1LjI4LDAuOTZjLTE5LjEwNCwxMS4yOTYtMzAuNDk2LDMwLjkxMi0zMC40OTYsNTIuNDggICAgdjM4OC42NzJjMCwyMS42LDExLjQyNCw0MS4yMTYsMzAuNTI4LDUyLjUxMmMxMC40LDYuMTQ0LDIxLjg4OCw5LjIxNiwzMy40MDgsOS4yMTZjMTAuOTEyLDAsMjEuODI0LTIuNzUyLDMxLjg3Mi04LjMyICAgIGwzNTIuMDk2LTE5NC4zMDRjMjAuMTI4LTExLjEzNiwzMi4xNi0zMS4xMDQsMzIuMTI4LTUzLjQ3MkM0OTYuMDc5LDIzMy42OTUsNDg0LjA0NywyMTMuNzU5LDQ2My45MTksMjAyLjY1NXogTTQ0OC40MzEsMjgxLjUwMyAgICBMOTYuMzY3LDQ3NS44MDdjLTEwLjU5Miw1LjgyNC0yMy4xMzYsNS42NjQtMzMuNTM2LTAuNDhjLTkuNDA4LTUuNTM2LTE0Ljc4NC0xNC42MjQtMTQuNzg0LTI0LjkyOFY2MS43MjcgICAgYzAtMTAuMzA0LDUuMzc2LTE5LjM5MiwxNC43Mi0yNC45MjhjNS4zNzYtMy4xNjgsMTEuMjk2LTQuNzM2LDE3LjIxNi00LjczNmM1LjYsMCwxMS4yLDEuNDA4LDE2LjM1Miw0LjIyNGwzNTIuMTI4LDE5NC40ICAgIGM5LjcyOCw1LjM3NiwxNS41ODQsMTQuODgsMTUuNTg0LDI1LjM3NlM0NTguMjIzLDI3Ni4wOTUsNDQ4LjQzMSwyODEuNTAzeiIgZmlsbD0iI2ZmNjYwMCIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTM5MS44NTUsMzI1LjI3OUw1Ny43NzUsMTcuMDg3Yy02LjQ5Ni01Ljk1Mi0xNi42MDgtNS41NjgtMjIuNjI0LDAuOTI4Yy01Ljk4NCw2LjQ5Ni01LjYsMTYuNjA4LDAuODk2LDIyLjU5MiAgICBsMzM0LjA4LDMwOC4xNmMzLjA3MiwyLjg0OCw2Ljk3Niw0LjI1NiwxMC44NDgsNC4yNTZjNC4zMiwwLDguNjA4LTEuNjk2LDExLjc3Ni01LjE1MiAgICBDMzk4Ljc2NywzNDEuMzc1LDM5OC4zNTEsMzMxLjI2MywzOTEuODU1LDMyNS4yNzl6IiBmaWxsPSIjZmY2NjAwIi8+Cgk8L2c+CjwvZz4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMzc0LjAzMSwxNTMuOTE5Yy02LjI0LTYuMjQtMTYuMzg0LTYuMjQtMjIuNjI0LDBsLTMxNi44LDMxNi43NjhjLTYuMjQsNi4yNC02LjI0LDE2LjM4NCwwLDIyLjYyNCAgICBjMy4xMzYsMy4xMDQsNy4yMzIsNC42NzIsMTEuMzI4LDQuNjcyYzQuMDk2LDAsOC4xOTItMS41NjgsMTEuMjk2LTQuNjcybDMxNi44LTMxNi43NjggICAgQzM4MC4yNzEsMTcwLjMwMywzODAuMjcxLDE2MC4xNTksMzc0LjAzMSwxNTMuOTE5eiIgZmlsbD0iI2ZmNjYwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></a><?php } ?>
				<?php if($liroom_band_itunes != ''){ ?><a href="<?php echo $liroom_band_itunes;?>" class="itunes" target="_blank"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAzMDUgMzA1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzMDUgMzA1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnIGlkPSJYTUxJRF80NjJfIj4KCTxwYXRoIGlkPSJYTUxJRF80NjNfIiBkPSJNMTA5LjU4OCwyMzBjMS4wNTksMCwyLjEzNS0wLjA2NiwzLjIwMS0wLjE5OGMxNC4wNDktMS43NTQsMjQuNjA3LTE0LjU1OCwyMy41NzEtMjguNTYxICAgYy0wLjAwMS0wLjAyNC0wLjAwMi0wLjA0Ny0wLjAwMy0wLjA3MWMwLjAyNS0wLjE0NCwwLjAzOS0wLjI5MiwwLjAzOS0wLjQ0M3YtNzYuMTk0bDU0Ljk5My0xMC4yMzd2NTYuMjE5ICAgYy0yLjk0Mi0wLjcyMi02LjA2Ny0wLjg5Ny05LjE2Ny0wLjUwOGMtMTQuMDg0LDEuNzQxLTI0LjY2NiwxNC41ODUtMjMuNTksMjguNjI4YzAuOTc2LDEyLjk0NywxMS41LDIyLjcxLDI0LjQ4MSwyMi43MSAgIGMxLjA2NywwLDIuMTUyLTAuMDY4LDMuMjI0LTAuMjAyYzE0LjA2Mi0xLjc1MywyNC42NDMtMTQuNTk2LDIzLjU4Ny0yOC42MjNjLTAuMDAyLTAuMDI0LTAuMDA0LTAuMDQ4LTAuMDA2LTAuMDcyICAgYzAuMDItMC4xMjQsMC4wMjktMC4yNTEsMC4wMjktMC4zODFWNzcuOTk0bDAuMDIzLTAuMjg4YzAuMDc1LTAuOTA1LTAuMzYzLTEuNzcxLTEuMTE5LTIuMjc2ICAgYy0wLjU3MS0wLjM4Mi0xLjI3NC0wLjUwMS0xLjkzNC0wLjM1N2MtMC4wMTIsMC4wMDItMC4wMjQsMC4wMDUtMC4wMzYsMC4wMDdsLTg2Ljk4MywxNC44NDljLTEuMjAxLDAuMjA1LTIuMDc5LDEuMjQ2LTIuMDc5LDIuNDY0ICAgdjg2Ljc5M2MtMi45NS0wLjcyOS02LjA3NC0wLjkwOC05LjE2NC0wLjUyMWMtMTQuMDksMS43MzgtMjQuNjY1LDE0LjU4My0yMy41NzQsMjguNjMxQzg2LjA3MiwyMjAuMjQsOTYuNjA3LDIzMC4wMDEsMTA5LjU4OCwyMzB6ICAgIiBmaWxsPSIjZmY2NjAwIi8+Cgk8cGF0aCBpZD0iWE1MSURfNDY0XyIgZD0iTTE1Mi41LDMwNWM4NC4wODksMCwxNTIuNS02OC40MTEsMTUyLjUtMTUyLjVTMjM2LjU4OSwwLDE1Mi41LDBTMCw2OC40MTEsMCwxNTIuNVM2OC40MTEsMzA1LDE1Mi41LDMwNXogICAgTTE1Mi41LDM0Ljk5N2M2NC43OTEsMCwxMTcuNTAzLDUyLjcxMSwxMTcuNTAzLDExNy41MDNjMCw2NC43OTItNTIuNzEyLDExNy41MDQtMTE3LjUwMywxMTcuNTA0UzM0Ljk5NywyMTcuMjkyLDM0Ljk5NywxNTIuNSAgIEMzNC45OTcsODcuNzA5LDg3LjcwOSwzNC45OTcsMTUyLjUsMzQuOTk3eiIgZmlsbD0iI2ZmNjYwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></a><?php } ?>
				<?php if($liroom_band_bandcamp != ''){ ?><a href="<?php echo $liroom_band_bandcamp;?>" class="bandcamp" target="_blank"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDQ0NS45OCA0NDUuOTgxIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NDUuOTggNDQ1Ljk4MTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0xOC4zMzQsMzQzLjE0M2MtNC42NCwwLjA3OC04LjU5NiwxLjk4LTExLjQ4NSw2LjE2NEg2LjY5N3YtMTkuODU5SDB2NTQuNjI1aDYuMzE2di00Ljk0NWgwLjE1MiAgICBjMS4zNjksMi4yMDEsNC4xODMsNi4wODMsMTAuOTUzLDYuMDgzYzEzLjU0LDAsMTcuNDk4LTEyLjcwNSwxNy40OTgtMjIuMjEzQzM0LjkxOSwzNTEuODIxLDI4LjkwOCwzNDMuMTQzLDE4LjMzNCwzNDMuMTQzeiAgICAgTTE3LjI2OSwzNzkuNDM1Yy00LjI1OSwwLTEwLjg3OC0yLjgxOS0xMC44NzgtMTMuMzk1YzAtNi40NjUsMS4wNjMtMTYuODg3LDEwLjcyNy0xNi44ODdjMTAuMzQ1LDAsMTAuODc3LDkuODEzLDEwLjg3NywxNC45MTEgICAgQzI3Ljk5NSwzNzIuODA2LDI0LjU3MywzNzkuNDM1LDE3LjI2OSwzNzkuNDM1eiIgZmlsbD0iI2ZmNjYwMCIvPgoJCTxwYXRoIGQ9Ik02OS45ODgsMzc3LjE0OXYtMjIuODk2YzAtMTAuMTkyLTExLjU2NC0xMS4xMDktMTQuNzU3LTExLjEwOWMtOS44MTUsMC0xNi4xMjgsMy43MjgtMTYuNDMzLDEzLjIzOWg2LjE2NSAgICBjMC40NTMtMy4wNSwxLjUxOC03LjY4Myw5LjEyNS03LjY4M2M2LjMxNiwwLDkuMzU1LDIuMjc5LDkuMzU1LDYuNDYzYzAsMy45NTMtMS44OTksNC41NjYtMy40OTksNC43MTlsLTExLjAzLDEuMzY0ICAgIGMtMTEuMTA0LDEuMzczLTEyLjA5NCw5LjEzNC0xMi4wOTQsMTIuNDgyYzAsNi44NDEsNS4xNzEsMTEuNDgyLDEyLjQ3MywxMS40ODJjNy43NjEsMCwxMS43OTEtMy42NDksMTQuMzc2LTYuNDY0ICAgIGMwLjIyOSwzLjA0MywxLjE0MSw2LjA4MSw3LjA3Niw2LjA4MWMxLjUyMSwwLDIuNTEtMC40NTIsMy42NTMtMC43NTh2LTQuODdjLTAuNzYyLDAuMTUzLTEuNiwwLjMwNi0yLjIwOCwwLjMwNiAgICBDNzAuODI0LDM3OS41MDUsNjkuOTg4LDM3OC44MTksNjkuOTg4LDM3Ny4xNDl6IE02My4yOTIsMzcwLjMwMWMwLDUuMzI5LTYuMDg1LDkuMzUzLTEyLjMyMyw5LjM1MyAgICBjLTUuMDIxLDAtNy4yMjktMi41ODItNy4yMjktNi45MjFjMC01LjAxOCw1LjI0OS02LjAwOCw4LjUyMS02LjQ2N2M4LjI5Mi0xLjA2NSw5Ljk2Ny0xLjY3MiwxMS4wMy0yLjUxMlYzNzAuMzAxeiIgZmlsbD0iI2ZmNjYwMCIvPgoJCTxwYXRoIGQ9Ik05Ni4wMDQsMzQzLjE0M2MtNi44NDcsMC0xMC41NzQsNC42NC0xMi4wMiw2Ljc2NmgtMC4xNTF2LTUuNjIzaC02LjMxNHYzOS43ODRoNi42OTJ2LTIxLjY4MiAgICBjMC0xMC44MDEsNi42OTYtMTMuMjM2LDEwLjQ5OS0xMy4yMzZjNi41NDMsMCw4LjUyMSwzLjUwMSw4LjUyMSwxMC40MjR2MjQuNDk0aDYuNjk1di0yNy4wODEgICAgQzEwOS45MjYsMzQ1LjY1LDEwMi4xNjYsMzQzLjE0Myw5Ni4wMDQsMzQzLjE0M3oiIGZpbGw9IiNmZjY2MDAiLz4KCQk8cGF0aCBkPSJNMTQyLjMzMywzNDkuOTExaC0wLjE1MmMtMS41OTgtMi4yNzgtNC42NDItNi43NjMtMTEuODY4LTYuNzYzYy0xMC41NzIsMC0xNi41ODIsOC42NzMtMTYuNTgyLDE5Ljg1NCAgICBjMCw5LjUwMywzLjk1NCwyMi4yMTMsMTcuNDk2LDIyLjIxM2MzLjg4MywwLDguNDQ2LTEuMjE4LDExLjMzNi02LjYyNGgwLjE1NHY1LjQ4M2g2LjMxMXYtNTQuNjIyaC02LjY5MXYyMC40NThIMTQyLjMzM3ogICAgIE0xMzEuMzc4LDM3OS40MzVjLTcuMzA0LDAtMTAuNzI3LTYuNjI5LTEwLjcyNy0xNS4zN2MwLTUuMTAxLDAuNTMzLTE0LjkxMywxMC44ODEtMTQuOTEzYzkuNjU4LDAsMTAuNzIzLDEwLjQyNCwxMC43MjMsMTYuODg5ICAgIEMxNDIuMjU1LDM3Ni42MTYsMTM1LjYzOCwzNzkuNDM1LDEzMS4zNzgsMzc5LjQzNXoiIGZpbGw9IiNmZjY2MDAiLz4KCQk8cGF0aCBkPSJNMTcyLjk4OCwzNDkuMTUyYzUuNjMsMCw4LjU5OSwzLjE5Nyw5LjQzNSw4LjUyMWg2LjQ2NmMtMC41MzMtNi45MjEtNC40OS0xNC41My0xNC45MS0xNC41MyAgICBjLTEzLjE2LDAtMTkuMDkzLDkuODEzLTE5LjA5MywyMi4xMzZjMCwxMS40ODcsNi42MTcsMTkuOTMyLDE3Ljc5OSwxOS45MzJjMTEuNjQxLDAsMTUuNTIxLTguOTA1LDE2LjIwNC0xNS4yMTVoLTYuNDY2ICAgIGMtMS4xNDEsNi4wODQtNS4wMiw5LjQzNS05LjUwNyw5LjQzNWMtOS4yMDMsMC0xMC44OC04LjQ0OS0xMC44OC0xNS4yOTJDMTYyLjAzNiwzNTcuMDYyLDE2NC42OTgsMzQ5LjE1MiwxNzIuOTg4LDM0OS4xNTJ6IiBmaWxsPSIjZmY2NjAwIi8+CgkJPHBhdGggZD0iTTIyMi43MzgsMzc3LjE0OXYtMjIuODk2YzAtMTAuMTkyLTExLjU1OS0xMS4xMDktMTQuNzU3LTExLjEwOWMtOS44MTMsMC0xNi4xMjYsMy43MjgtMTYuNDMxLDEzLjIzOWg2LjE2MyAgICBjMC40NTgtMy4wNSwxLjUyMS03LjY4Myw5LjEyOS03LjY4M2M2LjMxMiwwLDkuMzU3LDIuMjc5LDkuMzU3LDYuNDYzYzAsMy45NTMtMS45MDQsNC41NjYtMy41MDEsNC43MTlsLTExLjAyOCwxLjM2NCAgICBjLTExLjEwOSwxLjM3My0xMi4wOTcsOS4xMzQtMTIuMDk3LDEyLjQ4MmMwLDYuODQxLDUuMTcxLDExLjQ4MiwxMi40NzUsMTEuNDgyYzcuNzU5LDAsMTEuNzkxLTMuNjQ5LDE0LjM3Ni02LjQ2NCAgICBjMC4yMjcsMy4wNDMsMS4xMzgsNi4wODEsNy4wNzYsNi4wODFjMS41MiwwLDIuNTEtMC40NTIsMy42NTEtMC43NTh2LTQuODdjLTAuNzYyLDAuMTUzLTEuNTk4LDAuMzA2LTIuMjA1LDAuMzA2ICAgIEMyMjMuNTc5LDM3OS41MDUsMjIyLjczOCwzNzguODE5LDIyMi43MzgsMzc3LjE0OXogTTIxNi4wNDQsMzcwLjMwMWMwLDUuMzI5LTYuMDg0LDkuMzUzLTEyLjMyLDkuMzUzICAgIGMtNS4wMjYsMC03LjIyOS0yLjU4Mi03LjIyOS02LjkyMWMwLTUuMDE4LDUuMjQ5LTYuMDA4LDguNTE5LTYuNDY3YzguMjkyLTEuMDY1LDkuOTY3LTEuNjcyLDExLjAzLTIuNTEyVjM3MC4zMDF6IiBmaWxsPSIjZmY2NjAwIi8+CgkJPHBhdGggZD0iTTI3MS41MDIsMzQzLjE0M2MtNi4xNjMsMC04LjgyNSwyLjczNy0xMi4xNzIsNi40NjljLTEuMTQxLTIuMTMtMy40MjItNi40NjktMTAuNTctNi40NjkgICAgYy03LjE1MywwLTEwLjU3NSw0LjY0LTEyLjAyMSw2Ljc2NmgtMC4xNTJ2LTUuNjIzaC02LjMxdjM5Ljc4NGg2LjY5NHYtMjEuNjgyYzAtMTAuODAxLDYuNjkzLTEzLjIzNiwxMC40OTMtMTMuMjM2ICAgIGM0Ljk0NSwwLDYuMjM2LDQuMDMyLDYuMjM2LDcuMzc5djI3LjUzOWg2LjY5N3YtMjQuMjY2YzAtNS4zMjksMy43MjktMTAuNjU1LDkuMzYxLTEwLjY1NWM1LjY5OCwwLDcuMzczLDMuNzI5LDcuMzczLDkuMjA0ICAgIHYyNS43MTVoNi42OTJ2LTI3LjUzOUMyODMuODI0LDM0NS4zNDYsMjc1Ljc2MywzNDMuMTQzLDI3MS41MDIsMzQzLjE0M3oiIGZpbGw9IiNmZjY2MDAiLz4KCQk8cGF0aCBkPSJNMzA3LjYzNCwzNDMuMTQzYy03LjIyNywwLTEwLjI2NSw0LjQ4OS0xMS44NjMsNi43NjZoLTAuMTUzdi01LjYyM2gtNi4zMTN2NTUuNTI4aDYuNjkydi0xOS45MjhoMC4xNTUgICAgYzEuNzQ5LDIuODExLDUuMjQ5LDUuMzI0LDEwLjU3LDUuMzI0YzEzLjU0LDAsMTcuNDk2LTEyLjcwOCwxNy40OTYtMjIuMjEzQzMyNC4yMjIsMzUxLjgyMSwzMTguMjA5LDM0My4xNDMsMzA3LjYzNCwzNDMuMTQzeiAgICAgTTMwNi41NzMsMzc5LjQzNWMtNC4yNjMsMC0xMC44NzgtMi44MTktMTAuODc4LTEzLjM5NWMwLTYuNDY1LDEuMDYyLTE2Ljg4NywxMC43MjYtMTYuODg3YzEwLjM0NywwLDEwLjg3OCw5LjgxMywxMC44NzgsMTQuOTExICAgIEMzMTcuMjk5LDM3Mi44MDYsMzEzLjg3MywzNzkuNDM1LDMwNi41NzMsMzc5LjQzNXoiIGZpbGw9IiNmZjY2MDAiLz4KCQk8cGF0aCBkPSJNMTQ3LjY2OCwzMDAuODMzYzI1LjU1NCwwLDM3LjUzNi0yMy4xNzEsMzcuNTM2LTUzLjc3NWMwLTE3LjgzNi0xLjg2NC01Mi4xOC0zOC4wNjYtNTIuMTggICAgYy0zMy44MTMsMC0zNy41MzUsMzYuNDc1LTM3LjUzNSw1OS4wOThDMTA5LjYwMywyOTAuOTc1LDEzMi43NjMsMzAwLjgzMywxNDcuNjY4LDMwMC44MzN6IiBmaWxsPSIjZmY2NjAwIi8+CgkJPHBhdGggZD0iTTQ0NS45OCw0Ni4xNjdIMTI0Ljg5NWwtMzYuODYyLDc5Ljc1MmgyMi42Mjl2NjkuNDg4aDAuNTM1YzEwLjExMi0xNC42MzksMjMuOTU2LTIxLjI5Niw0MC4xOTctMjEuNTY0ICAgIGMzNy4wMDksMCw1OC4wMzQsMzAuMzU2LDU4LjAzNCw2OS40ODhjMCwyNi43ODYtOC45OTEsNjAuODAyLTM3LjIxNyw3My4wNTFoODkuNjgxYy0yMy44ODUtOS44MjYtMzcuNDQ2LTM0LjMxOC0zNy40NDYtNjUuMDcxICAgIGMwLTQzLjEyNSwyMC43Ni03Ny40NjgsNjYuODE1LTc3LjQ2OGMzNi40NzUsMCw1MC4zMTUsMjYuNjI2LDUyLjE4LDUwLjg1aC0yMi42MjZjLTIuOTItMTguNjM2LTEzLjMxNy0yOS44MTMtMzMuMDE3LTI5LjgxMyAgICBjLTI5LjAwNCwwLTM4LjMyNiwyNy42NzctMzguMzI2LDUyLjQ0MWMwLDIzLjk2MSw1Ljg2Miw1My41MTQsMzguMDc1LDUzLjUxNGMxNS43MDEsMCwyOS4yNzEtMTEuNzIsMzMuMjY4LTMzLjAxNmgyMi42MjYgICAgYy0wLjAxMiwwLjA5MS0wLjAyNSwwLjE4My0wLjAzNCwwLjI3OEw0NDUuOTgsNDYuMTY3eiIgZmlsbD0iI2ZmNjYwMCIvPgoJCTxwYXRoIGQ9Ik0zMjEuMDg2LDMxNi4zODFsNC4zMjItOS4zNDhjLTMuOTQxLDMuNzM2LTguNjQ2LDYuOTQzLTE0LjIyLDkuMzQ4SDMyMS4wODZ6IiBmaWxsPSIjZmY2NjAwIi8+CgkJPHBvbHlnb24gcG9pbnRzPSI4Ny4yMzQsMTI3LjY0OSAwLDMxNi4zODEgODcuMjM0LDMxNi4zODEgICAiIGZpbGw9IiNmZjY2MDAiLz4KCQk8cGF0aCBkPSJNMTA5LjMzNywzMTYuMzgxaDE3LjY1Yy05LjEyOS00LjY1My0xNC4xMTktMTEuNzgzLTE3LjEyLTE2LjYxOWgtMC41M1YzMTYuMzgxeiIgZmlsbD0iI2ZmNjYwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></a><?php } ?>
			  </div>
		</div>
   </div>
   <?php if($band_tags){ ?>
   <div class="dt_post_content margin0">
   <div class="tags-wrapper">
   <ul class="tags-widget clearfix">
   <li class="trending">Жанри:</li>
   <?php echo $band_tags; ?>    
   </ul></div></div>
	   <?php } ?>
   
   
   <?php if($band_labels){ ?>
   <div class="dt_post_content">
   <div class="tags-wrapper">
   <ul class="tags-widget clearfix">
   <li class="trending">Лейбли:</li>
   <?php echo $band_labels; ?>    
   </ul></div></div>
	   <?php } ?>
   
   
   
	<?php 		

			$args = array(
				'numberposts'      => -1,
				'offset'           => 0,
				'category'         => 0,
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'post_type'        => 'albums',
				'post_status'      => 'draft, publish, future, pending, private',
				'suppress_filters' => true,
			); 

			$result = get_posts( $args );
			//print_r($result);
			$albums = array( );
			foreach( $result as $post ){
				setup_postdata( $post );
				$liroom_album_group = get_post_meta( $post->ID, 'liroom_album_group', true );
				if ($liroom_album_group == $liroom_band_id) $albums[] = $post;
			}
			if ( !empty($albums) ) { 
				?>					
				<div class="box-wrapper clearfix">
				<h2 class="block-title"><span>Альбоми групи</span></h2>	
				<div class="row main-block">
				<?php
				foreach( $albums as $post ): 
					get_template_part( 'template-parts/block', 'album-rel' );
				endforeach;
				?>					
				</div>
				</div>
			<?php 				 
			 }
			wp_reset_postdata(); /**/
			$tags = get_terms( 'band_tags', array( 
			   'number' => 999, 
			   'orderby' => 'count', 
			   'order' => 'DESC', 
			   'hide_empty' => false,
			   ) );
	?>
		
	<?php echo do_shortcode('[mistape]'); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
