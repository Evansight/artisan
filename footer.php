<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">

    <div class="grid-container">
        <div class="footer__wrapper">
                <div class="contact__wrapper">
                    <span class="footer__address"><?php the_field('adderss' , 'options') ?></span><br>
                    <span class="phone__text"><?php the_field('phone' , 'options') ?></span>
                    <a class="footer__phone" href="tel:<?php the_field('phone_number' , 'options') ?>" > <?php the_field('phone_number' , 'options') ?></a>
                    <a class="footer__site" href="<?php the_field('site_link' , 'options') ?>"><?php the_field('site_text', 'options') ?></a>
                </div>
            <div class="footer__media">
                <a class="social__icons facebook" href=""></a>
                <a class="social__icons twitter" href=""></a>
                <a class="social__icons vimeo" href=""></a>
            </div>
            <?php
            $image = get_field('footer_logo', 'options');
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>


            <span class="footer__copyright"><?php the_field('copyright' , 'options') ?></span>
        </div>
    </div>

</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
