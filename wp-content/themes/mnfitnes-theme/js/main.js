/** Include any other scripts here - this will combine them via gulp for the final output script. */
//=include ./example.js

((window, document, $, undefined) => {
  /*******************************************************************************/
  /* MODULE
  /*******************************************************************************/

  const Base = (() => {
    function smoothScroll(target, duration) {
      var target = document.querySelector(target);
      var targetPosition = target.getBoundingClientRect().top;
      var startPosition = window.pageYOffset;
      var distance = targetPosition - startPosition;
      var startTime = null;

      function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        var timeElapsed = currentTime - startTime;
        var run = ease(timeElapsed, startPosition, distance, duration);
        window.scrollTo(0, run);
        if (timeElapsed < duration) requestAnimationFrame(animation);
      }

      function ease(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t + b;
        t--;
        return (-c / 2) * (t * (t - 2) - 1) + b;
      }

      requestAnimationFrame(animation);
    }
    /**
     * Runs when the document is ready.
     */
    const ready = () => {
      var arrow = document.getElementById("arrow_down");
      
      arrow.addEventListener("click", function () {
        smoothScroll(".contact-section", 1000);
      });

    };

    const heroSlider = () => {
      let slider = new Swiper(".bg-img-slider", {
        slidesPerView: 1,
        spaceBetween: 0,
        autoHeight: false,
        direction: "horizontal",
        loop: true,
        watchOverflow: false,
        centeredSlides: false,
        effect: "fade",
        fadeEffect: {
          crossFade: true,
        },
        autoplay: {
          delay: 2500,
        },
        // centerInsufficientSlides: true,
        breakpoints: {},
      });
    };

    /**
     * Runs when the window is loaded.
     */
    const load = () => {
      console.log("document load!");
    };

    /**
     * Return our module's publicly accessible functions.
     */
    return {
      ready: ready,
      load: load,
      heroSlider: heroSlider,
    };
  })();

  /*******************************************************************************/
  /* MODULE INITIALISE
  /*******************************************************************************/

  jQuery(document).ready(function ($) {
    Base.ready();
    Base.heroSlider();
  });

  jQuery(window).on("load", function ($) {
    Base.load();
  });
})(window, document, jQuery);
