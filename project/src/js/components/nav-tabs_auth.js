// export default function navTabs(){
//     if($('.js-tabs_auth').length > 0){
//         let $owl = $('.js-tabs_auth');
//         $owl.children().each( function( index ) {
//             $(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
//         });
//         $owl.owlCarousel({
//           items:3,
//           lazyLoad:true,
//           loop:true,
//           margin:10,
//           dots:false,
//           autoplay:false,
//           autoplayTimeout:5000,
//           autoplayHoverPause:false,
//           smartSpeed:300,center:true
//
//           // nav:true,
//           // navElement:'div',
//           // navText:["<button class='btn btn-outline-secondary btn-rounded icon icon-arrow-left2'></button>","<button class='btn btn-outline-secondary btn-rounded icon icon-arrow-right2'></button>"]
//         });
//         $(document).on('click', '.owl-item>div', function(e) {
//             // see https://owlcarousel2.github.io/OwlCarousel2/docs/api-events.html#to-owl-carousel
//             var $speed = 300;  // in ms
//             $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
//             console.log(e.target);
//             Array.from(document.querySelectorAll('#auth-tabs .nav-link')).forEach((item,index)=>{
//                 item.classList.remove('active');
//             })
//             setTimeout(()=>{
//                 Array.from(document.querySelectorAll('#auth-tabs .owl-item.center.active .nav-link')).forEach((item,index)=>{
//                     item.classList.add('active');
//                 })
//             },100)
//         });
//
//
//     }
//
//
// }