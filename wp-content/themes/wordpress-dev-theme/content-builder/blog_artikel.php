<div class="content-builder__item blog-articles">

    <?php if(get_sub_field('ba_anker_id')) : ?>
        <a id="<?php the_sub_field('ba_anker_id'); ?>"></a>
    <?php endif; ?>

    <div class="blog-articles__inner">

        <div class="blog-articles__inner-text">
            <?php the_sub_field('ba_text'); ?>
        </div>

        <div class="blog-articles__inner-wrapper">
            <?php if(get_sub_field('ba_anzeige') == 'selected') :
	            $featured_posts = get_sub_field('ba_artikel');
	            if( $featured_posts ): ?>
			            <?php foreach( $featured_posts as $post ) :
				            setup_postdata($post); ?>
                            <div class="blog-articles__item">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
			            <?php endforeach; ?>
		            <?php wp_reset_postdata(); ?>
	            <?php endif;
            else :
                $the_query = new WP_Query( 'posts_per_page=3' );
                while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    <div class="blog-articles__item">
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                            <div class="blog-articles__item-image">
                                <?php the_post_thumbnail('image_410_290'); ?>
                            </div>
                            <div class="blog-articles__item-text">
                                <h3><?php the_title(); ?></h3>
                                <div>
	                                <?php
                                        $post_date = get_the_date( 'd.m.Y' );
                                        echo $post_date;
	                                ?>
                                </div>
                                <p><?php the_field('kurzbeschreibung') ?></p>
                                <span class="button is--secondary is--large">
                                    <?php _e('Artikel lesen', 'kuechenring-haendlerseiten'); ?>
                                </span>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>

    </div>

</div>