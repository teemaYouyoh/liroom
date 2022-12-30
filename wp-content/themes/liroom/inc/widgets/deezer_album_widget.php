<?php
/**
 * Block 1 - Slider Widget
 */

// Register the widget
add_action( 'widgets_init', create_function( '', 'return register_widget("liroom_Widget_deezer");'));

// The widget class
class liroom_Widget_deezer extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'deezer_widget', 'description' => esc_html__( "Display related posts.", 'liroom-lite') );
		parent::__construct('ft_deezer', esc_html__('Deezer Album player', 'liroom-lite'), $widget_ops);
		$this->alt_option_name = 'widget_deezer';

		add_action( 'save_post', array($this, 'remove_cache') );
		add_action( 'deleted_post', array($this, 'remove_cache') );
		add_action( 'switch_theme', array($this, 'remove_cache') );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		//extract( $args );
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'widget_deezer', 'widget' );
		}
		if ( ! is_array( $cache ) ) {
			$cache = array();
		}
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}
		ob_start();

		global $post;
		
		if(is_single() && get_post_type() == 'albums') {
			$groupOfAlbum = array();
			$groupAlbum = array();
			$the_title = get_the_title();
			$_the_title = urlencode(get_the_title());
			$liroom_album_deezer = get_post_meta( $post->ID, 'liroom_album_deezer', true );
			if($liroom_album_deezer == '') {
				$grId = get_post_meta( $post->ID, 'liroom_album_group', true );
				$gr = get_post( $grId );
				$grTitle = $gr->post_title;
				$_grTitle = urlencode($grTitle);
				if($_grTitle != ''){
					$artists = $this->sendCurl('https://api.deezer.com/search/artist?q="'.$_grTitle.'"');
					//error_log(print_r($artists,true));
					foreach ($artists['data'] as $key=>$artist){
						if(strtolower($artist['name']) == strtolower($grTitle)) {
							$groupOfAlbum = $artist;
						}
					}
					$gID = $groupOfAlbum['id'];
					
					$albums = $this->sendCurl('https://api.deezer.com/search/album?q="'.$_the_title.'"');
					
					foreach ($albums['data'] as $key=>$album){
						if($album['artist']['id'] == $gID &&  strtolower($album['title']) == strtolower($the_title)) {
							$groupAlbum = $album;
						}
					}
				}
			} else{
				$groupAlbum['album']['id'] = $liroom_album_deezer;
			}
				
			//error_log(print_r($groupAlbum,true));
			if(!empty($groupAlbum) && isset($groupAlbum['id'])) { 
				?>
				<script>
					(function(d, s, id) { 
					var js, djs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return; 
					js = d.createElement(s); js.id = id; 
					js.src = "https://cdns-files.dzcdn.net/js/widget/loader.js"; 
					 djs.parentNode.insertBefore(js, djs);
				}(document, "script", "deezer-widget-loader"));</script>

				<div class="deezer-widget-player" data-src="https://www.deezer.com/plugins/player?format=classic&autoplay=false&playlist=true&width=347&height=347&color=ff6600&layout=&size=medium&type=album&id=<?php echo $groupAlbum['id'];?>&app_id=1" data-scrolling="no" data-frameborder="0" data-allowTransparency="true" data-width="347" data-height="347"></div>
				<?php
			}
		}
		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'widget_deezer', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}
	
	
	/**
	*	Send post request to the manage server
	*	
	*	@param string $url - sending url
	*	@param string $postvars - string with postvars ready for post action
	*	
	*	@return array $content - result variable
	*/ 	
	public function sendCurl($callUrl) 
	{
			$ch = curl_init();
			$headers = array("Accept: application/json");
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
			curl_setopt($ch, CURLOPT_URL, $callUrl);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			
			
			/*curl_setopt($ch, CURLOPT_URL, $callUrl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
			curl_setopt($ch,CURLOPT_TIMEOUT, 20);*/
			$data = curl_exec($ch);
			curl_close ($ch);	
			$result = json_decode($data, true);
			
			/*if(curl_error($ch))
			{
				throw new WW_Model_Exception('Curl error: ' . curl_error($ch), 1);
			}*/
			
			
			return $result; 
	}   

	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$this->remove_cache();
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) ) delete_option('widget_recent_entries');

		$new_instance = wp_parse_args( $new_instance, array(
			'title' 				=> '',
			'ignore_sticky' 		=> '',
			'layout' 				=> '',
			'featured_categories' 	=> '',
			'number_posts' 			=> '',
			'orderby' 				=> '',
		) );

		$instance['title']               = sanitize_text_field( $new_instance['title'] );
		$instance['ignore_sticky']       = isset($new_instance['ignore_sticky']) && $new_instance['ignore_sticky'] ? 1 : 0;
		$instance['layout']              = sanitize_text_field( $new_instance['layout'] );
		$instance['featured_categories'] = isset( $new_instance['featured_categories'] ) ?  array_map( 'absint', ( array) $new_instance['featured_categories'] ) : false ;
		$instance['number_posts']        = absint( $new_instance['number_posts'] );
		$instance['orderby'] 		     = sanitize_text_field( $new_instance['orderby'] );

		return $instance;
	}

	/**
	 * @access public
	 */
	public function remove_cache() {
		wp_cache_delete('widget_deezer', 'widget');
	}

	/**
	 * @param array $instance
	 */
	public function form( $instance ) {

		// Set default value.
		$defaults = array(
			'title'               => '',
			'layout'			  => 'grid',
			'featured_categories' => '',
			'ignore_sticky'		  => 0,
			'number_posts'        => 6,
			'orderby'             => 'date'
		);
		$instance            = wp_parse_args( (array) $instance, $defaults );
		$featured_categories = (array)$instance['featured_categories'];
		$orderby 	         = array( 'date', 'comment_count', 'view', 'rand' );
		$layout              = array( 'list', 'grid', 'line' );

		?>

<?php
	}
}
