<?php
/*
Plugin Name: Tainacan Extra View Modes
Plugin URI: https://tainacan.org/new
Description: Adds extra viewmodes to be used by your theme
Author: tainacan
Version: 0.0.5
Text Domain: tainacan-extra-viewmodes
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/** Plugin version */
const TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION = '0.0.5';

/**
 * Here we regster the new view modes using the Tainacan plugin
 * function 'tainacan_register_view_mode'. Checking if it exists also 
 * is a way of making sure that the Tainacan itself is active.
 */
add_action( 'after_setup_theme', 'tainacan_extra_viewmodes_register_templates' );
function tainacan_extra_viewmodes_register_templates() {

	if ( function_exists( 'tainacan_register_view_mode' ) ) {

		// Registering the view modes
		tainacan_register_view_mode('mosaic-legacy', [
			'label' 			=> 'Mosaic',
			'description' 		=> __('A simple and marginless mosaic of item thumbnails.', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i><svg fill="var(--tainacan-info-color, #505253)" xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="-2 -2 48 48"><path d="M24.981 7.464H4.898c-.758 0-1.372.615-1.372 1.373v14.816c0 .758.615 1.373 1.372 1.373h20.084c.758 0 1.373-.615 1.373-1.373V8.838c0-.76-.615-1.374-1.374-1.374zM29.183 15.527h7.927c.758 0 1.373-.615 1.373-1.374h-.001V8.838c0-.76-.614-1.373-1.373-1.373h-7.926c-.757 0-1.372.614-1.372 1.373v5.315c0 .76.615 1.374 1.372 1.374zM38.482 18.336c0-.758-.614-1.373-1.373-1.373h-7.926c-.757 0-1.372.615-1.372 1.373v5.317c0 .758.615 1.373 1.372 1.373h7.927c.758 0 1.373-.615 1.373-1.373h-.001zM38.481 27.847c0-.759-.613-1.373-1.373-1.373h-7.925c-.757 0-1.373.614-1.373 1.373v5.316c0 .758.616 1.373 1.373 1.373h7.927c.758 0 1.373-.615 1.373-1.373h-.002zM24.962 26.473h-7.926c-.758 0-1.373.615-1.373 1.373v5.316c0 .759.615 1.373 1.373 1.373h7.926c.759 0 1.373-.614 1.373-1.373v-5.315c0-.759-.613-1.374-1.373-1.374zM12.815 26.473H4.89c-.758 0-1.373.615-1.373 1.373v5.316c0 .759.615 1.373 1.373 1.373h7.925c.76 0 1.374-.614 1.374-1.373v-5.315c0-.759-.615-1.374-1.374-1.374z"/></svg></i></span>',
			'dynamic_metadata' 	=> false,
			'template' 			=> __DIR__ . '/templates/view-mode-mosaic.php',
			
		]);
		tainacan_register_view_mode('frame', [
			'label' 			=> 'Frame',
			'description' 		=> __('A centered aligned, framed thumbnails view, like gallery expositions.', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i><svg fill="var(--tainacan-info-color, #505253)" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M4.188 21.65h15.624a.103.103 0 00.103-.104V2.454a.103.103 0 00-.103-.103H4.188a.103.103 0 00-.103.103v19.092c0 .057.046.103.103.103zm1.394-1.518V3.848h12.837v16.284z"/><path d="M15.921 6.242H8.079a.103.103 0 00-.103.103v11.29c0 .057.046.104.103.104h7.842a.103.103 0 00.104-.104V6.345a.103.103 0 00-.104-.103z"/></svg></i></span>',
			'dynamic_metadata' 	=> false,
			'template' 			=> __DIR__ . '/templates/view-mode-frame.php',
		]);
		tainacan_register_view_mode('exhibition', [
			'label' 			=> 'Exhibition',
			'description' 		=> __('A framed record view, where image and metadata are expanded on hover.', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i><svg fill="var(--tainacan-info-color, #505253)" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M5.761 5.138h12.42v7.43H5.762z"/><path d="M20.28 2.869H3.72v16.787h-.794v1.475h2.892v-1.475h-.794v-4.82h4.14v.85h-.567v1.815h6.806v-1.815h-.567v-.85h4.14v4.82h-.794v1.475h2.892v-1.475h-.794zM14.27 15.686H9.73v-.85h4.538zm4.99-1.985H4.741V4.003h14.462v9.698z"/></svg></i></span>',
			'dynamic_metadata' 	=> true,
			'template' 			=> __DIR__ . '/templates/view-mode-exhibition.php',
		]);
		tainacan_register_view_mode('books', [
			'label' 			=> 'Books',
			'description' 		=> __('A book cover view, made for library visualizations.', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i><svg fill="var(--tainacan-info-color, #505253)" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M16.062 4.569l-7.1-1.244c-.073-.019-.146-.019-.219-.019a1.3 1.3 0 00-.933.385L6.163 5.337a.914.914 0 00-.256.64v12.187c0 .513.366.952.878 1.043l8.454 1.482a.409.409 0 00.457-.402V8.357a1.2 1.2 0 00-1.006-1.19L7.9 5.96a.492.492 0 01-.256-.842l.805-.805a.432.432 0 01.293-.128h.073l7.1 1.244c.75.128 1.28.787 1.28 1.537v11.692c0 .22.257.311.403.165l.11-.11c.238-.238.384-.585.384-.933V6.984a2.486 2.486 0 00-2.03-2.415z"/></svg></i></span>',
			'dynamic_metadata' 	=> false,
			'template' 			=> __DIR__ . '/templates/view-mode-books.php',
		]);
		tainacan_register_view_mode('polaroid', [
			'label' 			=> 'Polaroid',
			'description' 		=> __('A framed picture view, similar to polaroid photographs.', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i><svg fill="var(--tainacan-info-color, #505253)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.362 24" width="24" height="24"><path d="M1.657 22.298h13.769V5.692H1.657zm.942-15.47h11.885v11.664H2.599z"/><path d="M8.02 1.702L7.627 5.25h.948l.257-2.314 11.813 1.313-1.29 11.593-3.531-.393v3.83l4.047.45 1.835-16.504z"/></svg></i></span>',
			'dynamic_metadata' 	=> true,
			'template' 			=> __DIR__ . '/templates/view-mode-polaroid.php',
		]);
		tainacan_register_view_mode('document', [
			'label' 			=> 'Document',
			'description' 		=> __('Records with stacked papers style, for displaying published research.', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i><svg fill="var(--tainacan-info-color, #505253)" xmlns="http://www.w3.org/2000/svg" height="24" width="24" version="1.0"><path d="M5.148 17.717l-1.554-.462 1.858-6.176zM18.92 5.638l.784.233-.938 3.118zM8.156 1.938l4.51 1.34-4.855-.192zM12.736 21.243l2.335.092-.181.603-2.269-.674-4.34.798L5.339 5.25 17.463 3.02l2.943 16.813zM6.534 4.575l.05-1.08 4.796.19zM7.44 20.021l-1.94-.076.4-8.719z"/><path d="M18.09 21.183l-2.296-.09 2.32-.427zM18.588 4.373l-.104 2.27-.4-2.29z"/></svg></i></span>',
			'dynamic_metadata' 	=> true,
			'template' 			=> __DIR__ . '/templates/view-mode-document.php',
		]);
		tainacan_register_view_mode('albums', [
			'label' 			=> 'Albums',
			'description' 		=> __('Thumbnails displayed as album covers with a disk inside.', 'tainacan-extra-viewmodes'),
			'icon' 				=> '<span class="icon"><i><svg fill="var(--tainacan-info-color, #505253)" xmlns="http://www.w3.org/2000/svg" height="24" width="24" data-name="Layer 2"><path d="M2.745 3.963a1.02 1.02 0 00-1.02 1.02v14.034a1.02 1.02 0 001.02 1.02h12.413a1.02 1.02 0 001.02-1.02V4.983a1.02 1.02 0 00-1.02-1.02zm9.58 2.886l.035 7.623h-.006c-.028.695-.445 1.024-1.063 1.23-.751.248-1.512.096-1.695-.464-.183-.56.286-1.229 1.027-1.478a1.855 1.855 0 01.623-.1v-2.643L7.313 12.36v3.144s0 .023.014.037c.185.572-.286 1.212-1.026 1.46-.74.25-1.512 0-1.695-.571-.183-.572.286-1.223 1.026-1.472a1.895 1.895 0 01.571-.111V8.9zM22.275 11.97a7.135 7.135 0 01-4.688 6.665v-4.656a2.032 2.032 0 000-3.993V5.32a7.1 7.1 0 014.673 6.65z"/><path d="M10.937 8.899v1.2l-3.45 1.18v-1.23z"/></svg></i></span>',
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
		wp_register_script('modernizr_custom', 	$baseurl . 'vendor/modernizr.custom.js', 	[], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION, false);
		wp_enqueue_script('modernizr_custom');
		wp_register_script('imagesloaded', 		$baseurl . 'vendor/imagesloaded.pkgd.js', 	[], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION, true);
		wp_enqueue_script('imagesloaded');
		wp_register_script('masonry', 			$baseurl . 'vendor/masonry.pkgd.js', 		[], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION, true);
		wp_enqueue_script('masonry');
		wp_register_script('classie',	 		$baseurl . 'vendor/classie.js', 			[], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION, true);
		wp_enqueue_script('classie');
		wp_register_script('cbpGridGallery', 	$baseurl . 'vendor/cbpGridGallery.js', 		[], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION, true);
		wp_enqueue_script('cbpGridGallery');

        // Registering the Vue Component
        $handle = 'tainacan-galllery-viewmode';
        $component_script_url = $baseurl . 'components/gallery-view-mode.bundle.js';
		$helper->register_vuejs_component($handle, $component_script_url, [ 'public' => true, 'deps' => ['wp-i18n'] ], null, true);
		
		// Registering the view mode
        tainacan_register_view_mode('gallery', [
            'label' 				=> 'Gallery',
			'description' 			=> __('A masonry view mode that displays two metadata and opens a slider lightbox.', 'tainacan-extra-viewmodes'),
			'icon' 					=> '<span class="icon"><i><svg fill="var(--tainacan-info-color, #505253)" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M8.492 6.074h7.016v11.852H8.492zM4.943 7.477h2.806v9.046H4.943zM16.251 7.477h2.807v9.046H16.25zM19.8 8.442h1.884v7.116h-1.883zM2.316 8.442h1.883v7.116H2.316z"/></svg></i></span>',
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
add_action( 'wp_enqueue_scripts', 'tainacan_extra_viewmodes_enqueue_styles' );
function tainacan_extra_viewmodes_enqueue_styles() {
	
	// Enqueue template view mode styles
	$baseurl =  plugins_url('', __FILE__);
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-mosaic',   	$baseurl . '/css/_view-mode-mosaic.css',	 [], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION );
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-frame',    	$baseurl . '/css/_view-mode-frame.css',    	 [], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-exhibition',  $baseurl . '/css/_view-mode-exhibition.css', [], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-books',    	$baseurl . '/css/_view-mode-books.css',    	 [], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-polaroid', 	$baseurl . '/css/_view-mode-polaroid.css', 	 [], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-document', 	$baseurl . '/css/_view-mode-document.css', 	 [], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-albums',   	$baseurl . '/css/_view-mode-albums.css',   	 [], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION ); 
	wp_enqueue_style( 'tainacan-extra-viewmodes-view-mode-gallery',  	$baseurl . '/css/_view-mode-gallery.css', 	 [], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION );
	
	// Most of the template view modes count on bootstrap grid system
	wp_enqueue_style( 'tainacan-extra-viewmodes-bootstrap-grid-only',  	$baseurl . '/css/bootstrap-grid-only.min.css', [], TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION );
};

/* Logics for the update warning */
function tainacan_extra_viewmodes_plugin_enqueue_admin_scripts() {
    wp_enqueue_script( 'tainacan-extra-viewmodes-plugin-notices', plugin_dir_url(__FILE__) . 'notices.js', array(), TAINACAN_EXTRA_VIEWMODES_PLUGIN_VERSION, true );
}
add_action("admin_enqueue_scripts", "tainacan_extra_viewmodes_plugin_enqueue_admin_scripts");

function tainacan_extra_viewmodes_plugin_dismiss_notification() {
    set_transient( 'tainacan_extra_viewmodes_plugin_notification_dismissed', true );
    wp_die();
}
add_action( 'wp_ajax_dismiss_notification', 'tainacan_extra_viewmodes_plugin_dismiss_notification' );

/* Adds warning for updating to Tainacan core version 0.21.0 on */
function tainacan_extra_viewmodes_plugin_deprecation_warning() {

    $screen = get_current_screen();
    
    if ( $screen->id !== 'plugins' )
        return;

    if ( !defined( 'TAINACAN_VERSION' ) )
        return;

	if ( version_compare(TAINACAN_VERSION, '0.21.0', '>=') )
		return;

    if ( get_transient( 'tainacan_extra_viewmodes_plugin_notification_dismissed' ) )
        return;

    echo '<div id="tainacan-extra-viewmodes-plugin-deprecation-notification" class="notice notice-warning is-dismissible"><p>';

    echo __('Please update your Tainacan plugin to a version greater than or equal to 0.21.0 in order to use "Tainacan Extra View Modes".', 'tainacan-extra-viewmodes');

    echo '</p></div>';

}
add_action('admin_notices', 'tainacan_extra_viewmodes_plugin_deprecation_warning');

?>
