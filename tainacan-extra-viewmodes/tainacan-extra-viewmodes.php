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
		tainacan_register_view_mode('gallery', [
			'label' 			=> 'Gallery',
			'description' 		=> __('A framed view with metadata, made for gallery expositions', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i class="mdi mdi-bank mdi-24px"></i></span>',
			'dynamic_metadata' 	=> true,
			'template' 			=> __DIR__ . '/templates/view-mode-gallery.php',
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
		tainacan_register_view_mode('profile', [
			'label' 			=> 'Profile',
			'description' 		=> __('A profile view, for displaying persons information', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i class="mdi mdi-account-card-details mdi-24px"></i></span>',
			'dynamic_metadata' 	=> true,
			'template' 			=> __DIR__ . '/templates/view-mode-profile.php',
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
		
		wp_register_script('modernizr_custom', plugin_dir_url(__FILE__)  . 'components/modernizr.custom.js', [], false, false);
		wp_enqueue_script('modernizr_custom');
		wp_register_script('imagesloaded', plugin_dir_url(__FILE__)  . 'components/imagesloaded.pkgd.js', [], false, true);
		wp_enqueue_script('imagesloaded');
		wp_register_script('masonry', plugin_dir_url(__FILE__)  . 'components/masonry.pkgd.js', [], false, true);
		wp_enqueue_script('masonry');
		wp_register_script('classie', plugin_dir_url(__FILE__)  . 'components/classie.js', [], false, true);
		wp_enqueue_script('classie');
		wp_register_script('cbpGridGallery', plugin_dir_url(__FILE__)  . 'components/cbpGridGallery.js', [], false, true);
		wp_enqueue_script('cbpGridGallery');

        // Registering the Vue Component
        $handle = 'tainacan-extra-viewmode';
        $component_script_url = plugin_dir_url(__FILE__) . 'components/extra-view-mode.bundle.js';
		$helper->register_vuejs_component($handle, $component_script_url, [ 'public' => true, 'deps' => ['wp-i18n'] ], null, true);
		
		// Registering the view mode
        tainacan_register_view_mode('extra-test', [
            'label' 	=> 'Teste',
            'type' 		=> 'component',
			'component' => 'view-mode-extra-test',
			'dynamic_metadata' 	=> true,
			'implements_skeleton' => true
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
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-mosaic',   $baseurl . '/css/_view-mode-mosaic.css'   );
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-frame',    $baseurl . '/css/_view-mode-frame.css'    ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-gallery',  $baseurl . '/css/_view-mode-gallery.css'  ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-books',    $baseurl . '/css/_view-mode-books.css'    ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-polaroid', $baseurl . '/css/_view-mode-polaroid.css' ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-document', $baseurl . '/css/_view-mode-document.css' ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-albums',   $baseurl . '/css/_view-mode-albums.css'   ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-profile',  $baseurl . '/css/_view-mode-profile.css'  );
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-test',  $baseurl . '/css/cbpGridGallery.css'  );
};

?>
