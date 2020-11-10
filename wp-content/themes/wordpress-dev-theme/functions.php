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
    wp_register_script('wordpressdevtheme-script', get_template_directory_uri() . '/assets/dist/bundle.js', array(), '1.0.0',
        true);
    wp_register_style('swiper-style', get_template_directory_uri() . '/src/css/swiper-bundle.min.css', array(), '6.3.5');

    wp_enqueue_style('wordpressdevtheme-style');
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

function my_mce_before_init_insert_formats($init_array)
{
    $style_formats               = array(
        array(
            'title'   => 'Text Primärfarbe',
            'inline'  => 'span',
            'classes' => 'text-primary',
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
            'title'   => 'Button',
            'inline'  => 'a',
            'classes' => 'button is--primary is--large',
            'wrapper' => false,
        ),
        array(
            'title'   => 'Button schwarze Outline',
            'inline'  => 'a',
            'classes' => 'button is--ghost is--large',
            'wrapper' => false,
        )
    );
    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;
}

add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');


// ALLOW SVG IN MEDIA UPLOAD
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');


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
add_action('init', 'remove_guttenberg_from_pages', 10);
function remove_guttenberg_from_pages()
{
    remove_post_type_support('page', 'editor');
}