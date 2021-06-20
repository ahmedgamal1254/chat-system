$(document).ready(function (){
    $('.navbar ul li').click(function (){
        $(this).addClass('active-item').siblings().removeClass('active-item');
    })

    $('.popup-begin').delay(5000).fadeOut();

    $('.dark').click(function (){
        $('*').css({"backgroundColor":"black",color:"white"})
        $('.dropdown-menu').css({borderColor:"white"})
        document.getElementById('img-dark').src="images/logos/it_logo_white.png"
    })
    $('.btn-file-dropdown').on('click',function (){
        $($(this).data('toggle')).toggle(100)
        $($(this).data('class')).toggleClass('fa-angle-down');
        console.log($(this).data('toggle'))
    })

    // $(function() {
    //     $("html").niceScroll();
    // });

    // $("html").niceScroll({
    //     cursorcolor: "rgba(26, 188, 156, 1)", //Change the scroll bar color
    //     cursorwidth:'10px'
    // });

    $(window).scroll(function (){
        console.log($('.up'))
        if($(window).scrollTop() >= 500)
        {
            $('.up').fadeIn(400);
        }
        else
        {
            $('.up').fadeOut(400)
        }
    })

    $('.up').click(function (){
        $('html, body').animate({
            scrollTop:0
        },1000)
    })
})