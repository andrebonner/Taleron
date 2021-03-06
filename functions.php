<?php
/*functions.php*/


// Get top Ancestors
function get_tpa(){
	global $post;
	if($post->post_parent){
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}
	return $post->ID;
}

// has child pages
function has_children(){
	global $post;
	
	$pages = get_pages('child_of='. $post->ID);
	
	return count($pages);
}

// get button values
function get_buttons(){
	global $post;
	
	$sep = array(',','|',':');
	
	$custom_fields = get_post_custom($post->ID);
	$my_custom_field = $custom_fields['button'];
	
	if(isset($my_custom_field)):
	foreach ( $my_custom_field as $key => $value ) {
		 $vals = split(',',$value);
		 if(isset($vals)):
		 ?>
		 <span>
				<a class="button" target="_blank" href="<?php echo $vals[1];?>">
				<?php echo $vals[0];?>
				</a>
		</span>
		 <?php
		 else:
			if(is_user_logged_in() && is_page()){
		?>
			Add the custom field <b>'button'</b> value Button Text,URL
		<?php
			}
		 endif;
	}
	endif;
}

// category have post
function cat_have_posts($category_slug){
	$query = new WP_Query('category_name='.$category_slug);
	
	if($query->have_posts()){
		return true;
	}
	return false;
}

// Length of content for excerpt
function t_excerpt_length(){
	// sets the amount of characters an excerpt contains
	return 50;
}

add_filter('excerpt_length','t_excerpt_length');

// Theme setup
function taleronWP_setup(){
	// Nav Menus
	register_nav_menus(array(
		'primary'=>__('Primary Menu'),
		'footer'=>__('Footer Menu'),
	));
	// add featured image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 180, true);
	add_image_size('banner-image', 460, 160, array('left','top'));
}

add_action('after_setup_theme','taleronWP_setup');

function taleronWP_resources(){
	// add to wordpress queue
	wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','taleronWP_resources');
?>