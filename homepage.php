<?php /* Template Name: Home */
get_header(); ?>

<?php do_action('tailpress_header'); ?>
<div class="bg-white">

    <?php dynamic_sidebar('home-body') ?>
</div>


<?php
get_footer();
?>