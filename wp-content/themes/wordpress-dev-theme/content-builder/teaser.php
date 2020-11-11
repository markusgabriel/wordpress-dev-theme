<div class="content-builder__item teaser <?php the_sub_field('tea_hintergrundfarbe'); ?>">

	<?php if(get_sub_field('tea_anker_id')) : ?>
        <a id="<?php the_sub_field('tea_anker_id'); ?>"></a>
	<?php endif; ?>

    <?php
    $iconlinks = get_sub_field('tb_icon_links');
    $iconmitte = get_sub_field('tb_icon_mitte');
    $iconrechts = get_sub_field('tb_icon_rechts');
    ?>

    <div class="teaser__inner">

        <?php if(have_rows('tea_teaser')) :
            while(have_rows('tea_teaser')) : the_row(); ?>

            <div class="teaser__item">

                <?php if (get_sub_field('tea_slider')) : ?>

                    <div class="teaser__item-image-slider">

                        <?php
                        $imagesPro = get_sub_field('tea_bilder');
                        $size   = 'image_410_290';
                        if ($imagesPro): ?>
                            <div class="swiper-container swiper-container-teaser">
                                <div class="swiper-wrapper">

                                    <?php foreach ($imagesPro as $image_id): ?>
                                        <div class="swiper-slide">
                                            <div class="image__image">
                                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>

                                <div class="swiper-pagination swiper-container-teaser-pagination"></div>

                                <div class="swiper-button-next swiper-container-teaser-next"></div>
                                <div class="swiper-button-prev swiper-container-teaser-prev"></div>
                            </div>
                        <?php endif; ?>

                        <?php $uniqid = uniqid();

                        $data = 'const swiperClass' . ( $uniqid ) . ' = ".swiper-container-teaser";';
                        $data .= 'const swiper' . ( $uniqid ) . ' = new Swiper(swiperClass' . ( $uniqid ) . ', {';
                        $data .= 'pagination: {el: ".swiper-container-teaser-pagination",clickable: true},autoplay: {delay: 5000},loop: true,speed: 1000,navigation: {nextEl: ".swiper-container-teaser-next",prevEl: ".swiper-container-teaser-prev"}});';

                        wp_add_inline_script( 'wordpressdevtheme-script', $data, 'after'); ?>

                        <?php if(get_sub_field('pro_preis')) : ?>
                            <div class="products__item-price">
                                <div><?php the_sub_field('pro_preistext'); ?></div>
                                <div><?php the_sub_field('pro_preis'); ?></div>
                            </div>
                        <?php endif; ?>

                    </div>

                <?php else : ?>

                    <div class="teaser__item-image">
                        <?php $teaserimage = get_sub_field('tea_bild');
                        $teasersize = 'image_410_290';
                        echo wp_get_attachment_image($teaserimage, $teasersize); ?>

                        <?php if(get_sub_field('pro_preis')) : ?>
                            <div class="products__item-price">
                                <div><?php the_sub_field('pro_preistext'); ?></div>
                                <div><?php the_sub_field('pro_preis'); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>

                <div class="teaser__item-text">
                    <?php the_sub_field('tea_text'); ?>
                </div>

            </div>

            <?php endwhile;
        endif; ?>

    </div>

</div>