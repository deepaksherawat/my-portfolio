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
'post_type' => 'project', // ya custom post type
'posts_per_page' => -1,
//'meta_key' => 'launch_date',
//'orderby' => 'meta_value',
'order' => 'DESC', // ASC = upcoming, DESC = latest
);
$query = new WP_Query($args);
if($query->have_posts()) :
while($query->have_posts()) : $query->the_post();
?> 
<!-- cards -->
<div class="portfolio_card"
     data-id="<?php the_ID(); ?>"
     data-title="<?php the_title(); ?>"
     data-desc="<?php echo esc_attr(get_field('project_description')); ?>"
     data-url="<?php the_field('website_url'); ?>"
     data-gallery="<?php echo json_encode(get_field("project_gallery")); ?>"
     data-project-name="<?php echo esc_attr(get_field('project_name')); ?>"
     data-developed-in="<?php echo esc_attr(get_field('developed_in')); ?>"
     data-technology="<?php echo esc_attr(get_field('technology')); ?>"
     data-launch-date="<?php echo esc_attr(get_field('launch_date')); ?>"
>
<div class="row">
<div class="col-lg-6 col-md-6 col-12 portfolio_card_left">
<h3 class="tj-portfolio-5-accordion-list-title">
<span><?php echo str_pad($query->current_post + 1, 2, '0', STR_PAD_LEFT); ?>.</span> <?php the_title(); ?>
</h3>
<p class="tj-portfolio-5-accordion-list-paragraph">
<?php
$desc = get_field('project_description');
$limit = 250; // jitne characters chahiye
if($desc){
echo substr(strip_tags($desc), 0, $limit);
if(strlen($desc) > $limit){
echo '... ';
echo '<a href="#project-full-content-<?php the_ID(); ?>" class="project_read_more">Read More</a>';
}
}
?>
</p>
<div class="tj-portfolio-5-accordion-list-item">
<?php if( get_field('project_name') ): ?><p><span>Project Name : </span><?php the_field('project_name'); ?></p><?php endif; ?>
<?php if( get_field('developed_in') ): ?><p><span>Developed In : </span><?php the_field('developed_in'); ?></p><?php endif; ?>
<?php if( get_field('technology') ): ?><p><span>Technology : </span><?php the_field('technology'); ?></p><?php endif; ?>
<?php if( get_field('launch_date') ): ?><p><span>Launch Date : </span><?php the_field('launch_date'); ?></p><?php endif; ?>
</div>
<div class="tj-portfolio-5-accordion-list-button">
<a class="btn tj-btn-primary modal-popup open-popup" href="#">View Project Details <i class="fa-solid fa-arrow-right"></i></a>
<a class="btn tj-btn-primary" href="<?php the_field('website_url'); ?>" target="_blank">View Live Website <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12 portfolio_card_right">
<div class="tj-portfolio-5-accordion-list-image">
<div class="tj-portfolio-5-accordion-thumb">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'project_thumbnail');
echo '<img src="'.$img.'" alt="'.get_the_title().'">';
}
?>
</div>
</div>
</div>
</div>
</div>

<?php endwhile; wp_reset_postdata(); endif;  ?>

<!-- start: Portfolio Popup (STATIC) -->
<div id="portfolioPopup" class="popup_content_area zoom-anim-dialog mfp-hide" data-lenis-prevent>
  <div class="popup_modal_content">

    <div class="portfolio_info">
      <div class="portfolio_info_text">
        <h2 class="title" id="popupTitle"></h2>

        <div class="desc" id="popupShortDesc"></div>

        <a href="#" target="_blank" id="popupLink" class="btn tj-btn-primary">
          live preview <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>

      <div class="portfolio_info_items" id="popupMeta"></div>
    </div>

    <!-- Gallery -->
    <div class="portfolio_gallery owl-carousel" id="popupGallery"></div>

    <!-- Full Description -->
    <div id="popupFullContent" class="portfolio_description">
      <h2 class="title">Project Description</h2>
      <div class="desc" id="popupFullDesc"></div>
    </div>

    <!-- Case Study -->
    <div class="portfolio_story_approach" id="popupCaseStudy"></div>

  </div>
</div>
<!-- end -->


  
</div>
<!-- Load More Button -->
  <div class="text-center mt-4" id="loadMoreWrapper">
    <button id="loadMorePortfolio" class="btn tj-btn-primary">Load More<i class="fa-solid fa-arrow-right"></i></button>
  </div>
</div>
</div>
</div>
</section>
<!-- end: Portfolio Area -->
</main>
<?php get_footer(); ?>