<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package monal-mag
 */

get_header();
?>

<main id="primary" class="site-main singlepage section-single-padding">
    <section class="body_background py-7">
        <h1 class="pt-8 text-3xl font-bold text-center font-poppins pb-7"> <?php
						
						printf(esc_html__('Search Results for: %s', 'monal-mag'), '<span>' . get_search_query() . '</span>');
						?></h1>
        <div class="singlepage-grid  body-container mx-auto ">
            <div class="single-page-content bg-white">
                <?php if (have_posts()) : ?>
                <?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', 'search');

				endwhile;

				the_posts_navigation();

			else :

				get_template_part('template-parts/content', 'none');

			endif;
			?>
            </div>

        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();