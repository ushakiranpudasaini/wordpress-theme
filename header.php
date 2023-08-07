<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(' text-gray-900 antialiased'); ?>>
    <?php wp_body_open() ?>

    <?php do_action('tailpress_site_before'); ?>

    <div id="page" class="flex flex-col min-h-screen">

        <?php do_action('tailpress_header'); ?>

        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'monal-mag'); ?></a>
        <header id="masthead" class="site-header <?php echo esc_html($headerStyle) ?>">
            <nav class="nav-main">
                <?php
                if (get_theme_mod('topbar_visibility', 1) == 1) {
                    monal_mag_topbar();
                }            
                ?>
            </nav>
        </header>
        
        <header>
            <div class="relative z-[100] nav-main">                 
              <?php 
$nav = esc_html(get_theme_mod('navbar_choices', '1' ), 'monal-mag');
if($nav == '1'){
    require_once dirname(__FILE__) . '/inc/navbar_templates/navbar1.php';
}
elseif ($nav == '2'){
    require_once dirname(__FILE__) . '/inc/navbar_templates/navbar2.php';
}
elseif ($nav == '3'){
    require_once dirname(__FILE__) . '/inc/navbar_templates/navbar3.php';
}
elseif ($nav == '4'){
    require_once dirname(__FILE__) . '/inc/navbar_templates/navbar4.php';
}
elseif ($nav == '5'){
    require_once dirname(__FILE__) . '/inc/navbar_templates/navbar5.php';
}
elseif ($nav == '6'){
    require_once dirname(__FILE__) . '/inc/navbar_templates/navbar6.php';
}
elseif ($nav == '7'){
    require_once dirname(__FILE__) . '/inc/navbar_templates/navbar7.php';
}
elseif ($nav == '8'){
    require_once dirname(__FILE__) . '/inc/navbar_templates/navbar8.php';
}
elseif ($nav == '9'){
    require_once dirname(__FILE__) . '/inc/navbar_templates/navbar9.php';
}
elseif ($nav == '10'){
    require_once dirname(__FILE__) . '/inc/navbar_templates/navbar10.php';
}
?>
 </div>   
                
        </header>
       
        <div id="content" class="flex-grow site-content nav-header ">

            <?php do_action('tailpress_content_start'); ?>

            <main>