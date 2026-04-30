<?php 
/*
Template Name: Portfolio
*/
get_header();
?>
<main class="site-content" id="content">
<!-- START: Breadcrumb and Skill Marquee Section -->
<?php
get_template_part('template-parts/breadcrumb');
get_template_part('template-parts/marquee');
?>
<!-- END: Breadcrumb and Skill Marquee Section -->
<!-- start: Portfolio Area -->
<section class="tj-portfolio-section style-8 portfolio-page">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header style-5">
<div class="sec-text">
<span class="subtitle" data-wow-delay=".3s">My portfolios</span>
<!-- <h2 class="title tj-text-invert">Here's How I can Help!</h2> -->
<h2 class="section-title wow fadeInUp" data-wow-delay=".3s">Here's How I can Help!</h2>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div id="portfolioContainer">
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

$gallery_data = [];

if (!empty($gallery)) {
    foreach ($gallery as $img) {
        $gallery_data[] = $img['url'];
    }
}

// Always valid JSON
$gallery_json = json_encode($gallery_data);


$date = get_field('launch_date');

if($date){
    $clean_date = str_replace(' | ', '-', $date);
    $formatted_date = date("d F Y", strtotime($clean_date));
}

?>
<!-- cards -->
<div class="portfolio_card" data-title="<?php the_title(); ?>" data-desc="<?php echo esc_attr(wp_strip_all_tags(get_field('project_description'))); ?>" data-url="<?php the_field('website_url'); ?>" data-project-name="<?php echo esc_attr(get_field('project_name')); ?>" data-developed-by="<?php echo esc_attr(get_field('developed_in')); ?>" data-technology="<?php echo esc_attr(get_field('technology')); ?>" data-launch-date="<?php echo esc_attr($formatted_date); ?>" data-stories="<?php echo $stories_json; ?>" data-gallery='<?php echo json_encode($gallery_data); ?>'>
<div class="row">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="col-lg-6 col-md-6 col-12 portfolio_card_left">
<h3 class="tj-portfolio-5-accordion-list-title">
<span><?php echo str_pad($query->current_post + 1, 2, '0', STR_PAD_LEFT); ?>.</span> <?php the_title(); ?>
</h3>
<div class="project-metabox">
  <div class="pro-meta">
    <p class="p-meta-title">project name</p>
    <p class="p-meta-value"><?php echo the_field('project_name'); ?></p>
  </div>
  <div class="pro-meta">
    <p class="p-meta-title">Developed In</p>
    <p class="p-meta-value"><?php echo the_field('developed_in'); ?></p>
  </div>
  <div class="pro-meta">
    <p class="p-meta-title">Technology</p>
    <p class="p-meta-value"><?php echo the_field('technology'); ?></p>
  </div>
  <div class="pro-meta">
    <p class="p-meta-title">Launch Date</p>
    <p class="p-meta-value">
<?php 
$date = get_field('launch_date');

if($date){
    // "2026 | 02 | 25" → "2026-02-25"
    $clean_date = str_replace(' | ', '-', $date);

    echo esc_html(date("d F Y", strtotime($clean_date)));
}
?>
</p>
  </div>
</div>
<div class="tj-portfolio-5-accordion-list-button">
<a class="btn tj-btn-primary modal-popup open-popup" href="#portfolio-wrapper">View Case Study <i class="fa-solid fa-arrow-right"></i></a>
<a class="btn tj-btn-primary" href="<?php echo the_field('website_url'); ?>" target="_blank">View Live Website <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12 portfolio_card_right">
<div class="tj-portfolio-5-accordion-list-image">
<div class="tj-portfolio-5-accordion-thumb">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'project_thumbnail_page');
echo '<img class="portfolio-image" src="'.$img.'" alt="'.get_the_title().'">';
}
?>
</div>
</div>
</div>
</div>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>
<!-- Load More Button -->
<div class="text-center mt-4" id="loadMoreWrapper">
<button id="loadMorePortfolio" class="btn tj-btn-primary">Load More<i class="fa-solid fa-arrow-right"></i></button>
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
</main>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/portfolio-popup.js"></script>

<?php get_footer(); ?>