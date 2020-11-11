<div class="tiles__item image-button">

        <div class="tiles__item-image">
            <?php $kimage = get_sub_field('lk_bild');
            echo wp_get_attachment_image($kimage, 'image_625_400'); ?>
        </div>

        <?php if(get_sub_field('lk_button_text')) : ?>
            <div class="tiles__item-button">
                <a href="<?php the_sub_field('lk_link'); if(get_sub_field('lk_ankerlink')) : echo '#'; the_sub_field('lk_ankerlink'); endif; ?>" title="<?php the_sub_field('lk_text'); ?>" class="button is--primary is--large">
                    <?php the_sub_field('lk_button_text'); ?>
                </a>
            </div>
        <?php endif; ?>

</div>