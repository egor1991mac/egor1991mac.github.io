import popper from "popper.js";
import loading_attribute_polyfill from 'loading-attribute-polyfill';
//import bootstrap from "bootstrap";
import owlCarousel from "./owl.carousel.js";
import MainSlider from './components/main_slider';
import MainRewiesSlider from './components/main_rewies_slider';
import NavBarCollapse from './components/collapse-scroll';
import Scrollspy from './components/scrollspy';
import CalendarbTurov from './components/calendarbTurov';
import DetailSlider from './components/detail-slider';




import '../scss/style-v1.scss';


$(document).ready(function(){




  MainSlider();
  MainRewiesSlider();
  NavBarCollapse();
  Scrollspy();
  CalendarbTurov();


  $('.js-thankyou_page').length>0 && $('.js-thankyou_page').modal('show');


  //var slider = new Slider('#rangeSlider', {});


 // let rangeSlider = new Slider('#rangeSlider',{});
});

// (function( $ ){
//   $( document ).ready( function() {
//     // .each(function(){
//        var value = $('.input-range').attr('data-slider-value');
//       var separator = value.indexOf(',');
//       if( separator !== -1 ){
//         value = value.split(',');
//         value.forEach(function(item, i, arr) {
//           arr[ i ] = parseFloat( item );
//         });
//       } else {
//         value = parseFloat( value );
//       }
//        $( '.input-range').slider({
//         formatter: function(value) {
//
//           return '$' + value;
//         },
//          min: parseFloat( $( '.input-range' ).attr('data-slider-min') ),
//          max: parseFloat( $( '.input-range' ).attr('data-slider-max') ),
//          range: $( '.input-range' ).attr('data-slider-range'),
//          value: value,
//          tooltip_split: $( '.input-range' ).attr('data-slider-tooltip_split'),
//          tooltip: $( '.input-range' ).attr('data-slider-tooltip')
//       });
//
//
//   } );
// } )( jQuery );