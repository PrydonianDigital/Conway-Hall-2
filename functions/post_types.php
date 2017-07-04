<?php

// Register Carousel Post Type
function carousel() {
	$labels = array(
		'name' => _x( 'Carousels', 'Post Type General Name', 'ch' ),
		'singular_name' => _x( 'Carousel', 'Post Type Singular Name', 'ch' ),
		'menu_name' => __( 'Carousels', 'ch' ),
		'parent_item_colon' => __( 'Parent Carousel:', 'ch' ),
		'all_items' => __( 'All Carousels', 'ch' ),
		'view_item' => __( 'View Carousel', 'ch' ),
		'add_new_item' => __( 'Add New Carousel', 'ch' ),
		'add_new' => __( 'Add New', 'ch' ),
		'edit_item' => __( 'Edit Carousel', 'ch' ),
		'update_item' => __( 'Update Carousel', 'ch' ),
		'search_items' => __( 'Search Carousels', 'ch' ),
		'not_found' => __( 'Not found', 'ch' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label' => __( 'venue', 'ch' ),
		'description' => __( 'Home page carousel', 'ch' ),
		'labels' => $labels,
		'supports' => array( 'title', 'thumbnail', 'page-attributes', 'excerpt' ),
		'taxonomies' => array(),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'can_export' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-images-alt',
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'carousel', $args );
}
// Hook into the 'init' action
add_action( 'init', 'carousel', 0 );

// Register Custom Conway Memorial Lectures Type
function chml() {
	$labels = array(
		'name' => _x( 'Conway Memorial Lectures', 'Post Type General Name', 'ch' ),
		'singular_name' => _x( 'Conway Memorial Lecture', 'Post Type Singular Name', 'ch' ),
		'menu_name' => __( 'Conway Lecture', 'ch' ),
		'parent_item_colon' => __( 'Parent Conway Lecture:', 'ch' ),
		'all_items' => __( 'All Conway Lectures', 'ch' ),
		'view_item' => __( 'View Conway Lecture', 'ch' ),
		'add_new_item' => __( 'Add New Conway Lecture', 'ch' ),
		'add_new' => __( 'Add New', 'ch' ),
		'edit_item' => __( 'Edit Conway Lecture', 'ch' ),
		'update_item' => __( 'Update Conway Lecture', 'ch' ),
		'search_items' => __( 'Search Conway Lecture', 'ch' ),
		'not_found' => __( 'Not found', 'ch' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label' => __( 'memorial_lecture', 'ch' ),
		'description' => __( "<p>Every year guest lecturers have been invited to speak on subjects across disciplines such as philosophy, history, science, sociology and art, all wth the intent of presenting the latest thinking on those subjects by leading experts in their respective fields. Since 1910, a staggering portfolio of speakers and topics have been presented that is worthy of comparison to other such similar memorial lectures run by other institutions.</p><p>Bertrand Russell, Herbert Read, Gilbert Murray, Jonathan Miller, A J Ayer and Christopher Hill are some of those among the many who have given Conway Memorial Lectures. Those sitting in the Chair at these lectures have been equally illustrious, for example E M Forster chaired Edward Thompson's 1942 lecture on Ethical Ideals in India Today.</p><p>In hindsight, the decision taken in 1908 at a conference of friends and admirers of Dr Moncure Conway (1832 - 1907) to set up an endownment for an 'annual lecture or lectures perpetuating Dr. Conway's memory' rather than funding a medallion or statue of him has been borne out magnificently. Indeed, Edward Clodd, in his introduction to the inaugral lecture by John Russell must, as a respresentative of that group of 'friends and admirers', take credit for taking this course of action, even though as he stated an annual lecture series was 'more in line' with Conway's own wishes.</p><p>So, in memory of the man whom Barbara Wootton described, in her Chairman's introduction to Lord Chorley's 1953 Conway Memorial Lecture, as one 'who died in 1907 after a life-time spent fighting for freedom on both sides of the atlantic', we have significant body of work in the legacy that the Conway Memorial Lectures provide. And, as a modern day testament to that legacy Conway Hall is prioritising the digitising of every available lecture.</p>", 'ch' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'publicize' ),
		'taxonomies' => array( ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'can_export' => true,
		'menu_icon' => 'dashicons-megaphone',
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
		'rewrite'				=> array('slug' => 'library/memorial_lecture', 'with_front' => true)
	);
	register_post_type( 'memorial_lecture', $args );
}
// Hook into the 'init' action
add_action( 'init', 'chml', 0 );

// Register Amazon Product Post Type
function amazon_products() {
	$labels = array(
		'name' => _x( 'Amazon Products', 'Post Type General Name', 'ch' ),
		'singular_name' => _x( 'Amazon Product', 'Post Type Singular Name', 'ch' ),
		'menu_name' => __( 'Amazon Products', 'ch' ),
		'parent_item_colon' => __( 'Parent Amazon Product:', 'ch' ),
		'all_items' => __( 'All Amazon Products', 'ch' ),
		'view_item' => __( 'View Amazon Product', 'ch' ),
		'add_new_item' => __( 'Add New Amazon Product', 'ch' ),
		'add_new' => __( 'Add New', 'ch' ),
		'edit_item' => __( 'Edit Amazon Product', 'ch' ),
		'update_item' => __( 'Update Amazon Product', 'ch' ),
		'search_items' => __( 'Search Amazon Products', 'ch' ),
		'not_found' => __( 'Not found', 'ch' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label' => __( 'amazon_product', 'ch' ),
		'description' => __( 'Conway Hall shop products', 'ch' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies' => array( 'type' ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'can_export' => true,
		'menu_icon' => 'dashicons-cart',
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'amazon_product', $args );
}
// Hook into the 'init' action
add_action( 'init', 'amazon_products', 0 );

// Register Amazon Product Post Type
function am_products() {
	$labels = array(
		'name' => _x( 'Products', 'Post Type General Name', 'ch' ),
		'singular_name' => _x( 'Product', 'Post Type Singular Name', 'ch' ),
		'menu_name' => __( 'Products', 'ch' ),
		'parent_item_colon' => __( 'Parent Product:', 'ch' ),
		'all_items' => __( 'All Products', 'ch' ),
		'view_item' => __( 'View Product', 'ch' ),
		'add_new_item' => __( 'Add New Product', 'ch' ),
		'add_new' => __( 'Add New', 'ch' ),
		'edit_item' => __( 'Edit Product', 'ch' ),
		'update_item' => __( 'Update Product', 'ch' ),
		'search_items' => __( 'Search Products', 'ch' ),
		'not_found' => __( 'Not found', 'ch' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label' => __( 'product', 'ch' ),
		'description' => __( 'products', 'ch' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies' => array( 'type' ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'can_export' => true,
		'menu_icon' => 'dashicons-cart',
		'has_archive' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'product', $args );
}
// Hook into the 'init' action
add_action( 'init', 'am_products', 0 );

// Register Project Post Type
function project() {
	$labels = array(
		'name' => _x( 'Projects', 'Post Type General Name', 'ch' ),
		'singular_name' => _x( 'Project', 'Post Type Singular Name', 'ch' ),
		'menu_name' => __( 'Projects', 'ch' ),
		'parent_item_colon' => __( 'Parent Project:', 'ch' ),
		'all_items' => __( 'All Projects', 'ch' ),
		'view_item' => __( 'View Project', 'ch' ),
		'add_new_item' => __( 'Add New Project', 'ch' ),
		'add_new' => __( 'Add New', 'ch' ),
		'edit_item' => __( 'Edit Project', 'ch' ),
		'update_item' => __( 'Update Project', 'ch' ),
		'search_items' => __( 'Search Projects', 'ch' ),
		'not_found' => __( 'Not found', 'ch' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label' => __( 'Projects', 'ch' ),
		'description' => __( 'Project listings', 'ch' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		'taxonomies' => array(),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'can_export' => true,
		'menu_icon' => 'dashicons-pressthis',
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
		'menu_icon' => 'dashicons-clipboard',
		'rewrite'			=> array('slug' => 'learning-at-conway-hall/projects', 'with_front' => false)
	);
	register_post_type( 'project', $args );
}
// Hook into the 'init' action
add_action( 'init', 'project', 0 );

// Register People Post Type
function people() {
	$labels = array(
		'name' => _x( 'People', 'Post Type General Name', 'ch' ),
		'singular_name' => _x( 'Person', 'Post Type Singular Name', 'ch' ),
		'menu_name' => __( 'People', 'ch' ),
		'parent_item_colon' => __( 'Parent Person:', 'ch' ),
		'all_items' => __( 'All People', 'ch' ),
		'view_item' => __( 'View Person', 'ch' ),
		'add_new_item' => __( 'Add New Person', 'ch' ),
		'add_new' => __( 'Add New', 'ch' ),
		'edit_item' => __( 'Edit Person', 'ch' ),
		'update_item' => __( 'Update Person', 'ch' ),
		'search_items' => __( 'Search People', 'ch' ),
		'not_found' => __( 'Not found', 'ch' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label' => __( 'people', 'ch' ),
		'description' => __( 'Staff listings', 'ch' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		'taxonomies' => array(),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-universal-access',
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'people', $args );
}
// Hook into the 'init' action
add_action( 'init', 'people', 0 );

// Register Jobs Post Type
function jobs() {
	$labels = array(
		'name' => _x( 'Jobs', 'Post Type General Name', 'ch' ),
		'singular_name' => _x( 'Job', 'Post Type Singular Name', 'ch' ),
		'menu_name' => __( 'Jobs', 'ch' ),
		'parent_item_colon' => __( 'Parent Job:', 'ch' ),
		'all_items' => __( 'All Jobs', 'ch' ),
		'view_item' => __( 'View Job', 'ch' ),
		'add_new_item' => __( 'Add New Job', 'ch' ),
		'add_new' => __( 'Add New', 'ch' ),
		'edit_item' => __( 'Edit Job', 'ch' ),
		'update_item' => __( 'Update Job', 'ch' ),
		'search_items' => __( 'Search Jobs', 'ch' ),
		'not_found' => __( 'Not found', 'ch' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label' => __( 'jobs', 'ch' ),
		'description' => __( 'Job/Volunteering listings', 'ch' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'publicize' ),
		'taxonomies' => array( 'job_type' ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'can_export' => true,
		'menu_icon' => 'dashicons-clipboard',
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
		'rewrite'				=> array('slug' => 'about/opportunities/job', 'with_front' => false)
	);
	register_post_type( 'jobs', $args );
}
// Hook into the 'init' action
add_action( 'init', 'jobs', 0 );

// Register PDF Post Type
function pdf() {
	$labels = array(
		'name' => _x( 'PDFs', 'Post Type General Name', 'ch' ),
		'singular_name' => _x( 'PDF', 'Post Type Singular Name', 'ch' ),
		'menu_name' => __( 'PDFs', 'ch' ),
		'parent_item_colon' => __( 'Parent PDF:', 'ch' ),
		'all_items' => __( 'All PDFs', 'ch' ),
		'view_item' => __( 'View PDF', 'ch' ),
		'add_new_item' => __( 'Add New PDF', 'ch' ),
		'add_new' => __( 'Add PDF', 'ch' ),
		'edit_item' => __( 'Edit PDF', 'ch' ),
		'update_item' => __( 'Update PDF', 'ch' ),
		'search_items' => __( 'Search PDFs', 'ch' ),
		'not_found' => __( 'Not found', 'ch' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label' => __( 'pdf', 'ch' ),
		'description' => __( 'All PDFs for the site', 'ch' ),
		'labels' => $labels,
		'supports' => array( 'title', 'thumbnail' ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-media-document',
		'can_export' => true,
		'has_archive' => false,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'pdf', $args );
}
// Hook into the 'init' action
add_action( 'init', 'pdf', 0 );

function sc_posts() {
	$labels = array(
		'name'	=> _x( 'Sunday Concerts', 'Post Type General Name', 'ch' ),
		'singular_name'	   => _x( 'Sunday Concert', 'Post Type Singular Name', 'ch' ),
		'menu_name'		   => __( 'Sunday Concerts', 'ch' ),
		'parent_item_colon'   => __( 'Parent Sunday Concert:', 'ch' ),
		'all_items'		   => __( 'All Sunday Concerts', 'ch' ),
		'view_item'		   => __( 'View Sunday Concert', 'ch' ),
		'add_new_item'		=> __( 'Add New Sunday Concert', 'ch' ),
		'add_new'			 => __( 'Add New', 'ch' ),
		'edit_item'		   => __( 'Edit Sunday Concert', 'ch' ),
		'update_item'		 => __( 'Update Sunday Concert', 'ch' ),
		'search_items'		=> __( 'Search Sunday Concerts', 'ch' ),
		'not_found'		   => __( 'Not found', 'ch' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label'			   => __( 'sunday_concerts', 'ch' ),
		'description'		 => __( 'Sunday Concert Posts', 'ch' ),
		'labels'			  => $labels,
		'supports'			=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'publicize' ),
		'taxonomies'		  => array( ),
		'hierarchical'		=> false,
		'public'			  => true,
		'show_ui'			 => true,
		'show_in_menu'		=> true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'	   => 5,
		'menu_icon' => 'dashicons-format-audio',
		'can_export'		  => true,
		'has_archive'		 => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'	 => 'page',
	);
	register_post_type( 'sunday_concerts', $args );
}
add_action( 'init', 'sc_posts', 0 );

// Register ER Taxonomy Taxonomy
function er_tax() {
	$labels = array(
		'name'		   => _x( 'Taxonomies', 'Taxonomy General Name', 'ch' ),
		'singular_name'			  => _x( 'Taxonomy', 'Taxonomy Singular Name', 'ch' ),
		'menu_name'	  => __( 'Taxonomy', 'ch' ),
		'all_items'	  => __( 'All Items', 'ch' ),
		'parent_item'	=> __( 'Parent Item', 'ch' ),
		'parent_item_colon'		  => __( 'Parent Item:', 'ch' ),
		'new_item_name'			  => __( 'New Item Name', 'ch' ),
		'add_new_item'			   => __( 'Add New Item', 'ch' ),
		'edit_item'	  => __( 'Edit Item', 'ch' ),
		'update_item'	=> __( 'Update Item', 'ch' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'ch' ),
		'search_items'			   => __( 'Search Items', 'ch' ),
		'add_or_remove_items'		=> __( 'Add or remove items', 'ch' ),
		'choose_from_most_used'	  => __( 'Choose from the most used items', 'ch' ),
		'not_found'	  => __( 'Not Found', 'ch' ),
	);
	$args = array(
		'labels'		 => $labels,
		'hierarchical'			   => true,
		'public'		 => true,
		'show_ui'		=> true,
		'show_admin_column'		  => true,
		'show_in_nav_menus'		  => true,
		'show_tagcloud'			  => true,
		'rewrite'				=> array('slug' => 'ethicalrecord/taxonomy', 'with_front' => false)
	);
	register_taxonomy( 'taxonomy', array( 'ethicalrecord' ), $args );
}
add_action( 'init', 'er_tax', 0 );

// Register ER Sections Taxonomy
function er_post_tax() {
	$labels = array(
		'name'		   => _x( 'Sections', 'Taxonomy General Name', 'ch' ),
		'singular_name'			  => _x( 'Section', 'Taxonomy Singular Name', 'ch' ),
		'menu_name'	  => __( 'Sections', 'ch' ),
		'all_items'	  => __( 'All Sections', 'ch' ),
		'parent_item'	=> __( 'Parent Section', 'ch' ),
		'parent_item_colon'		  => __( 'Parent Section:', 'ch' ),
		'new_item_name'			  => __( 'New Section', 'ch' ),
		'add_new_item'			   => __( 'Add New Section', 'ch' ),
		'edit_item'	  => __( 'Edit Section', 'ch' ),
		'update_item'	=> __( 'Update Section', 'ch' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'ch' ),
		'search_items'			   => __( 'Search Sections', 'ch' ),
		'add_or_remove_items'		=> __( 'Add or remove items', 'ch' ),
		'choose_from_most_used'	  => __( 'Choose from the most used items', 'ch' ),
		'not_found'	  => __( 'Not Found', 'ch' ),
	);
	$args = array(
		'labels'		 => $labels,
		'hierarchical'			   => true,
		'public'		 => true,
		'show_ui'		=> true,
		'show_admin_column'		  => true,
		'show_in_nav_menus'		  => true,
		'show_tagcloud'			  => true,
		'rewrite'				=> array('slug' => 'ethicalrecord/section', 'with_front' => false)
	);
	register_taxonomy( 'section', array( 'ethicalrecord' ), $args );
}
add_action( 'init', 'er_post_tax', 0 );

function er_posts() {
	$labels = array(
		'name'	=> _x( 'Ethical Record', 'Post Type General Name', 'ch' ),
		'singular_name'	   => _x( 'Ethical Record', 'Post Type Singular Name', 'ch' ),
		'menu_name'		   => __( 'Ethical Record', 'ch' ),
		'parent_item_colon'   => __( 'Parent ER Post:', 'ch' ),
		'all_items'		   => __( 'All ER Posts', 'ch' ),
		'view_item'		   => __( 'View ER Post', 'ch' ),
		'add_new_item'		=> __( 'Add New ER Post', 'ch' ),
		'add_new'			 => __( 'Add New', 'ch' ),
		'edit_item'		   => __( 'Edit ER Post', 'ch' ),
		'update_item'		 => __( 'Update ER Post', 'ch' ),
		'search_items'		=> __( 'Search ER Posts', 'ch' ),
		'not_found'		   => __( 'Not found', 'ch' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label'			   => __( 'ethicalrecord', 'ch' ),
		'description'		 => __( 'Ethical Record Posts', 'ch' ),
		'labels'			  => $labels,
		'supports'			=> array( 'title', 'editor', 'post_tag', 'tags', 'thumbnail', 'comments', 'publicize', 'page-attributes' ),
		'taxonomies'		  => array( 'post_tag', 'tags' ),
		'hierarchical'		=> false,
		'public'			  => true,
		'show_ui'			 => true,
		'show_in_menu'		=> true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'	   => 5,
		'menu_icon' => 'dashicons-book',
		'can_export'		  => true,
		'has_archive'		 => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'	 => 'page',
	);
	register_post_type( 'ethicalrecord', $args );
}
add_action( 'init', 'er_posts', 0 );

function speaker() {
	$labels = array(
		'name'	=> _x( 'Speakers', 'Post Type General Name', 'ch' ),
		'singular_name'	   => _x( 'Speaker', 'Post Type Singular Name', 'ch' ),
		'menu_name'		   => __( 'Speakers', 'ch' ),
		'parent_item_colon'   => __( 'Parent Speaker:', 'ch' ),
		'all_items'		   => __( 'All Speakers', 'ch' ),
		'view_item'		   => __( 'View Speaker', 'ch' ),
		'add_new_item'		=> __( 'Add New Speaker', 'ch' ),
		'add_new'			 => __( 'Add New', 'ch' ),
		'edit_item'		   => __( 'Edit Speaker', 'ch' ),
		'update_item'		 => __( 'Update Speaker', 'ch' ),
		'search_items'		=> __( 'Search Speakers', 'ch' ),
		'not_found'		   => __( 'Not found', 'ch' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label'			   => __( 'speaker', 'ch' ),
		'description'		 => __( 'Lecture Speakers', 'ch' ),
		'labels'			  => $labels,
		'supports'			=> array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'		  => array(),
		'hierarchical'		=> false,
		'public'			  => true,
		'show_ui'			 => true,
		'show_in_menu'		=> true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'	   => 5,
		'menu_icon' => 'dashicons-megaphone',
		'can_export'		  => true,
		'has_archive'		 => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'	 => 'page',
	);
	register_post_type( 'speaker', $args );
}
add_action( 'init', 'speaker', 0 );

// Register Issue Taxonomy
function issue_tax() {
	$labels = array(
		'name'		   => _x( 'Decade', 'Taxonomy General Name', 'ch' ),
		'singular_name'			  => _x( 'Decade', 'Taxonomy Singular Name', 'ch' ),
		'menu_name'	  => __( 'Decade', 'ch' ),
		'all_items'	  => __( 'All Decades', 'ch' ),
		'parent_item'	=> __( 'Parent Decade', 'ch' ),
		'parent_item_colon'		  => __( 'Parent Decade:', 'ch' ),
		'new_item_name'			  => __( 'New Decade', 'ch' ),
		'add_new_item'			   => __( 'Add New Decade', 'ch' ),
		'edit_item'	  => __( 'Edit Decade', 'ch' ),
		'update_item'	=> __( 'Update Decade', 'ch' ),
		'separate_items_with_commas' => __( 'Separate decades with commas', 'ch' ),
		'search_items'			   => __( 'Search Decade', 'ch' ),
		'add_or_remove_items'		=> __( 'Add or remove decades', 'ch' ),
		'choose_from_most_used'	  => __( 'Choose from the most used decades', 'ch' ),
		'not_found'	  => __( 'Not Found', 'ch' ),
	);
	$args = array(
		'labels'		 => $labels,
		'hierarchical'	=> true,
		'public'		 => true,
		'show_ui'		=> true,
		'show_admin_column'		  => true,
		'show_in_nav_menus'		  => true,
		'show_tagcloud'			  => true,
		'rewrite'				=> array('slug' => 'ethical-record/issue/decade', 'with_front' => true)
	);
	register_taxonomy( 'decade', array( 'issue' ), $args );
}
add_action( 'init', 'issue_tax', 0 );


function issue() {
	$labels = array(
		'name'	=> _x( 'Issues', 'Post Type General Name', 'ch' ),
		'singular_name'	   => _x( 'Issue', 'Post Type Singular Name', 'ch' ),
		'menu_name'		   => __( 'Issues', 'ch' ),
		'parent_item_colon'   => __( 'Parent Issue:', 'ch' ),
		'all_items'		   => __( 'All Issues', 'ch' ),
		'view_item'		   => __( 'View Issue', 'ch' ),
		'add_new_item'		=> __( 'Add New Issue', 'ch' ),
		'add_new'			 => __( 'Add New', 'ch' ),
		'edit_item'		   => __( 'Edit Issue', 'ch' ),
		'update_item'		 => __( 'Update Issue', 'ch' ),
		'search_items'		=> __( 'Search Issues', 'ch' ),
		'not_found'		   => __( 'Not found', 'ch' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label'			   => __( 'issue', 'ch' ),
		'description'		 => __( 'Ethical Record Issue', 'ch' ),
		'labels'			  => $labels,
		'supports'			=> array( 'title', 'editor', 'post_tag', 'tags' , 'publicize', 'thumbnail' ),
		'taxonomies'		  => array( 'post_tag', 'tags' ),
		'hierarchical'		=> false,
		'public'			  => true,
		'show_ui'			 => true,
		'show_in_menu'		=> true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'	   => 5,
		'menu_icon' => 'dashicons-book-alt',
		'can_export'		  => true,
		'has_archive'		 => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'	 => 'page',
		'rewrite'				=> array('slug' => 'ethical-record/issue', 'with_front' => true)
	);
	register_post_type( 'issue', $args );
}
add_action( 'init', 'issue', 0 );

function library_blog() {
	$labels = array(
		'name'	=> _x( 'Library Blog', 'Post Type General Name', 'ch' ),
		'singular_name'	   => _x( 'Library Blog', 'Post Type Singular Name', 'ch' ),
		'menu_name'		   => __( 'Library Blog', 'ch' ),
		'parent_item_colon'   => __( 'Parent Library Blog:', 'ch' ),
		'all_items'		   => __( 'All Library Blog Posts', 'ch' ),
		'view_item'		   => __( 'View Library Blog Posts', 'ch' ),
		'add_new_item'		=> __( 'Add New Library Blog Post', 'ch' ),
		'add_new'			 => __( 'Add New', 'ch' ),
		'edit_item'		   => __( 'Edit Library Blog', 'ch' ),
		'update_item'		 => __( 'Update Library Blog', 'ch' ),
		'search_items'		=> __( 'Search Library Blogs', 'ch' ),
		'not_found'		   => __( 'Not found', 'ch' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ch' ),
	);
	$args = array(
		'label'			   => __( 'library_blog', 'ch' ),
		'description'		 => __( 'Library Blog', 'ch' ),
		'labels'			  => $labels,
		'supports'			=> array( 'title', 'editor', 'post_tag', 'tags' , 'publicize', 'thumbnail', 'author' ),
		'taxonomies'		  => array( 'post_tag', 'tags' ),
		'hierarchical'		=> false,
		'public'			  => true,
		'show_ui'			 => true,
		'show_in_menu'		=> true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'	   => 5,
		'menu_icon'		   => 'dashicons-building',
		'can_export'		  => true,
		'has_archive'		 => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'	 => 'page',
		'rewrite'			=> array('slug' => 'library/what-do-you-do-with-a-phd-in-music/library_blog', 'with_front' => false)
	);
	register_post_type( 'library_blog', $args );
}
add_action( 'init', 'library_blog', 0 );

function bugs() {

	$labels = array(
		'name'                  => _x( 'Bugs', 'Post Type General Name', 'ch' ),
		'singular_name'         => _x( 'Bug', 'Post Type Singular Name', 'ch' ),
		'menu_name'             => __( 'Bugs', 'ch' ),
		'name_admin_bar'        => __( 'Bug', 'ch' ),
		'archives'              => __( 'Bug Archives', 'ch' ),
		'attributes'            => __( 'Bug Attributes', 'ch' ),
		'parent_item_colon'     => __( 'Parent Bug:', 'ch' ),
		'all_items'             => __( 'All Bugs', 'ch' ),
		'add_new_item'          => __( 'Add New Bug', 'ch' ),
		'add_new'               => __( 'Add New', 'ch' ),
		'new_item'              => __( 'New Bug', 'ch' ),
		'edit_item'             => __( 'Edit Bug', 'ch' ),
		'update_item'           => __( 'Update Bug', 'ch' ),
		'view_item'             => __( 'View Bug', 'ch' ),
		'view_items'            => __( 'View Bugs', 'ch' ),
		'search_items'          => __( 'Search Bug', 'ch' ),
		'not_found'             => __( 'Not found', 'ch' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ch' ),
		'featured_image'        => __( 'Featured Image', 'ch' ),
		'set_featured_image'    => __( 'Set featured image', 'ch' ),
		'remove_featured_image' => __( 'Remove featured image', 'ch' ),
		'use_featured_image'    => __( 'Use as featured image', 'ch' ),
		'insert_into_item'      => __( 'Insert into item', 'ch' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ch' ),
		'items_list'            => __( 'Items list', 'ch' ),
		'items_list_navigation' => __( 'Items list navigation', 'ch' ),
		'filter_items_list'     => __( 'Filter items list', 'ch' ),
	);
	$args = array(
		'label'                 => __( 'Bug', 'ch' ),
		'description'           => __( 'Bug Tracking', 'ch' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'		=> 'dashicons-warning',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'bug', $args );

}
add_action( 'init', 'bugs', 0 );