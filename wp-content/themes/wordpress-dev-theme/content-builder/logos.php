<div class="content-builder__item logos <?php the_sub_field('l_layout'); ?>">

    <?php if(get_sub_field('l_anker_id')) : ?>
        <a id="<?php the_sub_field('l_anker_id'); ?>"></a>
    <?php endif; ?>

    <div class="logos__inner">

        <?php if(have_rows('l_logos')) :
            while(have_rows('l_logos')) : the_row(); ?>

            <div class="logos__item">
                <div class="logos__image">
                    <?php $logo = get_sub_field('l_logo');
                    $logosize = 'image_300';
                    echo wp_get_attachment_image($logo, $logosize); ?>
                </div>
            </div>

            <?php endwhile;
        endif; ?>

    </div>

</div>