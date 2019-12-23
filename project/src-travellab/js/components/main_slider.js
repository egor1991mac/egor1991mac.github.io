export default function initMainSlider(){
    if($('.js-main_slider').length > 0){
        $('.js-main_slider').owlCarousel({
          items:1,
          lazyLoad:true,
          loop:true,
          margin:10,
          dots:false,
          autoplay:false,
          autoplayTimeout:5000,
          autoplayHoverPause:false,
          smartSpeed:300,
            onDragged:callback
          // nav:true,
          // navElement:'div',
          // navText:["<button class='btn btn-outline-secondary btn-rounded icon icon-arrow-left2'></button>","<button class='btn btn-outline-secondary btn-rounded icon icon-arrow-right2'></button>"]
        });
      };
    let preventPosition =0;
    function callback(event) {
        return (function (event) {
            $('.js-main_slider').each(function (index,item) {
                if(event.target.id != item.id){
                if(event.item.index > preventPosition){

                    $(this).trigger('next.owl.carousel');
                }
                else{

                    $(this).trigger('prev.owl.carousel');
                }
                }
            })

            preventPosition=event.item.index;

        })(event);
    }
}