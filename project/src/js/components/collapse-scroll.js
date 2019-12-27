export default function initNavBarCollapse(){
$(window).scroll(function(e){

    if($(window).scrollTop() > 0){
        $('.js-collapse_scroll').hide('fast');
        if($('.card.sticky-top').length > 0){
            $('.card.sticky-top').css('top',$('header.sticky-top').height());

        }
    }
    else{
        $('.js-collapse_scroll').show('fast');
    }
})
}