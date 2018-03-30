<?php

if ( ! class_exists( 'CAP_Requirements' ) ) {
	class CAP_Requirements {

		/**
		 * Version required for the plugin to work.
		 *
		 * @var string
		 */
		protected $minimum_required_version;

		/**
		 * Text to display when plugin requirements aren't met.
		 *
		 * @var string
		 */
		protected $admin_notice_text;

		/**
		 * Plugin path - used to deactivate the plugin.
		 * Typically this is `plugin_basename( __FILE__ )`
		 *
		 * @var string
		 */
		protected $plugin_name;

		/**
		 * CAP_Requirements constructor.
		 *
		 * @param string $required_version
		 */
		public function __construct( $required_version, $plugin_basename, $message ) {

			$this->minimum_required_version = $required_version;
			$this->admin_notice_text        = $message;
			$this->plugin_name              = $plugin_basename;
		}

		/**
		 * Display admin notice
		 */
		public function admin_notice() {

			if ( current_user_can( 'deactivate_plugins' ) ) {
				echo '<div class="error"><p>';
				echo wp_kses_post( $this->admin_notice_text );
				echo '</p></div>';
			}

		}

		/**
		 * Check if the current enviroment meets the version requirements
		 *
		 * @return bool
		 */
		public function enviroment_meets_requirements() {

			if ( version_compare( phpversion(), $this->minimum_required_version, '>=' ) ) {
				return true;
			}

			if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
				add_action( 'admin_notices', array( $this, 'admin_notice' ) );
				add_action( 'admin_init', array( $this, 'auto_deactivate' ) );
			}

			return false;

		}

		/**
		 * Automatically deactivate the plugin because version requirements aren't met.
		 */
		public function auto_deactivate() {

			if ( function_exists( 'deactivate_plugins' ) && current_user_can( 'deactivate_plugins' ) ) {
				deactivate_plugins( $this->plugin_name );
			}

		}

	}
}