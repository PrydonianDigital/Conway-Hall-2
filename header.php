<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script type="application/ld+json">
{
   "@context": "http://schema.org",
   "@type": "WebSite",
   "name" : "<?php echo bloginfo( 'name' ); ?>",
   "alternateName" : "<?php echo bloginfo( 'name' ); ?> • <?php echo bloginfo( 'description' ); ?>",
   "url": "<?php echo bloginfo( 'url' ); ?>",
   "potentialAction": {
     "@type": "SearchAction",
     "target": "<?php echo bloginfo( 'url' ); ?>/?s={search_term_string}",
     "query-input": "required name=search_term_string"
   }
}
</script>
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=895339160541870";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="off-canvas-wrapper">

	<div class="off-canvas position-left" id="offCanvas" data-off-canvas>

		<button class="close-button" aria-label="Close menu" type="button" data-close>
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="top-bar-left">
			<?php
				wp_nav_menu(array(
					'container' => false,
					'menu' => __( 'Top Bar Menu', 'tfh' ),
					'menu_class' => 'vertical menu',
					'theme_location' => 'topbar-menu',
					'items_wrap'	  => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'fallback_cb' => 'f6_offcanvasr_menu_fallback',
					'walker' => new F6_OFFCANVAS_MENU_WALKER(),
				));
			?>
			<?php
				wp_nav_menu(array(
					'container' => false,
					'menu' => __( 'Social Media Menu', 'tfh' ),
					'menu_class' => 'vertical medium-horizontal menu',
					'theme_location' => 'social-media',
					'items_wrap'	  => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'fallback_cb' => 'f6_offcanvasr_menu_fallback',
					'walker' => new F6_OFFCANVAS_MENU_WALKER(),
				));
			?>
		</div>
	</div>

	<div class="off-canvas-content" data-off-canvas-content>

<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

		<div class="title-bar">
			<div class="title-bar-left">
				<button class="ch-chevron-left" type="button" data-open="offCanvas"> Menu</button>
			</div>
		</div>

		<div class="top-bar" id="animated-menu">
			<div class="top-bar-left">
				<?php
					wp_nav_menu(array(
						'container' => false,
						'menu' => __( 'Top Bar Menu', 'tfh' ),
						'menu_class' => 'vertical medium-horizontal menu',
						'theme_location' => 'topbar-menu',
						'items_wrap'	  => '<ul id="%1$s" class="%2$s" data-responsive-menu="medium-dropdown">%3$s</ul>',
						'fallback_cb' => 'f6_topbar_menu_fallback',
						'walker' => new F6_TOPBAR_MENU_WALKER(),
					));
				?>
			</div>
			<div class="top-bar-right">
				<?php
					wp_nav_menu(array(
						'container' => false,
						'menu' => __( 'Social Media Menu', 'tfh' ),
						'menu_class' => 'vertical medium-horizontal menu',
						'theme_location' => 'social-media',
						'items_wrap'	  => '<ul id="%1$s" class="%2$s" data-responsive-menu="medium-dropdown">%3$s</ul>',
						'fallback_cb' => 'f6_topbar_menu_fallback',
						'walker' => new F6_TOPBAR_MENU_WALKER(),
					));
				?>
			</div>
		</div>

		<div class="row">

			<div class="small-12 columns center tagline">

				<h1>
					<a href="<?php echo bloginfo( 'url' ); ?>">
						<i aria-hidden="true" class="ch-logo"></i>
					</a>
				</h1>
			</div>

		</div>


	</header>

	<main role="main" itemscope itemtype="http://schema.org/Blog" id="main">