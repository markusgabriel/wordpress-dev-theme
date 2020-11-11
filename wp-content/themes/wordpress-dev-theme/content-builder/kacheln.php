<div class="content-builder__item tiles <?php the_sub_field('lk_layout'); ?>">

	<?php if(get_sub_field('lk_anker_id')) : ?>
        <a id="<?php the_sub_field('lk_anker_id'); ?>"></a>
	<?php endif; ?>

    <div class="tiles__inner">

        <?php if(get_sub_field('lk_slider')) : ?>

            <?php if(get_sub_field('lk_layout') == 'default') : ?>

                <div class="tiles__wrapper default">
                    <?php if(have_rows('lk_kacheln')) :
                        while(have_rows('lk_kacheln')) : the_row();
                            if(get_sub_field('lk_kacheltyp') == 'image-button') :
                                get_template_part('content-builder/kacheln/default-image-button-slider');
                            elseif(get_sub_field('lk_kacheltyp') == 'text') :
                                get_template_part('content-builder/kacheln/default-text');
                            endif;
                        endwhile;
                    endif; ?>
                </div>

            <?php elseif(get_sub_field('lk_layout') == 'image-left') : ?>

                <div class="tiles__wrapper image-left">
                    <?php if(have_rows('lk_kacheln')) :
                        while(have_rows('lk_kacheln')) : the_row();
                            get_template_part('content-builder/kacheln/image-left-slider');
                        endwhile;
                    endif; ?>
                </div>

            <?php endif; ?>

        <?php else : ?>

            <?php if(get_sub_field('lk_layout') == 'default') : ?>

                <div class="tiles__wrapper default">
                <?php if(have_rows('lk_kacheln')) :
                    while(have_rows('lk_kacheln')) : the_row();
                        if(get_sub_field('lk_kacheltyp') == 'image-button') :
                            get_template_part('content-builder/kacheln/default-image-button');
                        elseif(get_sub_field('lk_kacheltyp') == 'text') :
                            get_template_part('content-builder/kacheln/default-text');
                        endif;
                    endwhile;
                endif; ?>
                </div>

            <?php elseif(get_sub_field('lk_layout') == 'image-left') : ?>

                <div class="tiles__wrapper image-left">
                <?php if(have_rows('lk_kacheln')) :
                    while(have_rows('lk_kacheln')) : the_row();
                        get_template_part('content-builder/kacheln/image-left');
                    endwhile;
                endif; ?>
                </div>

            <?php endif; ?>

        <?php endif; ?>

        </div>

    </div>

</div>