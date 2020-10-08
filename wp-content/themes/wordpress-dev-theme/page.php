<?php get_header(); ?>

<?php if(have_rows('pagebuilder')) : ?>
    <div class="pagebuilder">
        <?php while (have_rows('pagebuilder')) : the_row();
            if(get_row_layout() == 'text') :
                get_template_part('pagebuilder/text');
            endif;
        endwhile; ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>