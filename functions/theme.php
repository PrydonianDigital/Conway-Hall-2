<?php

	// Set content width value based on the theme's design
	if ( ! isset( $content_width ) )
		$content_width = 870;

	// Register Theme Features
	function ch_theme()  {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'infinite-scroll', array(
		    'container' => 'content',
		    'footer' => 'page',
		) );
		set_post_thumbnail_size( 870, 250, array( 'center', 'top') );
		add_image_size( 'top', 870, 500, array( 'center', 'top') );
		add_image_size( 'carousel', 870, 250, array( 'center', 'top') );
		add_image_size( 'related', 265, 199, array( 'center', 'center') );
		add_image_size( 'squared', 265, 265, array( 'center', 'top') );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'title-tag' );
		add_editor_style( 'editor-style.css' );
		load_theme_textdomain( 'ch', get_template_directory() . '/language' );
	}
	add_action( 'after_setup_theme', 'ch_theme' );

	// Register Style
	function ch_css() {
		wp_register_style( 'grid', get_template_directory_uri() . '/css/grid.css', false, '6.3.0' );
		wp_register_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', false, '6.3.0' );
		wp_enqueue_style( 'grid' );
		wp_enqueue_style( 'fonts' );
	}
	add_action( 'wp_enqueue_scripts', 'ch_css' );

	// Register JS
	function ch_js() {
		wp_deregister_script('jquery');
		wp_enqueue_script( 'jq', get_template_directory_uri() . '/js/vendor/jquery.js', false, '2.2.4', true );
		wp_enqueue_script( 'what', get_template_directory_uri() . '/js/vendor/what-input.js', false, '6.3.0', true );
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/vendor/foundation.js', false, '6.3.0', true );
		wp_enqueue_script( 'map', '//maps.google.com/maps/api/js', false, '7.2', true );
		wp_enqueue_script( 'gmap', get_template_directory_uri() . '/js/vendor/map.js', false, '7.2', true );
		wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', false, '6.3.0', true );
		wp_enqueue_script( 'signalR', 'https://tfl.gov.uk/cdn/static/scripts/plugins/includes/jquery.signalR-2.2.0.min.js', false, '6.3.0', true );
		wp_enqueue_script( 'hubs', get_template_directory_uri() . '/js/vendor/hubs.js', false, '6.3.0', true );
		wp_enqueue_script( 'jq' );
		wp_enqueue_script( 'what' );
		wp_enqueue_script( 'foundation' );
		wp_enqueue_script( 'app' );
	}
	add_action( 'wp_enqueue_scripts', 'ch_js' );

	function maps() {
		if ( is_page(array('Chancery Lane', 'Holborn Station', 'Russell Square', 'Santander Cycle Hire', 'Buses')) ) {
			wp_enqueue_script('signalR');
			wp_enqueue_script('hubs');
			wp_enqueue_script('map');
			wp_enqueue_script('gmap');
		}
	}
	add_action('wp_enqueue_scripts', 'maps');

	// Woocommerce
	remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
	remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

	add_action('woocommerce_before_main_content', 'ch_container_start', 5);
	add_action('woocommerce_before_main_content', 'ch_shop_start', 10);
	add_action('woocommerce_after_main_content', 'ch_shop_end', 10);
	add_action('woocommerce_after_main_content', 'ch_sidebar', 15);
	add_action('woocommerce_after_main_content', 'ch_container_end', 20);

	function ch_container_start() {
		echo '<div class="row">';
	}
	function ch_shop_start() {
		echo '<div class="small-12 large-9 columns main">';
	}

	function ch_shop_end() {
		echo '</div>';
	}

	function ch_sidebar() {
		echo '<aside class="small-12 large-3 columns">';
		echo '<ul class="sidebar">';
		dynamic_sidebar('woosidebar');
		echo '</ul>';
		echo '</aside>';
	}

	function ch_container_end() {
		echo '</div>';
	}

	// Excerpts on pages
	add_action( 'init', 'my_add_excerpts_to_pages' );
	function my_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}

	// Reading Time
	function ch_reading() {
		$post = get_post();
		$words = str_word_count( strip_tags( $post->post_content ) );
		$minutes = floor( $words / 200 );
		$seconds = floor( $words % 200 / ( 200 / 60 ) );
		if ( 1 <= $minutes ) {
			$estimated_time = 'Estimated ' . $minutes . ' min read';
		} else {
			$estimated_time = 'Estimated ' . $seconds . ' sec read';
		}
		return $estimated_time;
	}

	function default_post_thumbnail( $html ) {
		if ( '' == $html ) {
			return '<img src="' . get_template_directory_uri() . '/images/ConwayHall.jpg" />';
		}
		return $html;
	}
	add_filter( 'post_thumbnail_html', 'default_post_thumbnail' );

	// Sticky
	function wpb_cpt_sticky_at_top( $posts ) {
		if ( is_main_query() && is_post_type_archive() ) {
			global $wp_query;
			$sticky_posts = get_option( 'sticky_posts' );
			$num_posts = count( $posts );
			$sticky_offset = 0;
			for ($i = 0; $i < $num_posts; $i++) {
				if ( in_array( $posts[$i]->ID, $sticky_posts ) ) {
					$sticky_post = $posts[$i];
					array_splice( $posts, $i, 1 );
					array_splice( $posts, $sticky_offset, 0, array($sticky_post) );
					$sticky_offset++;
					$offset = array_search($sticky_post->ID, $sticky_posts);
					unset( $sticky_posts[$offset] );
				}
			}
			if ( !empty( $sticky_posts) ) {
				$stickies = get_posts( array(
					'post__in' => $sticky_posts,
					'post_type' => $wp_query->query_vars['post_type'],
					'post_status' => 'publish',
					'nopaging' => true
				) );
				foreach ( $stickies as $sticky_post ) {
					array_splice( $posts, $sticky_offset, 0, array( $sticky_post ) );
					$sticky_offset++;
				}
			}
		}
		return $posts;
	}
	add_filter( 'the_posts', 'wpb_cpt_sticky_at_top' );

	function cpt_sticky_class($classes) {
		if ( is_sticky() ) :
			$classes[] = 'sticky featured';
			return $classes;
		endif;
		return $classes;
	}
	add_filter('post_class', 'cpt_sticky_class');

	add_filter( 'get_the_archive_title', function ($title) {
		if ( is_category() ) {
				$title = single_cat_title( '', false );
			} elseif ( is_tag() ) {
				$title = single_tag_title( '', false );
			} elseif ( is_author() ) {
				$title = '<span class="vcard">' . get_the_author() . '</span>' ;
			} elseif ( is_post_type_archive() ) {
				$title = sprintf( __( '%s' ), post_type_archive_title( '', false ) );
			} elseif ( is_tax() ) {
				$tax = get_taxonomy( get_queried_object()->taxonomy );
				$title = sprintf( __( '%2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
			}
		return $title;
	});

	function add_sub_caps() {
		global $wp_roles;
		$role = get_role('member');
		$role->add_cap('read_private_posts');
	};
	add_action ('admin_head','add_sub_caps');

	add_filter( 'private_title_format', 'bl_remove_private_title' );
	function bl_remove_private_title( $title ) {
		return 'Members Area: %s';
	}

	function custom_excerpt_length( $length ) {
		return 30;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');


	function ch_media_info( $form_fields, $post ) {
		$field_value = get_post_meta( $post->ID, 'location', true );
		$form_fields['owner'] = array(
			'value' => $field_value ? $field_value : '',
			'label' => __( 'Photo Owner' ),
			'helps' => __( 'if set, a photo credit will be shown' )
		);
		$form_fields['ownerurl'] = array(
			'value' => $field_value ? $field_value : '',
			'label' => __( 'Photo Owner Website' ),
			'helps' => __( 'if set, a photo credit link will be shown' )
		);
		return $form_fields;
	}
	add_filter( 'attachment_fields_to_edit', 'ch_media_info', 10, 2 );

	function my_save_attachment_location( $attachment_id ) {
		if ( isset( $_REQUEST['attachments'][$attachment_id]['owner'] ) ) {
			$owner = $_REQUEST['attachments'][$attachment_id]['owner'];
			update_post_meta( $attachment_id, 'owner', $owner );
		}
		if ( isset( $_REQUEST['attachments'][$attachment_id]['ownerurl'] ) ) {
			$ownerurl = $_REQUEST['attachments'][$attachment_id]['ownerurl'];
			update_post_meta( $attachment_id, 'ownerurl', $ownerurl );
		}
	}
	add_action( 'edit_attachment', 'my_save_attachment_location' );

	function add_menu_icons_styles(){

		echo '<style>
		#adminmenu #menu-posts-carousel div.wp-menu-image:before, #dashboard_right_now .carousel-count a:before {
			content: "\f233";
		}
		#adminmenu #menu-posts-people div.wp-menu-image:before, #dashboard_right_now .people-count a:before {
			content: "\f307";
		}
		#adminmenu #menu-posts-jobs div.wp-menu-image:before, #dashboard_right_now .jobs-count a:before {
			content: "\f484";
		}
		#adminmenu #menu-posts-sunday_concerts div.wp-menu-image:before, #dashboard_right_now .sunday_concerts-count a:before {
			content: "\f127";
		}
		#dashboard_right_now .tribe_events-count a:before {
			content: "\f145";
		}
		#dashboard_right_now .feedback-count a:before {
			content: "\f175";
		}
		#dashboard_right_now .taxonomy-count a:before {
			content: "\f325";
		}
		#adminmenu #menu-posts-pdf div.wp-menu-image:before, #dashboard_right_now .pdf-count a:before {
			content: "\f497";
		}
		#adminmenu #menu-posts-product div.wp-menu-image:before, #dashboard_right_now .product-count a:before {
			content: "\f174";
		}
		#adminmenu #menu-posts-memorial_lecture div.wp-menu-image:before, #dashboard_right_now .memorial_lecture-count a:before {
			content: "\f473";
		}
		#adminmenu #menu-posts-amazon_product div.wp-menu-image:before, #dashboard_right_now .amazon_product-count a:before {
			content: "\f174";
		}
		#adminmenu .menu-icon-speaker div.wp-menu-image:before {
			content: "\f488";
		}
		#adminmenu .menu-icon-issue div.wp-menu-image:before {
			content: "\f331";
		}
		#adminmenu .menu-icon-contacts div.wp-menu-image:before {
			content: "\f336";
		}
		#adminmenu .menu-icon-ethicalrecord div.wp-menu-image:before {
			content: "\f464";
		}
		#dashboard_right_now .speaker-count a:before {
			content: "\f488";
		}
		#dashboard_right_now .issue-count a:before {
			content: "\f331";
		}
		#dashboard_right_now .taxonomy-count a:before {
			content: "\f325";
		}
		#dashboard_right_now .feedback-count a:before {
			content: "\f466";
		}
		#dashboard_right_now .ethicalrecord-count a:before {
			content: "\f464";
		}
		#dashboard_right_now .library_blog-count a:before {
			content: "\f512";
		}
		</style>';

	}
	add_action( 'admin_head', 'add_menu_icons_styles' );

	add_action( 'dashboard_glance_items', 'my_add_cpt_to_dashboard' );
	function my_add_cpt_to_dashboard() {
		$showTaxonomies = 1;
		if ($showTaxonomies) {
			$taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
			foreach ( $taxonomies as $taxonomy ) {
				$num_terms	= wp_count_terms( $taxonomy->name );
				$num = number_format_i18n( $num_terms );
				$text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
				$associated_post_type = $taxonomy->object_type;
				if ( current_user_can( 'manage_categories' ) ) {
					$output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . ' ' . $text .'</a>';
				}
				echo '<li class="taxonomy-count">' . $output . ' </li>';
			}
		}
		// Custom post types counts
		$post_types = get_post_types( array( '_builtin' => false ), 'objects' );
		foreach ( $post_types as $post_type ) {
			if($post_type->show_in_menu==false) {
				continue;
			}
			$num_posts = wp_count_posts( $post_type->name );
			$num = number_format_i18n( $num_posts->publish );
			$text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
			if ( current_user_can( 'edit_posts' ) ) {
				$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
			}
			echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
		}
	}