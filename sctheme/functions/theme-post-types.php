<?php

/**
	* Theme Custom Post Types
	*
	* @package SCTheme
	* @author Sean Creagh
*/



/* --- ******************** ******************** ******************** --- */

/* --- Clients Post Type & Metaboxes --- */

/* --- ******************** ******************** ******************** --- */

function clients_post_type() {

	$labels = array(
		'name' => 'Clients',
		'singular_name' => 'Client',
		'add_new' => 'Add Client',
		'all_items' => 'All Clients',
		'add_new_item' => 'Add New Client',
		'edit_item' => 'Edit Client',
		'new_item' => 'New Client',
		'view_item' => 'View Client',
		'search_item' => 'Search Clients',
		'not_found' => 'No clients found.',
		'not_found_in_trash' => 'No clients found in trash.',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revision' ),
		'menu_position' => 21,
		'exclude_from_search' => false,
		'register_meta_box_cb' => 'client_url_metabox'
	);

	register_post_type( 'clients', $args );

}

add_action( 'init', 'clients_post_type' );

function client_url_metabox() {

	add_meta_box( 'client_url', 'Client Website URL', 'client_url_callback', 'clients', 'normal', 'high' );

}

function client_url_callback( $post ) {

	wp_nonce_field( 'save_client_url', 'client_url_nonce' );
	$value = get_post_meta( $post->ID, '_client_url_key', true );

	echo '<style>label, input, input { display: block; margin-bottom: 10px; }</style>';
	echo '<label for="client_url_field">Client Website URL </label>';
	echo '<input type="url" id="client_url_field" name="client_url_field" value="' . esc_attr( $value ) . '" />';

}

function save_client_url( $post_id ) {

	if ( ! isset( $_POST[ 'client_url_nonce' ] ) )
		return;

	if ( ! wp_verify_nonce( $_POST[ 'client_url_nonce' ], 'save_client_url' ) )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( ! current_user_can( 'edit_post', $post_id ) )
		return;

	if ( ! isset( $_POST[ 'client_url_field' ] ) )
		return;

	$my_data = sanitize_text_field( $_POST[ 'client_url_field' ] );
	update_post_meta( $post_id, '_client_url_key', $my_data );

}

add_action( 'save_post', 'save_client_url' );



/* --- ******************** ******************** ******************** --- */

/* --- Portfolio Post Type --- */

/* --- ******************** ******************** ******************** --- */

function portfolio_post_type() {

	$labels = array(
		'name' => 'Portfolio',
		'singular_name' => 'Portfolio',
		'add_new' => 'Add Portfolio Item',
		'all_items' => 'All Portfolio Items',
		'add_new_item' => 'Add New Portfolio Item',
		'edit_item' => 'Edit Portfolio Item',
		'new_item' => 'New Portfolio Item',
		'view_item' => 'View Portfolio Item',
		'search_item' => 'Search Portfolio',
		'not_found' => 'No portfolio items found.',
		'not_found_in_trash' => 'No portfolio items found in trash.',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revision' ),
		'taxonomies' => array( 'category', 'post_tag' ),
		'menu_position' => 22,
		'exclude_from_search' => false
	);

	register_post_type( 'portfolio', $args );

}

add_action( 'init', 'portfolio_post_type' );



/* --- ******************** ******************** ******************** --- */

/* --- Team Members Post Type & Metaboxes --- */

/* --- ******************** ******************** ******************** --- */

function team_members_post_type() {

	$labels = array(
		'name' => 'Team Members',
		'singular_name' => 'Team Member',
		'add_new' => 'Add Team Member',
		'all_items' => 'All Team Members',
		'add_new_item' => 'Add New Team Member',
		'edit_item' => 'Edit Team Member',
		'new_item' => 'New Team Member',
		'view_item' => 'View Team Member',
		'search_item' => 'Search Team Members',
		'not_found' => 'No team members found.',
		'not_found_in_trash' => 'No team members found in trash.',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revision' ),
		'menu_position' => 23,
		'exclude_from_search' => false,
		'register_meta_box_cb' => 'team_members_metaboxes'

	);

	register_post_type( 'team-members', $args );

}

add_action( 'init', 'team_members_post_type' );

function team_members_metaboxes() {

	add_meta_box( 'team_member_name', 'Team Members Name', 'team_member_name_callback', 'team-members', 'normal', 'high' );
	add_meta_box( 'team_member_position', 'Team Members Position', 'team_member_position_callback', 'team-members', 'normal', 'high' );
	add_meta_box( 'team_member_facebook', 'Team Members Facebook URL', 'team_member_facebook_callback', 'team-members', 'normal', 'high' );
	add_meta_box( 'team_member_twitter', 'Team Members Twitter URL', 'team_member_twitter_callback', 'team-members', 'normal', 'high' );
	add_meta_box( 'team_member_linkedin', 'Team Members LinkedIn URL', 'team_member_linkedin_callback', 'team-members', 'normal', 'high' );

}

