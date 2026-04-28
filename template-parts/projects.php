<!-- start: Portfolio Area -->
<section class="portfolio-section style-5">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header style-3 portfolio_nav_desktop">
<div class="sec-text">
<span class="subtitle wow fadeInLeft" data-wow-delay=".3s">Behind the Pixels</span>
<h2 class="title">My Latest Projects</h2>
</div>
<div class="portfolio-navigation d-none d-lg-inline-flex wow fadeInRight" data-wow-delay=".4s">
<div class="portfolio-prev"><i class="fa-solid fa-arrow-left"></i></div>
<div class="portfolio-next"><i class="fa-solid fa-arrow-right"></i></div>
</div>
<div class="portfolio-button wow fadeInRight" data-wow-delay=".5s">
<a class="btn tj-btn-primary" href="#">View All Project <i class="fa-solid fa-arrow-right"></i></a>
</div>

</div>
</div>
</div>
</div>
<div class="container portfolio_slider">
<div class="row">
<div class="col-12">
<div class="swiper portfolio-slider-5">
<div class="swiper-wrapper">
<?php
$args = array(
'post_type' => 'project', // ya custom post type
'posts_per_page' => -1,
'meta_key' => 'launch_date',
'orderby' => 'meta_value',
'order' => 'DESC', // ASC = upcoming, DESC = latest
);
$query = new WP_Query($args);
if($query->have_posts()) :
while($query->have_posts()) : $query->the_post();
?>                               
<div class="swiper-slide">
<div class="portfolio-item style-5 wow fadeInUp" data-wow-delay=".9s">
<div class="image-box">
<a class="modal-popup" href="#portfolio-wrapper-<?php echo get_the_ID(); ?>">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
echo '<img src="'.$img.'" alt="'.get_the_title().'">';
}
?>
</a>
</div>
<div class="content-box">
<div class="portfolio-text">
<h5 class="portfolio-title"><a class="modal-popup" href="#portfolio-wrapper-<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></h5>
<p><?php the_category(', '); ?></p>
</div>
<div class="portfolio-arrow">
<a class="modal-popup" href="#portfolio-wrapper-<?php echo get_the_ID(); ?>">
<span class="icon_box">
<i class="icon_first fa-solid fa-arrow-right"></i>
<i class="icon_second fa-solid fa-arrow-right"></i>
</span>
</a>
</div>
</div>
</div>
</div>

<!-- start: Portfolio Popup -->
<div id="portfolio-wrapper-<?php echo get_the_ID(); ?>" class="popup_content_area zoom-anim-dialog mfp-hide" data-lenis-prevent>
<div class="popup_modal_content">
<div class="portfolio_info">
<div class="portfolio_info_text">
<h2 class="title"><?php the_title(); ?></h2>
<div class="desc">
<?php
$desc = get_field('project_description');
$limit = 200; // jitne characters chahiye
if($desc){
echo substr(strip_tags($desc), 0, $limit);
if(strlen($desc) > $limit){
echo '... ';
echo '<a href="#project-full-content" class="project_read_more">Read More</a>';
}
}
?>
</div>
<?php if( get_field('website_url') ): ?>
<a href="<?php the_field('website_url'); ?>" target="_blank" class="btn tj-btn-primary">live preview <i class="fa-solid fa-arrow-right"></i></a>
<?php endif; ?>
</div>
<div class="portfolio_info_items">
<?php if( get_field('project_name') ): ?>
<div class="info_item">
<div class="key">Project Name</div>
<div class="value"><?php the_field('project_name'); ?></div>
</div>
<?php endif;
if( get_field('developed_in') ): ?>
<div class="info_item">
<div class="key">Developed In</div>
<div class="value"><?php the_field('developed_in'); ?></div>
</div>
<?php endif;
if( get_field('technology') ): ?>
<div class="info_item">
<div class="key">Technology</div>
<div class="value"><?php the_field('technology'); ?></div>
</div>
<?php endif;
if( get_field('launch_date') ): ?>
<div class="info_item">
<div class="key">Launch Date</div>
<div class="value"><?php the_field('launch_date'); ?></div>
</div>
<?php endif; ?>
</div>
</div>
<?php
$images = get_field('project_gallery');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $images ):
?>
<div class="portfolio_gallery owl-carousel">
<?php foreach( $images as $image_id ): ?>
<div class="gallery_item">
<?php echo wp_get_attachment_image( $image_id, $size ); ?>
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>
<?php if( get_field('project_description') ): ?>
<div id="project-full-content" class="portfolio_description">
<h2 class="title">Project Description</h2>
<div class="desc">
<?php the_field('project_description'); ?>
</div>
</div>
<?php endif; ?>
<?php if( have_rows('project_case_study') ): ?>
<div class="portfolio_story_approach">
<?php
while( have_rows('project_case_study') ) : the_row();
$case_study_heading = get_sub_field('case_study_heading');
$case_study_content = get_sub_field('case_study_content');
?>
<div class="portfolio_story">
<div class="story_title">
<h4 class="title"><?php echo $case_study_heading; ?></h4>
</div>
<div class="story_content">
<p><?php echo $case_study_content; ?></p>
</div>
</div>
<?php endwhile; ?>
</div>
<?php endif; ?>

</div>
</div>
<!-- end: Portfolio Popup -->

<?php endwhile; wp_reset_postdata(); endif; ?>
</div>
<div class="portfolio-pagination"></div>
</div>
<div class="portfolio_nav_mobile">
<div class="portfolio-navigation wow fadeInRight" data-wow-delay=".4s">
<div class="portfolio-prev"><i class="fa-solid fa-arrow-left"></i></div>
<div class="portfolio-next"><i class="fa-solid fa-arrow-right"></i></div>
</div>
<div class="portfolio-button wow fadeInRight" data-wow-delay=".5s">
<a class="btn tj-btn-primary" href="#">View All Project <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- end: Portfolio Area -->