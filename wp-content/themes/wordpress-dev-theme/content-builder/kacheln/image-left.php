<div class="tiles__item">

    <div class="tiles__item-image">
        <?php $kimage = get_sub_field('lk_bild');
        echo wp_get_attachment_image($kimage, 'image_300_300'); ?>
    </div>

    <div class="tiles__item-text">
        <?php the_sub_field('lk_text'); ?>
    </div>

</div>