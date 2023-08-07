<?php
get_header();

if (get_theme_mod('columns_archive', 2) == 4) {
    $col = absint(get_theme_mod('columns_archive', 3));
} else if (get_theme_mod('columns_archive', 2) == 3) {
    $col = absint(get_theme_mod('columns_archive', 3));
} else if (get_theme_mod('columns_archive', 2) == 2) {
    $col = absint(get_theme_mod('columns_archive', 3));
} else if (get_theme_mod('columns_archive', 2) == 1) {
    $col = absint(get_theme_mod('columns_archive', 3));
}
$num_columns = "edu-grid-$col";
if (get_theme_mod('enable_sidebar_option_archive', 1) == 0) {
    $hasSidebar = 0;
    $fullwidth = "";
} else {
    $hasSidebar = 1;
    $fullwidth = "lg:grid-cols-[70%,1fr]";
}

if (get_theme_mod('archive_layout', 'grid') == 'grid') {
    $box = "edu-grid-box";
} else {
    $box = "edu-list-box";
}

if (get_theme_mod('archive_background', 0) == 1) {
    $background = "";
} else {
    $background = "single-page-clean";
}
?>

<section class="body_background">
    <div class="body-container mx-auto main-article">

        <div class="grid <?php echo $fullwidth; ?> gap-5 pt-9 pb-7">
            <div class="single">
                <?php if (get_theme_mod('archive_layout', 'list') == 'grid') { ?>
                <div class="grid monal-grid-col-<?php echo $col ?> gap-x-6 gap-y-6">
                    <?php if (have_posts()) : ?>
                    <?php
                            while (have_posts()) :
                                the_post();
                                get_template_part('template-parts/content-archive-grid', get_post_format());
                            endwhile;
                        endif;
                        ?>
                </div>

                <?php } else { ?>

                <div class="bg-white">
                    <?php
                        if (have_posts()) :
                            while (have_posts()) :
                                the_post();

                                get_template_part('template-parts/content-archive', get_post_format()); ?>

                    <?php endwhile; ?>

                    <?php endif; ?>

                </div>
                <?php } ?>

                <?php

the_posts_pagination(array(
    'mid_size'  => 2,
    'prev_text' => __('Previous', 'monal-mag'),
    'next_text' => __('Next', 'monal-mag'),
));

?>

            </div>

            <?php
            if (get_theme_mod('enable_sidebar_option_archive', '1') ==  1) {
                echo '<div class="side ">';
                get_sidebar();
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>
<?php

get_footer();