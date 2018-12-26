<?php
/**
 * @package Khutbah_JAIS
 */
get_header(); ?>
<div class="wrap section group page">
    <div class="col span_12_of_12 article">
        <h2 class="uk-h2">Slide</h2>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Tarikh</th>
                    <th>Tajuk Khutbah</th>
                </tr>
            </thead>
            <tbody>
            <?php

            $slide = new WP_Query( 
                array(
                    'post_type' => 'khutbah_slide',
                    'posts_per_page' => '-1'
                    )
                );
            
            while ( $slide->have_posts() ) : $slide->the_post(); ?>
                <tr>
                    <td><?php the_field('khutbah_slide_date'); ?></td>
                    <td><a href="<?php the_field('khutbah_slide_file'); ?>"><?php the_title(); ?></a></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php get_footer(); ?>