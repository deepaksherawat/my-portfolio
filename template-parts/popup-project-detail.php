<!-- start: Portfolio Popup -->
<div id="portfolio-wrapper-<?php echo get_the_ID(); ?>" class="popup_content_area zoom-anim-dialog mfp-hide" data-lenis-prevent>
<div class="popup_modal_content">
<div class="portfolio_info">
<div class="portfolio_info_text">
<h2 class="title"><?php the_title(); ?></h2>
<div class="desc">
<?php
$desc = get_field('project_description');
$limit = 250; // jitne characters chahiye
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
if( $images ):
?>
<div class="portfolio_gallery owl-carousel">
<?php foreach( $images as $image ): ?>
<div class="gallery_item">
<img src="<?php echo esc_url($image['sizes']['project_image_size']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
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