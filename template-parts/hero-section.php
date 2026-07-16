<!-- start: New Hero Area -->
<?php
$hero_badge_text        = get_field('hero_badge_text', 'option') ?: 'Available for freelance projects';
$hero_main_heading    = get_field('hero_main_heading', 'option') ?: 'Building fast, custom WordPress & Shopify stores that convert.';
$hero_freelencer_name              = get_field('hero_freelencer_name', 'option') ?: 'Deepak Sherawat';
$freelencer_experience_years             = get_field('freelencer_experience_years', 'option') ?: '8';
$new_hero_content_prefix    = get_field('new_hero_content_prefix', 'option') ?: 'a Senior WordPress & Shopify Developer with %years%+ years turning ambitious briefs into';
$cv_file        = get_field('about_cv_file', 'option') ?: '#contact-wrapper';
$hero_button_1_text       = get_field('hero_button_1_text', 'option') ?: 'Donwload CV';
$hero_button_1_url        = get_field('hero_button_1_url', 'option') ?: '#contact-wrapper';
$hero_button_2_text       = get_field('hero_button_2_text', 'option') ?: 'Hire me';
$hero_button_2_url        = get_field('hero_button_2_url', 'option') ?: '#contact-wrapper';
$target_url = '#contact-wrapper';
$facebook_link = get_field('facebook_link', 'option') ?: 'https://www.facebook.com/';
$linkedin_link = get_field('linkedin_link', 'option') ?: 'https://www.linkedin.com/';
$whatsapp_link = get_field('whatsapp_link', 'option') ?: 'https://web.whatsapp.com/';
$instagram_link = get_field('instagram_link', 'option') ?: 'https://www.instagram.com/';
$number_of_experience = get_field('number_of_experience', 'option') ?: '8';
$project_completed = get_field('project_completed', 'option') ?: '50';
$happy_clients = get_field('happy_clients', 'option') ?: '50';
$client_rating = get_field('client_rating', 'option') ?: '50';


// Words that rotate with a typing animation at the end of the paragraph
// ACF Repeater field: new_hero_rotating_words (option)
//   Sub field: word (Text)
$new_hero_rotating_words = array();

if ( have_rows( 'hero_freelencer_skills', 'option' ) ) {
  while ( have_rows( 'hero_freelencer_skills', 'option' ) ) {
    the_row();
    $new_hero_rotating_word = trim( get_sub_field( 'skill_name' ) );
    if ( $new_hero_rotating_word !== '' ) {
      $new_hero_rotating_words[] = $new_hero_rotating_word;
    }
  }
}

// Fallback defaults if the repeater has no rows yet
if ( empty( $new_hero_rotating_words ) ) {
  $new_hero_rotating_words = array(
    'Shopify store',
    'WordPress store',
    'eCommerce store',
    'custom website',
  );
}

// Code panel content
$new_hero_code_filename     = get_field('new_hero_code_filename', 'option') ?: 'functions.php';
$new_hero_git_branch        = get_field('new_hero_git_branch', 'option') ?: 'main';
$new_hero_lighthouse_score  = get_field('new_hero_lighthouse_score', 'option') ?: '98';

// Build the descriptive paragraph prefix with dynamic bits swapped in
$new_hero_content_prefix_html = esc_html( $new_hero_content_prefix );
$new_hero_content_prefix_html = str_replace( '%years%', '<b>' . esc_html( $freelencer_experience_years ) . '</b>', $new_hero_content_prefix_html );
?>
<section class="hero-section style-11">
<div id="new-hero-particles"></div>
<div class="bg-shape">
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-shape.png" alt="img">
</div>
<div class="container hero-container">
<div class="row align-items-center">

<!-- Left: text content -->
<div class="col-lg-6">
<div class="hero-content-box style-11">

<div class="hero-availability-badge wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<span class="dot"></span>
<?php echo esc_html( $hero_badge_text ); ?>
</div>

<h1 class="hero-title wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;"><?php echo esc_html( $hero_main_heading ); ?></h1>

<div class="desc wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<p>I'm <b><?php echo esc_html( $hero_freelencer_name ); ?></b> — <?php echo wp_kses_post( $new_hero_content_prefix_html ); ?> <span class="text-highlight typing-wrap"><span id="new-hero-typed-text"></span><span class="typing-cursor">|</span></span>.</p>
</div>

<div class="hero-button wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<a href="<?php echo esc_url( $cv_file ); ?>" class="btn tj-btn-primary <?php if( $cv_file === $target_url ) : ?>link modal-popup<?php endif; ?>" <?php if( !empty($cv_file) ): ?>target="_blank"<?php endif; ?>><?php echo esc_html( $hero_button_1_text ); ?> <i class="fa-solid fa-arrow-right"></i></a>
<a href="<?php echo esc_url( $hero_button_2_url ); ?>" class="btn tj-btn-secondary <?php if( $hero_button_2_url === $target_url ) : ?>link modal-popup<?php endif; ?>" <?php if( !empty($hero_button_2_url) ): ?>target="_blank"<?php endif; ?>><?php echo esc_html( $hero_button_2_text ); ?> <i class="fa-solid fa-arrow-right"></i></a>
</div>

