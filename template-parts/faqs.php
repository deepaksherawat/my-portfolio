<!-- start: Faq Area -->
<?php if( have_rows('faq_content') ): ?>
<section class="faq-section">
<div class="container">
<?php if(get_field('faq_heading')): ?>
<div class="row">
<div class="col-md-12">
<div class="section-header text-center">
<h2 class="section-title wow fadeInUp" data-wow-delay=".3s"><?php the_field('faq_heading') ?></h2>
</div>
</div>
</div>
<?php endif; ?>
<?php if( have_rows('faq_content') ): ?>
<div class="row">
<div class="col-12">
<div class="accordion tj-faq" id="faqOne">
<?php while( have_rows('faq_content') ) : the_row();
$faq_question = get_sub_field('faq_question');
$faq_answer = get_sub_field('faq_answer'); ?>
<div class="accordion-item <?php echo ( get_row_index() == 1 ) ? 'active' : ''; ?> wow fadeInUp" data-wow-delay=".4s">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<button class="faq-title" type="button" data-bs-toggle="collapse" data-bs-target="#faq-<?php echo get_row_index(); ?>" aria-expanded="false"><span class="faq_index">Q<?php echo get_row_index(); ?>. </span><?php echo $faq_question; ?></button>
<div id="faq-<?php echo get_row_index(); ?>" class="collapse <?php echo ( get_row_index() == 1 ) ? 'show' : ''; ?>" data-bs-parent="#faqOne">
<div class="accordion-body faq-text">
<p><span class="faq_index">Ans. </span><?php echo $faq_answer; ?></p>
</div>
</div>
</div>
<?php endwhile; ?>        
</div>
</div>
</div>
<?php endif; ?>
</div>
</section>
<?php endif; ?>
<!-- end: Faq Area -->