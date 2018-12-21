<?php
/**
 * @package Khutbah_JAIS
 */
get_header(); ?>
<div class="wrap section group page">
    <div class="col span_8_of_12 article">
        <?php while ( have_posts() ) : the_post(); ?>
        <h2>
            <?php the_title(); ?>
        </h2>
        <h3>
            <?php the_field('khutbah_video_date'); ?>
        </h3>
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