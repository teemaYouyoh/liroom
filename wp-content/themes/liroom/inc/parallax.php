<?php
/**
 * @package branding_example_plugin
 * @version 1.0
 */
/*
Plugin Name: branding example plugin
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an example plugin for WPMU DEV readers
Author: Carlo Daniele
Version: 1.0
Author URI: http://carlodaniele.it/en/
*/
// ajax call to get wp_editor
add_action( 'wp_ajax_wp_editor_box_editor_html', 'wp_editor_box::editor_html' );
add_action( 'wp_ajax_nopriv_wp_editor_box_editor_html', 'wp_editor_box::editor_html' );
/**
 * Plugin setup
 * Register branding post type
 */

function shortcode_parallaxblock( $atts ){
	global $post;
	$pid = $atts['id'];
	$parallax_dinamic = get_post_meta($post->ID, 'parallax_dinamic', true);
	$pitem = $parallax_dinamic[$pid];
	$parallax_image = wp_get_attachment_image_src( $pitem['parallax_image_id'], 'post-thumbnails' );
	$parallax_bg_color = $pitem['parallax_bg_color'];
	if($parallax_bg_color == '') $parallax_bg_color = '#ffffff';
	$parallax_bg_opacity = $pitem['parallax_bg_opacity'];
	if($parallax_bg_opacity == '') $parallax_bg_opacity = '0.3';
	$parallax_content = stripslashes( $pitem['parallax_content'] );
	$parallax_content_max_width = $pitem['parallax_content_max_width'];
	if($parallax_content_max_width == '') $parallax_content_max_width = 800;
	$parallax_content_bg_color = $pitem['parallax_content_bg_color'];
	if($parallax_content_bg_color == '') $parallax_content_bg_color = '#ffffff';
	$parallax_content_bg_opacity = $pitem['parallax_content_bg_opacity'];
	if($parallax_content_bg_opacity == '') $parallax_content_bg_opacity = '0.3';
	
	$parallaxblock = '';
	if($pitem['parallax_image_id'] != '') {
		$parallaxblock .= '<div class="parallaxitem parallaxblock-wrap-'.$pid.'">';
		$parallaxblock .= '<div class="parallaxblock-'.$pid.'"></div>';
		if($parallax_content) $parallaxblock .= '<div class="parallaxblock-content-'.$pid.'"><div class="content-inner"><div class="content-column">'.$parallax_content.'</div></div></div>';
		$parallaxblock .= '</div>';
		$parallaxblock .= '<style>';
		$parallaxblock .= '
				.parallaxblock-wrap-'.$pid.' {
					position: relative;
					height: 1px;
					min-height: 50vh;
					max-height: 9999px;
					margin-bottom:30px;
				}
				.parallaxblock-'.$pid.' {
					position: absolute;
					z-index: 0;
					width: 300%;
					left: -100%;
					right: 0;
					top: 0;
					bottom: 0;
					background-image: url('.$parallax_image[0].');
					background-position: center center;
					background-repeat: no-repeat;
					background-attachment: fixed;
					background-size: 100% auto;
				}
				.parallaxblock-'.$pid.'::after {
					content:"";
					position: absolute;
					z-index: 1;
					width: 100%;
					left: 0%;
					right: 0;
					top: 0;
					bottom: 0;
					width:100%;
					height:100%;
					background:'.hex2rgba($parallax_bg_color, $parallax_bg_opacity).';
				}
				.parallaxblock-content-'.$pid.' {
					-moz-box-sizing: border-box;
					-webkit-box-sizing: border-box;
					box-sizing: border-box;
					position: relative;
					z-index: 2;
					direction: ltr;
					text-align: left;
					display: table;
					margin: 0 auto;
					height: 100%;
					width: 100%;
				}
				.parallaxblock-content-'.$pid.' > .content-inner {
					display: table;
					position: relative;
					margin: 0 auto;
					width: 100%;
					height: 100%;
				}
				.parallaxblock-content-'.$pid.' > .content-inner > .content-column {
					max-width:'.$parallax_content_max_width.'px;
					display: table;
					position: absolute;
					margin: auto;
					left: 0;
					right: 0;
					top: 0;
					bottom: 0;
					width: 100%;
					padding:30px;
					background:'. hex2rgba($parallax_content_bg_color, $parallax_content_bg_opacity).';
				}
				@media screen and (max-width: 767px) {
					.parallaxblock-'.$pid.' {
						background-size: auto 100%;
					}
					.parallaxblock-wrap-'.$pid.' {
						height: auto;
						padding: 30px 0;
					}
					.parallaxblock-content-'.$pid.' {
						height: auto;
					}
					.parallaxblock-content-'.$pid.' > .content-inner > .content-column {
						position: relative;
					}
				}
				';
		$parallaxblock .= '</style>';
	}
	return $parallaxblock;
}
add_shortcode( 'parallaxblock', 'shortcode_parallaxblock' );
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}
//making the meta box (Note: meta box != custom meta field)
function wpse_parallax_meta_box() {
   add_meta_box(
       'parallax_meta_box',       // $id
       'Parallax Box',                  // $title
       'show_parallax_meta_box',  // $callback
       'post',                 // $page
       'normal',                  // $context
       'low'                     // $priority
   );
}
add_action('add_meta_boxes', 'wpse_parallax_meta_box');

