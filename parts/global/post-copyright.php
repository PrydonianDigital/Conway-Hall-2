<div class="hide">
	<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
		<?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		<?php $image_width = $image_data[1]; ?>
		<?php $image_height = $image_data[2]; ?>
		<img src="<?php the_post_thumbnail_url(); ?>" itemprop="url">
		<meta itemprop="height" content="<?php echo $image_width; ?>" />
		<meta itemprop="width" content="<?php echo $image_height; ?>" />
	</div>
	Written by:
	<span itemscope itemprop="author" itemtype="http://schema.org/Person">
		<span itemprop="name">
			<a itemprop="url" href="Author URL"><?php echo get_the_author_meta( 'user_nicename' ); ?></a>
		</span>
	</span>
	Published by:
	<span itemscope itemprop="publisher" itemtype="http://schema.org/Organization">
		<span itemprop="name"><a itemprop="url" href="<?php echo bloginfo( 'url' ); ?>"><?php echo get_theme_mod('ch_org'); ?></a></span>
		<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			<img src="<?php echo get_theme_mod('ch_logo'); ?>"/>
			<meta itemprop="url" content="<?php echo get_theme_mod( 'ch_logo' ); ?>">
		</div>
	</span>
	Copyright holder:
	<span itemscope itemprop="sourceOrganization" itemtype="http://schema.org/Organization">
		<span itemprop="name"><a itemprop="url" href="<?php echo bloginfo( 'url' ); ?>"><?php echo get_theme_mod('ch_org'); ?></a></span>
		<img itemprop="logo" src="<?php echo get_theme_mod( 'ch_logo' ); ?>" />
	</span>
</div>