function team_member_name_callback( $post ) {

	wp_nonce_field( 'save_team_member_data', 'team_member_name_nonce' );
	$value = get_post_meta( $post->ID, '_team_member_name_key', true );

	echo '<style>label, input, input { display: block; margin-bottom: 10px; }</style>';
	echo '<label for="team_member_name_field">Team Members Name </label>';
	echo '<input type="text" id="team_member_name_field" name="team_member_name_field" value="' . esc_attr( $value ) . '" />';

}

function team_member_position_callback( $post ) {

	wp_nonce_field( 'save_team_member_data', 'team_member_position_nonce' );
	$value = get_post_meta( $post->ID, '_team_member_position_key', true );

	echo '<style>label, input, input { display: block; margin-bottom: 10px; }</style>';
	echo '<label for="team_member_position_field">Team Members Position </label>';
	echo '<input type="text" id="team_member_position_field" name="team_member_position_field" value="' . esc_attr( $value ) . '" />';

}

function team_member_facebook_callback( $post ) {

	wp_nonce_field( 'save_team_member_data', 'team_member_facebook_nonce' );
	$value = get_post_meta( $post->ID, '_team_member_facebook_key', true );

	echo '<style>label, input, input { display: block; margin-bottom: 10px; }</style>';
	echo '<label for="team_member_facebook_field">Team Members Facebook URL </label>';
	echo '<input type="url" id="team_member_facebook_field" name="team_member_facebook_field" value="' . esc_attr( $value ) . '" />';

}

function team_member_twitter_callback( $post ) {

	wp_nonce_field( 'save_team_member_data', 'team_member_twitter_nonce' );
	$value = get_post_meta( $post->ID, '_team_member_twitter_key', true );

	echo '<style>label, input, input { display: block; margin-bottom: 10px; }</style>';
	echo '<label for="team_member_twitter_field">Team Members Twitter URL </label>';
	echo '<input type="url" id="team_member_twitter_field" name="team_member_twitter_field" value="' . esc_attr( $value ) . '" />';

}

function team_member_linkedin_callback( $post ) {

	wp_nonce_field( 'save_team_member_data', 'team_member_linkedin_nonce' );
	$value = get_post_meta( $post->ID, '_team_member_linkedin_key', true );

	echo '<style>label, input, input { display: block; margin-bottom: 10px; }</style>';
	echo '<label for="team_member_linkedin_field">Team Members LinkedIn URL </label>';
	echo '<input type="url" id="team_member_linkedin_field" name="team_member_linkedin_field" value="' . esc_attr( $value ) . '" />';

}

function save_team_member_data( $post_id ) {

	if ( ! isset( $_POST[ 'team_member_name_nonce' ] ) )
		return;

	if ( ! wp_verify_nonce( $_POST[ 'team_member_name_nonce' ], 'save_team_member_data' ) )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( ! current_user_can( 'edit_post', $post_id ) )
		return;

	if ( ! isset( $_POST[ 'team_member_name_field' ] ) )
		return;

	$name = sanitize_text_field( $_POST[ 'team_member_name_field' ] );
	update_post_meta( $post_id, '_team_member_name_key', $name );

	if ( ! isset( $_POST[ 'team_member_position_nonce' ] ) )
		return;

	if ( ! wp_verify_nonce( $_POST[ 'team_member_position_nonce' ], 'save_team_member_data' ) )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( ! current_user_can( 'edit_post', $post_id ) )
		return;

	if ( ! isset( $_POST[ 'team_member_position_field' ] ) )
		return;

	$position = sanitize_text_field( $_POST[ 'team_member_position_field' ] );
	update_post_meta( $post_id, '_team_member_position_key', $position );

	if ( ! isset( $_POST[ 'team_member_facebook_nonce' ] ) )
		return;

	if ( ! wp_verify_nonce( $_POST[ 'team_member_facebook_nonce' ], 'save_team_member_data' ) )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( ! current_user_can( 'edit_post', $post_id ) )
		return;

	if ( ! isset( $_POST[ 'team_member_facebook_field' ] ) )
		return;

	$facebook = sanitize_text_field( $_POST[ 'team_member_facebook_field' ] );
	update_post_meta( $post_id, '_team_member_facebook_key', $facebook );

	if ( ! isset( $_POST[ 'team_member_twitter_nonce' ] ) )
		return;

	if ( ! wp_verify_nonce( $_POST[ 'team_member_twitter_nonce' ], 'save_team_member_data' ) )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( ! current_user_can( 'edit_post', $post_id ) )
		return;

	if ( ! isset( $_POST[ 'team_member_twitter_field' ] ) )
		return;

	$twitter = sanitize_text_field( $_POST[ 'team_member_twitter_field' ] );
	update_post_meta( $post_id, '_team_member_twitter_key', $twitter );

	if ( ! isset( $_POST[ 'team_member_linkedin_nonce' ] ) )
		return;

	if ( ! wp_verify_nonce( $_POST[ 'team_member_linkedin_nonce' ], 'save_team_member_data' ) )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( ! current_user_can( 'edit_post', $post_id ) )
		return;

	if ( ! isset( $_POST[ 'team_member_linkedin_field' ] ) )
		return;

	$linkedin = sanitize_text_field( $_POST[ 'team_member_linkedin_field' ] );
	update_post_meta( $post_id, '_team_member_linkedin_key', $linkedin );

}

