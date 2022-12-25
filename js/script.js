
$('.accordion-button').click(function(){
    $('.accordion-button').children('span').removeClass('zoom')
    if(!$(this).children('span').hasClass('zoom')){
        $(this).children('span').addClass('zoom')
    }else{
        $(this).children('span').removeClass('zoom')
    }
})

var windowLoc = $(location).attr('pathname')
var homePage = '/freelancePro1/index.php';
if(windowLoc === homePage){
    $('.navbar ').css({"background":"transparent","backdrop-filter":" none","box-shadow": "none"})
}