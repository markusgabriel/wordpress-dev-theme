</div><!-- .content -->

<footer>
	<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
  <div class="footer-widget">
    <?php dynamic_sidebar( 'footer-widget' ); ?>
  </div>
  <?php endif; ?>
</footer>

</div><!-- .outer-wrapper -->

<nav id="menu-push-right" class="menu-push-right">
	<span class="menu-push-right-close"></span>
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
</nav>

<?php wp_footer(); ?>
</body>
</html>