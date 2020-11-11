<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>

    <?php
    $colorprimary = get_field('primarfarbe', 'options');
    $colorprimarydark = get_field('primarfarbe_dunkel', 'options');
    $colorprimarylight = get_field('primarfarbe_hell', 'options');
    $logo = get_field('logo_header', 'options');
    ?>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php the_field('browser_icon', 'options'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php the_field('browser_icon', 'options'); ?>">
    <meta name="msapplication-TileColor" content="<?php echo $colorprimary; ?>">
    <meta name="msapplication-TileImage" content="<?php the_field('browser_icon', 'options'); ?>">
    <meta name="theme-color" content="<?php echo $colorprimary; ?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>

    <style>

        :root {
            --color-primary: <?php echo $colorprimary; ?>;
            --color-primary-dark: <?php echo $colorprimarydark; ?>;
            --color-primary-light: <?php echo $colorprimarylight; ?>;
        }

        .color--is-primary {
            color: <?php echo $colorprimary; ?> !important;
        }
        .color--is-primary-dark {
            color: <?php echo $colorprimarydark; ?> !important;
        }
        .color--is-primary-light {
            color: <?php echo $colorprimarylight; ?> !important;
        }
        .bg-color--is-primary {
            background-color: <?php echo $colorprimary; ?> !important;
        }
        .bg-color--is-primary-dark {
            background-color: <?php echo $colorprimarydark; ?> !important;
        }
        .bg-color--is-primary-light {
            background-color: <?php echo $colorprimarylight; ?> !important;
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">

<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>

<header id="header" class="header">

    <div class="header__inner">

        <div class="header__inner-left">

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="home-link">
                <img src="<?php echo $logo['url']; ?>" alt="Logo" width="<?php the_field('logo_header_width', 'options'); ?>" height="<?php the_field('logo_header_height', 'options'); ?>">
            </a>

        </div>

        <div class="header__inner-right">

            <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'main-navigation' ) ); ?>

            <div class="header__meta">
                <div class="meta-navigation">
                    <?php if(get_field('facebook_page', 'options')) : ?>
                        <a href="<?php the_field('facebook_page', 'options'); ?>" title="Facebook" target="_blank" rel="noreferrer">
                            <i class="icon-facebook"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(get_field('instagram_channel', 'options')) : ?>
                        <a href="<?php the_field('instagram_channel', 'options'); ?>" title="Instagram" target="_blank" rel="noreferrer">
                            <i class="icon-instagram"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(get_field('youtube_channel', 'options')) : ?>
                        <a href="<?php the_field('youtube_channel', 'options'); ?>" title="Facebook" target="_blank" rel="noreferrer">
                            <i class="icon-youtube"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div id="menutoggle" class="open-menu">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>

    </div>

</header>

<?php
if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>