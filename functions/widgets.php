<?php

	function google_search_widget() {
		register_widget('GS_Widget');
	}
	add_action('widgets_init', 'google_search_widget');

	class GS_Widget extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'google_search_widget', 'description' => __( 'Conway Hall Google Search', 'ch' ) );
			parent::__construct( 'chgsearch', __( 'Conway Hall Google Search Widget', 'bci' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$title = apply_filters( 'widget_title', $instance['title']);
			echo '<li class="widget gs-widget">';
			echo '<h2 class="widgettitle">'. $title .'</h2>';
			echo '<script>';
			echo '(function() {';
			echo 'var cx = "005436056762542104014:ocb1nr7phyw";';
			echo 'var gcse = document.createElement("script");';
			echo 'gcse.type = "text/javascript";';
			echo 'gcse.async = true;';
			echo 'gcse.src = "https://cse.google.com/cse.js?cx=" + cx;';
			echo 'var s = document.getElementsByTagName("script")[0];';
			echo 's.parentNode.insertBefore(gcse, s);';
			echo '})();';
			echo '</script>';
			echo '<div class="w-form field form-wrapper">';
			echo '<form name="cse" id="searchbox" action="/search" method="get">';
			echo '<input type="hidden" name="cx" value="005436056762542104014:ocb1nr7phyw" /><!-- Replace YOUR_CSEID with your CSE ID (!) -->';
			echo '<input type="hidden" name="ie" value="utf-8" />';
			echo '<input type="hidden" name="hl" value="en" />';
			echo '<input name="q" type="text" class="your-custom-field-class" placeholder="Search" />';
			echo '<input class="search-submit" value="Search" type="submit" name="sa" />';
			echo '</form>';
			echo '</div>';
			echo '</li>';
		}
		function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'Search', 'ch' );
			}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		}
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}
	}

	function ch_subpages_load_widgets() {
		register_widget( 'ch_Subpages_Widget' );
	}
	add_action( 'widgets_init', 'ch_subpages_load_widgets' );
	class ch_Subpages_Widget extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_subpages', 'description' => __( 'Lists current section subpages', 'ch' ) );
			parent::__construct( 'subpages-widget', __( 'Subpages Widget', 'ch' ), $widget_ops );
		}
		function widget( $args, $instance ) {
			extract( $args, EXTR_SKIP );
			$post_types = get_post_types( array( 'hierarchical' => true ) );
			if ( !is_singular( $post_types ) && !apply_filters( 'ch_subpages_widget_display_override', false ) )
				return;
			global $post;
			$parents = array_reverse( get_ancestors( $post->ID, 'page' ) );
			$parents[] = $post->ID;
			$parents = apply_filters( 'ch_subpages_widget_parents', $parents );
			$args = array(
				'child_of' => $parents[0],
				'parent' => $parents[0],
				'sort_column' => 'menu_order',
				'post_type' => get_post_type(),
			);
			$depth = 1;
			$subpages = get_pages( apply_filters( 'ch_subpages_widget_args', $args, $depth ) );
			if ( empty( $subpages ) )
				return;

			echo $before_widget;

			global $ch_subpages_is_first;
			$ch_subpages_is_first = true;
			$title = esc_attr( $instance['title'] );
			if( 1 == $instance['title_from_parent'] ) {
				$title = get_the_title( $parents[0] );
				if( 1 == $instance['title_link'] )
					$title = '<a href="' . get_permalink( $parents[0] ) . '">' . apply_filters( 'ch_subpages_widget_title', $title ) . '</a>';
			}
			if( !empty( $title ) )
				echo $before_title . $title . $after_title;
			if( !isset( $instance['deep_subpages'] ) )
				$instance['deep_subpages'] = 0;
			if( !isset( $instance['nest_subpages'] ) )
				$instance['nest_subpages'] = 0;
			$this->build_subpages( $subpages, $parents, $instance['deep_subpages'], $depth, $instance['nest_subpages'] );
			echo $after_widget;
		}
		function build_subpages( $subpages, $parents, $deep_subpages = 0, $depth = 1, $nest_subpages = 0 ) {
			if( empty( $subpages ) )
				return;
			global $post, $ch_subpages_is_first;
			echo '<ul class="subpages_widget">';
			foreach ( $subpages as $subpage ) {
				$class = array();
				$class[] = 'menu-item-' . $subpage->ID;
				if ( $subpage->ID == $post->ID )
					$class[] = 'widget_subpages_current_page';
				if( $ch_subpages_is_first )
					$class[] .= 'first-menu-item';
				$ch_subpages_is_first = false;
				$class = apply_filters( 'ch_subpages_widget_class', $class, $subpage );
				$class = !empty( $class ) ? ' class="' . implode( ' ', $class ) . '"' : '';
				echo '<li' . $class . '><a href="' . get_permalink( $subpage->ID ) . '" rel="Permalink" title="Permalink to ' . apply_filters( 'ch_subpages_page_title', $subpage->post_title, $subpage ) . '">' . apply_filters( 'ch_subpages_page_title', $subpage->post_title, $subpage ) . '</a>';
				if (!$nest_subpages)
					echo '</li>';
				do_action( 'ch_subpages_widget_menu_extra', $subpage, $class );
				if ( $deep_subpages && in_array( $subpage->ID, $parents ) ) {
					$args = array(
						'child_of' => $subpage->ID,
						'parent' => $subpage->ID,
						'sort_column' => 'menu_order',
						'post_type' => get_post_type(),
					);
					$deeper_pages = get_pages( apply_filters( 'ch_subpages_widget_args', $args, $depth ) );
					$depth++;
					$this->build_subpages( $deeper_pages, $parents, $deep_subpages, $depth, $nest_subpages );
				}
				if ($nest_subpages)
					echo '</li>';
			}
			echo '</ul>';
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = esc_attr( $new_instance['title'] );
			$instance['title_from_parent'] = (int) $new_instance['title_from_parent'];
			$instance['title_link'] = (int) $new_instance['title_link'];
			$instance['deep_subpages'] = (int) $new_instance['deep_subpages'];
			$instance['nest_subpages'] = (int) $new_instance['nest_subpages'];
			return $instance;
		}
		function form( $instance ) {
			$defaults = array( 'title' => '', 'title_from_parent' => 0, 'title_link' => 0, 'deep_subpages' => 0, 'nest_subpages' => 0 );
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'ch' );?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
			<p>
				<input class="checkbox" type="checkbox" value="1" <?php checked( $instance['title_from_parent'], 1 ); ?> id="<?php echo $this->get_field_id( 'title_from_parent' ); ?>" name="<?php echo $this->get_field_name( 'title_from_parent' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'title_from_parent' ); ?>"><?php _e( 'Use top level page as section title.', 'ch' );?></label>
			</p>
			<p>
				<input class="checkbox" type="checkbox" value="1" <?php checked( $instance['title_link'], 1 ); ?> id="<?php echo $this->get_field_id( 'title_link' ); ?>" name="<?php echo $this->get_field_name( 'title_link' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'title_link' ); ?>"><?php _e( 'Make title a link', 'ch' ); echo '<br /><em>('; _e( 'only if "use top level page" is checked', 'ch' ); echo ')</em></label>';?>
			</p>
			<p>
				<input class="checkbox" type="checkbox" value="1" <?php checked( $instance['deep_subpages'], 1 ); ?> id="<?php echo $this->get_field_id( 'deep_subpages' ); ?>" name="<?php echo $this->get_field_name( 'deep_subpages' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'deep_subpages' ); ?>"><?php _e( 'Include the current page\'s subpages', 'ch' ); ?></label>
			</p>
			<p>
				<input class="checkbox" type="checkbox" value="1" <?php checked( $instance['nest_subpages'], 1 ); ?> id="<?php echo $this->get_field_id( 'nest_subpages' ); ?>" name="<?php echo $this->get_field_name( 'nest_subpages' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'nest_subpages' ); ?>"><?php _e( 'Nest sub-page &lt;ul&gt; inside parent &lt;li&gt;', 'ch' ); echo '<br /><em>('; _e( "only if &quot;Include the current page's subpages&quot; is checked", 'ch' ); echo ')</em></label>';?></p>
			<?php
		}
	}

	function ch_search_widget() {
		register_widget( 'CH_Search' );
	}
	add_action( 'widgets_init', 'ch_search_widget' );
	class CH_Search extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_ch_search', 'description' => __( 'Conway Hall Search', 'ch' ) );
			parent::__construct( 'chsearch', __( 'Conway Hall Search Widget', 'ch' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$asidesearch = new WP_Advanced_Search('asidesearch');
			$title = apply_filters( 'widget_title', $instance['title']);
			echo '<li class="widget new-joiners-widget">';
			echo '<h5 class="widget">'. $title .'</h5>';
			echo $asidesearch->the_form();
			echo '</li>';
		}
		function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'Search', 'ch' );
			}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		}
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}
	}

	function ch_login() {
		register_widget( 'CH_Login' );
	}
	add_action( 'widgets_init', 'ch_login' );
	class CH_Login extends WP_Widget {
		function __construct() {
			$widget_ops = array( 'classname' => 'widget_ch_login', 'description' => __( 'Conway Hall Log In', 'ch' ) );
			parent::__construct( 'chlogin', __( 'Conway Hall Log In Widget', 'ch' ), $widget_ops );
		}
		function widget( $args, $instance) {
			$title = apply_filters( 'widget_title', $instance['title']);
			echo '<li class="widget widget-login">';
			if ( is_user_logged_in() ) {
				echo '<h2 class="widgettitle">My Details</h2>';
				echo '<ul class="widget">';
				$current_user = wp_get_current_user();
				echo '<li>Hello ' . $current_user->user_firstname . '</li>';
				$allowed_roles = array('administrator', 'trustee');
				if( array_intersect($allowed_roles, $current_user->roles ) ) {
					echo '<li><a href="/ethical-society/members-area/"><i class="ch-lock" aria-hidden="true"></i> Members Area</a></li>';
				}
				if ( in_array( 'member', (array) $current_user->roles ) ) {
					echo '<li><a href="/ethical-society/trustees-area/"><i class="ch-lock" aria-hidden="true"></i> Members Area</a></li>';
				}
			} else {
				echo '<h2 class="widgettitle">'. $title .'</h2>';
				echo '<ul class="widget">';
				echo '<li>' . wp_loginout() .'</li>';
			}
			echo '</ul>';
			echo '</li>';
		}
		function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'Log In', 'ch' );
			}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		}
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}
	}

class CustomTaxonomyWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'custom_taxonomy_widget',
            'Custom Taxonomy Widget',
            array('description' => 'Allows you to create a new Sidebar widget to display terms from custom taxonomies!')
        );
    }
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $hide_empty = (isset($instance['hide_empty'])) ? true : false;
        $order_options = (isset($instance['order_options'])) ? explode('/', $instance['order_options']) : array('', '');
        $get_terms_args = array(
            'hide_empty' => $hide_empty,
            'orderby'    => (isset($order_options[0])) ? $order_options[0] : 'name',
            'order'      => (isset($order_options[1])) ? $order_options[1] : 'ASC',
            'number'     => (isset($instance['max_terms'])) ? $instance['max_terms'] : '',
            'exclude'    => (isset($instance['exclude'])) ? $instance['exclude'] : '',
            'include'    => (isset($instance['include'])) ? $instance['include'] : '',
            'pad_counts' => true
        );
        $terms = get_terms($instance['custom_taxonomies'], $get_terms_args);
        if (empty($terms) && isset($instance['hide_widget_empty']))
            return;
        echo $before_widget;
            if (! empty($title))
                echo $before_title . $title . $after_title;
            ?>
                <ul>
                    <?php foreach ($terms as $term): ?>
                        <li class="<?php echo ($term->parent != "0") ? 'taxonomy-has-parent' : null; ?>">
                            <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php
        echo $after_widget;
    }
    public function form($instance)
    {
        $field_data = array(
            'title' => array(
                'id'    => $this->get_field_id('title'),
                'name'  => $this->get_field_name('title'),
                'value' => (isset($instance['title'])) ? $instance['title'] : __('New Title')
            ),
            'taxonomies' => array(
                'name'   => $this->get_field_name('custom_taxonomies'),
                'value'  => (isset($instance['custom_taxonomies'])) ? $instance['custom_taxonomies'] : ''
            ),
            'max_terms' => array(
                'id'    => $this->get_field_id('max_terms'),
                'name'  => $this->get_field_name('max_terms'),
                'value' => (isset($instance['max_terms'])) ? $instance['max_terms'] : ''
            ),
            'hide_widget_empty' => array(
                'id'    => $this->get_field_id('hide_widget_empty'),
                'name'  => $this->get_field_name('hide_widget_empty'),
                'value' => (isset($instance['hide_widget_empty'])) ? 'true' : ''
            ),
            'hide_empty' => array(
                'id'    => $this->get_field_id('hide_empty'),
                'name'  => $this->get_field_name('hide_empty'),
                'value' => (isset($instance['hide_empty'])) ? 'true' : ''
            ),
            'order_options' => array(
                'id'    => $this->get_field_id('order_options'),
                'name'  => $this->get_field_name('order_options'),
                'value' => (isset($instance['order_options'])) ? $instance['order_options'] : 'name'
            ),
            'exclude' => array(
                'id'    => $this->get_field_id('exclude'),
                'name'  => $this->get_field_name('exclude'),
                'value' => (isset($instance['exclude'])) ? $instance['exclude'] : ''
            ),
            'include' => array(
                'id'    => $this->get_field_id('include'),
                'name'  => $this->get_field_name('include'),
                'value' => (isset($instance['include'])) ? $instance['include'] : ''
            )
        );
        $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
        ?>
            <p>
                <label for="<?php echo $field_data['title']['id']; ?>"><?php _e('Title:'); ?></label>
                <input class="widefat" id="<?php echo $field_data['title']['id']; ?>" name="<?php echo $field_data['title']['name']; ?>" type="text" value="<?php echo esc_attr($field_data['title']['value']); ?>">
            </p>


            <p style='font-weight: bold;'><?php _e('Options:'); ?></p>

            <p>
                <input id="<?php echo $field_data['hide_widget_empty']['id']; ?>" name="<?php echo $field_data['hide_widget_empty']['name']; ?>" type="checkbox" value="true" <?php checked($field_data['hide_widget_empty']['value'], 'true'); ?>>
                <label for="<?php echo $field_data['hide_widget_empty']['id']; ?>"><?php _e('Hide Widget If There Are No Terms To Be Displayd?'); ?></label>
            </p>

            <p>
                <input id="<?php echo $field_data['hide_empty']['id']; ?>" name="<?php echo $field_data['hide_empty']['name']; ?>" type="checkbox" value="true" <?php checked($field_data['hide_empty']['value'], 'true'); ?>>
                <label for="<?php echo $field_data['hide_empty']['id']; ?>"><?php _e('Hide Terms That Have No Related Posts?'); ?></label>
            </p>

            <p>
                <label for="<?php echo $field_data['order_options']['id']; ?>"><?php _e('Order Terms By:'); ?></label><br>
                <select id="<?php echo $field_data['order_options']['id']; ?>" name="<?php echo $field_data['order_options']['name']; ?>">
                    <option value="id/ASC" <?php selected($field_data['order_options']['value'], 'id/ASC'); ?>>ID Ascending</option>
                    <option value="id/DESC" <?php selected($field_data['order_options']['value'], 'id/DESC'); ?>>ID Descending</option>
                    <option value="count/ASC" <?php selected($field_data['order_options']['value'], 'count/ASC'); ?>>Count Ascending</option>
                    <option value="count/DESC" <?php selected($field_data['order_options']['value'], 'count/DESC'); ?>>Count Descending</option>
                    <option value="name/ASC" <?php selected($field_data['order_options']['value'], 'name/ASC'); ?>>Name Ascending</option>
                    <option value="name/DESC" <?php selected($field_data['order_options']['value'], 'name/DESC'); ?>>Name Descending</option>
                    <option value="slug/ASC" <?php selected($field_data['order_options']['value'], 'slug/ASC'); ?>>Slug Ascending</option>
                    <option value="slug/DESC" <?php selected($field_data['order_options']['value'], 'slug/DESC'); ?>>Slug Descending</option>
                </select>
            </p>

            <p>
                <label for="<?php echo $field_data['max_terms']['id']; ?>"><?php _e('Maximum Number Of Terms To Return:'); ?></label>
                <input class="widefat" id="<?php echo $field_data['max_terms']['id']; ?>" name="<?php echo $field_data['max_terms']['name']; ?>" type="text" value="<?php echo esc_attr($field_data['max_terms']['value']); ?>" placeholder="Keep Empty To Display All">
            </p>

            <p>
                <label for="<?php echo $field_data['exclude']['id']; ?>"><?php _e('Ids To Exclude From Being Displayed:'); ?></label>
                <input class="widefat" id="<?php echo $field_data['exclude']['id']; ?>" name="<?php echo $field_data['exclude']['name']; ?>" type="text" value="<?php echo esc_attr($field_data['exclude']['value']); ?>" placeholder="Separate ids with a comma ','">
            </p>

            <p>
                <label for="<?php echo $field_data['include']['id']; ?>"><?php _e('Only Display Terms With The Following Ids:'); ?></label>
                <input class="widefat" id="<?php echo $field_data['include']['id']; ?>" name="<?php echo $field_data['include']['name']; ?>" type="text" value="<?php echo esc_attr($field_data['include']['value']); ?>" placeholder="Separate ids with a comma ','">
            </p>


            <p style='font-weight: bold;'><?php _e('Custom Taxonomies:'); ?></p>

            <?php foreach($taxonomies as $taxonomy): ?>
                <p>
                    <input id="<?php echo $taxonomy->name; ?>" name="<?php echo $field_data['taxonomies']['name']; ?>[]" type="checkbox" value="<?php echo $taxonomy->name; ?>" <?php echo $this->is_taxonomy_checked($field_data['taxonomies']['value'], $taxonomy->name); ?>>
                    <label for="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->labels->name; ?></label>
                </p>
            <?php endforeach; ?>
        <?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['hide_widget_empty'] = $new_instance['hide_widget_empty'];
        $instance['hide_empty']        = $new_instance['hide_empty'];
        $instance['order_options']     = $new_instance['order_options'];
        $instance['max_terms']         = $new_instance['max_terms'];
        $instance['exclude']           = $new_instance['exclude'];
        $instance['include']           = $new_instance['include'];
        $instance['custom_taxonomies'] = $new_instance['custom_taxonomies'];
        return $instance;
    }
    public function is_taxonomy_checked($custom_taxonomies_checked, $taxonomy_name)
    {
        if (! is_array($custom_taxonomies_checked))
            return checked($custom_taxonomies_checked, $taxonomy_name);
        if (in_array($taxonomy_name, $custom_taxonomies_checked))
            return 'checked="checked"';
    }
}
add_action('widgets_init', 'init_custom_taxonomy_widget');
function init_custom_taxonomy_widget()
{
    register_widget('CustomTaxonomyWidget');
}
