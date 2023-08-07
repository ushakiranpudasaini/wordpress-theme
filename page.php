<?php get_header(); ?>

<div class="main-article">
    <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
        get_template_part('template-parts/content', 'page');
  ?>
    <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php
get_footer();
?>