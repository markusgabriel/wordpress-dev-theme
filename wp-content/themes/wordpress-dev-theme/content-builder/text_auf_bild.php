<div class="content-builder__item text-on-image <?php the_sub_field('bt_layout'); ?>">

	<?php if(get_sub_field('tab_anker_id')) : ?>
        <a id="<?php the_sub_field('tab_anker_id'); ?>"></a>
	<?php endif; ?>

    <div class="text-on-image__inner">

        <div class="text-on-image__image">
            <?php $bimage = get_sub_field('tab_bild');
            echo wp_get_attachment_image($bimage, 'image_1440'); ?>
        </div>

        <div class="text-on-image__text">
            <div class="text-on-image__text-inner">
                <?php the_sub_field('tab_text'); ?>
            </div>
        </div>

    </div>

</div>