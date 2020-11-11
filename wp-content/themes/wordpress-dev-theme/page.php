<?php get_header(); ?>

    <div class="content-builder">

        <?php if(have_rows('pagebuilder')) :
            while(have_rows('pagebuilder')) : the_row();

                if(get_row_layout() == 'bild_text') :
                    get_template_part('content-builder/bild_text');
                elseif(get_row_layout() == 'bild') :
                    get_template_part('content-builder/bild');
                elseif(get_row_layout() == 'bilder_galerie') :
                    get_template_part('content-builder/bilder_galerie');
                elseif(get_row_layout() == 'blog_artikel') :
                    get_template_part('content-builder/blog_artikel');
                elseif(get_row_layout() == 'call_to_action') :
                    get_template_part('content-builder/call_to_action');
                elseif(get_row_layout() == 'downloads') :
                    get_template_part('content-builder/downloads');
                elseif(get_row_layout() == 'grosser_slider') :
                    get_template_part('content-builder/grosser_slider');
                elseif(get_row_layout() == 'header_bild') :
                    get_template_part('content-builder/header_bild');
                elseif(get_row_layout() == 'icons') :
                    get_template_part('content-builder/icons');
                elseif(get_row_layout() == 'jobs') :
                    get_template_part('content-builder/jobs');
                elseif(get_row_layout() == 'kacheln') :
                    get_template_part('content-builder/kacheln');
                elseif(get_row_layout() == 'logos') :
                    get_template_part('content-builder/logos');
                elseif(get_row_layout() == 'presse') :
                    get_template_part('content-builder/presse');
                elseif(get_row_layout() == 'produkte') :
                    get_template_part('content-builder/produkte');
                elseif(get_row_layout() == 'team') :
                    get_template_part('content-builder/team');
                elseif(get_row_layout() == 'text') :
                    get_template_part('content-builder/text');
                elseif(get_row_layout() == 'text_auf_bild') :
                    get_template_part('content-builder/text_auf_bild');
                elseif(get_row_layout() == 'testimonial') :
                    get_template_part('content-builder/testimonial');
                elseif(get_row_layout() == 'teaser') :
                    get_template_part('content-builder/teaser');
                elseif(get_row_layout() == 'checkliste') :
                    get_template_part('content-builder/checkliste');
                endif;

            endwhile;
        endif; ?>

    </div>

<?php get_footer(); ?>