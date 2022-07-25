<?php
/**
 * Plugin Name: Elementor Custom Addon
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 */

define( 'FEATURE_BOX_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


function register_elementor_custom_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/line-heading.php' );
	require_once( __DIR__ . '/widgets/feature-box.php' );
	require_once( __DIR__ . '/widgets/slider.php' );

	$widgets_manager->register( new \Elementor_Line_Heading_widget() );
	$widgets_manager->register( new \Feature_Box() );
	$widgets_manager->register( new \Elementor\Slider());

}

function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'wbs',
		[
			'title' => esc_html__( 'WBS', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

add_action( 'elementor/widgets/register', 'register_elementor_custom_widget' );