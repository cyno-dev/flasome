<?php
// Prevent direct access.
if (!defined('ABSPATH'))
	exit;


/**
 * Child Theme Initialize
 *
 */
class Child_Theme_Init
{
	/**
	 * Child Theme Init constructor.
	 */
	public function __construct()
	{
		add_action('after_setup_theme', array($this, 'load_child_theme_language'), 99);
		add_action('wp_enqueue_scripts', [$this, 'load_assets'], 30);
	}


	public function load_child_theme_language()
	{
		load_child_theme_textdomain('cyno', get_stylesheet_directory() . '/languages');
	}

	/**
	 * Enqueue assets
	 *
	 * @return void
	 */
	public function load_assets()
	{
		wp_enqueue_style('frontend-css', THEME_ASSETS_URI . '/css/frontend.css', array(), THEME_VERSION);
		wp_enqueue_script('frontend-js', THEME_ASSETS_URI . '/js/frontend.js', array(), THEME_VERSION, true);
	}
}

new Child_Theme_Init();
