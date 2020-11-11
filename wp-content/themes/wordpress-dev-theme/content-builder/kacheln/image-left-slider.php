<div class="tiles__item">

    <div class="tiles__item-image">

        <?php
        $images = get_sub_field('lk_bilder');
        $size   = 'image_300_300';
        if ($images): ?>
            <div class="swiper-container swiper-container-kachel-image-left">
                <div class="swiper-wrapper">

                    <?php foreach ($images as $image_id): ?>
                        <div class="swiper-slide">
                            <div class="tiles__item-image-image">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <div class="swiper-pagination swiper-container-kachel-image-left-pagination"></div>

                <div class="swiper-button-next swiper-container-kachel-image-left-next"></div>
                <div class="swiper-button-prev swiper-container-kachel-image-left-prev"></div>
            </div>
        <?php endif; ?>

        <?php $uniqid = uniqid(); ?>

        <script>
            const swiperClass<?php echo $uniqid; ?> = '.swiper-container-kachel-image-left';
            const swiper<?php echo $uniqid; ?> = new Swiper(swiperClass<?php echo $uniqid; ?>, {
                pagination: {
                    el: '.swiper-container-kachel-image-left-pagination',
                    clickable: true
                },
                autoplay: {
                    delay: 5000
                },
                loop: true,
                speed: 1000,
                navigation: {
                    nextEl: '.swiper-container-kachel-image-left-next',
                    prevEl: '.swiper-container-kachel-image-left-prev',
                },
            });
        </script>

    </div>


    <div class="tiles__item-text">
        <?php the_sub_field('lk_text'); ?>
    </div>

</div>