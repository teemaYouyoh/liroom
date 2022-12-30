<?php


add_action('after_setup_theme', 'create_post_type',0);

/* Create custom post type */
if (!function_exists('create_post_type')) {
	function create_post_type() {
		global $liroom_options;
		
		register_post_type( 'bands',
			array(
				'labels' => array(
					'name' => __( 'Группы','liroom' ),
					'singular_name' => __( 'Группа','liroom' ),
					'add_item' => __('Новая группа','liroom'),
					'add_new_item' => __('Добавить новую группу','liroom'),
					'edit_item' => __('Редактировать группу','liroom')
				),
				'public' => true,
				'has_archive' => true,
				'hierarchical' => true,
				'menu_position' => 4,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'bands', 'with_front' => true),
		        'supports' => array('title', 'editor', 'thumbnail')
			)
		);
		$labels = array(
			'name' => __( 'Жанры группы', 'liroom' ),
			'singular_name' => __( 'Жанры группы', 'liroom' ),
			'search_items' =>  __( 'Искать жанр группы','liroom' ),
			'all_items' => __( 'Все жанры группы','liroom' ),
			'parent_item' => __( 'Родитель жанра группы','liroom' ),
			'parent_item_colon' => __( 'Родитель жанра группы:','liroom' ),
			'edit_item' => __( 'Редактировать жанр групп','liroom' ), 
			'update_item' => __( 'Обновить жанр групп','liroom' ),
			'add_new_item' => __( 'Добавить новый жанр групп','liroom' ),
			'new_item_name' => __( 'Название нового жанра групп','liroom' ),
			'menu_name' => __( 'Жанры групп','liroom' ),
		);
		// Create bands tags 
		register_taxonomy('band_tags',array('bands'),array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'genres' ),
		));
		$labels_ = array(
			'name' => __( 'Лейблы группы', 'qode' ),
			'singular_name' => __( 'Лейблы группы', 'qode' ),
			'search_items' =>  __( 'Искать лейбл группы','qode' ),
			'all_items' => __( 'Все лейблы группы','qode' ),
			'parent_item' => __( 'Родитель лейбла группы','qode' ),
			'parent_item_colon' => __( 'Родитель лейбла группы:','qode' ),
			'edit_item' => __( 'Редактировать лейбл групп','qode' ), 
			'update_item' => __( 'Обновить лейбл групп','qode' ),
			'add_new_item' => __( 'Добавить новый лейбл групп','qode' ),
			'new_item_name' => __( 'Название нового лейбла групп','qode' ),
			'menu_name' => __( 'Лейблы групп','qode' ),
		);
		// Create bands tags 
		register_taxonomy('band_labels',array('bands'),array(
		'hierarchical' => false,
		'labels' => $labels_,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'labels', 'with_front' => true ),
		));


		register_post_type( 'albums',
			array(
				'labels' => array(
					'name' => __( 'Украинские альбомы','liroom' ),
					'singular_name' => __( 'Альбом','liroom' ),
					'add_item' => __('Новый альбом','liroom'),
					'add_new_item' => __('Добавить новый альбом','liroom'),
					'edit_item' => __('Редактировать альбом','liroom')
				),
				'description' => 'Каталог альбомов украинских групп.',
				'public' => true,
				'has_archive' => true,
				'menu_position' => 5,
				'show_ui' => true,
				'supports' => array('title', 'editor', 'thumbnail')
			)
		);

		$labels = array(
			'name' => __( 'Жанры альбома', 'liroom' ),
			'singular_name' => __( 'Жанры альбома', 'liroom' ),
			'search_items' =>  __( 'Искать жанр альбома','liroom' ),
			'all_items' => __( 'Все жанры альбома','liroom' ),
			'parent_item' => __( 'Родитель жанра альбома','liroom' ),
			'parent_item_colon' => __( 'Родитель жанра альбома:','liroom' ),
			'edit_item' => __( 'Редактировать жанр альбомов','liroom' ), 
			'update_item' => __( 'Обновить жанр альбомов','liroom' ),
			'add_new_item' => __( 'Добавить новый жанр альбомов','liroom' ),
			'new_item_name' => __( 'Название нового жанра альбомов','liroom' ),
			'menu_name' => __( 'Жанры альбомов','liroom' ),
		);

		register_taxonomy('album_tags',array('albums'),array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'agenres', 'with_front' => FALSE ),
		));


		$labels_ = array(
			'name' => __( 'Лейблы альбома', 'qode' ),
			'singular_name' => __( 'Лейблы альбома', 'qode' ),
			'search_items' =>  __( 'Искать лейбл альбома','qode' ),
			'all_items' => __( 'Все лейблы альбома','qode' ),
			'parent_item' => __( 'Родитель лейбла альбома','qode' ),
			'parent_item_colon' => __( 'Родитель лейбла альбома:','qode' ),
			'edit_item' => __( 'Редактировать лейбл альбома','qode' ), 
			'update_item' => __( 'Обновить лейбл альбома','qode' ),
			'add_new_item' => __( 'Добавить новый лейбл альбома','qode' ),
			'new_item_name' => __( 'Название нового лейбла альбома','qode' ),
			'menu_name' => __( 'Лейблы альбома','qode' ),
		);
		// Create bands tags 
		register_taxonomy('album_labels',array('albums'),array(
		'hierarchical' => false,
		'labels' => $labels_,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'alabels', 'with_front' => true ),
		));
		register_post_type( 'songs',
			array(
				'labels' => array(
					'name' => __( 'Песни альбомов','liroom' ),
					'singular_name' => __( 'Песня','liroom' ),
					'add_item' => __('Новая песня','liroom'),
					'add_new_item' => __('Добавить новую песню','liroom'),
					'edit_item' => __('Редактировать песню','liroom')
				),			
				'public' => true,
				'has_archive' => true,
				'hierarchical' => true,
				'menu_position' => 4,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'denchik', 'with_front' => true),
				'supports' => array('title', 'editor')
			)
		);

	}
	
	
		
	add_action( 'load-post.php', 'liroom_post_meta_boxes_setup' );
	add_action( 'load-post-new.php', 'liroom_post_meta_boxes_setup' );

	/* Meta box setup function. */
	function liroom_post_meta_boxes_setup($post) {

	  /* Add meta boxes on the 'add_meta_boxes' hook. */  
		add_action( 'add_meta_boxes', 'liroom_add_album_fields' );
		add_action( 'add_meta_boxes', 'liroom_add_band_fields' );
		add_action( 'add_meta_boxes', 'liroom_add_song_fields' );
		
		/* Save post meta on the 'save_post' hook. */
		add_action( 'save_post', 'liroom_save_album_fields' );
		add_action( 'save_post', 'liroom_save_band_fields' );
		add_action( 'save_post', 'liroom_save_song_fields' );

	}    

	/**_________________ADD_ALBUM_FIELDS_________________**/
	/* Create one or more meta boxes to be displayed on the post editor screen. */
	function liroom_add_album_fields() {

	  add_meta_box(
		'liroom-fields',      // Unique ID
		esc_html__( 'Метаданные альбома', 'example' ),    // Title
		'liroom_album_fields',   // Callback function
		'albums',         // Admin post (or post type)
		'normal',         // Context
		'high'         // Priority
	  );
	}
	/* Display the post meta box. */
	function liroom_album_fields( $object) { ?>
	  
	  <?php wp_nonce_field( basename( __FILE__ ), 'liroom_post_noncename' ); ?>
	  
		<?php $liroom_album_year = esc_attr( get_post_meta( $object->ID, 'liroom_album_year', true ) ); 
				$curr_year = date("Y");
				if ($liroom_album_year == '') $liroom_album_year = $curr_year;?>
	  
		<?php $liroom_album_month = esc_attr( get_post_meta( $object->ID, 'liroom_album_month', true ) ); 
				$curr_month = date("m");
				if ($liroom_album_month == '') $liroom_album_month = $curr_month;?>
		<?php $liroom_album_link_review = esc_attr( get_post_meta( $object->ID, 'liroom_album_link_review', true ) ); ?>
		<?php $liroom_album_group = esc_attr( get_post_meta( $object->ID, 'liroom_album_group', true ) ); ?>
		<?php $liroom_album_group_about = esc_attr( get_post_meta( $object->ID, 'liroom_album_group_about', true ) ); ?>
		<?php $liroom_album_group_img = esc_attr( get_post_meta( $object->ID, 'liroom_album_group_img', true ) ); 
				if ($liroom_album_group_img == '') $liroom_album_group_img = 'http://placehold.it/200x200';?>
				
				
		<?php $liroom_album_sound = esc_attr( get_post_meta( $object->ID, 'liroom_album_sound', true ) ); ?>
		<?php $liroom_album_video = esc_attr( get_post_meta( $object->ID, 'liroom_album_video', true ) ); ?>
		<?php $liroom_album_play = esc_attr( get_post_meta( $object->ID, 'liroom_album_play', true ) ); ?>
		<?php $liroom_album_itunes = esc_attr( get_post_meta( $object->ID, 'liroom_album_itunes', true ) ); ?>
		<?php $liroom_album_bandcamp = esc_attr( get_post_meta( $object->ID, 'liroom_album_bandcamp', true ) ); ?>
		<?php $liroom_album_deezer = esc_attr( get_post_meta( $object->ID, 'liroom_album_deezer', true ) ); ?>
		
		<?php $liroom_album_format = esc_attr( get_post_meta( $object->ID, 'liroom_album_format', true ) ); ?>
		
		<p>
		<label for="liroom_album_format"><?php _e( "Формат альбома" ); ?></label>
		<br />		
			<select class="widefat" name="liroom_album_format" id="liroom_album_format" >
					<?php 
					$liroom_album_formats = array( 1 => 'LP', 2 => 'EP' );
					foreach( $liroom_album_formats as $key=>$format ): 

					?>
						<option value="<?php echo $key;?>"<?php if ($liroom_album_format == $key){echo ' selected';}; ?>><?php echo $format;?></option>
					<?php

					endforeach;?>
			</select>
		</p>
		<p>
		<label for="liroom_album_month"><?php _e( "Месяц выпуска" ); ?></label>
		<br />		
			<select class="widefat" name="liroom_album_month" id="liroom_album_month" >
					<?php 
					$months = array( 1 => 'январь', 2 => 'февраль', 3 => 'март', 4 => 'апрель', 5 => 'май', 6 => 'июнь', 7 => 'июль', 8 => 'август', 9 => 'сентябрь', 10 => 'октябрь', 11 => 'ноябрь', 12 => 'декабрь' );
					foreach( $months as $key=>$month ): 

					?>
						<option value="<?php echo $key;?>"<?php if ($liroom_album_month == $key){echo ' selected';}; ?>><?php echo $month;?></option>
					<?php

					endforeach;?>
			</select>
		</p>
		<p>
		<label for="liroom_album_year"><?php _e( "Год выпуска" ); ?></label>
		<br />
			<input class="widefat" type="number" name="liroom_album_year" min="1900" max="<?php echo $curr_year+5;?>" step="1" value="<?php echo $liroom_album_year;?>" />
		</p>
		<p>
		<label for="liroom_album_link_review"><?php _e( "Ссылка на рецензию" ); ?></label>
		<br />
			<select class="widefat" name="liroom_album_link_review" id="liroom_album_link_review" >
					<option value="0" <?php if ($liroom_album_link_review == 0 || $liroom_album_link_review == ''){echo ' selected';}; ?>><?php _e( "Нет рецензии" ); ?></option>
					<?php 
					global $post;
					$args = array( 'numberposts' => -1, 'category_name' => 'reviews', 'orderby' => 'title', 'order' => 'asc' );
					$posts = get_posts( $args );
					foreach( $posts as $post ): 

					?>
						<option value="<?php echo $post->ID;?>"<?php if ($liroom_album_link_review == $post->ID){echo ' selected';}; ?>><?php echo $post->post_title;?></option>
					<?php

					endforeach;?>
			</select>
		</p>
		<br/>
		<hr/>
		<p>
		<label for="liroom_album_group"><?php _e( "Группа" ); ?></label>
		<br />
			
			<select class="widefat" name="liroom_album_group" id="liroom_album_group" >
					<?php 
					global $post;
					$args = array( 'numberposts' => -1, 'post_type' => 'bands', 'orderby' => 'title', 'order' => 'asc' );
					$posts = get_posts( $args );
					foreach( $posts as $post ): 

					?>
						<option value="<?php echo $post->ID;?>"<?php if ($liroom_album_group == $post->ID){echo ' selected';}; ?>><?php echo $post->post_title;?></option>
					<?php

					endforeach;?>
			</select>
		</p>
		
		<p>
		<label for="liroom_album_sound"><?php _e( "Iframe с сайта SoundCloud" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_album_sound" id="liroom_album_sound" value="<?php echo $liroom_album_sound;?>" />
		</p>
		<p>
		<label for="liroom_album_video"><?php _e( "ID трека на Youtube (пример: cHyGYZL3eE0)" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_album_video" id="liroom_album_video" value="<?php echo $liroom_album_video;?>" />
		</p>
		<p>
		<label for="liroom_album_play"><?php _e( "Ссылка на альбом в GooglePlay" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_album_play" id="liroom_album_play" value="<?php echo $liroom_album_play;?>" />
		</p>
		<p>
		<label for="liroom_album_itunes"><?php _e( "Ссылка на альбом в iTunes" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_album_itunes" id="liroom_album_itunes" value="<?php echo $liroom_album_itunes;?>" />
		</p>
		<label for="liroom_album_bandcamp"><?php _e( "Ссылка на альбом в bandcamp" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_album_bandcamp" id="liroom_album_bandcamp" value="<?php echo $liroom_album_bandcamp;?>" />
		</p>
		<label for="liroom_album_deezer"><?php _e( "ID альбом на deezer.com  (пример:43870731 берём из https://www.deezer.com/en/album/<strong>43870731</strong>)"); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_album_deezer" id="liroom_album_deezer" value="<?php echo $liroom_album_deezer;?>" />
		</p>
	<?php }

	/* Sliroome the meta box's post metadata. */
	function liroom_save_album_fields($post_id) {
		
	  /* Verify the nonce before proceeding. */
	  if ( !isset( $_POST['liroom_post_noncename'] ) || !wp_verify_nonce( $_POST['liroom_post_noncename'], basename( __FILE__ ) ) )
		return $post_id;

	  /* Get the post type object. */
	  global $post;
	  $post_type = get_post_type_object( $post->post_type );

	  /* Check if the current user has permission to edit the post. */
	  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	  $meta_keys = array('liroom_album_format','liroom_album_link_review','liroom_album_month','liroom_album_year','liroom_album_play','liroom_album_bandcamp','liroom_album_itunes','liroom_album_video','liroom_album_sound','liroom_album_group','liroom_album_deezer');
	  foreach ($meta_keys as $meta_key) {
		  /* Get the posted data and sanitize it for use. */
		  $new_meta_value = ( isset( $_POST[$meta_key] ) ? $_POST[$meta_key] : '' );
		  /* Get the meta value of the custom field key. */
		  $meta_value = get_post_meta( $post_id, $meta_key, true );

		  /* If a new meta value was added and there was no previous value, add it. */
		  if ( $new_meta_value && '' == $meta_value ) {
			add_post_meta( $post_id, $meta_key, $new_meta_value, true );
			update_post_meta( $post_id, $meta_key, $new_meta_value );

		  /* If the new meta value does not match the old value, update it. */
		  } elseif  ( $new_meta_value && $new_meta_value != $meta_value ){
			update_post_meta( $post_id, $meta_key, $new_meta_value );

		  /* If there is no new meta value but an old value exists, delete it. */
		  } elseif ( '' == $new_meta_value && $meta_value ){
			delete_post_meta( $post_id, $meta_key, $meta_value );
		  }
		  
	  }		
		

	}
	
	/**_________________ADD_BANDS_FIELDS_________________**/
	/* Create one or more meta boxes to be displayed on the post editor screen. */
	function liroom_add_band_fields() {

	  add_meta_box(
		'liroom-fields',      // Unique ID
		esc_html__( 'Метаданные группы', 'example' ),    // Title
		'liroom_band_fields',   // Callback function
		'bands',         // Admin post (or post type)
		'normal',         // Context
		'high'         // Priority
	  );
	}
	/* Display the post meta box. */
	function liroom_band_fields( $object) { ?>
	  
	  <?php wp_nonce_field( basename( __FILE__ ), 'liroom_post_noncename' ); ?>
	  
		<?php $liroom_band_year = esc_attr( get_post_meta( $object->ID, 'liroom_band_year', true ) ); 
				$curr_year = date("Y");
				if ($liroom_band_year == '') $liroom_band_year = $curr_year;?>
		<?php $liroom_band_city = esc_attr( get_post_meta( $object->ID, 'liroom_band_city', true ) ); ?>
		<?php $liroom_band_soundcloud = esc_attr( get_post_meta( $object->ID, 'liroom_band_soundcloud', true ) ); ?>
		<?php $liroom_band_video = esc_attr( get_post_meta( $object->ID, 'liroom_band_video', true ) ); ?>
		<?php $liroom_band_play = esc_attr( get_post_meta( $object->ID, 'liroom_band_play', true ) ); ?>
		<?php $liroom_band_itunes = esc_attr( get_post_meta( $object->ID, 'liroom_band_itunes', true ) ); ?>
		<?php $liroom_band_facebook = esc_attr( get_post_meta( $object->ID, 'liroom_band_facebook', true ) ); ?>
		<?php $liroom_band_bandcamp = esc_attr( get_post_meta( $object->ID, 'liroom_band_bandcamp', true ) ); ?>
	
		<p>
		<label for="liroom_band_city"><?php _e( "Город" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_band_city" id="liroom_band_city" value="<?php echo $liroom_band_city;?>" />
		</p>
		<p>
		<label for="liroom_band_year"><?php _e( "Год основания" ); ?></label>
		<br />
			<input class="widefat" type="number" name="liroom_band_year" min="1900" max="<?php echo $curr_year+5;?>" step="1" value="<?php echo $liroom_band_year;?>" />
		</p>
		<p>
		<label for="liroom_band_soundcloud"><?php _e( "Ссылка на профиль в SoundCloud" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_band_soundcloud" id="liroom_band_soundcloud" value="<?php echo $liroom_band_soundcloud;?>" />
		</p>
		<p>
		<label for="liroom_band_video"><?php _e( "Ссылка Youtube канал или профиль" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_band_video" id="liroom_band_video" value="<?php echo $liroom_band_video;?>" />
		</p>
		<p>
		<label for="liroom_band_play"><?php _e( "Ссылка на профиль GooglePlay" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_band_play" id="liroom_band_play" value="<?php echo $liroom_band_play;?>" />
		</p>
		<p>
		<label for="liroom_band_itunes"><?php _e( "Ссылка на профиль в iTunes" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_band_itunes" id="liroom_band_itunes" value="<?php echo $liroom_band_itunes;?>" />
		</p>
		<p>
		<label for="liroom_band_facebook"><?php _e( "Ссылка на профиль в Facebook" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_band_facebook" id="liroom_band_facebook" value="<?php echo $liroom_band_facebook;?>" />
		</p>
		<label for="liroom_band_bandcamp"><?php _e( "Ссылка на профиль в bandcamp" ); ?></label>
		<br />
			<input class="widefat" type="text" name="liroom_band_bandcamp" id="liroom_band_bandcamp" value="<?php echo $liroom_band_bandcamp;?>" />
		</p>
	<?php }

	/* Sliroome the meta box's post metadata. */
	function liroom_save_band_fields($post_id) {
		
	  /* Verify the nonce before proceeding. */
	  if ( !isset( $_POST['liroom_post_noncename'] ) || !wp_verify_nonce( $_POST['liroom_post_noncename'], basename( __FILE__ ) ) )
		return $post_id;

	  /* Get the post type object. */
	  global $post;
	  $post_type = get_post_type_object( $post->post_type );

	  /* Check if the current user has permission to edit the post. */
	  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	  $meta_keys = array('liroom_band_city','liroom_band_year','liroom_band_bandcamp','liroom_band_soundcloud','liroom_band_video','liroom_band_play','liroom_band_itunes','liroom_band_facebook');
	 
	 foreach ($meta_keys as $meta_key) {
		  /* Get the posted data and sanitize it for use. */
		  $new_meta_value = ( isset( $_POST[$meta_key] ) ? $_POST[$meta_key] : '' );
		  /* Get the meta value of the custom field key. */
		  $meta_value = get_post_meta( $post_id, $meta_key, true );

		  /* If a new meta value was added and there was no previous value, add it. */
		  if ( $new_meta_value && '' == $meta_value ) {
			add_post_meta( $post_id, $meta_key, $new_meta_value, true );
			update_post_meta( $post_id, $meta_key, $new_meta_value );

		  /* If the new meta value does not match the old value, update it. */
		  } elseif  ( $new_meta_value && $new_meta_value != $meta_value ){
			update_post_meta( $post_id, $meta_key, $new_meta_value );

		  /* If there is no new meta value but an old value exists, delete it. */
		  } elseif ( '' == $new_meta_value && $meta_value ){
			delete_post_meta( $post_id, $meta_key, $meta_value );
		  }
		  
	  }		
		

	}
	
	
	/**_________________ADD_SONGS_FIELDS_________________**/
	/* Create one or more meta boxes to be displayed on the post editor screen. */
	function liroom_add_song_fields() {

	  add_meta_box(
		'liroom-fields',      // Unique ID
		esc_html__( 'Метаданные песни', 'example' ),    // Title
		'liroom_song_fields',   // Callback function
		'songs',         // Admin post (or post type)
		'side',         // Context
		'high'         // Priority
	  );
	}
	/* Display the post meta box. */
	function liroom_song_fields( $object) { ?>
	  
	  <?php wp_nonce_field( basename( __FILE__ ), 'liroom_post_noncename' ); ?>
	  
		<?php $liroom_song_album = esc_attr( get_post_meta( $object->ID, 'liroom_song_album', true ) );
		$liroom_album_group = esc_attr( get_post_meta( $liroom_song_album, 'liroom_album_group', true ) ); ?>
	
		<p>
		<label for="liroom_album_group"><?php _e( "Группа" ); ?></label>
		<br />
			<select name="liroom_album_group" id="liroom_album_group">
					<option value="">---</option>
					<?php 
					global $post;
					$args = array( 'numberposts' => -1, 'post_type' => 'bands', 'orderby' => 'title', 'order' => 'asc' );
					$posts = get_posts( $args );
					foreach( $posts as $post ): 

					?>
						<option value="<?php echo $post->ID;?>"<?php if ($liroom_album_group == $post->ID){echo ' selected';}; ?>><?php echo $post->post_title;?></option>
					<?php

					endforeach;?>
			</select>
		</p>

		<p>
		<label for="liroom_song_album"><?php _e( "Альбом" ); ?></label>
		<br />
			<select name="liroom_song_album" id="liroom_song_album">
					<option value="">---</option>
					<?php 
					global $post;
					$args = array( 'numberposts' => -1, 'post_type' => 'albums', 'orderby' => 'title', 'order' => 'asc', 'meta_key' => 'liroom_album_group', 'meta_value'  => $liroom_album_group );
					$posts = get_posts( $args );
					foreach( $posts as $post ): 

					?>
						<option value="<?php echo $post->ID;?>"<?php if ($liroom_song_album == $post->ID){echo ' selected';}; ?>><?php echo $post->post_title;?></option>
					<?php

					endforeach;?>
			</select>
		</p>
	<?php }

	/* Sliroome the meta box's post metadata. */
	function liroom_save_song_fields($post_id) {
		
	  /* Verify the nonce before proceeding. */
	  if ( !isset( $_POST['liroom_post_noncename'] ) || !wp_verify_nonce( $_POST['liroom_post_noncename'], basename( __FILE__ ) ) )
		return $post_id;

	  /* Get the post type object. */
	  global $post;
	  $post_type = get_post_type_object( $post->post_type );

	  /* Check if the current user has permission to edit the post. */
	  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	  $meta_keys = array('liroom_song_album','liroom_album_group');
	 
	 foreach ($meta_keys as $meta_key) {
		  /* Get the posted data and sanitize it for use. */
		  $new_meta_value = ( isset( $_POST[$meta_key] ) ? $_POST[$meta_key] : '' );
		  /* Get the meta value of the custom field key. */
		  $meta_value = get_post_meta( $post_id, $meta_key, true );

		  /* If a new meta value was added and there was no previous value, add it. */
		  if ( $new_meta_value && '' == $meta_value ) {
			add_post_meta( $post_id, $meta_key, $new_meta_value, true );
			update_post_meta( $post_id, $meta_key, $new_meta_value );

		  /* If the new meta value does not match the old value, update it. */
		  } elseif  ( $new_meta_value && $new_meta_value != $meta_value ){
			update_post_meta( $post_id, $meta_key, $new_meta_value );

		  /* If there is no new meta value but an old value exists, delete it. */
		  } elseif ( '' == $new_meta_value && $meta_value ){
			delete_post_meta( $post_id, $meta_key, $meta_value );
		  }
		  
	  }		
		

	}
	
	
	add_action('admin_print_footer_scripts', 'my_action_javascript', 99);
	function my_action_javascript() {
		?>
		<script>
		jQuery(document).ready(function($) {
			$('#liroom_album_group').on('change', '', function (e) {	
				var selectVal = $("#liroom_album_group option:selected").val();
				var data = {
					action: 'song_album',
					group: selectVal
				};

	
				jQuery.post( ajaxurl, data, function(response) {
					$( "#liroom_song_album" ).html( response );
				});
			});
		});
		</script>
		<?php
	}

	add_action( 'wp_ajax_song_album', 'song_album_function' );
	function song_album_function() {
		
		$group = $_POST['group'];

		$html = '';
		//$html .= '<option value="">---</option>';
					
					global $post;
					$args = array( 'numberposts' => -1, 'post_type' => 'albums', 'orderby' => 'title', 'order' => 'asc', 'meta_key' => 'liroom_album_group', 'meta_value'  => $group );
					$posts = get_posts( $args );
					foreach( $posts as $post ): 

						$html .= '<option value="'. $post->ID .'">'. $post->post_title.'</option>';					

					endforeach;

		echo $html;
		
	}
	
}

?>