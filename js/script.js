$('.accordion-button').click(function(){
    $('.accordion-button').children('span').removeClass('zoom')
    if(!$(this).children('span').hasClass('zoom')){
        $(this).children('span').addClass('zoom')
    }else{
        $(this).children('span').removeClass('zoom')
    }
})