<!-- start: Skills Area -->
<section class="tj-progress-7-area">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header style-5">
<div class="sec-text">
<span class="subtitle wow fadeInUp" data-wow-delay=".3s">My Skills</span>
<!-- <h2 class="title tj-text-invert">Mastering SEO Skills</h2> -->
<h2 class="section-title wow fadeInUp" data-wow-delay=".3s">Mastering SEO Skills</h2>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="my-skills">
<?php
$args = array(
'post_type'      => 'skills',
'posts_per_page' => -1,
'order' => 'ASC'
);
$query = new WP_Query($args);
if ($query->have_posts()) :
while ($query->have_posts()) : $query->the_post();
?>
<div class="skill_title wow fadeInUp" data-wow-delay=".3s"><?php the_title(); ?></div>
<?php endwhile; wp_reset_postdata(); endif; ?>
</div>
<div class="skills-button">
<a href="#" class="btn tj-btn-primary wow fadeInUp" data-wow-delay=".3s">Download CV <i class="fa-solid fa-arrow-right"></i></a>
<a href="#contact-wrapper" class="btn tj-btn-secondary modal-popup wow fadeInUp" data-wow-delay=".3s">Get in Touch <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>
</div>

</div>
</section>
<!-- end: Sills Area -->
<!-- start: Footer Contact Popup -->
<?php get_template_part('template-parts/popup-contact-form'); ?>
<!-- end: Footer Contact Popup -->