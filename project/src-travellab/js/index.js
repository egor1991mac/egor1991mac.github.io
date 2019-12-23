import popper from "popper.js";
import loading_attribute_polyfill from 'loading-attribute-polyfill';
import bootstrap from "bootstrap";
import magnific from 'magnific-popup';
import owlCarousel from "./owl.carousel.js";
import select from "select2/dist/js/select2.full.min";
import InitPopupGallery from "./components/popup-gallery";

import MainSlider from './components/main_slider';
import MainRewiesSlider from './components/main_rewies_slider';
import NavTabsSlider from './components/nav-tabs_auth.js';
import NavBarCollapse from './components/collapse-scroll';
import DetailSlider from './components/detail-slider';
import Select2Lang from './components/collapse-scroll';



import '../scss/style-v1.scss';


$(document).ready(function(){




  MainSlider();
  MainRewiesSlider();
  //NavTabsSlider();
  NavBarCollapse();
  //InitPopupGallery();



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