add_action( 'save_post', 'save_team_member_data' );



/* --- ******************** ******************** ******************** --- */

/* --- Testimonials Post Type & Metaboxes --- */

/* --- ******************** ******************** ******************** --- */

function testimonials_post_type() {

	$labels = array(
		'name' => 'Testimonials',
		'singular_name' => 'Testimonial',
		'add_new' => 'Add Testimonial',
		'all_items' => 'All Testimonials',
		'add_new_item' => 'Add New Testimonial',
		'edit_item' => 'Edit Testimonial',
		'new_item' => 'New Testimonial',
		'view_item' => 'View Testimonial',
		'search_item' => 'Search Testimonials',
		'not_found' => 'No testimonials found.',
		'not_found_in_trash' => 'No testimonials found in trash.',
		'parent_item_colon' => 'Parent Item'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revision' ),
		'menu_position' => 24,
		'exclude_from_search' => false,
		'register_meta_box_cb' => 'testimonials_metaboxes'

	);

	register_post_type( 'testimonials', $args );

}

add_action( 'init', 'testimonials_post_type' );

function testimonials_metaboxes() {

	add_meta_box( 'testimonial_author', 'Testimonial Author', 'testimonial_author_callback', 'testimonials', 'normal', 'high' );
	add_meta_box( 'testimonial_company_url', 'Company Website URL', 'testimonial_company_url_callback', 'testimonials', 'normal', 'high' );

}

function testimonial_author_callback( $post ) {

	wp_nonce_field( 'save_testimonial_data', 'testimonial_author_nonce' );
	$value = get_post_meta( $post->ID, '_testimonial_author_key', true );

	echo '<style>label, input, input { display: block; margin-bottom: 10px; }</style>';
	echo '<label for="testimonial_author_field">Testimonial Author </label>';
	echo '<input type="text" id="testimonial_author_field" name="testimonial_author_field" value="' . esc_attr( $value ) . '" />';

}

function testimonial_company_url_callback( $post ) {

	wp_nonce_field( 'save_testimonial_data', 'testimonial_company_url_nonce' );
	$value = get_post_meta( $post->ID, '_testimonial_company_url_key', true );

	echo '<style>label, input, input { display: block; margin-bottom: 10px; }</style>';
	echo '<label for="testimonial_company_url_field">Company Website URL </label>';
	echo '<input type="url" id="testimonial_company_url_field" name="testimonial_company_url_field" value="' . esc_attr( $value ) . '" />';

}

function save_testimonial_data( $post_id ) {

	if ( ! isset( $_POST[ 'testimonial_author_nonce' ] ) )
		return;

	if ( ! wp_verify_nonce( $_POST[ 'testimonial_author_nonce' ], 'save_testimonial_data' ) )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( ! current_user_can( 'edit_post', $post_id ) )
		return;

	if ( ! isset( $_POST[ 'testimonial_author_field' ] ) )
		return;

	$author = sanitize_text_field( $_POST[ 'testimonial_author_field' ] );
	update_post_meta( $post_id, '_testimonial_author_key', $author );

	if ( ! isset( $_POST[ 'testimonial_company_url_nonce' ] ) )
		return;

	if ( ! wp_verify_nonce( $_POST[ 'testimonial_company_url_nonce' ], 'save_testimonial_data' ) )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( ! current_user_can( 'edit_post', $post_id ) )
		return;

	if ( ! isset( $_POST[ 'testimonial_company_url_field' ] ) )
		return;

	$url = sanitize_text_field( $_POST[ 'testimonial_company_url_field' ] );
	update_post_meta( $post_id, '_testimonial_company_url_key', $url );

}

add_action( 'save_post', 'save_testimonial_data' );

?>