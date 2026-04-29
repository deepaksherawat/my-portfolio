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
<section class="tj-portfolio-section style-8">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header style-5">
<div class="sec-text">
<span class="subtitle" data-wow-delay=".3s">My portfolios 23</span>
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
  'post_type' => 'project',
  'posts_per_page' => -1
);
$query = new WP_Query($args);
$count = 1;

if ($query->have_posts()) :
  while ($query->have_posts()) : $query->the_post();
?>

<div class="portfolio_card"
     data-title="<?php the_title(); ?>"
     data-desc="<?php echo esc_attr(wp_trim_words(get_the_content(), 25)); ?>"
     data-img="<?php echo get_the_post_thumbnail_url(get_the_ID(),'large'); ?>"
     data-project="<?php the_field('project_name'); ?>"
     data-developed="<?php the_field('developed_in'); ?>"
     data-tech="<?php the_field('technology'); ?>"
     data-date="<?php the_field('launch_date'); ?>"
     data-url="<?php the_field('website_url'); ?>"
>

<div class="row">
<div class="col-lg-6 portfolio_card_left">

<h3>
<span><?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?>.</span>
<?php the_title(); ?>
</h3>

<p><?php echo wp_trim_words(get_the_content(), 20); ?></p>

<div class="tj-portfolio-5-accordion-list-button">
<a href="#" class="btn tj-btn-primary open-popup">
View Details <i class="fa-solid fa-arrow-right"></i>
</a>
</div>

</div>

<div class="col-lg-6 portfolio_card_right">
<img src="<?php the_post_thumbnail_url('medium'); ?>" alt="">
</div>

</div>
</div>

<?php
$count++;
endwhile;
wp_reset_postdata();
endif;
?>

<!-- Load More -->
<div class="text-center mt-4" id="loadMoreWrapper">
<button id="loadMorePortfolio" class="btn tj-btn-primary">
Load More
</button>
</div>

</div>

<div id="portfolio-popup" class="popup_content_area mfp-hide">
  <div class="popup_modal_img">
    <img id="popup-img" src="" alt="">
  </div>

  <div class="popup_modal_content">
    <h2 id="popup-title"></h2>
    <p id="popup-desc"></p>

    <div class="portfolio_info_items">
      <div><b>Project:</b> <span id="popup-project"></span></div>
      <div><b>Developed:</b> <span id="popup-developed"></span></div>
      <div><b>Tech:</b> <span id="popup-tech"></span></div>
      <div><b>Date:</b> <span id="popup-date"></span></div>
    </div>

    <a id="popup-url" href="#" target="_blank" class="btn tj-btn-primary">
      Live Preview
    </a>
  </div>
</div>

</div>
</div>
</section>
<!-- end: Portfolio Area -->
</main>
<?php get_footer(); ?>