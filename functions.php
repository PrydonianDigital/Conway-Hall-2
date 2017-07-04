<?php

	function mySearchWPXpdfPath() {
		return '/pdftotext';
	}
	add_filter( 'searchwp_xpdf_path', 'mySearchWPXpdfPath' );

	function my_searchwp_process_term_limit() {
		return 500;
	}
	add_filter( 'searchwp_process_term_limit', 'my_searchwp_process_term_limit' );

	// Init CMB2
	if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/cmb2/init.php';
	} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/CMB2/init.php';
	}

	require_once('functions/theme.php');
	require_once('functions/menus.php');
	require_once('functions/sidebars.php');
	require_once('functions/taxonomies.php');
	require_once('functions/post_types.php');
	require_once('functions/meta.php');
	require_once('functions/widgets.php');
	require_once('functions/p2p.php');
	require_once('functions/customise.php');
