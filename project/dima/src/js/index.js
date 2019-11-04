import popper from "popper.js";
import bootstrap from "bootstrap";
import bsCustomFileInput from "bs-custom-file-input";
import select from "select2/dist/js/select2.full.min";
import Wew from "wow.js/dist/wow.min.js";
import owlCarousel from "./owl.carousel.js";
import { callbackify } from "util";

$(function() {
  $(document).ready(function() {
    new Wew({
      offset: 175
    }).init();
    $(".owl-nav.owl-carousel").owlCarousel({
      dots: false,
      loop: true,

      responsive: {
        0: {
          stagePadding: 30,
          items: 1,

          margin: 10
        },
        569: {
          stagePadding: 20,
          items: 2,
          margin: 10
        },
        1024: {
          items: 3,
          margin: 10
        }
      }
    });
    $(".owl-carousel").owlCarousel({
      dots: true,
      loop: true,
      responsive: {
        0: {
          stagePadding: 15,
          items: 1,

          margin: 0
        },
        569: {
          stagePadding: 10,
          items: 2,
          margin: 0
        },
        1024: {
          items: 3,
          margin: 0
        }
      }
    });

    $(".owl-next").on("click", function(e) {
      $(".owl-carousel").trigger("next.owl.carousel");
    });

    // var wew = new Wew({
    //   target: ".wow",
    //   keyword: "wow"
    // });
    // wew.init();
    //select

    $(".js-example-basic-single").select2({
      theme: "bootstrap",
      dropdownCssClass: "dropdownContainer",
      minimumResultsForSearch: -1
    });
    $("#selectLang").select2({
      adaptContainerCssClass: "selectLangContainer",
      theme: "bootstrap",
      containerCssClass: "selectLang",
      dropdownCssClass: "dropdownSelectLang",
      minimumResultsForSearch: -1
    });

    $(".select2-hook").each(function() {
      $(this).select2({
        theme: "bootstrap",
        dropdownCssClass: "dropdownContainer",
        minimumResultsForSearch: -1
      });
    });
    $(".select2-selection__arrow b").addClass("icon-expand_more_24px_rounded");
    $('[class*="icon-eye"]').each(function(index, node) {
      let $this = $(this);
      $(this)
        .parent()
        .click(function(e) {
          if (e.target.closest(".top-nav_list-link") != undefined) {
            $this.toggleClass("d-none");
          }
        });
    });
    //file-input
    (function fileInput() {
      bsCustomFileInput.init();
      $("body").on("DOMSubtreeModified", ".custom-file-label", function(_this) {
        $(this)
          .parent()
          .find(".reset")
          .addClass("active");
        $(this)
          .parent()
          .addClass("active");

        var _this = $(this);
        $(this)
          .parent()
          .find(".reset")
          .click(function() {
            _this.text("");
            $(this).removeClass("active");
            $(this)
              .parent()
              .removeClass("active");
          });
      });
    })();
    //slider-nav
    (function slider_init() {
      let slider = $("#header_bar_slider");
      let indicators = slider.find(".carousel-indicators-item");

      slider
        .carousel({
          interval: 100000
        })
        .on("slide.bs.carousel", function() {
          indicators.each(function(index, val) {
            let _this = $(this);

            if (indicators.length == index + 1 && $(this).hasClass("active")) {
              setTimeout(() => {
                slider.find(".carousel-control-next").toggleClass("d-none");
                slider.find(".carousel-control-prev").toggleClass("d-none");
              }, 400);
            } else if ($(this).hasClass("active")) {
              setTimeout(() => {
                slider.find(".carousel-control-next").toggleClass("d-none");
                slider.find(".carousel-control-prev").toggleClass("d-none");
              }, 400);
            }
          });
        });
    })();

    //slider-main-page-book

    (function slider_main_page_book() {
      let slider = $("#mp-slider-book");

      slider.carousel({
        interval: 5000
      });
    })();

    (function header_scroll() {
      let headerSroll = $(".header-with-scroll");
      let headerDesctop_height = $(".header-desctop").height();

      $(window).scroll(function() {
        if (
          $(window).scrollTop() >= headerDesctop_height &&
          headerSroll.hasClass("scrolled") == false
        ) {
          headerSroll.addClass("scrolled");
        }
        if (
          $(window).scrollTop() < headerDesctop_height &&
          headerSroll.hasClass("scrolled") == true
        ) {
          headerSroll.removeClass("scrolled");
        }
      });
    })();
    //header-slider_nav
  });

  // collapseHeaderNav
  function collapseHeaderNav(node) {
    let toggleContent = node;

    if (!toggleContent.hasClass("slideInDown")) {
      toggleContent.show();
      toggleContent.toggleClass("active");
      toggleContent.removeClass("slideOutUp");
      toggleContent.addClass("animated slideInDown");
    } else {
      toggleContent.removeClass("slideInDown");
      toggleContent.addClass("animated slideOutUp");
      setTimeout(() => {
        toggleContent.toggleClass("active");
      }, 1000);
      setTimeout(() => {
        //toggleContent.toggleClass("active");
        toggleContent.hide();
      }, 1000);
    }

    setTimeout(() => {
      toggleContent.removeClass("animated");
    }, 1000);
  }
  //collapseHeaderNav($("._animation_before"));

  let toggleButton = $(".toggle-menu-button");

  toggleButton.each(function() {
    $(this).click(function() {
      if (!$(".top-nav-collapse").hasClass("active")) {
        collapseHeaderNav($("._animation_before"));
        setTimeout(() => {
          collapseHeaderNav($(".top-nav-collapse"));
        }, 100);
      } else {
        collapseHeaderNav($(".top-nav-collapse"));
        setTimeout(() => {
          collapseHeaderNav($("._animation_before"));
        }, 300);
      }
    });
  });
  $('[data-toggle="tooltip"]').tooltip();
  $(".tree-toggle")
    .parent()
    .children("ul.tree")
    .toggle(200);
  $(".tree-toggle").click(function() {
    $(this)
      .toggleClass("active")
      .parent()
      .children("ul.tree")
      .toggle(200);
  });
});
