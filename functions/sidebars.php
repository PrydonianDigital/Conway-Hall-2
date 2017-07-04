<?php

	function ch_sidebars() {
		$args = array(
			'id'			=> 'right',
			'class'		 => 'right',
			'name'		  => __( 'Right Sidebar', 'ch' ),
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'joinsidebar',
			'class'		 => 'joinsidebar',
			'name'		  => __( 'Join/Donate Sidebar', 'ch' ),
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'p2psidebar',
			'class'		 => 'p2psidebar',
			'name'		  => __( 'Connected Items Sidebar', 'ch' ),
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer_left',
			'class'		 => 'footer_left',
			'name'		  => __( 'Footer Left', 'ch' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="rounded">',
			'after_title'   => '</h2>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer_right',
			'class'		 => 'footer_right',
			'name'		  => __( 'Footer Right', 'ch' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="rounded">',
			'after_title'   => '</h2>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'woosidebar',
			'class'		 => 'woosidebar',
			'name'		  => __( 'Shop Sidebar', 'ch' ),
		);
		register_sidebar( $args );
	}
	add_action( 'widgets_init', 'ch_sidebars' );