                </div><!-- .content -->

            <footer>

                <?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>

                    <div class="footer-widget">

                        <?php dynamic_sidebar( 'footer-widget' ); ?>

                    </div>

                <?php endif; ?>

            </footer>

        </div><!-- .outer-wrapper -->

    <?php wp_footer(); ?>

    </body>

</html>