<!-- start: social icons (reused from hero.php) -->
<div class="hero-11-socials wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<ul class="ul-reset social-icons">
<li>
<a href="<?php echo esc_html( $whatsapp_link ); ?>" target= "_blank"><i class="fa-brands fa-whatsapp"></i></a>
</li>
<li>
<a href="<?php echo esc_html( $linkedin_link ); ?>" target= "_blank"><i class="fa-brands fa-linkedin"></i></a>
</li>
<li>
<a href="<?php echo esc_html( $facebook_link ); ?>" target= "_blank"><i class="fa-brands fa-facebook"></i></a>
</li>
<li>
<a href="<?php echo esc_html( $instagram_link ); ?>" target= "_blank"><i class="fa-brands fa-instagram"></i></a>
</li>
</ul>
</div>
<!-- end: social icons -->

</div>
</div>

<!-- Right: code editor mockup -->
<div class="col-lg-6">
<div class="hero-11-code-mockup-wrap">

<div class="hero-11-platform-badge wordpress-badge wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<i class="fa-brands fa-wordpress"></i>
</div>

<div class="hero-11-platform-badge cart-badge wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<i class="fa-solid fa-cart-shopping"></i>
</div>

<div class="hero-11-platform-badge speed-badge wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<i class="fa-solid fa-gauge-high"></i>
</div>

<div class="hero-11-code-window">
<div class="code-window-header">
<div class="window-dots">
<span class="dot dot-red"></span>
<span class="dot dot-yellow"></span>
<span class="dot dot-green"></span>
</div>
<div class="window-filename"><?php echo esc_html( $new_hero_code_filename ); ?></div>
</div>

<div class="code-window-body">
<pre><code><span class="line"><span class="ln">01</span> <span class="fn">add_action</span>(<span class="str">'after_setup_theme'</span>, <span class="kw">function</span>() {</span>
<span class="line"><span class="ln">02</span>   <span class="fn">add_theme_support</span>(<span class="str">'woocommerce'</span>);</span>
<span class="line"><span class="ln">03</span>   <span class="fn">add_theme_support</span>(<span class="str">'title-tag'</span>);</span>
<span class="line"><span class="ln">04</span> });</span>
<span class="line"><span class="ln">05</span></span>
<span class="line"><span class="ln">06</span> <span class="cmt">// Shopify Liquid — performance mode</span></span>
<span class="line"><span class="ln">07</span> <span class="liquid">{% if</span> <span class="var">section.settings.lazy</span> <span class="liquid">%}</span></span>
<span class="line"><span class="ln">08</span>   <span class="attr">loading=</span><span class="str">"lazy"</span></span>
<span class="line"><span class="ln">09</span> <span class="liquid">{% endif %}</span><span class="cursor">|</span></span></code></pre>
</div>

<div class="code-window-footer">
<div class="git-branch"><i class="fa-solid fa-code-branch"></i> <?php echo esc_html( $new_hero_git_branch ); ?></div>
<div class="lighthouse-score"><i class="fa-solid fa-circle-check"></i> Lighthouse <?php echo esc_html( $new_hero_lighthouse_score ); ?></div>
</div>
</div>

<div class="hero-11-platform-badge shopify-badge wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<i class="fa-brands fa-shopify"></i>
</div>

<div class="hero-11-platform-badge seo-badge wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<i class="fa-solid fa-magnifying-glass-chart"></i>
</div>

<div class="hero-11-platform-badge plug-badge wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
<i class="fa-solid fa-plug"></i>
</div>

</div>
</div>

</div>
</div>

<!-- start: counter / funfact area (reused from hero.php) -->
<div class="container">
<div class="funfact-area">
<div class="row">
<div class="col-6 col-lg-3">
<div class="funfact-item d-flex flex-column flex-wrap align-items-center">
<div class="number"><span class="odometer odometer-auto-theme" data-count="<?php echo esc_html( $number_of_experience ); ?>"></span>+</div>
<div class="text">Years of Experience</div>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="funfact-item d-flex flex-column flex-wrap align-items-center">
<div class="number"><span class="odometer odometer-auto-theme" data-count="<?php echo esc_html( $project_completed ); ?>"></span>+</div>
<div class="text">Project Delivered</div>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="funfact-item d-flex flex-column flex-wrap align-items-center">
<div class="number"><span class="odometer odometer-auto-theme" data-count="<?php echo esc_html( $happy_clients ); ?>"></span>K</div>
<div class="text">Happy Clients</div>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="funfact-item d-flex flex-column flex-wrap align-items-center">
<div class="number"><span class="odometer odometer-auto-theme" data-count="<?php echo esc_html( $client_rating ); ?>"></span>%</div>
<div class="text">Client Rating</div>
</div>
</div>
</div>
</div>
</div>
<!-- end: counter / funfact area -->

