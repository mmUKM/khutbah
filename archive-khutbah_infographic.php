<?php
/**
 * @package Khutbah_JAIS
 */
get_header(); ?>
<div class="wrap section group page">
    <div class="col span_12_of_12 article">
        <h2 class="uk-h2">Infographic</h2>
        <div class="wrap group">
        <div class="uk-child-width-1-3@m uk-grid-match" uk-scrollspy="target: > div; cls:uk-animation-fade; delay: 500" uk-grid>
            <?php

            $khutbah_infographic = new WP_Query( 
            array(
                'post_type' => 'khutbah_infographic',
                'posts_per_page' => '-1'
                )
            );

            while ( $khutbah_infographic->have_posts() ) : $khutbah_infographic->the_post(); ?>
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <?php if( get_field('khutbah_infographic_file') ): ?>
                        <img src="<?php the_field('khutbah_infographic_file'); ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title uk-margin-remove">
                        <div uk-lightbox>
                        <a href="<?php the_field('khutbah_infographic_file'); ?>"><?php the_title(); ?></a>
                        </div>
                        </h3>
                        <p class="uk-text-meta uk-margin-remove-top"><?php the_field('khutbah_infographic_date'); ?></p>
                        <p class="uk-align-center"><?php echo do_shortcode('[Sassy_Social_Share style="background-color:#fff;"]') ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>