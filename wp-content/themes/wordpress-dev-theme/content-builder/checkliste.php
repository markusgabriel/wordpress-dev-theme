<div class="content-builder__item checklist">

	<?php if(get_sub_field('cl_anker_id')) : ?>
        <a id="<?php the_sub_field('cl_anker_id'); ?>"></a>
	<?php endif; ?>

    <div class="checklist__inner">

        <div class="checklist__headline">
	        <h4><?php the_sub_field('cl_headline'); ?></h4>
        </div>

        <div class="checklist__wrapper">

            <div class="checklist__left">
	            <?php the_sub_field('cl_liste_links'); ?>
            </div>

            <div class="checklist__right">
	            <?php the_sub_field('cl_liste_rechts'); ?>
            </div>

        </div>

    </div>

</div>