</section>
<!-- end: New Hero Area -->

<style>
.hero-section.style-11 {
  position: relative;
  background: linear-gradient(135deg, var(--dark-blue-2), var(--dark-blue-3), var(--dark-blue-1));
  padding: 180px 0 60px;
  overflow: hidden;
  position: relative;
  z-index: 9;
}
.hero-section.style-11 .bg-shape{
  position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: -1;
}
.hero-section.style-11 .bg-shape img{
  width: 100%;
  height: 100%;
}
.hero-section.style-11 .hero-container{
  margin-top: -50%;
}
.hero-content-box.style-11 .hero-availability-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.12);
  color: #cfd3da;
  font-size: 13px;
  padding: 8px 16px;
  border-radius: 30px;
  margin-bottom: 28px;
}
.hero-content-box.style-11 .hero-availability-badge .dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #ebc97c;
  display: inline-block;
}
.hero-content-box.style-11 .hero-title {
  color: #fff;
  font-weight: 800;
  font-size: 46px;
  line-height: 1.15;
  margin-bottom: 26px;
}
.hero-content-box.style-11 .hero-title .text-gold { color: #e8c07d; }
.hero-content-box.style-11 .hero-title .text-blue { color: #4db8ff; }
.hero-content-box.style-11 .desc p {
  color: #ffffff;
  font-size: 18px;
  line-height: 1.7;
}
.hero-content-box.style-11 .desc p b {
    color: #dcb86c;
    text-transform: uppercase;
}
.hero-content-box.style-11 .desc .text-highlight { color: #e1be72; font-weight: 600; }
.hero-content-box.style-11 .desc .typing-wrap { white-space: nowrap; }
.hero-content-box.style-11 .desc .typing-cursor {
  display: inline-block;
  margin-left: 2px;
  color: #dcb86c;
  animation: hero-cursor-blink 0.8s steps(1) infinite;
}
@keyframes hero-cursor-blink {
  0%, 50% { opacity: 1; }
  51%, 100% { opacity: 0; }
}
.hero-content-box.style-11 .hero-button {
  margin-top: 32px;
  margin-bottom: 0px;
  display: flex;
  gap: 15px;
}
.hero-content-box.style-11 .hero-button .btn.tj-btn-primary, .hero-content-box.style-11 .hero-button .btn.tj-btn-secondary {
  border-radius: 10px;
  padding: 14px 30px;
  font-weight: 600;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  text-transform: uppercase;
}
.hero-content-box.style-11 .hero-button .btn.tj-btn-primary{
  background: linear-gradient(90deg, var(--golden-yellow-1), var(--golden-yellow-2), var(--golden-yellow-3));
  color: var(--full-black) !important;
}
.hero-content-box.style-11 .hero-button .btn.tj-btn-secondary{
  background: linear-gradient(90deg, var(--white-1), var(--white-2), var(--white-3));
  color: var(--full-black) !important;
}
.hero-11-socials .social-icons {
  position: absolute;
  top: 35%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  left: 50px;
}
.hero-11-socials ul.ul-reset.social-icons {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
}
.hero-11-socials .social-icons {
  display: flex;
  gap: 14px;
}
.hero-11-socials .social-icons li a {
  width: 35px;
  height: 35px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.06);
  color: var(--white-1);
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.hero-11-code-mockup-wrap {
  position: relative;
}
.hero-11-platform-badge {
  position: absolute;
  width: 50px;
  height: 50px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  z-index: 2;
}
.hero-11-platform-badge.wordpress-badge {
  top: -20px;
  left: -70px;
  background: #ffffff;
  color: #000000;
}
.hero-11-platform-badge.cart-badge {
    top: -70px;
    left: 250px;
    background: #ffffff;
    color: #000000;
}
.hero-11-platform-badge.shopify-badge {
  bottom: -20px;
  right: -70px;
  background: #ffffff;
  color: #000000;
}
.hero-11-platform-badge.speed-badge {
    top: -56px;
    right: -25px;
    background: #ffffff;
    color: #000000;
}
.hero-11-platform-badge.seo-badge {
    bottom: -75px;
    right: 230px;
    background: #ffffff;
    color: #000000;
}
.hero-11-platform-badge.plug-badge {
    bottom: -40px;
    left: -50px;
    background: #ffffff;
    color: #000000;
}
.hero-11-code-window {
  background: #10141d;
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 16px;
  overflow: hidden;
}
.code-window-header {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 14px 18px;
  background: #171c26;
  border-bottom: 1px solid rgba(255,255,255,0.06);
}
.window-dots { display: flex; gap: 6px; }
.window-dots .dot { width: 11px; height: 11px; border-radius: 50%; display: inline-block; }
.window-dots .dot-red { background: #ff5f57; }
.window-dots .dot-yellow { background: #febc2e; }
.window-dots .dot-green { background: #28c840; }
.window-filename { color: #8b93a1; font-size: 13px; margin-left: 6px; }
.code-window-body {
  padding: 18px 20px;
  overflow-x: auto;
}
.code-window-body pre { margin: 0; }
.code-window-body code {
  font-family: 'Fira Code', 'Courier New', monospace;
  font-size: 13.5px;
  line-height: 1.9;
  color: #d5dae3;
}
.code-window-body .ln { color: #4a5060; margin-right: 14px; }
.code-window-body .fn { color: #7fb4ff; }
.code-window-body .str { color: #e8c07d; }
.code-window-body .kw { color: #d38bff; }
.code-window-body .cmt { color: #5f6674; font-style: italic; }
.code-window-body .liquid { color: #d38bff; }
.code-window-body .var { color: #7fdbca; }
.code-window-body .attr { color: #7fb4ff; }
.code-window-body .cursor { color: #4db8ff; }
.code-window-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 20px;
  border-top: 1px solid rgba(255,255,255,0.06);
  font-size: 13px;
  color: #8b93a1;
}
.code-window-footer .lighthouse-score { color: #3ecf6a; }

@media (max-width: 991px) {
  .hero-content-box.style-11 .hero-title { font-size: 28px; }
  .hero-11-code-mockup-wrap { margin-top: 100px; }
  .hero-11-platform-badge{
    width: 35px;
    height: 35px;
    font-size: 20px;
  }
  .hero-11-platform-badge.wordpress-badge{
    top: 107%;
    left: 0;
  }
  .hero-11-platform-badge.shopify-badge{
    bottom: -16.5%;
    right: 71%;
  }
  .hero-11-platform-badge.cart-badge{
    top: 107%;
    left: 36%;
  }
  .hero-11-platform-badge.speed-badge{
    top: 107%;
    right: 0%;
  }
  .hero-11-platform-badge.seo-badge{
    bottom: -16.5%;
    right: 35%;
  }
  .hero-11-platform-badge.plug-badge {
    bottom: -16.5%;
    left: 71%;
  }
}
</style>

<script>
(function () {
  var newHeroWords = <?php echo wp_json_encode( array_values( $new_hero_rotating_words ) ); ?>;
  var newHeroTypedEl = document.getElementById('new-hero-typed-text');

  if (!newHeroTypedEl || !newHeroWords.length) return;

  var wordIndex = 0;
  var charIndex = 0;
  var isDeleting = false;

  var typeSpeed = 90;
  var deleteSpeed = 45;
  var pauseAfterType = 1500;
  var pauseAfterDelete = 300;

  function tick() {
    var currentWord = newHeroWords[wordIndex];
    var nextDelay;

    if (!isDeleting) {
      charIndex++;
      newHeroTypedEl.textContent = currentWord.substring(0, charIndex);
      nextDelay = typeSpeed;

      if (charIndex === currentWord.length) {
        isDeleting = true;
        nextDelay = pauseAfterType;
      }
    } else {
      charIndex--;
      newHeroTypedEl.textContent = currentWord.substring(0, charIndex);
      nextDelay = deleteSpeed;

      if (charIndex === 0) {
        isDeleting = false;
        wordIndex = (wordIndex + 1) % newHeroWords.length;
        nextDelay = pauseAfterDelete;
      }
    }

    setTimeout(tick, nextDelay);
  }

  tick();
})();

window.addEventListener("load", function () {
  const heroParticles = document.getElementById("new-hero-particles");

  if (typeof particlesJS !== "undefined" && heroParticles) {
    particlesJS("new-hero-particles", {
      particles: {
        number: { value: 150, density: { enable: true, value_area: 900 } },
        color: { value: "#dcb86c" },
        shape: { type: "circle" },
        opacity: { value: 0.35 },
        size: { value: 2, random: true },
        line_linked: {
          enable: true,
          distance: 140,
          color: "#dcb86c",
          opacity: 0.15,
          width: 1
        },
        move: {
          enable: true,
          speed: 1,
          direction: "none",
          random: false,
          straight: false,
          out_mode: "out"
        }
      },
      interactivity: {
        detect_on: "window",
        events: {
          onhover: { enable: true, mode: "grab" },
          resize: true
        },
        modes: {
          grab: {
            distance: 200,
            line_linked: { opacity: 0.5 }
          }
        }
      },
      retina_detect: true
    });
  }
});
</script>