//showing custom form fields
function show_parallax_meta_box() {
    global $post;
    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_parallax_nonce' );
	$parallax_dinamic = get_post_meta($post->ID, 'parallax_dinamic', true);?>
	<div id="output-package">
	<?php

	    //Obtaining the linked employeedetails meta values
	    $c = 0;
	    if ( count( $parallax_dinamic ) > 0 && is_array($parallax_dinamic)) {
	        foreach( $parallax_dinamic as $key=>$parallax ) {
	                $c = $c +1;
		?>
		<div id="item_<?php echo $key;?>" class="postbox item">
		<button type="button" id="_<?php echo $key;?>" class="ntdelbutton delete_el_item">Удалить элемент</button>
		<span style="float:right;display:table;margin: 5px 0 0 0">Тэг для вставки <code>[parallaxblock id=<?php echo $key;?>]</code></span>
		<div class="inside">
		<p>
		<label for="parallax_dinamic[<?php echo $key;?>][parallax_bg_color]"><?php _e( "Цвет фона над картинкой (#FFFFFF)" ); ?> блока №<?php echo $key;?></label>
		<br />
			<input class="widefat" type="text" name="parallax_dinamic[<?php echo $key;?>][parallax_bg_color]" id="parallax_dinamic[<?php echo $key;?>][parallax_bg_color]" value="<?php echo $parallax['parallax_bg_color'];?>" />
		</p>
		<p>
		<label for="parallax_dinamic[<?php echo $key;?>][parallax_bg_opacity]"><?php _e( "Прозрвчность фона над картинкой (от 0.0 до 1.0)" ); ?> блока №<?php echo $key;?></label>
		<br />
			<input class="widefat" type="text" name="parallax_dinamic[<?php echo $key;?>][parallax_bg_opacity]" id="parallax_dinamic[<?php echo $key;?>][parallax_bg_opacity]" value="<?php echo $parallax['parallax_bg_opacity'];?>" />
		</p>
		<p>
		<label for="parallax_dinamic[<?php echo $key;?>][parallax_content_max_width]"><?php _e( "Максимальная ширина контента (от 0 до 1000)" ); ?> блока №<?php echo $key;?></label>
		<br />
			<input class="widefat" type="text" name="parallax_dinamic[<?php echo $key;?>][parallax_content_max_width]" id="parallax_dinamic[<?php echo $key;?>][parallax_content_max_width]" value="<?php echo $parallax['parallax_content_max_width'];?>" />
		</p>
		<p>
		<label for="parallax_dinamic[<?php echo $key;?>][parallax_content_bg_color]"><?php _e( "Цвет фона под контентом (#FFFFFF)" ); ?> блока №<?php echo $key;?></label>
		<br />
			<input class="widefat" type="text" name="parallax_dinamic[<?php echo $key;?>][parallax_content_bg_color]" id="parallax_dinamic[<?php echo $key;?>][parallax_content_bg_color]" value="<?php echo $parallax['parallax_content_bg_color'];?>" />
		</p>
		<p>
		<label for="parallax_dinamic[<?php echo $key;?>][parallax_content_bg_opacity]"><?php _e( "Прозрвчность фона под контентом (от 0.0 до 1.0)" ); ?> блока №<?php echo $key;?></label>
		<br />
			<input class="widefat" type="text" name="parallax_dinamic[<?php echo $key;?>][parallax_content_bg_opacity]" id="parallax_dinamic[<?php echo $key;?>][parallax_content_bg_opacity]" value="<?php echo $parallax['parallax_content_bg_opacity'];?>" />
		</p>
		<p>
		<label for="parallax_dinamic[<?php echo $key;?>][parallax_content]"><?php _e( "Контент в блоке" ); ?> блока №<?php echo $key;?></label>
		<br />
		<?php if ( $parallax['parallax_content'] != "") { ?>
			<?php wp_editor( $parallax['parallax_content'], 'parallax_dinamic['.$key.'][parallax_content]', $settings = array('textarea_name' => 'parallax_dinamic['.$key.'][parallax_content]','media_buttons' => false,'tinymce'=>1 ) ); ?>
		<?php } else { ?>
			<?php wp_editor( '', 'parallax_dinamic['.$key.'][parallax_content]', $settings = array('textarea_name' => 'parallax_dinamic['.$key.'][parallax_content]','media_buttons' => false,'tinymce'=>1 ) ); ?>
		<?php } ?>	
		</p>
		
		
		<p>
		<label for="parallax_dinamic[<?php echo $key;?>][parallax_image]"><?php _e( "Картинка для параллакса" ); ?> блока №<?php echo $key;?></label>
		<br />
		<img class="parallax_dinamic_<?php echo $key;?>_parallax_image_img" src="<?php echo $parallax['parallax_image'];?><?php if($parallax['parallax_image'] == '') {echo 'http://via.placeholder.com/350x150';};?>" height="auto" width="auto" style="max-width:100%"/></br>
		<input class="parallax_dinamic_<?php echo $key;?>_parallax_image_id" type="hidden" name="parallax_dinamic[<?php echo $key;?>][parallax_image_id]" value="<?php echo $parallax['parallax_image_id'];?>" />
		<input class="parallax_dinamic_<?php echo $key;?>_parallax_image" type="hidden" name="parallax_dinamic[<?php echo $key;?>][parallax_image]" value="<?php echo $parallax['parallax_image'];?>" />
		<a href="#" class="parallax_image_upload" id="_<?php echo $key;?>_">Upload</a>
		<a href="#" class="parallax_image_delete" id="_<?php echo $key;?>_">Remove</a>
		</p>
		</div>
		</div>
    <?php } }?>
	</div>
	<button type="button" class="add_package"><?php _e('Добавить новый блок'); ?></button>			
	<script>
		jQuery(document).ready(function($){
			$("#output-package").on('click','.parallax_image_upload',function(e) {
				var id = $(this).attr('id');
				console.log(e);
				e.preventDefault();
				var image = wp.media({ 
					title: 'Upload an image',
					// mutiple: true if you want to upload multiple files at once
					multiple: false
				}).open()
				.on('select', function(e){
					// This will return the selected image from the Media Uploader, the result is an object
					var uploaded_image = image.state().get('selection').first();
					// We convert uploaded_image to a JSON object to make accessing it easier
					// Output to the console uploaded_image
					console.log(uploaded_image.attributes.id);
					var image_url = uploaded_image.toJSON().url;
					var image_id = uploaded_image.attributes.id;
					// Let's assign the url value to the input field
					console.log(id);
					$('.parallax_dinamic'+id+'parallax_image').val(image_url);
					$('.parallax_dinamic'+id+'parallax_image_id').val(image_id);
					$('.parallax_dinamic'+id+'parallax_image_img').attr('src',image_url);
				});
			});
			$("#output-package").on('click','.parallax_image_delete',function(e) {
				e.preventDefault();
				var id = $(this).attr('id');
				$('.parallax_dinamic'+id+'parallax_image').val('');
				$('.parallax_dinamic'+id+'parallax_image_id').val('');
				$('.parallax_dinamic'+id+'parallax_image_img').attr('src','http://via.placeholder.com/350x150');
			});
		});
	</script>
	<script>
	    var $ =jQuery.noConflict();
	    $(document).ready(function() {
			var textAreas = $('#output-package textarea');
			textAreas.each(function(i,elem) {
				var textAreaID  = $(textAreas[i]).attr('id');
				textarea_to_tinymce(textAreaID);
			});
			$("#output-package").on('click','.delete_el_item',function() {
				var id = $(this).attr('id');
				$('#item'+id).remove();
			});
	        $(".add_package").click(function() {
	            var count = new Date().getTime();
				var newitem = '';
				newitem += '<div id="item_'+count+'" class="postbox item"><button type="button" id="_'+count+'" class="ntdelbutton delete_el_item">Удалить элемент</button><span style="float:right;display:table;margin: 5px 0 0 0">Тэг для вставки <code>[parallaxblock id='+count+']</code></span>';
				newitem += '<div class="inside"><p><label for="parallax_dinamic['+count+'][parallax_bg_color]">Цвет фона над картинкой (#FFFFFF) блока №'+count+'</label><br /><input class="widefat" type="text" name="parallax_dinamic['+count+'][parallax_bg_color]" id="parallax_dinamic['+count+'][parallax_bg_color]" value="" /></p>';
				newitem += '<p><label for="parallax_dinamic['+count+'][parallax_bg_opacity]">Прозрвчность фона над картинкой (от 0.0 до 1.0) блока №'+count+'</label><br /><input class="widefat" type="text" name="parallax_dinamic['+count+'][parallax_bg_opacity]" id="parallax_dinamic['+count+'][parallax_bg_opacity]" value="" /></p>';
				newitem += '<p><label for="parallax_dinamic['+count+'][parallax_content_max_width]">Максимальная ширина контента (от 0 до 1000) блока №'+count+'</label><br /><input class="widefat" type="text" name="parallax_dinamic['+count+'][parallax_content_max_width]" id="parallax_dinamic['+count+'][parallax_content_max_width]" value="" /></p>';
				newitem += '<p><label for="parallax_dinamic['+count+'][parallax_content_bg_color]">Цвет фона под контентом (#FFFFFF) блока №'+count+'</label><br /><input class="widefat" type="text" name="parallax_dinamic['+count+'][parallax_content_bg_color]" id="parallax_dinamic['+count+'][parallax_content_bg_color]" value="" /></p>';
				newitem += '<p><label for="parallax_dinamic['+count+'][parallax_content_bg_opacity]">Прозрвчность фона под контентом (от 0.0 до 1.0) блока №'+count+'</label><br /><input class="widefat" type="text" name="parallax_dinamic['+count+'][parallax_content_bg_opacity]" id="parallax_dinamic['+count+'][parallax_content_bg_opacity]" value="" /></p>';
				newitem += '<p><label for="parallax_dinamic['+count+'][parallax_content]">Контент в блоке блока №'+count+'</label><br /><textarea class="mceEditor" style="" autocomplete="off" cols="40" name="parallax_dinamic['+count+'][parallax_content]" id="parallax_dinamic_'+count+'_parallax_content" aria-hidden="true"></textarea></p>';
				newitem += '<p><label for="parallax_dinamic['+count+'][parallax_image]"> Картинка для параллакса блока №'+count+'</label><br /><img class="parallax_dinamic_'+count+'_parallax_image_img" src="http://via.placeholder.com/350x150" height="auto" width="auto" style="max-width:100%"/></br><input class="parallax_dinamic_'+count+'_parallax_image_id" type="hidden" name="parallax_dinamic['+count+'][parallax_image_id]" value="" /><input class="parallax_dinamic_'+count+'_parallax_image" type="hidden" name="parallax_dinamic['+count+'][parallax_image]" value="" /><a href="#" class="parallax_image_upload" id="_'+count+'_">Upload</a><a href="#" class="parallax_image_delete" id="_'+count+'_">Remove</a></p></div></div>';
	            $('#output-package').append(newitem);
				textarea_to_tinymce('parallax_dinamic_'+count+'_parallax_content');
	            return false;
	        });
			function textarea_to_tinymce(textAreaID){
				if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
					console.log('textAreaID');
					
					setTimeout(function() { 
						console.log($('#'+textAreaID));
						tinyMCE.execCommand('mceRemoveEditor', false, textAreaID);
						tinyMCE.execCommand('mceAddEditor', false, textAreaID); 
					 }, 200);
					 
				}
			}
	    });
	    </script>
	 <?php 
}

function save_parallax_meta($post_id) {

	// verify nonce
	if (!wp_verify_nonce($_POST['wpse_parallax_nonce'], basename(__FILE__)))
		return $post_id;
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	$fields = array('parallax_dinamic');
	foreach($fields as $field){
		update_post_meta($post_id, $field, $_POST[$field]);
	}
	
}
add_action( 'save_post', 'save_parallax_meta' );
add_action( 'new_to_publish', 'save_parallax_meta' );