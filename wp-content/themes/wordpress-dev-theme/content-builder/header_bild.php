<div class="content-builder__item header-image <?php the_sub_field('bt_layout'); ?>">

    <div class="header-image__inner">

        <div class="header-image__image">
            <?php $himage = get_sub_field('hb_bild');
            echo wp_get_attachment_image($himage, 'header_bild'); ?>
        </div>

    </div>

</div>