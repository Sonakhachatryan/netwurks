/**
 * Created by user on 2/22/2017.
 */
$ (".nav-icon").on('click', function () {

    if($('header').hasClass('menu-open')){
        $('header').removeClass('menu-open')
    }else{
        $('header').addClass('menu-open')
    }
})

/*$ ("header #first-block-content ul li:last-child a").on('click', function () {
    $(".login-inner").toggle(500, function () {

    })
})*/

$(document).ready(function(){
    $(".login-popup").click(function(){
        $(".login-inner").addClass('open-btn')
    });
});

$(document).ready(function () {
    $('.contentId li> a').on('click',function () {
        var x = $(this).data('list');
        $('html,body').animate({
                scrollTop: $("."+x).offset().top
            },
            500);
    })

    $('footer li> a').on('click',function () {
        var x = $(this).data('list');
        $('html,body').animate({
                scrollTop: $("."+x).offset().top
            },
            500);
    })
});



$ (".login-inner .times-list").on('click', function () {
    /*$(".login-inner").toggle(500, function () {

    })*/
    if($(".login-inner").hasClass('open-btn')){
        $(".login-inner").removeClass('open-btn')
    }
})
