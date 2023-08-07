<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package monal-mag
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}

$asideClass = "";
$sticky = "";
if (get_theme_mod('sidebar_option', 'default') == 'sticky_bottom') {
    $asideClass = "sticky-flex";
    $sticky = "sticky-sidebar-bottom";
} else if (get_theme_mod('sidebar_option', 'default') == 'sticky_top') {
    $asideClass = "none";
    $sticky = "sticky-sidebar-top";
}
?>

<aside id="secondary" class="widget-area edu-sidebar <?php echo esc_attr($asideClass) ?>">
    <div class="<?php echo esc_attr($sticky) ?>">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div>

</aside><!-- #secondary -->