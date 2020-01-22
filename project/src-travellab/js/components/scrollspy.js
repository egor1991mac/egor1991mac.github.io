export default function(){

    const scrollSpyLink = document.querySelectorAll('#nav-tour-detail a');

    if(scrollSpyLink){
        [].slice.call(scrollSpyLink).forEach(item=>{
            const idSpyElement = item.getAttribute('href');
            item.classList.remove('active');
            $(window).scroll(function(e){

                if($(window).scrollTop() >= Math.round($(idSpyElement).offset().top - 50)  && $(window).scrollTop() <= Math.round($(idSpyElement).offset().top + 50)) {
                    [].slice.call(scrollSpyLink).forEach(link=>{
                        link.classList.remove('active');
                    })
                    item.classList.add('active');
                }
            })
        })
    }

}
