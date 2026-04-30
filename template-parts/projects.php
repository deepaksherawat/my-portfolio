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

$stories = get_field('project_case_study');
$stories_json = '';
if($stories){
  $stories_json = htmlspecialchars(json_encode($stories), ENT_QUOTES, 'UTF-8');
}

$gallery = get_field('project_gallery');

$gallery_json = '';
if($gallery){
  $gallery_json = htmlspecialchars(json_encode($gallery), ENT_QUOTES, 'UTF-8');
}


$date = get_field('launch_date');

if($date){
    $clean_date = str_replace(' | ', '-', $date);
    $formatted_date = date("d F Y", strtotime($clean_date));
}

?>                               
<div class="swiper-slide">
<div class="portfolio-item style-5 wow fadeInUp" data-wow-delay=".9s" data-title="<?php the_title(); ?>" data-desc="<?php echo esc_attr(wp_strip_all_tags(get_field('project_description'))); ?>" data-url="<?php the_field('website_url'); ?>" data-project-name="<?php echo esc_attr(get_field('project_name')); ?>" data-developed-by="<?php echo esc_attr(get_field('developed_in')); ?>" data-technology="<?php echo esc_attr(get_field('technology')); ?>" data-launch-date="<?php echo esc_attr($formatted_date); ?>" data-stories="<?php echo $stories_json; ?>" data-gallery="<?php echo $gallery_json; ?>">
<div class="image-box">
<a class="modal-popup open-popup" href="#portfolio-wrapper">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'project_thumbnail');
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
<a class="modal-popup open-popup" href="#portfolio-wrapper">
<span class="icon_box">
<i class="icon_first fa-solid fa-arrow-right"></i>
<i class="icon_second fa-solid fa-arrow-right"></i>
</span>
</a>
</div>
</div>
</div>
</div>

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
<!-- start: Portfolio Popup -->
<?php get_template_part('template-parts/popup-portfolio'); ?>
<!-- end: Portfolio Popup -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/portfolio-popup.js"></script>