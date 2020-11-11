<div class="content-builder__item testimonial <?php the_sub_field('te_hintergrundfarbe'); ?>">

	<?php if(get_sub_field('te_anker_id')) : ?>
        <a id="<?php the_sub_field('te_anker_id'); ?>"></a>
	<?php endif; ?>

    <div class="testimonial__inner">

        <div class="testimonial__inner-inner">
            <div class="testimonial__text">
                <blockquote>
                    <div>»</div>
                    <?php the_sub_field('te_text'); ?>
                </blockquote>
            </div>

            <div class="testimonial__images">
                <?php $uniqid = uniqid();
                if(have_rows('te_bilder')) : ?>
                    <div class="swiper-container testimonial__slider<?php echo $uniqid; ?>">
                        <div class="swiper-wrapper">
                            <?php while(have_rows('te_bilder')) : the_row(); ?>
                            <div class="swiper-slide">
                                <div class="testimonial__images-image">
                                    <?php $ttimage = get_sub_field('te_bild');
                                    echo wp_get_attachment_image($ttimage, 'image_740_430'); ?>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <script>
                        const swiper<?php echo $uniqid; ?> = new Swiper('.testimonial__slider<?php echo $uniqid; ?>', {
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true
                            },
                            autoplay: {
                                delay: 5000
                            },
                            loop: true,
                            speed: 1000
                        });
                    </script>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>