<div class="content-builder__item press <?php the_sub_field('p_layout'); ?>">

    <?php if(get_sub_field('p_anker_id')) : ?>
        <a id="<?php the_sub_field('p_anker_id'); ?>"></a>
    <?php endif; ?>

    <div class="press__inner">

        <?php if(have_rows('p_presse_artikel')) :
            while(have_rows('p_presse_artikel')) : the_row(); ?>

                <div class="press__item">

                    <?php if(get_sub_field('p_link')) : ?>
                    <a href="<?php the_sub_field('p_link'); ?>" title="<?php the_sub_field('p_titel'); ?>" target="_blank">
                    <?php endif; ?>

                        <div class="press__item-date">
                            <?php the_sub_field('p_datum'); ?>
                        </div>

                        <div class="press__item-text">
                            <h4>
                                <?php the_sub_field('p_titel'); ?>
                                <div><?php the_sub_field('p_untertitel'); ?></div>
                            </h4>
                        </div>

                    <?php if(get_sub_field('p_link')) : ?>
                    </a>
                    <?php endif; ?>

                </div>

            <?php endwhile;
        endif; ?>

    </div>

</div>