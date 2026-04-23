<?php 
/*
Template Name: Homepage
*/
get_header();
?>
<!-- Start Main Section -->
<main class="site-content" id="content">
<?php
get_template_part('template-parts/hero');
get_template_part('template-parts/service');
get_template_part('template-parts/resume');
get_template_part('template-parts/skills');
get_template_part('template-parts/testimonials');
get_template_part('template-parts/blog-slider');
get_template_part('template-parts/faqs');

?>
</main>
<!-- End Main Section -->
<?php get_footer(); ?>