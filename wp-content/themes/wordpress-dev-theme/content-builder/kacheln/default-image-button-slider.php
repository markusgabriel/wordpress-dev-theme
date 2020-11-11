<div class="tiles__item image-button image-button-slider">

    <div class="tiles__item-image">

    <?php
    $images = get_sub_field('lk_bilder');
    $size   = 'image_625_400';
    if ($images): ?>
        <div class="swiper-container swiper-container-kachel-image-button">
            <div class="swiper-wrapper">

                <?php foreach ($images as $image_id): ?>
                    <div class="swiper-slide">
                        <div class="tiles__item-image-image">
                        <?php echo wp_get_attachment_image($image_id, $size); ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <div class="swiper-pagination swiper-container-kachel-image-button-pagination"></div>

            <div class="swiper-button-next swiper-container-kachel-image-button-next"></div>
            <div class="swiper-button-prev swiper-container-kachel-image-button-prev"></div>
        </div>
    <?php endif; ?>

    <?php $uniqid = uniqid(); ?>

    <script>
        const swiperClass<?php echo $uniqid; ?> = '.swiper-container-kachel-image-button';
        const swiper<?php echo $uniqid; ?> = new Swiper(swiperClass<?php echo $uniqid; ?>, {
            pagination: {
                el: '.swiper-container-kachel-image-button-pagination',
                clickable: true
            },
            autoplay: {
                delay: 5000
            },
            loop: true,
            speed: 1000,
            navigation: {
                nextEl: '.swiper-container-kachel-image-button-next',
                prevEl: '.swiper-container-kachel-image-button-prev',
            },
        });
    </script>

    </div>

    <?php if(get_sub_field('lk_button_text')) : ?>
        <div class="tiles__item-button">
            <a href="<?php the_sub_field('lk_link'); if(get_sub_field('lk_ankerlink')) : echo '#'; the_sub_field('lk_ankerlink'); endif; ?>" title="<?php the_sub_field('lk_text'); ?>" class="button is--primary is--large">
                <?php the_sub_field('lk_button_text'); ?>
            </a>
        </div>
    <?php endif; ?>

</div>