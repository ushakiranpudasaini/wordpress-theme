<?php get_header(); ?>

<div class="main-article">
    <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();

      if (get_theme_mod('single_choices', '1') == '1') {
        get_template_part('template-parts/content', 'single');
      } elseif (get_theme_mod('single_choices', '1' == '2')) {
        get_template_part('template-parts/content', 'single2');
      }
  ?>

    <?php endwhile; ?>

    <?php endif; ?>

</div>

<?php
get_footer();
?>