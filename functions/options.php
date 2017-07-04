<?php
	class ch_options {
		private $key = 'ch_options';
		private $metabox_id = 'ch_option_metabox';
		protected $title = '';
		protected $options_page = '';
		private static $instance = null;
		private function __construct() {
			$this->title = __( 'Site Options', 'ch' );
		}
		public static function get_instance() {
			if( is_null( self::$instance ) ) {
				self::$instance = new self();
				self::$instance->hooks();
			}
			return self::$instance;
		}
		public function hooks() {
			add_action( 'admin_init', array( $this, 'init' ) );
			add_action( 'admin_menu', array( $this, 'add_options_page' ) );
			add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
		}
		public function init() {
			register_setting( $this->key, $this->key );
		}
		public function add_options_page() {
			$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
			add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
		}
		public function admin_page_display() {
			cmb2_metabox_form( $this->metabox_id, $this->key );
		}
		function add_options_page_metabox() {
			add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );
			$cmb = new_cmb2_box( array(
				'id'         => $this->metabox_id,
				'hookup'     => false,
				'cmb_styles' => false,
				'show_on'    => array(
					'key'   => 'options-page',
					'value' => array( $this->key, )
				),
			) );
			$cmb->add_field( array(
				'name'    => __( 'Organisation Name', 'ch' ),
				'id'      => 'org',
				'type'    => 'text',
			));
			$cmb->add_field( array(
				'name'    => __( 'Organisation Logo', 'ch' ),
				'id'      => 'orglogo',
				'type'    => 'file',
			));
			$cmb->add_field( array(
				'name'    => __( 'Error Page Title', 'ch' ),
				'id'      => '404_title',
				'type'    => 'text',
			));
			$cmb->add_field( array(
				'name'    => __( 'Error Page Content', 'ch' ),
				'id'      => '404_content',
				'type'    => 'wysiwyg',
			));
		}
		public function settings_notices( $object_id, $updated ) {
			if ( $object_id !== $this->key || empty( $updated ) ) {
				return;
			}
			add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'ch' ), 'updated' );
			settings_errors( $this->key . '-notices' );
		}
		public function __get( $field ) {
			if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
				return $this->{$field};
			}
			throw new Exception( 'Invalid property: ' . $field );
		}

	}
	function ch_options() {
		return ch_options::get_instance();
	}
	function ch_get_option( $key = '' ) {
		return cmb2_get_option( ch_options()->key, $key );
	}
	ch_options();