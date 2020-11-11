<div class="content-builder__item icons <?php the_sub_field('i_layout'); ?>">

    <?php if(get_sub_field('i_anker_id')) : ?>
        <a id="<?php the_sub_field('i_anker_id'); ?>"></a>
    <?php endif; ?>

    <div class="icons__inner">

        <?php if(have_rows('icons')) :
            while(have_rows('icons')) : the_row(); ?>

            <div class="icons__item">
                <div class="icons__image">
                    <?php $iimage = get_sub_field('i_icon'); ?>
                    <img src="<?php echo $iimage['url']; ?>" width="130" height="130" alt="<?php echo $iimage['alt']; ?>">
                </div>

                <div class="icons__text">
                    <?php the_sub_field('i_text'); ?>
                </div>
            </div>

            <?php endwhile;
        endif; ?>

    </div>

</div>