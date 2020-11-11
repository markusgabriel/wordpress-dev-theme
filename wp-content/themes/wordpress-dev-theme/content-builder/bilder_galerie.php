<div class="content-builder__item image-gallery <?php the_sub_field('bg_hintergrundfarbe'); ?>">

	<?php if(get_sub_field('bg_anker_id')) : ?>
        <a id="<?php the_sub_field('bg_anker_id'); ?>"></a>
	<?php endif; ?>

    <div class="image-gallery__inner">

        <div class="image-gallery__headline">
            <h3><?php the_sub_field('bg_headline'); ?></h3>
        </div>

        <div class="image-gallery__row">

            <?php
            $images = get_sub_field('bg_bilder');
            $size   = 'image_1200';
            if ($images): ?>
                <div class="swiper-container image-gallery__slider">
                    <div class="swiper-wrapper">

                        <?php foreach ($images as $image_id): ?>
                            <div class="swiper-slide image-gallery__item">
                                <div class="image-gallery__image">
                                    <?php echo wp_get_attachment_image($image_id, $size); ?>
                                </div>
                                <?php if(get_sub_field('bg_bild_titel')) : ?>
                                    <div class="image-gallery__image-title">
                                        <?php the_sub_field('bg_bild_titel'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

            <?php $uniqid = uniqid();

            $data = 'const swiperClass' . ( $uniqid ) . ' = ".image-gallery__slider";';
            $data .= 'const swiper' . ( $uniqid ) . ' = new Swiper(swiperClass' . ( $uniqid ) . ', {';
            $data .= 'speed: 1000,spaceBetween: 35,autoplay: {delay: 3000,},slidesPerView: 1.3,slidesOffsetBefore: 35,slidesOffsetAfter: 35,breakpoints: {768: {spaceBetween: 45,slidesOffsetBefore: 45,slidesOffsetAfter: 45,slidesPerView: "auto",mousewheel: {forceToAxis: true,}}}';
            $data .= '});';

            wp_add_inline_script( 'wordpressdevtheme-script', $data, 'after'); ?>

	        <?php endif; ?>
        </div>

    </div>

</div>