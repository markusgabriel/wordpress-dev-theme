<?php
add_action('after_setup_theme', 'wordpress_dev_theme_setup');
if ( ! function_exists('wordpress_dev_theme_setup')):
    function wordpress_dev_theme_setup()
    {
        load_theme_textdomain('wordpress_dev_theme', get_template_directory() . '/languages');
        $locale      = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";

        if (is_readable($locale_file)) {
            require_once($locale_file);
        }
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support( 'woocommerce' );
    }

endif; // wordpress_dev_theme_setup


// IMAGE SIZES
add_action('init', 'remove_then_add_image_sizes');
function remove_then_add_image_sizes()
{
    remove_image_size('medium');
    remove_image_size('large');
    remove_image_size('thumbnail');
    add_image_size('full');
    add_image_size('image_1200', 1200);
    add_image_size('image_800', 800);
    add_image_size('image_600', 600);
}


// MENU AREAS
function wordpress_dev_theme_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Haupt-Navigation', 'wordpress_dev_theme'),
            'footer-menu' => __('Footer Navigation', 'wordpress_dev_theme')
        )
    );
}

add_action('init', 'wordpress_dev_theme_menus');


// SIDEBARS
function wordpress_dev_theme_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Footer Widget', 'wordpress_dev_theme'),
        'id'            => 'footer-widget',
        'description'   => __('Erste Footer Spalte', 'wordpress_dev_theme'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ));
}

add_action('widgets_init', 'wordpress_dev_theme_widgets_init');


// SCRIPT QUEUE
if ( ! is_admin()) {
    add_action("wp_enqueue_scripts", "wordpress_dev_theme_script_enqueue", 11);
}
function wordpress_dev_theme_script_enqueue()
{
    wp_deregister_script('jquery');
    wp_register_style('wordpressdevtheme-style', get_template_directory_uri() . '/assets/dist/bundle.css', array(), '1.1.0', false);
    wp_register_script('swiper-script', get_template_directory_uri() . '/assets/dist/swiper-bundle.min.js', array(), '6.3.2', true);
    wp_register_script('wordpressdevtheme-script', get_template_directory_uri() . '/assets/dist/bundle.js', array(), '1.0.0', true);
    wp_register_style('swiper-style', get_template_directory_uri() . '/src/css/swiper-bundle.min.css', array(), '6.3.5');

    wp_enqueue_style('wordpressdevtheme-style');
    wp_enqueue_script('swiper-script');
    wp_enqueue_script('wordpressdevtheme-script');
    wp_enqueue_style('swiper-style');
}


// PAGINATION
function wordpress_dev_theme_custom_pagination($numpages = '', $pagerange = '', $paged = '')
{

    if (empty($pagerange)) {
        $pagerange = 5;
    }

    /**
     * This first part of our function is a fallback
     * for custom pagination inside a regular loop that
     * uses the global $paged and global $wp_query variables.
     *
     * It's good because we can now override default pagination
     * in our theme, and use this function in default queries
     * and custom queries.
     */
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if ( ! $numpages) {
            $numpages = 1;
        }
    }

    /**
     * We construct the pagination arguments to enter into our paginate_links
     * function.
     */
    $pagination_args = array(
        'base'         => get_pagenum_link(1) . '%_%',
        'format'       => 'page/%#%',
        'total'        => $numpages,
        'current'      => $paged,
        'show_all'     => false,
        'end_size'     => 1,
        'mid_size'     => 8,
        'prev_next'    => true,
        'prev_text'    => __('&laquo;'),
        'next_text'    => __('&raquo;'),
        'type'         => 'plain',
        'add_args'     => false,
        'add_fragment' => ''
    );

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
        echo "<nav class='navigation pagination'>";
        echo "<div class='nav-links'>";
        //*echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
        echo $paginate_links;
        echo "</div>";
        echo "</nav>";
    }

}


// WYSIWYG styles
add_filter('mce_buttons_2', 'fb_mce_editor_buttons');
function fb_mce_editor_buttons($buttons)
{

    array_unshift($buttons, 'styleselect');

    return $buttons;
}

