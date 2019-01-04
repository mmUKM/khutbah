<?php
/**
 * @package Khutbah_JAIS
 */
get_header();
/**
 * index.php
 * 1. uikit slideshow (Custom Post Type: Slider)
 * 2. uikit card (Custom Post Type: Podcast)
 */

 // SLIDERS - uikit slideshow
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
            <?php if( get_field('khutbah_slider_caption') ): ?>
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
            <?php endif; ?>
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
<?php // LATEST PODCAST uikit-card ?>
<div class="wrap uk-margin front-content">

    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <?php

        $khutbah_video = new WP_Query( 
            array(
                'post_type' => 'khutbah_podcast',
                'posts_per_page' => '1'
            )
            );
        
        while ( $khutbah_video->have_posts() ) : $khutbah_video->the_post(); ?>
        <div class="uk-card-media-left uk-cover-container">
            <?php if( get_field('khutbah_podcast_poster') ): ?>
            <img src="<?php the_field('khutbah_podcast_poster'); ?>" alt="" uk-cover>
            <?php endif; ?>
            <canvas width="600" height="400"></canvas>
        </div>
        <div>
            <div class="uk-card-body">
                <h1>Podcast Terkini</h1>
                <h3 class="uk-card-title uk-margin-remove"><a href="<?php echo get_post_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h3>
                <p class="uk-text-meta uk-margin-remove-top"><?php the_field('khutbah_podcast_date'); ?></p>
                <p class="uk-text-meta uk-text-left"><span uk-icon="user"></span> <?php the_field('khutbah_podcast_khatib'); ?></p>
                <p class="uk-text-meta uk-text-left uk-margin-remove-top"><span uk-icon="location"></span> <?php the_field('khutbah_podcast_location'); ?></p>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php // LATEST PODCAST uikit-card 6 posts ?>
    <div class="uk-child-width-1-3@m uk-grid-match" uk-scrollspy="target: > div; cls:uk-animation-fade; delay: 500" uk-grid>
        <?php

        $khutbah_podcast = new WP_Query( 
        array(
            'post_type' => 'khutbah_podcast',
            'posts_per_page' => '6'
            )
        );

        while ( $khutbah_podcast->have_posts() ) : $khutbah_podcast->the_post(); ?>
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <?php if( get_field('khutbah_podcast_poster') ): ?>
                    <img src="<?php the_field('khutbah_podcast_poster'); ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title uk-margin-remove"><a href="<?php echo get_post_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h3>
                    <p class="uk-text-meta uk-margin-remove-top"><?php the_field('khutbah_podcast_date'); ?></p>
                    <p class="uk-text-meta uk-text-left"><span uk-icon="user"></span> <?php the_field('khutbah_podcast_khatib'); ?></p>
                    <p class="uk-text-meta uk-text-left uk-margin-remove-top"><span uk-icon="location"></span> <?php the_field('khutbah_podcast_location'); ?></p>
                    <p uk-margin>
                        <a class="uk-icon-button uk-margin-small-right" uk-icon="soundcloud"
                            href="
                            <?php
                                echo get_post_permalink( $podcast->ID);
                            ?>
                            "
                        >
                        </a>
                        <a class="uk-icon-button" uk-icon="youtube"
                            href="
                            <?php
                                echo the_field('khutbah_podcast_video');
                            ?>
                            "
                        >
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php if (dynamic_sidebar( 'sidebar_1' )) : else : endif; ?>

<?php get_footer(); ?>