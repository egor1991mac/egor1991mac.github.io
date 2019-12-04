import popper from "popper.js";
import loading_attribute_polyfill from 'loading-attribute-polyfill';
import bootstrap from "bootstrap";
import owlCarousel from "./owl.carousel.js";


import MainSlider from './components/main_slider';
import MainRewiesSlider from './components/main_rewies_slider';
import NavBarCollapse from './components/collapse-scroll';
import '../scss/style.scss';


$(document).ready(function(){


  MainSlider();
  MainRewiesSlider();
  NavBarCollapse();

})