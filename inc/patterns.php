<?php
/**
 * Plugin Name: Mednet block patterns
 * Description: Block pattern for block editors
 * Version: 1.0.0
 * Author: Pegah Panahandeh
 *
 * @package MedNet
 */

/**
 * Register the patterns
 */
function mednet_register_block_patterns() {
	if ( function_exists( 'register_block_pattern' ) ) {
		awesome_pattern();
		tier2();
	}

}

/**
 * Define the patterns
 * test pattern
 */
function awesome_pattern() {
	register_block_pattern(
		'mednet-block-patterns/my-awesome-pattern',
		array(
			'title'       => __( 'Two buttons pattern', 'mednet-block-patterns' ),
			'description' => ( 'Two buttons side by side' ),
			'categories'  => array( 'MedNet Components' ),
			'content'     => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter mbp-buttons\"><!-- wp:button {\"backgroundColor\":\"very-dark-gray\",\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background has-very-dark-gray-background-color no-border-radius\">" . esc_html__( 'Button One', 'my-plugin' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"very-dark-gray\",\"borderRadius\":0,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-very-dark-gray-color no-border-radius\">" . esc_html__( 'Button Two', 'my-plugin' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
		)
	);
}
/**
 * Tier 2 section landing page
 */
function tier2() {
	include 'patterns/tier-2.php';
	register_block_pattern(
		'mednet-block-patterns/tier-2-page',
		array(
			'title'       => __( 'Tier 2 page', 'mednet-block-patterns' ),
			'description' => ( 'Section page with thumbnails, quicklinks and contacts.' ),
			'categories'  => array( 'MedNet Pages' ),
			'content'     => $tier2,
		)
	);
}
/**
 * Register MedNet category
 */
function mednet_register_block_categories() {
	if ( function_exists( 'register_block_pattern_category' ) ) {

		register_block_pattern_category(
			'MedNet Components',
			array( 'label' => _x( 'MedNet Components', 'Block pattern category', 'textdomain' ) )
		);
		register_block_pattern_category(
			'MedNet Pages',
			array( 'label' => _x( 'Mednet Page Patterns', 'Block pattern category', 'textdomain' ) )
		);

	}
}

add_action( 'init', 'mednet_register_block_categories' );
add_action( 'init', 'mednet_register_block_patterns' );
