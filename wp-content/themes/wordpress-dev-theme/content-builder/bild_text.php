<div class="content-builder__item image-text <?php the_sub_field('bt_layout'); ?> <?php the_sub_field('bt_hintergrundfarbe'); ?>">

    <?php if(get_sub_field('bt_anker_id')) : ?>
        <a id="<?php the_sub_field('bt_anker_id'); ?>"></a>
    <?php endif; ?>
    
    <div class="image-text__inner">

        <?php if (get_sub_field('bt_slider')) : ?>

            <?php
            $images = get_sub_field('bt_bilder');
            $size   = 'image_600';
            if ($images): ?>
                <div class="image-text__image">
                <div class="swiper-container swiper-container-image-text">
                    <div class="swiper-wrapper">

                        <?php foreach ($images as $image_id): ?>
                            <div class="swiper-slide">
                                <div class="image__image">
                                    <?php echo wp_get_attachment_image($image_id, $size); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="swiper-pagination swiper-container-image-text-pagination"></div>

                    <div class="swiper-button-next swiper-container-image-text-next"></div>
                    <div class="swiper-button-prev swiper-container-image-text-prev"></div>
                </div>
                    </div>
            <?php endif; ?>

            <?php $uniqid = uniqid();

            $data = 'const swiperClass' . ( $uniqid ) . ' = ".swiper-container-image-text";';
            $data .= 'const swiper' . ( $uniqid ) . ' = new Swiper(swiperClass' . ( $uniqid ) . ', {';
            $data .= 'pagination: {el: ".swiper-container-image-text-pagination",clickable: true},autoplay: {delay: 5000},loop: true,speed: 1000,navigation: {nextEl: ".swiper-container-image-text-next",prevEl: ".swiper-container-image-text-prev"}});';

            wp_add_inline_script( 'wordpressdevtheme-script', $data, 'after'); ?>

        <?php else : ?>

            <div class="image-text__image">
                <?php $itimage = get_sub_field('bt_bild');
                echo wp_get_attachment_image($itimage, 'image_625_625'); ?>
            </div>

        <?php endif; ?>

        <div class="image-text__text">
            <?php the_sub_field('bt_text'); ?>
        </div>

    </div>

</div>