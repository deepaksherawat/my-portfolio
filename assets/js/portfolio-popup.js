// ================= LOAD MORE =================
window.addEventListener("load", function () {

  const cards = document.querySelectorAll(".portfolio_card, .portfolio-item");
  let portfolioCount = 5;

  function showPortfolio() {
    cards.forEach((card, i) => {
      if (i < portfolioCount) {
        card.style.display = "block";
        card.classList.add("show");

        setTimeout(() => {
          card.classList.add("animate");
        }, 100 * i);
      }
    });
  }

  showPortfolio();

  document.addEventListener("click", function (e) {
    const btn = e.target.closest("#loadMorePortfolio");
    if (!btn) return;

    let start = portfolioCount;
    portfolioCount += 5;

    showPortfolio();

    if (cards[start]) {
      cards[start].scrollIntoView({ behavior: "smooth" });
    }

    if (portfolioCount >= cards.length) {
      btn.style.display = "none";
    }
  });

});


// ================= POPUP + GALLERY =================
document.addEventListener("click", function (e) {

  const btn = e.target.closest(".open-popup");
  if (!btn) return;

  const card = btn.closest(".portfolio_card, .portfolio-item");
  if (!card) return;

  // ===== DATA =====
  const title = card.getAttribute("data-title");
  const img = card.getAttribute("data-img");
  const desc = card.getAttribute("data-desc");
  const url = card.getAttribute("data-url");
  const projectName = card.getAttribute("data-project-name");
  const developedBy = card.getAttribute("data-developed-by");
  const technology = card.getAttribute("data-technology");
  const launchDate = card.getAttribute("data-launch-date");
  const storiesData = card.getAttribute("data-stories");

  // ===== BASIC SET =====
  const popupImg = document.getElementById("popup-img");
  if (popupImg) popupImg.src = img || "";

  document.getElementById("popup-title").innerText = title || "";
  document.getElementById("popup-desc").innerText = desc || "";
  document.getElementById("popup-link").href = url || "#";
  document.getElementById("popup-project-name").innerText = projectName || "";
  document.getElementById("popup-developed-by").innerText = developedBy || "";
  document.getElementById("popup-technology").innerText = technology || "";
  document.getElementById("popup-launch-date").innerText = launchDate || "";

  // ================= GALLERY =================
  const galleryContainer = document.getElementById("popup-gallery");

  if (galleryContainer) {

    const galleryData = card.getAttribute("data-gallery");

    let gallery = [];

    try {
      gallery = galleryData && galleryData !== "null"
        ? JSON.parse(galleryData)
        : [];
    } catch (e) {
      console.error("Gallery JSON parse error:", e);
      gallery = [];
    }

    const $gallery = jQuery(galleryContainer);

    // destroy old carousel
    if ($gallery.hasClass("owl-loaded")) {
      $gallery.trigger("destroy.owl.carousel");
      $gallery.removeClass("owl-loaded owl-hidden");

      $gallery.find(".owl-stage-outer").children().unwrap();
      $gallery.find(".owl-stage").children().unwrap();
    }

    // clear container
    galleryContainer.innerHTML = "";

    // no images
    if (!Array.isArray(gallery) || gallery.length === 0) {
      galleryContainer.innerHTML = "<p>No images found</p>";
    } else {

      let html = "";

      gallery.forEach(item => {
        // support both string OR object
        const imgUrl = typeof item === "string" ? item : item.url;
        const imgAlt = typeof item === "object" ? item.alt || "" : "";

        html += `
          <div class="gallery_item">
            <img src="${imgUrl}" alt="${imgAlt}">
          </div>
        `;
      });

      galleryContainer.innerHTML = html;

      // re-init carousel
      $gallery.owlCarousel({
  items: 1,
  loop: gallery.length > 1,
  center: true,
  margin: 20,
  nav: true,
  dots: true,
  stagePadding: 120, // 👈 yaha magic hota hai
  responsive: {
    0: {
      stagePadding: 40
    },
    768: {
      stagePadding: 80
    },
    1200: {
      stagePadding: 250
    }
  }
});
    }
  }

  // ================= STORIES =================
  if (storiesData) {
    try {
      const stories = JSON.parse(storiesData);

      let html = "";

      stories.forEach(item => {
        html += `
          <div class="portfolio_story">
            <div class="story_title">
              <h4 class="title">${item.case_study_heading}</h4>
            </div>
            <div class="story_content">
              <p>${item.case_study_content}</p>
            </div>
          </div>
        `;
      });

      document.getElementById("popup-story-wrapper").innerHTML = html;

    } catch (e) {
      console.error("Stories JSON error:", e);
    }
  }

});