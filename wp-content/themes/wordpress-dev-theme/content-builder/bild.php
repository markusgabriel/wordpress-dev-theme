<div class="content-builder__item image <?php the_sub_field('b_layout'); ?>">

    <?php if(get_sub_field('b_anker_id')) : ?>
        <a id="<?php the_sub_field('b_anker_id'); ?>"></a>
    <?php endif; ?>

    <div class="image__inner">

        <?php if (get_sub_field('b_slider')) : ?>

            <?php
            $images = get_sub_field('b_bilder');
            $size   = 'image_1200';
            if ($images): ?>
                <div class="swiper-container swiper-container-image">
                    <div class="swiper-wrapper">

                        <?php foreach ($images as $image_id): ?>
                            <div class="swiper-slide">
                                <div class="image__image">
                                    <?php echo wp_get_attachment_image($image_id, $size); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="swiper-pagination swiper-container-image-pagination"></div>

                    <div class="swiper-button-next swiper-container-image-next"></div>
                    <div class="swiper-button-prev swiper-container-image-prev"></div>
                </div>
            <?php endif; ?>

            <?php $uniqid = uniqid();

            $data = 'const swiperClass' . ( $uniqid ) . ' = ".swiper-container-image";';
            $data .= 'const swiper' . ( $uniqid ) . ' = new Swiper(swiperClass' . ( $uniqid ) . ', {';
            $data .= 'pagination: {el: ".swiper-container-image-pagination",clickable: true},autoplay: {delay: 5000},loop: true,speed: 1000,navigation: {nextEl: ".swiper-container-image-next",prevEl: ".swiper-container-image-prev"}});';

            wp_add_inline_script( 'wordpressdevtheme-script', $data, 'after'); ?>


        <?php else : ?>

            <div class="image__image">
                <?php $bimage = get_sub_field('b_bild');
                echo wp_get_attachment_image($bimage, 'image_1440'); ?>
            </div>

        <?php endif; ?>

    </div>

</div>