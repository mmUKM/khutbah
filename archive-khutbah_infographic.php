<?php
/**
 * @package Khutbah_JAIS
 */
get_header(); ?>
<div class="wrap section group page">
    <div class="col span_12_of_12 article">
        <h2 class="uk-h2">Infographic</h2>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Tarikh</th>
                    <th>Infografik</th>
                </tr>
            </thead>
            <tbody>
            <?php

            $infographic = new WP_Query( 
                array(
                    'post_type' => 'khutbah_infographic',
                    'posts_per_page' => '-1'
                    )
                );
            
            while ( $infographic->have_posts() ) : $infographic->the_post(); ?>
                <tr>
                    <td><?php the_field('khutbah_infographic_date'); ?></td>
                    <td>
                        <div uk-lightbox>
                            <a href="<?php the_field('khutbah_infographic_file'); ?>"><?php the_title(); ?></a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php get_footer(); ?>