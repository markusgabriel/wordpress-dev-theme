<div class="content-builder__item jobs">

	<?php if(get_sub_field('j_anker_id')) : ?>
        <a id="<?php the_sub_field('j_anker_id'); ?>"></a>
	<?php endif; ?>

    <div class="jobs__inner">

        <div class="jobs__wrapper">
		<?php if(have_rows('j_jobs')) :
			while(have_rows('j_jobs')) : the_row(); ?>
                <div class="jobs__item">

                    <div class="jobs__item-head">
                        <div class="jobs__item-head-top">
                            <h3><?php the_sub_field('j_jobtitel'); ?></h3>
                        </div>
                        <div class="jobs__item-head-bottom">
                            <?php if(have_rows('j_tags')) :
                                while(have_rows('j_tags')) : the_row(); ?>
                                    <span><?php the_sub_field('j_tag'); ?></span>
                                <?php endwhile;
                            endif; ?>
                        </div>

                        <i class="icon-plus"></i>
                        <i class="icon-minus"></i>
                    </div>

                    <div class="jobs__item-body">
                        <div class="jobs__item-body-inner">
                            <div class="jobs__item-body-top">
                                <?php if(get_sub_field('j_aufgaben')) : ?>
                                <div class="jobs__item-body-column">
                                    <?php the_sub_field('j_aufgaben'); ?>
                                </div>
                                <?php endif; ?>
                                <?php if(get_sub_field('j_anforderungen')) : ?>
                                    <div class="jobs__item-body-column">
                                        <?php the_sub_field('j_anforderungen'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_sub_field('j_vorteile')) : ?>
                                    <div class="jobs__item-body-column">
                                        <?php the_sub_field('j_vorteile'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="jobs__item-body-bottom">
                                <?php if(get_sub_field('j_kontakt')) : ?>
                                    <div class="jobs__item-body-contact">
                                        <?php the_sub_field('j_kontakt'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
			<?php endwhile;
		endif; ?>
        </div>

    </div>

</div>