<?php

	require_once('wp-updates-theme.php');
	new WPUpdatesThemeUpdater_1953( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );