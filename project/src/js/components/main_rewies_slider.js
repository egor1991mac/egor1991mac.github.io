export default function initMainSlider(){
    if($('.js-rewies_slider').length > 0){
        $('.js-rewies_slider').owlCarousel({

          lazyLoad:true,
          loop:true,
          margin:10,
          dots:false,
          center:true,
          navElement:'div',
            navText:["<button class='btn btn-outline-secondary btn-rounded'><span class='icon icon-arrow-left2'></span></button>","<button class='btn btn-outline-secondary btn-rounded'> <span class='icon icon-arrow-right2'></span></button>"],
          responsive : {
            // breakpoint from 0 up
            0 : {
                items:1,

                nav:false,
            },
            // breakpoint from 480 up
            // breakpoint from 768 up
            768 : {
                items:3,
                center:true,
                nav:true,


            }
        }})
      };
}