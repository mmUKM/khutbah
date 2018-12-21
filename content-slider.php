<?php
/**
 * @package Khutbah_JAIS
 */
 ?>

<div class="uk-position-relative uk-visible-toggle" uk-slideshow="animation: push; ratio: 1440:560;">
    <ul class="uk-slideshow-items">
        <?php

        $slide = new WP_Query(
            array(
            'post_type' => 'khutbah_slider',
        ) );
        
        while ( $slide->have_posts() ) : $slide->the_post();
        
        ?>
        <li>
            <?php if( get_field('khutbah_slider_image') ): ?>
            <img src="<?php the_field('khutbah_slider_image'); ?>" alt="" uk-cover>
            <?php endif; ?>
            <div class="uk-position-center uk-position-small uk-text-center uk-light">
                <h2 class="uk-margin-remove"><?php the_title(); ?></h2>
                <p class="uk-margin-remove"><?php the_field('khutbah_slider_decriptions'); ?></p>
                <p uk-margin>
                    <a class="uk-button uk-button-default uk-button-large uk-width-1-2 uk-margin-small-bottom"
                        href="
                        <?php
                            $podcast = get_field('khutbah_slider_podcast');
                            echo get_post_permalink( $podcast->ID);
                        ?>
                        "
                    >
                    Podcast
                    </a>
                    <a class="uk-button uk-button-default uk-button-large uk-width-1-2 uk-margin-small-bottom"
                        href="
                        <?php
                            $video = get_field('khutbah_slider_video');
                            echo get_post_permalink( $video->ID);
                        ?>
                        "
                    >
                    Video
                    </a>
                </p>
            </div>
        </li>
        <?php  endwhile; ?>
    </ul>
    <div class="uk-light">
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
            uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
            uk-slideshow-item="next"></a>
    </div>
</div>