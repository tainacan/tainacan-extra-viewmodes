<?php
/*
Plugin Name: Tainacan Extra View Modes
Plugin URI: https://tainacan.org/new
Description: Adds extra viewmodes to be used by your theme
Author: tainacan
Version: 0.0.1
Text Domain: tainacan-extra-viewmodes
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/**
 * Here we regster the new view modes using the Tainacan plugin
 * function 'tainacan_register_view_mode'. Checking if it exists also 
 * is a way of making sure that the Tainacan itself is active.
 */
add_action( 'after_setup_theme', 'tainacan_extra_viewmodes_register_templates' );
function tainacan_extra_viewmodes_register_templates() {

	if ( function_exists( 'tainacan_register_view_mode' ) ) {

		// Registering the view modes
		tainacan_register_view_mode('mosaic', [
			'label' 			=> 'Mosaic',
			'description' 		=> __('A mosaic view', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i class="mdi mdi-view-quilt mdi-24px"></i></span>',
			'dynamic_metadata' 	=> false,
			'template' 			=> __DIR__ . '/templates/view-mode-mosaic.php',
		]);
		tainacan_register_view_mode('frame', [
			'label' 			=> 'Frame',
			'description' 		=> __('A frame view, made for gallery expositions', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i class="mdi mdi-checkbox-intermediate mdi-24px"></i></span>',
			'dynamic_metadata' 	=> false,
			'template' 			=> __DIR__ . '/templates/view-mode-frame.php',
		]);
		tainacan_register_view_mode('exhibition', [
			'label' 			=> 'Exhibition',
			'description' 		=> __('A framed view with metadata, made for gallery expositions', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i class="mdi mdi-bank mdi-24px"></i></span>',
			'dynamic_metadata' 	=> true,
			'template' 			=> __DIR__ . '/templates/view-mode-exhibition.php',
		]);
		tainacan_register_view_mode('books', [
			'label' 			=> 'Books',
			'description' 		=> __('A books view, made for library visualizations', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i class="mdi mdi-library-books mdi-24px"></i></span>',
			'dynamic_metadata' 	=> false,
			'template' 			=> __DIR__ . '/templates/view-mode-books.php',
		]);
		tainacan_register_view_mode('polaroid', [
			'label' 			=> 'Polaroid',
			'description' 		=> __('A framed picture view, similar to polaroid photographs', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i class="mdi mdi-polaroid mdi-24px"></i></span>',
			'dynamic_metadata' 	=> true,
			'template' 			=> __DIR__ . '/templates/view-mode-polaroid.php',
		]);
		tainacan_register_view_mode('document', [
			'label' 			=> 'Document',
			'description' 		=> __('A document view, for displaying papers and published research', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i class="mdi mdi-file-document mdi-24px"></i></span>',
			'dynamic_metadata' 	=> true,
			'template' 			=> __DIR__ . '/templates/view-mode-document.php',
		]);
		tainacan_register_view_mode('albums', [
			'label' 			=> 'Albums',
			'description' 		=> __('A musical albums view', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i class="mdi mdi-album mdi-24px"></i></span>',
			'dynamic_metadata' 	=> false,
			'template' 			=> __DIR__ . '/templates/view-mode-albums.php',
		]);
	}
};

/**
 * View modes that are made of Vuejs components instead of php
 * templates have to be registered first on the plugin
 */
add_action("tainacan-register-vuejs-component", "tainacan_extra_viewmodes_register_components");
function tainacan_extra_viewmodes_register_components($helper) {

    if ( function_exists( 'tainacan_register_view_mode' ) ) {
		
		// Enqueues necessary third party or modified libraries to this view mode
		$baseurl =  plugin_dir_url(__FILE__);
		wp_register_script('modernizr_custom', 	$baseurl . 'vendor/modernizr.custom.js', [], false, false);
		wp_enqueue_script('modernizr_custom');
		wp_register_script('imagesloaded', 		$baseurl . 'vendor/imagesloaded.pkgd.js', [], false, true);
		wp_enqueue_script('imagesloaded');
		wp_register_script('masonry', 			$baseurl . 'vendor/masonry.pkgd.js', [], false, true);
		wp_enqueue_script('masonry');
		wp_register_script('classie',	 		$baseurl . 'vendor/classie.js', [], false, true);
		wp_enqueue_script('classie');
		wp_register_script('cbpGridGallery', 	$baseurl . 'vendor/cbpGridGallery.js', [], false, true);
		wp_enqueue_script('cbpGridGallery');

        // Registering the Vue Component
        $handle = 'tainacan-galllery-viewmode';
        $component_script_url = $baseurl . 'components/gallery-view-mode.bundle.js';
		$helper->register_vuejs_component($handle, $component_script_url, [ 'public' => true, 'deps' => ['wp-i18n'] ], null, true);
		
		// Registering the view mode
        tainacan_register_view_mode('gallery', [
            'label' 				=> 'Gallery',
			'description' 			=> __('A masonry view mode that displays two metadata and opens a slider lighbox', 'tainacan-extra-viewmodes'),
            'type' 					=> 'component',
			'component' 			=> 'view-mode-gallery',
			'dynamic_metadata' 		=> true,
			'implements_skeleton' 	=> true
        ]);
    }
}

/**
 * Template view modes have their style separated from the php file
 * so we enqueue them here.
 */
add_action( 'wp_print_scripts', 'tainacan_extra_viewmodes_enqueue_styles' );
function tainacan_extra_viewmodes_enqueue_styles() {
	
	// Enqueue template view mode styles
	$baseurl =  plugins_url('', __FILE__);
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-mosaic',   	$baseurl . '/css/_view-mode-mosaic.css'   );
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-frame',    	$baseurl . '/css/_view-mode-frame.css'    ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-exhibition',  $baseurl . '/css/_view-mode-exhibition.css'  ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-books',    	$baseurl . '/css/_view-mode-books.css'    ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-polaroid', 	$baseurl . '/css/_view-mode-polaroid.css' ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-document', 	$baseurl . '/css/_view-mode-document.css' ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-albums',   	$baseurl . '/css/_view-mode-albums.css'   ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-gallery',  	$baseurl . '/css/_view-mode-gallery.css'  );
};

?>
