$(document).ready(function(){
    $('.drop').click(function(){
        $(this).find('img').toggleClass('rotate');
        $(this).find('.drop_item').slideToggle();
    });
});