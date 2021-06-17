$(document).ready(function(){
    $(window).scroll(function(){
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
        }else{
            $('.navbar').removeClass("sticky");
        }
    })
    // toggle manu Script
    $('.manu-btn').click(function(){
        $('.navbar .manu').toggleClass("active");
        $('.manu-btn i').toggleClass("active");
    })
    // corousal Script
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplayTimeOut:2000,
        autoplayHoverPause: true,
        responsive: {
            0:{
                items: 1,
                nav: false
            },
            600:{
                items: 2,
                nav: false
            },
            1000:{
                items: 3,
                nav: false
            }
        }
    });
});