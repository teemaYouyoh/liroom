<?php
if ( defined( 'ABSPATH' ) === false ) :
	exit;
endif; // Shhh

?>
<li class="totalpoll-containable <?php echo isset( $choice_css_class ) ? esc_attr( $choice_css_class ) : ''; ?>" data-tp-containable="<?php echo $choice_id; ?>">

	<?php
	$choice_type       = 'band';
	$choice_type_label = __( 'Band', TP_TD );
	include 'handle.php';
	if (isset( $choice['content']['band'] ) && $choice['content']['band'] != '') {
		$title = get_the_title($choice['content']['band']);
	} else{
		$title = '';		
	};
	?>

	<div class="totalpoll-containable-content">
		<?php
		include 'hidden-fields.php';
		?>
		<div class="field-wrapper">
			<input
				id="<?php echo $choice_id; ?>-label"
				class="widefat text-field"
				type="hidden"
				placeholder="<?php _e( 'Choice content', TP_TD ); ?>"
				name="totalpoll[choices][<?php echo $choice_index; ?>][content][label]"
				data-rename="totalpoll[choices][{{new-index}}][content][label]"
				value="<?php echo $title; ?>"
				data-tp-containable-field="<?php echo $choice_id; ?>"
				data-tp-containable-preview-field
			>
			<?php
				
				$post_type_object = get_post_type_object('bands');
				$label = $post_type_object->label;
				$posts = get_posts(array('post_type'=> 'bands', 'post_status'=> 'publish', 'suppress_filters' => false, 'posts_per_page'=>-1));
				echo '<select 
					name="totalpoll[choices]['. $choice_index .'][content][band]" 
					id="'.$choice_id.'-band" 
					class="widefat select-field" 
					data-rename="totalpoll[choices][{{new-index}}][content][band]" 
					data-tp-containable-field="'. $choice_id .'" 
					data-tp-containable-preview-field
				>';
				foreach ($posts as $post) {
					echo '<option value="', $post->ID, '"', $choice['content']['band'] == $post->ID ? ' selected="selected"' : '', '>', $post->post_title, '</option>';
				}
				echo '</select>';
				
			?>
		</div>
		<?php do_action( 'totalpoll/actions/admin/editor/choice/band-fields', $choice_index, $choice_id, $choice_type, $choice ); ?>

	</div>

</li>