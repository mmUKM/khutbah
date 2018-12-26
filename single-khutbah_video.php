<?php
/**
 * @package Khutbah_JAIS
 */
get_header(); ?>
<div class="wrap section group page">
    <div class="col span_8_of_12 article">
        <?php while ( have_posts() ) : the_post(); ?>
        <h2 class="uk-margin-remove">
            <?php the_title(); ?>
        </h2>
        <p class="uk-text-meta uk-text-left uk-margin-remove-bottom"><span uk-icon="calendar"></span> <?php the_field('khutbah_video_date'); ?></p>
        <p class="uk-text-meta uk-text-left uk-margin-remove"><span uk-icon="user"></span> <?php the_field('khutbah_video_khatib'); ?></p>
        <p class="uk-text-meta uk-text-left uk-margin-remove-top"><span uk-icon="location"></span> <?php the_field('khutbah_video_location'); ?></p>
        <div class="embed-container">
            <?php the_field('khutbah_video_link'); ?>
        </div>
        <?php the_field('khutbah_video_descriptions'); ?>
        <?php endwhile; ?>
    </div>
    <div class="col span_4_of_12 sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>