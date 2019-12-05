import popper from "popper.js";
import loading_attribute_polyfill from 'loading-attribute-polyfill';
import bootstrap from "bootstrap";
import magnific from 'magnific-popup';
import owlCarousel from "./owl.carousel.js";
import select from "select2/dist/js/select2.full.min";
import InitPopupGallery from "./components/popup-gallery";

import MainSlider from './components/main_slider';
import MainRewiesSlider from './components/main_rewies_slider';
import NavBarCollapse from './components/collapse-scroll';
import Select2Lang from './components/collapse-scroll';
import '../scss/style.scss';



$(document).ready(function(){


  MainSlider();
  MainRewiesSlider();
  NavBarCollapse();
  InitPopupGallery();

})