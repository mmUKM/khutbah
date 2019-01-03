<?php
/**
 * @package Khutbah_JAIS
 */
get_header(); ?>
<div class="wrap section group page">
    <div class="col span_12_of_12 article">
        <h2 class="uk-h2">Video</h2>
        <div class="wrap group">
            <div class="archive-toggle-view span_3_of_12">
            <button class="uk-button uk-button-default uk-float-right" type="button" uk-toggle="target: .toggle; animation: uk-animation-fade"><span uk-icon="thumbnails"></span></button>
                <button class="uk-button uk-button-default uk-float-right archive-toggle-view-button" type="button" uk-toggle="target: .toggle"><span uk-icon="list"></span></button>
            </div>
        </div>
        <div class="toggle">
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Tarikh</th>
                    <th>Tajuk Khutbah</th>
                    <th>Papar</th>
                </tr>
            </thead>
            <tbody>
            <?php while ( have_posts() ) : the_post(); ?>
                <tr>
                    <td><?php the_field('khutbah_video_date'); ?></td>
                    <td><a href="<?php echo get_post_permalink( $post->ID ); ?>"><?php the_title(); ?></a></td>
                    <td>
                        <div uk-lightbox>
                            <a class="uk-button uk-button-default uk-button-small" href="<?php the_field('khutbah_video_short', false, false); ?>" data-caption="<?php the_title(); ?>">5 Min</a>
                            <a class="uk-button uk-button-primary uk-button-small" href="<?php the_field('khutbah_video_link', false, false); ?>" data-caption="<?php the_title(); ?>">Penuh</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        <div class="navigation">
            <p><?php posts_nav_link('&#8734;','Khutbah Terkini','Khutbah Terdahulu'); ?></p>
        </div>
        </div>

        <div class="toggle" hidden>

        <div class="uk-child-width-1-3@m uk-grid-match" uk-scrollspy="target: > div; cls:uk-animation-fade; delay: 500" uk-grid>
            <?php

            $khutbah_video = new WP_Query( 
            array(
                'post_type' => 'khutbah_video',
                'posts_per_page' => '-1'
                )
            );

            while ( $khutbah_video->have_posts() ) : $khutbah_video->the_post(); ?>
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <?php if( get_field('khutbah_video_poster') ): ?>
                        <img src="<?php the_field('khutbah_video_poster'); ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title uk-margin-remove-bottom"><a href="<?php echo get_post_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h3>
                        <p class="uk-text-meta uk-margin-remove-top"><?php the_field('khutbah_video_date'); ?></p>
                        <p class="uk-text-meta uk-text-left"><span uk-icon="user"></span> <?php the_field('khutbah_video_khatib'); ?></p>
                        <p class="uk-text-meta uk-text-left uk-margin-remove-top"><span uk-icon="location"></span> <?php the_field('khutbah_video_location'); ?></p>
                        <div uk-lightbox>
                            <a class="uk-button uk-button-default uk-button-small" href="<?php the_field('khutbah_video_short', false, false); ?>" data-caption="<?php the_title(); ?>">5 Min</a>
                            <a class="uk-button uk-button-primary uk-button-small" href="<?php the_field('khutbah_video_link', false, false); ?>" data-caption="<?php the_title(); ?>">Penuh</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>