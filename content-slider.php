<?php
/**
 * @package Khutbah_JAIS
 
 */

$args = array(
  'post_type' => 'slideshow',
);
$slide = new WP_Query( $args );

?>
<div class="uk-slidenav-position" data-uk-slideshow="">
<ul class="uk-slideshow uk-overlay-active" data-uk-slideshow>
<?php while ( $slide->have_posts() ) : $slide->the_post(); ?>
    
        <li>
            <img src="<?php echo get_post_meta( get_the_ID(), '_jrwtdw_slide_image', true ); ?>" alt="<?php the_title(); ?>">
        </li>
    
    <?php  endwhile; ?>
    </ul>
    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)"></a>
</div>