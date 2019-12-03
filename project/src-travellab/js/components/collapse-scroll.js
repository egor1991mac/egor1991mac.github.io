export default function initNavBarCollapse(){
$(window).scroll(function(e){
    
    if($(window).scrollTop() > 100){
        $('.js-collapse_scroll').hide('fast');
    }
    else{
        $('.js-collapse_scroll').show('fast');
    }
})
}