<div class="content-builder__item big-slider <?php the_sub_field('gs_layout'); ?>">

    <?php if(get_sub_field('gs_anker_id')) : ?>
        <a id="<?php the_sub_field('gs_anker_id'); ?>"></a>
    <?php endif; ?>

    <div class="big-slider__inner">

        <?php
        $images = get_sub_field('gs_slides');
        $size   = 'image_1200';
        if ($images): ?>
            <div class="swiper-container swiper-container-big-slider">
                <div class="swiper-wrapper">

                    <?php foreach ($images as $image_id): ?>
                        <div class="swiper-slide">
                            <div class="image__image">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <div class="swiper-pagination swiper-container-big-slider-pagination"></div>

                <div class="swiper-button-next swiper-container-big-slider-next"></div>
                <div class="swiper-button-prev swiper-container-big-slider-prev"></div>
            </div>

            <?php $uniqid = uniqid();

            $data = 'const swiperClass' . ( $uniqid ) . ' = ".swiper-container-big-slider";';
            $data .= 'const swiper' . ( $uniqid ) . ' = new Swiper(swiperClass' . ( $uniqid ) . ', {';
            $$data .= 'pagination: {el: ".swiper-container-big-slider-pagination",clickable: true},autoplay: {delay: 5000},loop: true,speed: 1000,navigation: {nextEl: ".swiper-container-big-slider-next",prevEl: ".swiper-container-big-slider-prev"}';
            $data .= '});';

            wp_add_inline_script( 'wordpressdevtheme-script', $data, 'after'); ?>

        <?php endif; ?>

    </div>

</div>