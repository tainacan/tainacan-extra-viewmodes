<?php
/*
Plugin Name: Tainacan Extra View Modes
Plugin URI: https://tainacan.org/new
Description: Adds extra viewmodes to be used by your theme
Author: Media Lab / UFG
Version: 0.1
Text Domain: tainacan-extra-viewmodes
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/


add_action( 'after_setup_theme', function() {

	tainacan_register_view_mode('mosaic', [
		'label' => 'Mosaic',
		'description' => __('A mosaic view', 'tainacan-extra-viewmodes'),
		'icon' => '<span class="icon"><i class="mdi mdi-view-quilt mdi-24px"></i></span>',
		'dynamic_metadata' => false,
		'template' => __DIR__ . '/templates/view-mode-mosaic.php',
	]);
	tainacan_register_view_mode('frame', [
		'label' => 'Frame',
		'description' => __('A frame view, made for gallery expositions', 'tainacan-extra-viewmodes'),
		'icon' => '<span class="icon"><i class="mdi mdi-checkbox-intermediate mdi-24px"></i></span>',
		'dynamic_metadata' => false,
		'template' => __DIR__ . '/templates/view-mode-frame.php',
	]);
	tainacan_register_view_mode('gallery', [
		'label' => 'Gallery',
		'description' => __('A framed view with metadata, made for gallery expositions', 'tainacan-extra-viewmodes'),
		'icon' => '<span class="icon"><i class="mdi mdi-bank mdi-24px"></i></span>',
		'dynamic_metadata' => true,
		'template' => __DIR__ . '/templates/view-mode-gallery.php',
	]);
	tainacan_register_view_mode('books', [
		'label' => 'Books',
		'description' => __('A books view, made for library visualizations', 'tainacan-extra-viewmodes'),
		'icon' => '<span class="icon"><i class="mdi mdi-library-books mdi-24px"></i></span>',
		'dynamic_metadata' => false,
		'template' => __DIR__ . '/templates/view-mode-books.php',
	]);
	tainacan_register_view_mode('polaroid', [
		'label' => 'Polaroid',
		'description' => __('A framed picture view, similar to polaroid photographs', 'tainacan-extra-viewmodes'),
		'icon' => '<span class="icon"><i class="mdi mdi-polaroid mdi-24px"></i></span>',
		'dynamic_metadata' => true,
		'template' => __DIR__ . '/templates/view-mode-polaroid.php',
	]);
	tainacan_register_view_mode('document', [
		'label' => 'Document',
		'description' => __('A document view, for displaying papers and published research', 'tainacan-extra-viewmodes'),
		'icon' => '<span class="icon"><i class="mdi mdi-file-document mdi-24px"></i></span>',
		'dynamic_metadata' => true,
		'template' => __DIR__ . '/templates/view-mode-document.php',
	]);
	tainacan_register_view_mode('albums', [
		'label' => 'Albums',
		'description' => __('A musical albums view', 'tainacan-extra-viewmodes'),
		'icon' => '<span class="icon"><i class="mdi mdi-album mdi-24px"></i></span>',
		'dynamic_metadata' => false,
		'template' => __DIR__ . '/templates/view-mode-albums.php',
	]);
	tainacan_register_view_mode('profile', [
		'label' => 'Profile',
		'description' => __('A profile view, for displaying persons information', 'tainacan-extra-viewmodes'),
		'icon' => '<span class="icon"><i class="mdi mdi-account-card-details mdi-24px"></i></span>',
		'dynamic_metadata' => true,
		'template' => __DIR__ . '/templates/view-mode-profile.php',
	]);
	

} );

function tainacan_evm_load_plugin_textdomain() {
    load_plugin_textdomain( 'tainacan-extra-viewmodes', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'tainacan_evm_load_plugin_textdomain' );

?>
