<div class="content-builder__item text-module <?php the_sub_field('t_layout'); ?> <?php the_sub_field('t_hintergrundfarbe'); ?>">

	<?php if(get_sub_field('t_anker_id')) : ?>
        <a id="<?php the_sub_field('t_anker_id'); ?>"></a>
	<?php endif; ?>

    <div class="text-module__inner">
        <div class="text-module__text">
	    <?php the_sub_field('t_text'); ?>
        </div>
    </div>

</div>