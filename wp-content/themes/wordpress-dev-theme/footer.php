
        <footer class="footer">

            <?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>

                <div class="footer__inner">

                    <?php dynamic_sidebar( 'footer-widget' ); ?>

                </div>

            <?php endif; ?>

        </footer>


    <?php wp_footer(); ?>

    </body>

</html>