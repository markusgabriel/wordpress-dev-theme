<div class="content-builder__item products <?php the_sub_field('pro_hintergrundfarbe'); ?>">

	<?php if(get_sub_field('pro_anker_id')) : ?>
        <a id="<?php the_sub_field('pro_anker_id'); ?>"></a>
	<?php endif; ?>

    <div class="products__inner">

        <div class="products__wrapper">
		<?php if(have_rows('pro_produkte')) :
			while(have_rows('pro_produkte')) : the_row(); ?>

                    <div class="products__item">

                        <?php if (get_sub_field('pro_slider')) : ?>

                            <div class="products__item-image-slider">

                                <?php
                                $imagesPro = get_sub_field('pro_bilder');
                                $size   = 'image_625_400';
                                if ($imagesPro): ?>
                                    <div class="swiper-container swiper-container-product">
                                        <div class="swiper-wrapper">

                                            <?php foreach ($imagesPro as $image_id): ?>
                                                <div class="swiper-slide">
                                                    <div class="image__image">
                                                        <?php echo wp_get_attachment_image($image_id, $size); ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>

                                        </div>

                                        <div class="swiper-pagination swiper-container-product-pagination"></div>

                                        <div class="swiper-button-next swiper-container-product-next"></div>
                                        <div class="swiper-button-prev swiper-container-product-prev"></div>
                                    </div>
                                <?php endif; ?>

                                <?php $uniqid = uniqid(); ?>

                                <script>
                                    const swiperClass<?php echo $uniqid; ?> = '.swiper-container-product';
                                    const swiper<?php echo $uniqid; ?> = new Swiper(swiperClass<?php echo $uniqid; ?>, {
                                        pagination: {
                                            el: '.swiper-container-product-pagination',
                                            clickable: true
                                        },
                                        autoplay: {
                                            delay: 5000
                                        },
                                        loop: true,
                                        speed: 1000,
                                        navigation: {
                                            nextEl: '.swiper-container-product-next',
                                            prevEl: '.swiper-container-product-prev',
                                        },
                                    });
                                </script>

                                <?php if(get_sub_field('pro_preis')) : ?>
                                    <div class="products__item-price">
                                        <div><?php the_sub_field('pro_preistext'); ?></div>
                                        <div><?php the_sub_field('pro_preis'); ?></div>
                                    </div>
                                <?php endif; ?>

                            </div>

                        <?php else : ?>

                            <div class="products__item-image">
                                <?php $kimage = get_sub_field('pro_bild');
                                echo wp_get_attachment_image($kimage, 'image_625_400'); ?>

                                <?php if(get_sub_field('pro_preis')) : ?>
                                <div class="products__item-price">
                                    <div><?php the_sub_field('pro_preistext'); ?></div>
                                    <div><?php the_sub_field('pro_preis'); ?></div>
                                </div>
                                <?php endif; ?>
                            </div>

                        <?php endif; ?>


                        <div class="products__item-text">
                            <?php the_sub_field('pro_beschreibung'); ?>
                        </div>

                    </div>

			<?php endwhile;
		endif; ?>
        </div>

    </div>

</div>