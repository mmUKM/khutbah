<?php
/**
 * @package Khutbah_JAIS
 */
get_header(); ?>
<div class="wrap section group page">
    <div class="col span_12_of_12 article">
        <h2 class="uk-h2">Slide</h2>
        <div class="wrap group">
            <div class="archive-toggle-view span_3_of_12">
            <button class="uk-button uk-button-default uk-float-right" type="button" uk-toggle="target: .toggle; animation: uk-animation-fade"><span uk-icon="thumbnails"></span></button>
                <button class="uk-button uk-button-default uk-float-right archive-toggle-view-button" type="button" uk-toggle="target: .toggle"><span uk-icon="list"></span></button>
            </div>
        </div>
        <div class="toggle" hidden>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Tarikh</th>
                    <th>Tajuk Khutbah</th>
                </tr>
            </thead>
            <tbody>
            <?php while ( have_posts() ) : the_post(); ?>
                <tr>
                    <td><?php the_field('khutbah_slide_date'); ?></td>
                    <td><a href="<?php the_field('khutbah_slide_file'); ?>"><?php the_title(); ?></a></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        <div class="navigation">
            <p><?php posts_nav_link('&#8734;','Khutbah Terkini','Khutbah Terdahulu'); ?></p>
        </div>
        </div>

        <div class="toggle">

        <div class="uk-child-width-1-3@m uk-grid-match" uk-scrollspy="target: > div; cls:uk-animation-fade; delay: 500" uk-grid>
            <?php

            $khutbah_slide = new WP_Query( 
            array(
                'post_type' => 'khutbah_slide',
                'posts_per_page' => '-1'
                )
            );

            while ( $khutbah_slide->have_posts() ) : $khutbah_slide->the_post(); ?>
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <?php if( get_field('khutbah_slide_poster') ): ?>
                        <img src="<?php the_field('khutbah_slide_poster'); ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title uk-margin-remove"><a href="<?php the_field('khutbah_slide_file'); ?>"><?php the_title(); ?></a></h3>
                        <p class="uk-text-meta uk-margin-remove-top"><?php the_field('khutbah_slide_date'); ?></p>
                        <p class="uk-align-center"><?php echo do_shortcode('[Sassy_Social_Share style="background-color:#fff;"]') ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>