export default function initMainSlider(){
    if($('.js-main_slider').length > 0){
        $('.js-main_slider').owlCarousel({
          items:1,
          lazyLoad:true,
          loop:true,
          margin:10,
          dots:false,
          autoplay:true,
          autoplayTimeout:5000,
          autoplayHoverPause:false,
          smartSpeed:1000
          // nav:true,
          // navElement:'div',
          // navText:["<button class='btn btn-outline-secondary btn-rounded icon icon-arrow-left2'></button>","<button class='btn btn-outline-secondary btn-rounded icon icon-arrow-right2'></button>"]
        });
      };
}