function my_mce_before_init_insert_formats( $init_array ) {
    $style_formats = array(
        array(
            'title' => 'Text Formatierungen',
            'items' => array(
                array(
                    'title'   => 'Text Stil H1',
                    'classes' => 'h1',
                    'selector' => 'h1, h2, h3, h4, a',
                    'wrapper' => false,
                ),
                array(
                    'title'   => 'Text Stil H2',
                    'classes' => 'h2',
                    'selector' => 'h1, h2, h3, h4, a',
                    'wrapper' => false,
                ),
                array(
                    'title'   => 'Text Stil H3',
                    'classes' => 'h3',
                    'selector' => 'h1, h2, h3, h4, a',
                    'wrapper' => false,
                ),
                array(
                    'title'   => 'Text Stil H4',
                    'classes' => 'h4',
                    'selector' => 'h1, h2, h3, h4, a',
                    'wrapper' => false,
                ),
                array(
                    'title'   => 'Text Medium',
                    'inline'  => 'span',
                    'classes' => 'font-size-md',
                    'wrapper' => false,
                ),
                array(
                    'title'   => 'Text Large',
                    'inline'  => 'span',
                    'classes' => 'font-size-lg',
                    'wrapper' => false,
                ),
                array(
                    'title'   => 'Text XLarge',
                    'inline'  => 'span',
                    'classes' => 'font-size-xl',
                    'wrapper' => false,
                ),
                array(
                    'title'   => 'Secondary Font',
                    'inline'  => 'span',
                    'classes' => 'font-secondary',
                    'wrapper' => false,
                ),
            ),
        ),
        array(
            'title' => 'Farben',
            'items' => array(
                array(
                    'title' => 'Textfarbe Standard',
                    'inline' => 'span',
                    'classes' => 'text-color--default'
                ),
                array(
                    'title' => 'Textfarbe Hauptfarbe',
                    'inline' => 'span',
                    'classes' => 'text-color--primary'
                )
            )
        ),
        array(
            'title' => 'Buttons und Links',
            'items' => array(
                array(
                    'title'   => 'Button Primary',
                    'inline'  => 'a',
                    'classes' => 'button is--primary is--large',
                    'wrapper' => false,
                ),
                array(
                    'title'   => 'Button Secondary',
                    'inline'  => 'a',
                    'classes' => 'button is--secondary is--large',
                    'wrapper' => false,
                )
            )
        ),
        array(
            'title' => 'Icons',
            'items' => array(
                array(
                    'title' => 'Instagram',
                    'inline' => 'span',
                    'classes' => 'icon-instagram',
                    'wrapper' => false
                ),
                array(
                    'title' => 'Facebook',
                    'inline' => 'span',
                    'classes' => 'icon-facebook',
                    'wrapper' => false
                ),
            )
        )
    );
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


// ALLOW SVG IN MEDIA UPLOAD
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function kb_ignore_upload_ext($checked, $file, $filename, $mimes){

    if(!$checked['type']){
        $wp_filetype = wp_check_filetype( $filename, $mimes );
        $ext = $wp_filetype['ext'];
        $type = $wp_filetype['type'];
        $proper_filename = $filename;

        if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
            $ext = $type = false;
        }

        $checked = compact('ext','type','proper_filename');
    }

    return $checked;
}

add_filter('wp_check_filetype_and_ext', 'kb_ignore_upload_ext', 10, 4);


// DEACTIVATE ADMIN BAR
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar()
{
    if (current_user_can('administrator') || is_admin()) {
        show_admin_bar(false);
    }
}


// OPTIONS PAGE
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

    // Check function exists.
    if (function_exists('acf_add_options_page')) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title' => __('Allgemeine Infos'),
            'menu_title' => __('Allgemeine Infos'),
            'menu_slug'  => 'general-settings',
            'capability' => 'edit_posts',
            'redirect'   => false
        ));
    }
}


// HIDE GUTENBERG EDITOR
add_action( 'init', 'remove_guttenberg_from_pages', 10 );
function remove_guttenberg_from_pages() {
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'post', 'editor' );
}


// HIDE DASHBOARD WIDGETS
add_action( 'wp_dashboard_setup', 'bt_remove_dashboard_widgets' );
function bt_remove_dashboard_widgets() {

    remove_meta_box( 'dashboard_primary','dashboard','side' ); // WordPress.com Blog
    remove_meta_box( 'dashboard_plugins','dashboard','normal' ); // Plugins
    remove_meta_box( 'dashboard_right_now','dashboard', 'normal' ); // Right Now
    remove_action( 'welcome_panel','wp_welcome_panel' ); // Welcome Panel
    remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg
    remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
    remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
    remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
    remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
    //remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
    remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
    remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
    //remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
}


