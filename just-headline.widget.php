<?php


/**
 * JPP_Widget_Post_Preview widget class
 * 
 * Show post preview with different layouts with post link
 * 
 */
class JHL_Widget_Headline extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
				'jhl_widget_headline',  // Base ID
				__('Just Headline'),	// Title
				array( 'description' => __( "Single heading html element") )
			);
	}
	
	public function widget($args, $instance) {
		// apply defaults
		$instance = array_merge(array(
			'title' => '',
			'tag' => 'h3',
		), $instance);

		$post = get_post($instance['post_id']);

		// print start widget
		echo $args['before_widget'];
		
		// print widget
		$title = apply_filters('jhl_title', $instance['title']);
		
		echo strtr('<{tag} class="jhl_heading">{title}</{tag}>', array(
			'{tag}' => $instance['tag'],
			'{title}' => esc_html($title),
		));
		
		// print end widget
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$tag	= isset( $instance['tag'] ) ? $instance['tag'] : '';
?>
	<div class="jhl_form_controls">
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Heading text:' ); ?></label>
			<input required class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'tag' ); ?>"><?php _e( 'Heading size:' ); ?></label>
			<select required class="widefat" id="<?php echo $this->get_field_id( 'tag' ); ?>" name="<?php echo $this->get_field_name( 'tag' ); ?>">
				<?php $this->html_options( $this->get_tag_options(), $tag ); ?>
			</select>
			<small>* Heading 1 is the biggest one.</small>
		</p>
	</div>
<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['tag'] = strip_tags($new_instance['tag']);
		
		return $instance;
	}
	
	protected function html_options( $options, $selected ){
		if( !is_array($options) ) return '';
		foreach( $options as $value => $label) {
			print strtr('<option value="{value}" {selected}>{label}</option>', array(
				'{value}' => esc_attr($value),
				'{selected}' => selected($selected, $value, false),
				'{label}' => esc_html($label),
			));
		}
	}
	
	protected function get_tag_options(){
		$tags = array(
			'h1' => 'Heading 1',
			'h2' => 'Heading 2',
			'h3' => 'Heading 3',
			'h4' => 'Heading 4',
			'h5' => 'Heading 5',
			'h6' => 'Heading 6',
		);
		
		$tags = apply_filters('jhl_tag_options', $tags);
		return $tags;
	}
}
