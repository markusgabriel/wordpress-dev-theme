<div class="content-builder__item call-to-action <?php the_sub_field('bt_layout'); ?>">

    <div class="call-to-action__inner">

        <div class="call-to-action__inner-text">
            <?php the_sub_field('cta_text'); ?>
        </div>

	    <?php if(get_sub_field('cta_button_text')) : ?>
        <div class="call-to-action__inner-button">

            <?php if(get_sub_field('cta_button_link')) : ?>

                <a href="<?php the_sub_field('cta_button_link'); ?>" title="<?php the_sub_field('cta_button_text'); ?>" class="button is--primary is--large">
                    <?php the_sub_field('cta_button_text'); ?>
                </a>

            <?php elseif(get_sub_field('cta_button_link_ext')) : ?>

                <a href="<?php the_sub_field('cta_button_link_ext'); ?>" title="<?php the_sub_field('cta_button_text'); ?>" class="button is--primary is--large" target="_blank">
                    <?php the_sub_field('cta_button_text'); ?>
                </a>

            <?php elseif(get_sub_field('cta_button_link_file')) : ?>

                <a href="<?php the_sub_field('cta_button_link_file'); ?>" title="<?php the_sub_field('cta_button_text'); ?>" class="button is--primary is--large">
                    <?php the_sub_field('cta_button_text'); ?>
                </a>

            <?php elseif(get_sub_field('cta_button_link_anchor')) : ?>

                <a href="#<?php the_sub_field('cta_button_link_anchor'); ?>" title="<?php the_sub_field('cta_button_text'); ?>" class="button is--primary is--large">
                    <?php the_sub_field('cta_button_text'); ?>
                </a>

            <?php endif; ?>

        </div>
        <?php endif; ?>
        
    </div>

</div>