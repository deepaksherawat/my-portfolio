<!-- start: Portfolio Popup -->
      <div id="portfolio-wrapper" class="popup_content_area zoom-anim-dialog mfp-hide" data-lenis-prevent>
         <div class="popup_modal_img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/modal-img.jpg" alt="" />
         </div>
         <div class="popup_modal_content">
            <div class="portfolio_info">
               <div class="portfolio_info_text">
                  <h2 class="title" id="popup-title"></h2>
                                  
                  <a href="#" id="popup-link" class="btn tj-btn-primary" target="_blank">Live Preview <i class="fa-solid fa-arrow-right"></i></a>
               </div>
               <div class="portfolio_info_items">
                  <div class="info_item">
                     <div class="key">Project Name</div>
                     <div class="value" id="popup-project-name"></div>
                  </div>
                  <div class="info_item">
                     <div class="key">Developed In</div>
                     <div class="value" id="popup-developed-by"></div>
                  </div>
                  <div class="info_item">
                     <div class="key">Technology</div>
                     <div class="value" id="popup-technology"></div>
                  </div>
                  <div class="info_item">
                     <div class="key">Launch Date</div>
                     <div class="value" id="popup-launch-date"></div>
                  </div>
               </div>
            </div>
            <div class="portfolio_gallery owl-carousel" id="popup-gallery"></div>

            <div class="portfolio_description">
               <h2 class="title">Project Description</h2>
               <div class="desc" id="popup-desc">
                  
               </div>
            </div>
            <div class="portfolio_story_approach">
               <div id="popup-story-wrapper"></div>
               
            </div>

         </div>
      </div>
      <!-- end: Portfolio Popup -->