// HIDE MENU ITEMS IN BACKEND FOR SPECIFIC USER ROLE
function hide_menu() {
    $user = wp_get_current_user();

    // Check if the current user is an Editor
    if ( in_array( 'wpseo_manager', (array) $user->roles ) ) {

        // They're an editor, so grant the edit_theme_options capability if they don't have it
        if ( ! current_user_can( 'edit_theme_options' ) ) {
            $role_object = get_role( 'wpseo_manager' );
            $role_object->add_cap( 'edit_theme_options' );
        }

        // Hide the Themes page
        remove_submenu_page( 'themes.php', 'themes.php' );

        // Hide the Widgets page
        remove_submenu_page( 'themes.php', 'widgets.php' );

        // Hide the Customize page
        remove_submenu_page( 'themes.php', 'customize.php' );

        // Remove Customize from the Appearance submenu
        global $submenu;
        unset($submenu['themes.php'][6]);
    }

    if ( in_array( 'editor', (array) $user->roles ) ) {

        // They're an editor, so grant the edit_theme_options capability if they don't have it
        if ( ! current_user_can( 'edit_theme_options' ) ) {
            $role_object = get_role( 'editor' );
            $role_object->add_cap( 'edit_theme_options' );
        }

        // Hide the Themes page
        remove_submenu_page( 'themes.php', 'themes.php' );

        // Hide the Widgets page
        remove_submenu_page( 'themes.php', 'widgets.php' );

        // Hide the Customize page
        remove_submenu_page( 'themes.php', 'customize.php' );

        // Remove Customize from the Appearance submenu
        global $submenu;
        unset($submenu['themes.php'][6]);
    }
}

add_action('admin_menu', 'hide_menu', 10);


// WOOCOMMERCE
/*
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 350,
        'single_image_width' => 555,
    ) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

require_once(get_stylesheet_directory() . '/includes/wc-template-functions.php');
require_once(get_stylesheet_directory() . '/includes/wc-template-hooks.php');

// DEACTIVATE WOOCOMMERCE STYLESHEETS
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_action( 'wp', 'tu_disable_wc_lightbox', 20 );
function tu_disable_wc_lightbox() {
    remove_theme_support( 'wc-product-gallery-zoom');
    remove_theme_support( 'wc-product-gallery-lightbox');
}


add_action( 'get_header', 'sk_conditionally_remove_wc_assets' );
function sk_conditionally_remove_wc_assets() {

    // if WooCommerce is not active, abort.
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    // if this is a WooCommerce related page, abort.
    if ( is_woocommerce() || is_cart() || is_checkout() || is_page( array( 'my-account' ) ) ) {
        return;
    }

    remove_action( 'wp_enqueue_scripts', [ WC_Frontend_Scripts::class, 'load_scripts' ] );
    remove_action( 'wp_print_scripts', [ WC_Frontend_Scripts::class, 'localize_printed_scripts' ], 5 );
    remove_action( 'wp_print_footer_scripts', [ WC_Frontend_Scripts::class, 'localize_printed_scripts' ], 5 );

}


add_filter( 'woocommerce_default_address_fields' , 'bbloomer_rename_address_placeholders_checkout', 9999 );

function bbloomer_rename_address_placeholders_checkout( $address_fields ) {
    $address_fields['address_1']['label'] = 'Straße & Hausnummer';
    $address_fields['address_1']['placeholder'] = 'Straße';
    $address_fields['address_2']['label'] = 'Hausnummer';
    $address_fields['address_2']['placeholder'] = 'Hausnummer';
    return $address_fields;
}


//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css()
{
    wp_deregister_style('wc-block-vendors-style-css');
    wp_deregister_style('wp-block-library');
    wp_deregister_style('wp-block-library-theme');
    wp_deregister_style('wc-blocks-style-css');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-vendors-style-css');
    wp_dequeue_style('wc-blocks-style-css'); // Remove WooCommerce block CSS
}

add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);


function ca_deregister_woocommerce_block_styles() {
    wp_deregister_style( 'wc-blocks-style' );
    wp_dequeue_style( 'wc-blocks-style' );
}
add_action( 'enqueue_block_assets', 'ca_deregister_woocommerce_block_styles' );
*/
