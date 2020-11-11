<div class="content-builder__item team">

	<?php if(get_sub_field('team_anker_id')) : ?>
        <a id="<?php the_sub_field('team_anker_id'); ?>"></a>
	<?php endif; ?>

    <div class="team__inner">

		<?php if(have_rows('team_personen')) :
			while(have_rows('team_personen')) : the_row(); ?>
                <div class="team__item">

	                <?php if(get_sub_field('tp_anker_id')) : ?>
                        <a id="<?php the_sub_field('tp_anker_id'); ?>"></a>
	                <?php endif; ?>

                    <div class="team__item-inner">

                        <div class="team__item-inner-image">
                        <?php $tpimage = get_sub_field('tp_bild');
                        echo wp_get_attachment_image($tpimage, 'image_300_300'); ?>
                        </div>

                        <div class="team__item-inner-text">
                            <h4><?php the_sub_field('tp_name'); ?></h4>
                            <p><?php the_sub_field('tp_position'); ?></p>
                            <?php if(get_sub_field('tp_email')) : ?>
                                <a href="mailto:<?php the_sub_field('tp_email'); ?>" title="EMail">
                                    <i class="icon-mail"></i> <?php the_sub_field('tp_email'); ?>
                                </a>
                            <?php endif; ?>
	                        <?php if(get_sub_field('tp_telefonnummer')) : ?>
                                <a href="mailto:<?php the_sub_field('tp_telefonnummer'); ?>" title="EMail">
                                    <i class="icon-phone"></i> <?php the_sub_field('tp_telefonnummer'); ?>
                                </a>
	                        <?php endif; ?>
                        </div>

                    </div>

                </div>
			<?php endwhile;
		endif; ?>

    </div>

</div>