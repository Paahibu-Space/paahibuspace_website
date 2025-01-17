!(function (a) {
    "use strict";

    a(document).ready(function () {
        var o = a(".global-carousel-init");
        o.length > 0 &&
            a.each(o, function () {
                var t = a(this),
                    n = t.children("div"),
                    i = !!t.data("loop") && t.data("loop"),
                    o = !!t.data("center") && t.data("center"),
                    d = t.data("desktopitem") ? t.data("desktopitem") : 1,
                    s = t.data("mobileitem") ? t.data("mobileitem") : 1,
                    l = t.data("tabletitem") ? t.data("tabletitem") : 1,
                    c = !!t.data("nav") && t.data("nav"),
                    r = !!t.data("dots") && t.data("dots"),
                    u = !!t.data("autoplay") && t.data("autoplay"),
                    m = t.data("navcontainer") ? t.data("navcontainer") : "",
                    v = t.data("stagepadding") ? t.data("stagepadding") : 0,
                    p = t.data("margin") ? t.data("margin") : 0;
                n.length < 2 ||
                    t.owlCarousel({
                        loop: i,
                        autoplay: u,
                        autoPlayTimeout: 5000,
                        smartSpeed: 2000,
                        margin: p,
                        dots: r,
                        center: o,
                        nav: c,
                        navContainer: m,
                        stagePadding: v,
                        navText: [
                            '<i class="fas fa-angle-left"></i>',
                            '<i class="fas fa-angle-right"></i>',
                        ],
                        responsive: {
                            0: { items: 1, nav: !1, stagePadding: 0 },
                            460: { items: s, nav: !1, stagePadding: 0 },
                            599: { items: s, nav: !1, stagePadding: 0 },
                            768: { items: l, nav: !1, stagePadding: 0 },
                            960: { items: l, nav: !1, stagePadding: 0 },
                            1200: { items: d },
                            1920: { items: d },
                        },
                    });
            });

        /* ========================================
              Global Slider Init
          ========================================
          */
        var globalSlickInit = $(".global-slick-init");
        if (globalSlickInit.length > 0) {
            //todo have to check slider item
            $.each(globalSlickInit, function (index, value) {
                if ($(this).children("div").length > 1) {
                    //todo configure slider settings object
                    var sliderSettings = {};
                    var allData = $(this).data();
                    var infinite =
                        typeof allData.infinite == "undefined"
                            ? false
                            : allData.infinite;
                    var arrows =
                        typeof allData.arrows == "undefined"
                            ? false
                            : allData.arrows;
                    var autoplay =
                        typeof allData.autoplay == "undefined"
                            ? false
                            : allData.autoplay;
                    var focusOnSelect =
                        typeof allData.focusonselect == "undefined"
                            ? false
                            : allData.focusonselect;
                    var swipeToSlide =
                        typeof allData.swipetoslide == "undefined"
                            ? false
                            : allData.swipetoslide;
                    var slidesToShow =
                        typeof allData.slidestoshow == "undefined"
                            ? 1
                            : allData.slidestoshow;
                    var slidesToScroll =
                        typeof allData.slidestoscroll == "undefined"
                            ? 1
                            : allData.slidestoscroll;
                    var speed =
                        typeof allData.speed == "undefined"
                            ? "500"
                            : allData.speed;
                    var dots =
                        typeof allData.dots == "undefined"
                            ? false
                            : allData.dots;
                    var cssEase =
                        typeof allData.cssease == "undefined"
                            ? "linear"
                            : allData.cssease;
                    var prevArrow =
                        typeof allData.prevarrow == "undefined"
                            ? ""
                            : allData.prevarrow;
                    var nextArrow =
                        typeof allData.nextarrow == "undefined"
                            ? ""
                            : allData.nextarrow;
                    var centerMode =
                        typeof allData.centermode == "undefined"
                            ? false
                            : allData.centermode;
                    var centerPadding =
                        typeof allData.centerpadding == "undefined"
                            ? false
                            : allData.centerpadding;
                    var rows =
                        typeof allData.rows == "undefined"
                            ? 1
                            : parseInt(allData.rows);
                    var autoplay =
                        typeof allData.autoplay == "undefined"
                            ? false
                            : allData.autoplay;
                    var autoplaySpeed =
                        typeof allData.autoplayspeed == "undefined"
                            ? 2000
                            : parseInt(allData.autoplayspeed);
                    var lazyLoad =
                        typeof allData.lazyload == "undefined"
                            ? false
                            : allData.lazyload; // have to remove it from settings object if it undefined
                    var appendDots =
                        typeof allData.appenddots == "undefined"
                            ? false
                            : allData.appenddots;
                    var appendArrows =
                        typeof allData.appendarrows == "undefined"
                            ? false
                            : allData.appendarrows;
                    var asNavFor =
                        typeof allData.asnavfor == "undefined"
                            ? false
                            : allData.asnavfor;
                    var verticalSwiping =
                        typeof allData.verticalswiping == "undefined"
                            ? false
                            : allData.verticalswiping;
                    var vertical =
                        typeof allData.vertical == "undefined"
                            ? false
                            : allData.vertical;
                    var fade =
                        typeof allData.fade == "undefined"
                            ? false
                            : allData.fade;
                    var rtl =
                        typeof allData.rtl == "undefined" ? false : allData.rtl;
                    var responsive =
                        typeof $(this).data("responsive") == "undefined"
                            ? false
                            : $(this).data("responsive");
                    //slider settings object setup
                    sliderSettings.infinite = infinite;
                    sliderSettings.arrows = arrows;
                    sliderSettings.autoplay = autoplay;
                    sliderSettings.focusOnSelect = focusOnSelect;
                    sliderSettings.swipeToSlide = swipeToSlide;
                    sliderSettings.slidesToShow = slidesToShow;
                    sliderSettings.slidesToScroll = slidesToScroll;
                    sliderSettings.speed = speed;
                    sliderSettings.dots = dots;
                    sliderSettings.cssEase = cssEase;
                    sliderSettings.prevArrow = prevArrow;
                    sliderSettings.nextArrow = nextArrow;
                    sliderSettings.rows = rows;
                    sliderSettings.autoplaySpeed = autoplaySpeed;
                    sliderSettings.autoplay = autoplay;
                    sliderSettings.verticalSwiping = verticalSwiping;
                    sliderSettings.vertical = vertical;
                    sliderSettings.rtl = rtl;
                    if (centerMode != false) {
                        sliderSettings.centerMode = centerMode;
                    }
                    if (centerPadding != false) {
                        sliderSettings.centerPadding = centerPadding;
                    }
                    if (lazyLoad != false) {
                        sliderSettings.lazyLoad = lazyLoad;
                    }
                    if (appendDots != false) {
                        sliderSettings.appendDots = appendDots;
                    }
                    if (appendArrows != false) {
                        sliderSettings.appendArrows = appendArrows;
                    }
                    if (asNavFor != false) {
                        sliderSettings.asNavFor = asNavFor;
                    }
                    if (fade != false) {
                        sliderSettings.fade = fade;
                    }
                    if (responsive != false) {
                        sliderSettings.responsive = responsive;
                    }
                    $(this).slick(sliderSettings);
                }
            });
        }

        /* HOME ABOUT PARALAX */
        if (jQuery(window).width() > 768) {
            let img1 = document.getElementsByClassName("thumparallax");
            new simpleParallax(img1, {
                delay: 2,
            });

            let img2 = document.getElementsByClassName("thumparallax-down");
            new simpleParallax(img2, {
                delay: 2,
                orientation: "down",
            });
        }

        // Testimonial area start here ***
        var swiper = new Swiper(".testimonial__slider", {
            loop: "true",
            spaceBetween: 30,
            speed: 300,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".testimonial__arry-next",
                prevEl: ".testimonial__arry-prev",
            },
        });
        var swiper = new Swiper(".testimonial-two__slider", {
            loop: "true",
            spaceBetween: 24,
            speed: 800,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            breakpoints: {
                992: {
                    slidesPerView: 2,
                },
                320: {
                    slidesPerView: 1,
                },
            },
            pagination: {
                el: ".testimonial__dot",
                clickable: true,
            },
        });
        var swiper = new Swiper(".testimonial-three__slider", {
            loop: "true",
            spaceBetween: 24,
            speed: 300,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                1200: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 2,
                },
                320: {
                    slidesPerView: 1,
                },
            },
            navigation: {
                nextEl: ".testimonial-three__arry-next",
                prevEl: ".testimonial-three__arry-prev",
            },
        });
        // Testimonial area end here ***

        // Back to top area start here ***
        var scrollPath = document.querySelector(".scroll-up path");
        var pathLength = scrollPath.getTotalLength();
        scrollPath.style.transition = scrollPath.style.WebkitTransition =
            "none";
        scrollPath.style.strokeDasharray = pathLength + " " + pathLength;
        scrollPath.style.strokeDashoffset = pathLength;
        scrollPath.getBoundingClientRect();
        scrollPath.style.transition = scrollPath.style.WebkitTransition =
            "stroke-dashoffset 10ms linear";
        var updatescroll = function () {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var scroll = pathLength - (scroll * pathLength) / height;
            scrollPath.style.strokeDashoffset = scroll;
        };
        updatescroll();
        $(window).scroll(updatescroll);
        var offset = 50;
        var duration = 950;
        jQuery(window).on("scroll", function () {
            if (jQuery(this).scrollTop() > offset) {
                jQuery(".scroll-up").addClass("active-scroll");
            } else {
                jQuery(".scroll-up").removeClass("active-scroll");
            }
        });
        jQuery(".scroll-up").on("click", function (event) {
            event.preventDefault();
            jQuery("html, body").animate(
                {
                    scrollTop: 0,
                },
                duration
            );
            return false;
        });

        
        // Back to top area end here ***
        new PureCounter();
    });

    document.addEventListener("DOMContentLoaded", () => {
        const circleItems = document.querySelectorAll('.circle-item');
    
        circleItems.forEach(item => {
            const chart = item.querySelector('.chart');
            const canvas = chart.querySelector('canvas');
            const context = canvas.getContext('2d');
            const percentage = parseInt(chart.getAttribute('data-percent'), 10);
            const color = item.getAttribute('data-color');
            const radius = canvas.width / 2 - 10; // Radius minus padding
            const centerX = canvas.width / 2;
            const centerY = canvas.height / 2;
            const startAngle = -Math.PI / 2; // Start from top
    
            // Draw the circular progress bar
            const drawCircle = (percent) => {
                context.clearRect(0, 0, canvas.width, canvas.height);
    
                // Background circle
                context.beginPath();
                context.arc(centerX, centerY, radius, 0, 2 * Math.PI);
                context.strokeStyle = "#2A3E66"; // Light gray
                context.lineWidth = 15;
                context.stroke();
                context.closePath();
    
                // Foreground circle (progress)
                context.beginPath();
                const endAngle = startAngle + (2 * Math.PI * percent) / 100;
                context.arc(centerX, centerY, radius, startAngle, endAngle);
                context.strokeStyle = color;
                context.lineWidth = 15;
                context.lineCap = "round";
                context.stroke();
                context.closePath();
            };
    
            // Animate the progress bar
            let progress = 0;
            const animateProgress = () => {
                if (progress <= percentage) {
                    drawCircle(progress);
                    progress++;
                    requestAnimationFrame(animateProgress);
                }
            };
    
            animateProgress();
        });
    });

    function initSwiper() {
        document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
          let config = JSON.parse(
            swiperElement.querySelector(".swiper-config").innerHTML.trim()
          );
    
          if (swiperElement.classList.contains("swiper-tab")) {
            initSwiperWithCustomPagination(swiperElement, config);
          } else {
            new Swiper(swiperElement, config);
          }
        });
      }
    
      window.addEventListener("load", initSwiper);

        /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });
    

})(jQuery);

