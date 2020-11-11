<div class="content-builder__item downloads <?php the_sub_field('d_hintergrundfarbe'); ?>">

    <?php if(get_sub_field('d_anker_id')) : ?>
        <a id="<?php the_sub_field('d_anker_id'); ?>"></a>
    <?php endif; ?>

    <div class="downloads__inner">

        <div class="downloads__headline">
            <h3><?php the_sub_field('d_headline'); ?></h3>
        </div>

        <div class="downloads__wrapper">
            <?php if(have_rows('d_downloads')) :
                while(have_rows('d_downloads')) : the_row(); ?>

                <div class="downloads__item">
                    <div class="downloads__image">
	                    <?php if(get_sub_field('d_datei')) : ?>
                            <a href="<?php the_sub_field('d_datei'); ?>" download="" title="Download">
                        <?php endif; ?>
                            <?php $cover = get_sub_field('d_coverbild');
                            $coversize = 'image_350_500';
                            echo wp_get_attachment_image($cover, $coversize); ?>
                        <?php if(get_sub_field('d_datei')) : ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="downloads__button">
                        <?php if(get_sub_field('d_datei')) : ?>
                        <a href="<?php the_sub_field('d_datei'); ?>" download="" title="Download" class="button is--primary is--large">
                            Download
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <?php endwhile;
            endif; ?>
        </div>

    </div>

</div>