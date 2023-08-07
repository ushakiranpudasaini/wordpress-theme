</main>

<?php do_action('tailpress_content_end'); ?>

</div>

<?php do_action('tailpress_content_after'); ?>

<footer id="colophon" class="mt-4 p-0 site-footer " role="contentinfo">
    <div class="widget_block">
        <?php do_action('tailpress_footer'); ?>

        <div class="mx-auto text-center text-gray-500 ">
            <div class="max-w-6xl mx-auto ">

                <?php if (
            is_active_sidebar('footer-1') ||
            is_active_sidebar('footer-2') ||
            is_active_sidebar('footer-3') ||
            is_active_sidebar('footer-4')
        ) {
        ?>

                <div
                    class="grid lg:grid-cols-3 footer-grid edu-grid-box edu-grid-4 edu-md-grid-2 footer-padding text-left font-poppins widget_block">

                    <div>
                        <?php dynamic_sidebar('footer-1');?>
                    </div>

                    <div>
                        <?php dynamic_sidebar('footer-2');?>
                    </div>

                    <div>
                        <?php dynamic_sidebar('footer-3');?>
                    </div>

                    <div>
                        <?php dynamic_sidebar('footer-4');?>
                    </div>


                </div>
                <?php
        } ?>
            </div>

        </div>
        <?php if (esc_attr(get_theme_mod('copyright_display', 'show') == 'show')) {
    ?>

        <!-- .site-info -->
        <?php
    } ?>
    </div>
    <section class="py-5 text-center bg-black copyright copyright-background copyright-text font-poppins">
        <?php
            $copyright_text = get_theme_mod('copyright_text_footer', '© 2021 - WordPress Theme : monal-mag');
            echo esc_html($copyright_text);
            ?>

        </p>
        
    </section>


</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>