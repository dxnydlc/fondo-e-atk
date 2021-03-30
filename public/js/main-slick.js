$( document ).ready(function() {
    //HEADER

    $(window).on("scroll", function() {
        if($(window).scrollTop() > 50) {
            $("header").addClass("active");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
           $("header").removeClass("active");
        }
    });

    $(".preambulo .slider-items").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: $('.preambulo .prev'),
        nextArrow: $('.preambulo .next'),
        dots: false,
        centerMode: false,
        pauseOnHover: false,
        pauseOnFocus: false
    });
    $(".capitulos .slider-items").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: $('.capitulos .prev'),
        nextArrow: $('.capitulos .next'),
        dots: false,
        centerMode: false,
        autoplay: false,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerPadding: '10px',
                    centerMode: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerPadding: '10px',
                    centerMode: false
                }
            }
        ]
    });
    $(".galeria .slider-items").slick({
        initialSlide: 1,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        variableWidth: true,
        centerMode: false,
        autoplay: true,
        pauseOnHover: true,
        pauseOnFocus: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    centerMode: true,
                    slidesToShow: 1,
                    respondTo: 'min'
                }
            }
        ]
    });
    $(".galeria .slider-items-rtl").slick({
        rtl: true,
        initialSlide: 1,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        variableWidth: true,
        centerMode: false,
        autoplay: true,
        pauseOnHover: true,
        pauseOnFocus: true
    });
    // $('.slider-item').on('hover',function(){
    //     $(this).last().css('opacity',1);
    //     $(this).first().css('opacity',1);
    // });
    // $('.slider-item-rtl').on('hover',function(){
    //     $(this).last().css('opacity',1);
    //     $(this).first().css('opacity',1);
    // });
    $(".autores .slider-items").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        centerMode: false,
        prevArrow: $('.autores .prev'),
        nextArrow: $('.autores .next'),
        autoplay: true,
        pauseOnHover: false,
        pauseOnFocus: false,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    centerMode: false,
                    prevArrow: $('.autores .prev'),
                    nextArrow: $('.autores .next'),
                    autoplay: true,
                    pauseOnHover: false,
                    pauseOnFocus: false,
                }
            }
        ]
    });
    $('.galeria .prev').click(function(){
        $(".galeria .slider-items").slick('slickPrev');
        $(".galeria .slider-items-rtl").slick('slickPrev');
    });
    $('.galeria .next').click(function(){
        $(".galeria .slider-items").slick('slickNext');
        $(".galeria .slider-items-rtl").slick('slickNext');
    });
    $(".publicaciones .slider-items").slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: $('.publicaciones .prev'),
        nextArrow: $('.publicaciones .next'),
        dots: false,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });
    
});