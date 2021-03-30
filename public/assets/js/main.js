$(document).ready(function(){
	// Hamburguesa
	$('#nav-icon').click(function(){
		$(this).toggleClass('open');
		$('#menuOpciones').slideToggle("slow");
	});
	// Menú
	$('#menuOpciones').hide();

	$(".buscador-home").click(function(){
		$('html,body').animate({
            scrollTop: $(this).offset().top - 150
        }, 1500);
    });

    $("#visualizar").click(function(){
		$('html,body').animate({
            scrollTop: $('#obra_completa').offset().top
        }, 1500);
    });

	// Slider Home - Fade
	$('.slider-home.fade').slick({
	  dots: true,
	  arrows: false,
	  infinite: true,
	  autoplaySpeed: 4000,
	  speed: 500,
	  fade: true,
	  autoplay: false,
	  cssEase: 'linear'
	});

	//Slider Reseñas - Detalle del libro
	$('.slider-resenias.fade').slick({
	  dots: true,
	  arrows: true,
	  infinite: false,
	  autoplaySpeed: 4000,
	  speed: 500,
	  fade: true,
	  autoplay: false,
	  cssEase: 'linear',
	  prevArrow: '<div class="slick-prev"><img src="../../assets/images/prev2.png"></div>',
	  nextArrow: '<div class="slick-next"><img src="../../assets/images/next2.png"></div>'
	});

	//Slider Destacados - Detalle del libro
	$('.slider-publicaciones.multiple-items').slick({
	  infinite: true,
	  slidesToShow: 2,
	  slidesToScroll: 1,
	  centerMode: true,
  	  centerPadding: '70px',
	  dots: false,
	  infinite: true,
	  arrows: true,
	  prevArrow: '<div class="slick-prev"><img src="assets/images/prev.png"></div>',
	  nextArrow: '<div class="slick-next"><img src="assets/images/next.png"></div>',
	  responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        centerMode: false
	      }
	    }
	  ]
	});

	//Slider Fechas - Fondo Editorial
	$('.slider-dates.multiple-items').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  initialSlide: 1,
	  centerMode: true,
  	  centerPadding: '25px',
	  dots: true,
	  infinite: false,
	  arrows: true,
	  prevArrow: '<div class="slick-prev"><img src="../assets/images/prev2.png"></div>',
	  nextArrow: '<div class="slick-next"><img src="../assets/images/next2.png"></div>',
	  responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        centerPadding: '20px',
	        dots: false
	      }
	    }
	  ]
	});

	// $('.item.anio.slick-slide').click(function(){
	// 	$('.item.anio.slick-slide').removeClass('slick-current slick-center');
	// 	$(this).toggleClass('slick-current slick-center');
	// });
	
	//Slider xxxxx - xxxxx
	$('.slider.multiple-items').slick({
	  infinite: true,
	  slidesToShow: 4,
	  centerMode: true,
  	  centerPadding: '60px',
	  slidesToScroll: 1,
	  dots: false,
	  infinite: true,
	  arrows: true,
	  prevArrow: '<div class="slick-prev"><img src="../assets/images/prev.png"></div>',
	  nextArrow: '<div class="slick-next"><img src="../assets/images/next.png"></div>',
	  responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        centerPadding: '20px',
	      }
	    }
	  ]
	});

	//Slider Galeria - Detalle del libro
	$('.galeria-content.multiple-items').slick({
	  slidesToShow: 3,
	  centerMode: true,
  	  centerPadding: '20px',
	  slidesToScroll: 1,
	  dots: false,
	  infinite: true,
	  arrows: true,
	  prevArrow: '<div class="slick-prev"><img src="../../assets/images/prev.png"></div>',
	  nextArrow: '<div class="slick-next"><img src="../../assets/images/next.png"></div>',
	  responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 2,
	        infinite: true,
	        slidesToScroll: 1,
	        centerPadding: '10px',
	        arrows: true,
	  		prevArrow: '<div class="slick-prev"><img src="../../assets/images/prev.png"></div>',
	  		nextArrow: '<div class="slick-next"><img src="../../assets/images/next.png"></div>'
	      }
	    }
	  ]
	});

	//Slider Otra Publicaciones - Detalle del libro
	$('.lista-otras.multiple-items').slick({
	  infinite: true,
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  dots: false,
	  infinite: false,
	  arrows: false,
	  responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1,
	        centerPadding: '15px',
	        arrows: true,
	  		prevArrow: '<div class="slick-prev"><img src="../../assets/images/prev2.png"></div>',
	  		nextArrow: '<div class="slick-next"><img src="../../assets/images/next2.png"></div>'
	      }
	    }
	  ]
	});

	//Función ver más
	$(function () {
        // $(".item-resultados").slice(0, 8).show();
        // $("#masResultados").on('click', function (e) {
        //     e.preventDefault();
        //     $(".item-resultados:hidden").slice(0, 4).show(100);
        //     if ($(".item-resultados:hidden").length == 0) {
        //         $("#masResultados").fadeOut('slow');
        //     }
        //     $('html,body').animate({
        //         scrollTop: $(this).offset().top - 100
        //     }, 1500);
        // });
        $(".item-noticia").slice(0, 6).show().addClass('active');
        $("#masNoticias").on('click', function (e) {
            e.preventDefault();
            $(".item-noticia:hidden").slice(0, 3).show(100).addClass('active');
            if ($(".item-noticia:hidden").length == 0) {
                $("#masNoticias").fadeOut('slow');
            }
            $('html,body').animate({
                scrollTop: $(this).offset().top - 350
            }, 1500);
        });
    });

	//Filtros Publicaciones
    $(function() {
		$('#categorias').change(function(){
			$('.item-resultados').hide();
			$('.' + $(this).val()).show();
			$('#coleccion').val("");
			$('#publicacionDate').val("");
		});
		$('#coleccion').change(function(){
			$('.item-resultados').hide();
			$('.' + $(this).val()).show();
			$('#categorias').val("");
			$('#publicacionDate').val("");
		});
		$('#publicacionDate').change(function(){
			$('.item-resultados').hide();
			$('.' + $(this).val()).show();
			$('#categorias').val("");
			$('#coleccion').val("");
		});
	});
    
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
	  // true for mobile device
	  // document.write("mobile device");
	  $('.slider-dates.multiple-items').removeClass('desktop');
	} else{
	  // false for not mobile device
	  // document.write("not mobile device");
	  $('.slider-dates.multiple-items').addClass('desktop');
	}

});