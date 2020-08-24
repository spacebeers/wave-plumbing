<?php $page_tile = get_the_title($post->ID); ?>
<?php
    $has_banner = get_field('show_image_banner', $post->ID) ? true : false;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" id="viewport" content="width=device-width,minimum-scale=1.0,initial-scale=1.0"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <title><?php echo $page_tile; ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class($page_class); ?>>
    <header class="site-header <?php echo $has_banner ? 'has_banner' : ''; ?>" id="header">
        <?php 
            if (get_theme_mod('emergency_banner_on') == 1):
        ?>
            <div class="bar">
                <div class="container">
                    <?php if (get_theme_mod( 'wave_emergency_phone')): ?>
                        <a href="tel:<?php echo get_theme_mod( 'wave_emergency_phone'); ?>">
                            <?php echo file_get_contents(get_template_directory() . '/assets/phone.svg', true); ?>
                            Emergency? Call us now!
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="container">
            <a class="logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                <img src='<?php echo esc_url( get_theme_mod( 'wave_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
            </a>

            <button aria-label="Click to open menu" class="menu-button" id="nav">
                <svg width="20px" height="20px" viewBox="0 0 20 18">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Icon-Set" transform="translate(-210.000000, -887.000000)" fill="currentColor">
                            <path d="M229,895 L211,895 C210.448,895 210,895.448 210,896 C210,896.553 210.448,897 211,897 L229,897 C229.552,897 230,896.553 230,896 C230,895.448 229.552,895 229,895 L229,895 Z M229,903 L211,903 C210.448,903 210,903.448 210,904 C210,904.553 210.448,905 211,905 L229,905 C229.552,905 230,904.553 230,904 C230,903.448 229.552,903 229,903 L229,903 Z M211,889 L229,889 C229.552,889 230,888.553 230,888 C230,887.448 229.552,887 229,887 L211,887 C210.448,887 210,887.448 210,888 C210,888.553 210.448,889 211,889 L211,889 Z" id="Fill-70"></path>
                        </g>
                    </g>
                </svg>
            </button>

            <nav id="main-menu">
                <?php wp_nav_menu(array(
                    'theme_location'  => 'main_menu',
                    'container'       => 'ul',
                    'depth'           => 1
                )); ?>

                <button aria-label="Click to close menu" id="close">
                    <svg width="16px" height="16px" viewBox="0 0 16 16">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <path d="M8,9.41421356 L2.34314575,15.0710678 C1.95282281,15.4613908 1.31996224,15.4620979 0.928932188,15.0710678 C0.538609245,14.6807449 0.538609245,14.0471772 0.928932188,13.6568542 L6.58578644,8 L0.928932188,2.34314575 C0.538609245,1.95282281 0.537902138,1.31996224 0.928932188,0.928932188 C1.31925513,0.538609245 1.95282281,0.538609245 2.34314575,0.928932188 L8,6.58578644 L13.6568542,0.928932188 C14.0471772,0.538609245 14.6807449,0.538609245 15.0710678,0.928932188 C15.4620979,1.31996224 15.4613908,1.95282281 15.0710678,2.34314575 L9.41421356,8 L15.0710678,13.6568542 C15.4613908,14.0471772 15.4613908,14.6807449 15.0710678,15.0710678 C14.6800378,15.4620979 14.0471772,15.4613908 13.6568542,15.0710678 L8,9.41421356 Z" id="Combined-Shape" fill="currentColor" fill-rule="nonzero"></path>
                        </g>
                    </svg>
                </button>
            </nav>
        </div>
    </header>

    <section class="content">
        <main id="main" class="site-main" role="main">