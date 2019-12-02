import popper from "popper.js";
import loading_attribute_polyfill from 'loading-attribute-polyfill';
import bootstrap from "bootstrap";
import bsCustomFileInput from "bs-custom-file-input";
import select from "select2/dist/js/select2.full.min";
import Wow from "wow.js/dist/wow.min.js";
import owlCarousel from "./owl.carousel.js";
import mask from "./jquery.mask.min.js";
import '../scss/style.scss';
import '../scss/fonts.scss';
import stickybits from 'stickybits'
import svg from 'svgxuse';


$(function() {
  $(document).ready(function() {

    new Wow({
      offset: 175
    }).init();
    
    $(".owl-book").owlCarousel({
      items: 1,
      dots: false,
      loop: true,
      margin: 10,
      center: true
    });
  
    stickybits('#some-stickybit-nav',{stickyBitStickyOffset: 90});
    stickybits('#some-stickybit-nav2',{stickyBitStickyOffset: 90});

    $(".slider-book-next button").click(function(e) {
      $(".owl-book").trigger("next.owl.carousel");
    });
    $(".slider-book-prev button").click(function(e) {
      $(".owl-book").trigger("prev.owl.carousel");
    });
    (function initOwlNav (){
     
      const owlNav = $(".owl-nav.owl-carousel");
      let stPosition=0;
      try{
       
        stPosition=owlNav.data().startposition;
    
      }
      catch(e){

      };
     
     
     
      owlNav.owlCarousel({
        dots: false,
        loop: true,
        startPosition: stPosition,
        responsive: {
          0: {
            stagePadding: 10,
            items: 1,

            margin: 0
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
    })();
    

    //   // $(".owl-item").each(function(index, item) {
    //   //   $(item)
    //   //     .find(".card-body")
    //   //     .removeClass("active");
    //   //   // console.log(item);
    //   //   setTimeout(() => {
    //   //     if ($(item).hasClass("active")) {
    //   //       $(item)
    //   //         .find(".card-body")
    //   //         .toggleClass("active");
    //   //     }
    //   //   }, 100);
    // });

    // .on("click", function(e) {
    //   console.log("click");
    // });
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
          stagePadding: 0,
          items: 3,
          margin: 0
        }
      }
    });

    $(".owl-next").on("click", function(e) {
      $(".owl-carousel").trigger("next.owl.carousel");
    });

    $('input[data-type="number"]').mask("00 000 000 000 000 000 000");
    $('input[data-type="percent"]').mask("00,0%", { reverse: true });
    $(".js-example-basic-single").select2({
      theme: "bootstrap",
      dropdownCssClass: "dropdownContainer",
      minimumResultsForSearch: -1
    });
    $("#selectLang")
      .select2({
        adaptContainerCssClass: "selectLangContainer",
        theme: "bootstrap",
        containerCssClass: "selectLang",
        dropdownCssClass: "dropdownSelectLang",
        minimumResultsForSearch: -1
      })
      .on("select2:select", function(e) {
        const imgLang = $(this)
          .parent()
          .find("svg[class*='lang-']");
        imgLang.each(function(index, item){
          $(item).toggleClass("d-none");
        });
      });
    $("#select2-tabs")
      .select2({
        adaptContainerCssClass: "hello",
        containerCssClass: "selectTabs",
        theme: "bootstrap",
        minimumResultsForSearch: -1
      })
      .on("select2:select", function(e) {
        const { value } = e.target;
        const tab = $(".tab-pane");

        //console.log(tab.is(`#${value}`));
        tab.each(function(index, item){
          $(item).hasClass("active") && $(item).removeClass("active");
          $(`#${value}`).addClass("active");
        });
      });
    $(".select2-hook").each(function() {
      $(this).select2({
        theme: "bootstrap",
        dropdownCssClass: "dropdownContainer",
        minimumResultsForSearch: -1
      });
    });

    let nav = $('[class*="icon-eye"]').parent();
  
    nav.click(function(e) {
      e.preventDefault();
     $("#bad-see").toggle();
      $('[class*="icon-eye"]').each(function(index, node) {
        $(node).toggleClass("d-none");
      });
    });
   
   
    //file-input
    (function fileInput() {
      
      document.addEventListener('click',function(e){
       
        if($(e.target).hasClass('custom-file-input')){
          bsCustomFileInput.init();
        }
        // if($(e.target).hasClass('icon-Close')){
        //   console.log($(e.target).closest('.custom-file'),'tut');
        //   $(e.target).parent('.reset').removeClass('active');
        //   $(e.target).closest('.custom-file').toggleClass('active');
        //   $(e.target).closest('.custom-file').find('input').val("");
        //   $(e.target).closest('.custom-file').find('label').text("");
        // }
      })
      $("body").on("DOMSubtreeModified", ".custom-file-label", function(_this) {
        //bsCustomFileInput.init();
        console.log($(this).text().length);
      if($(this).text().length > 3 ){
        
        $(this)
        .parent()
        .find(".reset")
        .addClass("active");
      $(this)
        .parent()
        .addClass("active");
      }
        
          

        var $this = $(this);
        $(this)
          .parent()
          .find(".reset")
          .click(function(e) {
            //console.log($this,_this,e.currentTarget);
           // console.log(e.currentTarget.closest('.custom-file'))
            //('.custom-file').querySelector('.reset').classList.remove('active');
           
            $(this).removeClass("active");
            $(this)
              .parent()
              .removeClass("active");
              $(this).parent().find("input").val("");
              $this.text("");
          });
         
      });
     
    })();

   

    (function slider_main_page_book() {
      let slider = $("#mp-slider-book");

      slider.carousel({});
    })();

    (function header_scroll() {
      let headerSroll = $(".header-with-scroll");
      let headerDesctop_height = $(".header-desctop").height();
  
      
      if (window.innerWidth > 992 || headerSroll.hasClass("main")) {
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
      } else {

        let headerSroll = $(".header-with-scroll");
        headerSroll.addClass("scrolled");
      }
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
      setTimeout( function(){
        toggleContent.toggleClass("active");
      }, 1000);
      setTimeout(function(){
        //toggleContent.toggleClass("active");
        toggleContent.hide();
      }, 1000);
    }

    setTimeout(function(){
      toggleContent.removeClass("animated");
    }, 1000);
  }
  //collapseHeaderNav($("._animation_before"));

  let toggleButton = $(".toggle-menu-button");

  toggleButton.each(function() {
    $(this).click(function() {
      if (!$(".top-nav-collapse").hasClass("active")) {
        collapseHeaderNav($("._animation_before"));
        setTimeout(function(){
          collapseHeaderNav($(".top-nav-collapse"));
        }, 100);
      } else {
        collapseHeaderNav($(".top-nav-collapse"));
        setTimeout(function(){
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

  if(document.querySelector('#font-big')){
    document.querySelector('#font-big').onclick = function(e){
      document.querySelector('html').classList.toggle('font-big');
     };
  }  

  if(document.querySelector('.gl-btn')){
    const all_btn = document.querySelectorAll('.gl-btn');
    const all_symbol = document.querySelectorAll('.gl-symbl');
    const tab = document.querySelectorAll('[role="tab"]');
    [].slice.call(all_btn).forEach((item,index)=>{
       
       item.onclick =  (e) =>{
        [].slice.call(all_btn).forEach(item=>item.classList.remove('active'));
        if (item.innerText != '...'){
          [].slice.call(all_symbol).forEach( elem => $(elem).parent().hide());
            item.classList.add('active');
            const visible_item = [].slice.call(all_symbol).find(elem => {
              
              return elem.innerText.toLowerCase() == item.innerText.toLowerCase();
            })

            $(visible_item).parent().show();
          
        }
        else{
          [].slice.call(all_symbol).forEach( elem => $(elem).parent().show());
        }
         
        
         
        
       }
    });
    [].slice.call(tab).forEach(item=>{
      item.onclick = (e)=>[].slice.call(all_symbol).forEach( elem => $(elem).parent().show());         
    })
   
    
    
  }
  
 
});
