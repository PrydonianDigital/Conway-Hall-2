<ul class="taxonomies">
	<?php
		$taxonomy = 'decade';
		$orderby = 'name';
		$show_count = 0;
		$pad_counts = 0;
		$hierarchical = 1;
		$title = '';

		$args = array (
			'taxonomy' => $taxonomy,
			'orderby' => $orderby,
			'show_count' => $show_count,
			'pad_counts' => $pad_counts,
			'hierarchical' => $hierarchical,
			'title_li' => $title,
			'hide_empty' => 0
		);
		wp_list_categories($args)
	?>
</ul>