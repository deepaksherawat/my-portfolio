<!-- start: Resume Area -->
<section class="resume-section style-5">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-header style-3 text-center">
<span class="subtitle wow fadeInRight" data-wow-delay=".3s">Behind the Pixels</span>
<h2 class="section-title wow fadeInUp" data-wow-delay=".3s">My Experience & Education</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="resume-tabs">
<ul class="nav resume_menu_5 nav-pills wow fadeInUp" data-wow-delay=".3s" id="pills-tab" role="tablist">
<li class="resume-style-5" role="presentation">
<button class="resume-tab nav-link active" id="pills-home-tab" type="button" role="tab" data-bs-toggle="pill" data-bs-target="#resume_1" aria-selected="true">Experiences</button>
</li>
<li class="resume-style-5" role="presentation">
<button class="resume-tab nav-link" id="pills-profile-tab" type="button" role="tab" data-bs-toggle="pill" data-bs-target="#resume_2" aria-selected="false">Education</button>
</li>
</ul>
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="resume_1" aria-labelledby="pills-home-tab">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="resume_wrapper_5">
<?php
$args = array(
'post_type'      => 'resume',
'posts_per_page' => -1,
'tax_query'      => array(
array(
'taxonomy' => 'resume_type',
'field'    => 'slug',
'terms'    => 'work',
),
),
);
$query = new WP_Query($args);
if ($query->have_posts()) :
while ($query->have_posts()) : $query->the_post();
?>
<div class="resume_inner_5">
<div class="resume_item style-5">
<div class="icon_box mobile_version">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
echo '<img src="'.$img.'" alt="'.get_the_title().'">';
}else{
?><p class="company_name"><?php the_title(); ?></p><?php
}
?>
</div>
<div class="resume_content">
<div class="resume_text">
<h5 class="title"><?php the_field('role'); ?></h5>
<div class="exp_box">
<span class="subtitle"><i class="fa-regular fa-calendar"></i><?php the_title(); ?></span>
<span class="date mobile"><i class="fa-solid fa-location-arrow"></i><?php the_field('location'); ?> (<?php the_field('work_mode'); ?>)</span>
<span class="date mobile"><i class="fa-regular fa-calendar"></i><?php the_field('start_date'); ?> -<?php 
$is_current = get_field('currently_working_in_this_company');

if( $is_current ): ?>
    <span class="present-text">Present</span>
<?php else: ?>
    <?php the_field('end_date'); ?>
<?php endif; ?>
</span>
</div>
<div class="check-list">
<?php if( have_rows('key_responsibility') ): ?>
<ul class="resume-list">
<?php while( have_rows('key_responsibility') ) : the_row();
$add_key = get_sub_field('add_point'); ?>
<li>
<span><i class="fa-solid fa-check"></i></span><?php echo $add_key; ?></li>
<?php endwhile; ?>
</ul>
<button class="toggle-btn">Show More <i class="fa-solid fa-arrow-right"></i></button>
<?php endif; ?>
</div>
<div class="skill-set">
<?php
$skills = get_field('skills');
if($skills):
?>
<!-- <span>Skills Used In :</span> -->
<ul class="key-skills">
<?php foreach( $skills as $skill ): ?>
<li><?php echo $skill; ?></li>
<?php endforeach; ?>
</ul>
<span class="skills-toggle"></span>
<?php endif; ?>
</div>
</div>
</div>
<div class="icon_box desktop_version">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
echo '<img src="'.$img.'" alt="'.get_the_title().'">';
}else{
?><p class="company_name"><?php the_title(); ?></p><?php
}
?>
</div>
</div>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>
</div>
</div>
<div class="tab-pane fade" id="resume_2" aria-labelledby="pills-profile-tab">
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="resume_wrapper_5">
<?php
$args = array(
'post_type'      => 'resume',
'posts_per_page' => -1,
'tax_query'      => array(
array(
'taxonomy' => 'resume_type',
'field'    => 'slug',
'terms'    => 'education',
),
),
);
$query = new WP_Query($args);
if ($query->have_posts()) :
while ($query->have_posts()) : $query->the_post();
?>
<div class="resume_inner_5 education_inner">
<div class="resume_item style-5 eductaion">
<div class="icon_box eductaion_box">
<?php 
if ( has_post_thumbnail() ) {
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
echo '<img src="'.$img.'" alt="'.get_the_title().'">';
}else{
?><p class="company_name"><?php the_title(); ?></p><?php
}
?>
</div>
<div class="resume_content eductaion_content">
<div class="resume_text education_text">
<h5 class="title"><?php the_title(); ?></h5>
<div class="exp_box">
<?php if( get_field('school__university_name') ): ?><span class="subtitle"><i class="fa-solid fa-tag"></i><?php the_field('school__university_name'); ?></span><?php endif; ?>
<?php if( get_field('education_location') ): ?><span class="date mobile"><i class="fa-solid fa-location-arrow"></i><?php the_field('education_location'); ?></span><?php endif; ?>
<?php if( get_field('year_of_start') ): ?><span class="date mobile"><i class="fa-regular fa-calendar"></i><?php the_field('year_of_start'); ?> -
<?php 
$is_current = get_field('currently_pursuing');
if( $is_current ): ?>
<span class="present-text">Currently Pursuing</span>
<?php else: ?>
<?php the_field('year_of_complete'); ?>
<?php endif; ?>
</span><?php endif; ?>
</div>
</div>
</div>
</div>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- end: Resume Area -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const wrappers = document.querySelectorAll(".check-list");

    wrappers.forEach(wrapper => {
        const list = wrapper.querySelector(".resume-list");
        const btn = wrapper.querySelector(".toggle-btn");

        if (!list || !btn) return;

        const items = list.querySelectorAll("li");

        // Hide button if <= 5 items
        if (items.length <= 5) {
            btn.style.display = "none";
            return;
        }

        // Default text
        btn.innerHTML = 'Show More <i class="fa-solid fa-arrow-right"></i>';

        btn.addEventListener("click", function () {

            const isExpanded = list.classList.contains("expanded");

            // Sab reset
            wrappers.forEach(w => {
                const l = w.querySelector(".resume-list");
                const b = w.querySelector(".toggle-btn");

                if (l && b) {
                    l.classList.remove("expanded");
                    b.innerHTML = 'Show More <i class="fa-solid fa-arrow-right"></i>';
                }
            });

            // Current open/close
            if (!isExpanded) {
                list.classList.add("expanded");
                btn.innerHTML = 'Show Less <i class="fa-solid fa-arrow-right"></i>';
            }
        });

    });

});


function initSkillsList() {

    document.querySelectorAll(".key-skills").forEach(list => {

        // ❗ already processed skip
        if (list.classList.contains("processed")) return;
        list.classList.add("processed");

        const items = list.querySelectorAll("li");
        const visible = 5;

        if (items.length <= visible) return;

        const remaining = items.length - visible;

        // control li
        const controlLi = document.createElement("li");
        controlLi.className = "toggle-li";
        controlLi.innerText = `+${remaining} Skills`;

        items.forEach((li, i) => {
            if (i >= visible) {
                li.classList.add("extra-item");
            }
        });

        list.appendChild(controlLi);

        controlLi.addEventListener("click", function () {
            list.classList.toggle("expanded");

            controlLi.innerText = list.classList.contains("expanded")
                ? "Hide Skills"
                : `+${remaining} Skills`;
        });

    });
}

// initial run
document.addEventListener("DOMContentLoaded", initSkillsList);
</script>