<?php

$rs = $data['p'];

function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}

/*PALETA DE COLOR #1 */ 
$color_1 = "#371b3e";
$color_2 = "#573060";
$color_3 = "#DCB986";
$color_4 = "#FFFFFF";


?>

<!DOCTYPE html>
<html>
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $data['p']->titulo }} | Fondo Editorial del BCP</title>

        <meta name="description" content="{{ $data['p']->seo_descripcion }}" />
        <link rel="canonical" href="" />

        <meta property="og:locale" content="es_ES" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $data['p']->titulo }}" />
        <meta property="og:description" content="{{ $data['p']->seo_descripcion }}" />
        <meta property="og:url" content="https://www.fondoeditorial.com/publicaciones/el-senor-de-los-milagros/" />
        <meta property="og:site_name" content="Fondo Editorial BCP" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="{{ $data['p']->seo_descripcion }}" />
        <meta name="twitter:title" content="{{ $data['p']->titulo }}" />
        <meta name="twitter:site" content="Fondo Editorial BCP" />
        <!-- <meta name="twitter:image" content="assets/img/share.jpg" /> -->

        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" /> 
        <meta http-equiv="Pragma" content="no-cache" /> 
        <meta http-equiv="Expires" content="0" />
        <!-- CSS Boostrap -->
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" >
        
        <!-- CSS Slick -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick.css') }}" />

        <!-- CSS hamburgers -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/hamburgers/hamburgers.min.css') }}" />
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.css" type="text/css" rel="stylesheet">
        <!-- CSS Perso -->
        <link rel="stylesheet" type="text/css"  href="{{ asset('style.css') }}?v=<?php echo uniqid();?>" >
        <style>
             body{
                background-color: <?php echo $color_2?>;
            }

            .bg-1{
                background-color: <?php echo $color_2?>;
                background-size: 100%; 
                background-repeat: no-repeat; 
                background-position: center top;
                background-blend-mode: multiply;
                box-shadow: inset 2000px 0 0 0 <?php echo hex2rgba($color_2, 0.4)?>;
            }
           
            .preambulo,.capitulos{
                /* box-shadow: inset 2000px 0 0 0 <?php echo hex2rgba($color_2, 0.7)?>; */
                background-blend-mode: multiply;
            }
            
            footer{
                background-color: <?php echo $color_2?>;
            }

            .bg-1-opacity{
                background-color: <?php echo hex2rgba($color_3, 0.7)?>;
            }

            .bg-2{
                /* background: rgba(197,202,228,1); */
                background-color: <?php echo $color_1?>;
            }

            .bg-2-gradient{
                background: <?php echo hex2rgba($color_1, 1)?>;
                background: linear-gradient(180deg, <?php echo hex2rgba($color_1, 1)?> 0%, <?php echo hex2rgba($color_1, 1)?> 90%, <?php echo hex2rgba($color_2, 1)?> 100%);
                padding-bottom: 2%;
            }

            
            
            .slick-nav .next{
                color:<?php echo $color_3?>
            }
            
            
            .banner .group-contour .group-contour-item p.contour,
            .preambulo .parafo p,
            .preambulo .parafo p span,
            .capitulos h3,
            .capitulos .parafo p,
            .capitulos .parafo p span,
            .capitulos p,
            .capitulos p span,
            .galeria h2,
            .autores h2,
            .autores  .slider .autor p,
            .obra h2{
                color:<?php echo $color_4?>
            }


            header .modal-menu .menu ul li{
                color:<?php echo $color_2?>
            }

            header.active{
                background-color: <?php echo hex2rgba($color_1, .8)?>;
            }

            .capitulos h2,
            .capitulos h4,
            .autores .slider .autor h3{
                color:<?php echo $color_3?>
            }

            .banner .group-contour .group-contour-item p.contour{
                -webkit-text-fill-color: <?php echo $color_2?>
            }

            .banner .banner-center ul li.uptitle-item,
            .banner .page-down .arrow-down
            {
                border: 1px solid <?php echo $color_3?>;
            }

            .banner .page-down .arrow-down,
            .presentacion .parafo p:before,
            .presentacion .parafo p:after,
            .presentacion .legend p.title,
            .preambulo .parafo p:before,
            .preambulo .parafo p:after,
            .capitulos .parafo p:before,
            .capitulos .parafo p:after{
                color:<?php echo $color_3?>
            }


            .banner .page-down .arrow-down:before,
            .banner .page-down .arrow-down:after{
                background-color:<?php echo $color_3?>
            }


            header .modal-menu .menu ul li:hover,
            header .modal-menu .menu ul li.active,
            .slick-nav.gold .next{
                color:<?php echo $color_3?>
            }

            @media only screen and (max-width: 991px) {
                .bg-1{
                    background-size: 200%; 
                    background-repeat: no-repeat; 
                    background-position: center top;
                }
            }
        </style>
    </head>

    <body id="js-scroll">
        <div id="overlay">
            <div id="progstat"></div>
            <div id="progress"></div>
        </div>
        <header>
            <div class="container">
                <div class="barra">
                    <div class="logo">
                        <img src="{{ asset('img/logo-negativo.png') }}" />
                    </div>
                    <div class="hamburger hamburger--collapse js-hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-menu">
                <div class="menu">
                    <div class="container">
                        <div class="row row-eq-height">
                            <div class="col-7">
                                <ul id="top-menu">
                                    <li data-id="banner" data-section="0" class="active">Inicio</li>
                                    <li data-id="dedicatoria" data-section="1">Dedicatoria</li>
                                    <li data-id="presentacion" data-section=2>Preámbulo</li>
                                    <li data-id="capitulos" data-section="6">Capítulo</li>
                                    <li data-id="galeria" data-section="9">Galería</li>
                                    <li data-id="autores" data-section="10">Autores</li>
                                </ul>
                            </div>
                            <div class="col-5">
                                <ul class="extra">
                                    <li data-id="">Publicaciones</li>
                                    <li data-id="">Fondo Editorial</li>
                                    <li data-id="">Noticias</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="bg-2-gradient">
            <div class="bg-1" style="z-index: 40; ">
                <div class="bg-1" style="background-image: url({{ URL_MEDIA.$rs->imagen_detalle }});z-index: 400; ">
                    <div class="banner section_scroll" id="banner">
                        <div class="banner-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-5">
                                        <div class="libro">
                                            <img src="{{ URL_MEDIA.$rs->imagen_portada }}" alt="{{ $rs->titulo }}" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="uptitle" style="display:none">
                                            <ul>
                                                <li class="uptitle-item">Religi&oacute;n</li>
                                                <li class="uptitle-item">Tradiciones</li>
                                            </ul>
                                        </div>
                                        <h1 class="title serif">{!! $rs->titulo !!}</h1>
                                        <!--<p class="text">historia, devoci&oacute;n e identidad</p>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-down">
                            <div class="arrow-down"></div>
                        </div>
                        <div class="group-contour">
                            <div class="group-contour-item left">
                                <p class="contour serif">{!! $rs->titulo !!}</p>
                            </div>
                            <div class="group-contour-item right">
                                <p class="contour serif">{!! $rs->titulo !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dedicatoria section_scroll" id="dedicatoria">
                        <div class="container">
                            <div class="row">
                                <div class="col-3">
                                    <h2 class="serif">Dedi<br>cato<br>ria</h2>
                                </div>
                                <div class="col-9" id="dedicatoriaText" >
                                    {!! $rs->dedicatoria !!}
                                    <p class="gs_reveal"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="presentacion section_scroll" id="presentacion">
                    <div class="container" id="presentacion-1">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="serif gs_reveal">Presentaci&oacute;n</h2>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="parafo">
                                    {!! $rs->presentacion_detalle !!}
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <img src="{{ URL_MEDIA.$rs->presentacion_imagen }}" />
                                <div class="legend">
                                    {!! $rs->presentacion_quote !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container" id="presentacion-2">
                        <div class="row">
                            <div class="col-12">
                                <p class="gs_reveal">
                                    [DE DONDE SALE ESTE TEXTO]
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="preambulo" id="preambulo">
                <div class="slider">
                    <div class="slider-container">
                        <div class="container" id="preambulo_link">
                            <div class="slick-nav gold">
                                <div class="container">
                                    <div class="prev"><i class="fa fa-fw fa-angle-left"></i></div>
                                    <div class="next"><i class="fa fa-fw fa-angle-right"></i></div>
                                </div>
                            </div>
                            <div class="slider-items" >
                                @if( count( $data['galeria'] ) )
                                    @foreach ( $data['galeria'] as $rsG )
                                        <img src="{{ URL_MEDIA.$rsG->imagen }}" alt="{{ $rsG->titulo }}">
                                    @endforeach
                                @endif
                                    <!--<img src="{{ asset('img/img-2.png') }}" >
                                    <img src="{{ asset('img/img-1.png') }}" >-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="parafo">
                                <p>[DE DONDE SALE ESTE TEXTO] Publicar un libro sobre la devoción al Señor de los Milagros no es fácil. Hay dos perspectivas constituidas por la historia y por la religión, que nos exigen tanto rigor como veneración. Un tema como este requiere ciertamente una investigación minuciosa del pasado y de la evolución del culto hasta nuestra época, con la ayuda de la observación y de la razón; y, por otra parte, se trata de un hecho religioso cuya interpretación y desarrollo exigen un conocimiento hondo de la religión católica.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="capitulos" style="background-image: url({{ asset('img/capitulos.png') }});" id="capitulos">
                <div class="container" id="capitulos-1">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="serif ">{!! $rs->capitulo_titulo !!}</h2>
                            
                            {!! $rs->capitulo_descripcion !!}
                        </div>
                    </div>
                </div>
                
                <div class="container" id="capitulos-2">
                    <div class="sections">
                        @if( $data['capitulo'] )
                            @foreach ( $data['capitulo'] as $rsG )
                                <div class="section">
                                    <img src="{{ URL_MEDIA.$rsG->imagen }}" />
                                    <h4>{{ $rsG->titulo }}</h4>
                                    <p>{{ $rsG->descripcion }}</p>
                                </div>
                            @endforeach
                        @endif
                        
                    </div>
                </div>

                <div class="container" id="capitulos-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="parafo">
                                <p>[DE DONDE SALE ESTE TEXTO] Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
                                    accusantium doloremque laudantium, totam rem aperiam, eaque 
                                    ipsa quae ab illo inventore veritatis et quasi architecto 
                                    beatae vitae dicta sunt explicabo.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="galeria" id="galeria">
                <div class="row">
                    <div class="container">
                        <div class="col-12">
                            <h2 class="serif">Galer&iacute;a</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="slider">
                            <div class="slick-nav">
                                <div class="container">
                                    <div class="prev"><i class="fa fa-fw fa-angle-left"></i></div>
                                    <div class="next"><i class="fa fa-fw fa-angle-right"></i></div>
                                </div>
                            </div>
                            <div class="slider-items">
                                @if( $data['galeria'] )
                                    @foreach ( $data['galeria'] as $rsG )
                                        <div class="slider-item">
                                            <img src="{{ URL_MEDIA.$rsG->imagen }}" alt="{{ $rsG->titulo }}" />
                                            <div class="card bg-1-opacity">
                                                <div class="text">
                                                    <h4>{{ $rsG->titulo }}</h4>
                                                    <p>{{ $rsG->descripcion }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="autores" id="autores">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <h2 class="serif">Autores</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="slider">
                        <div class="slick-nav">
                            <div class="container">
                                <div class="prev"><i class="fa fa-fw fa-angle-left"></i></div>
                                <div class="next"><i class="fa fa-fw fa-angle-right"></i></div>
                            </div>
                        </div>
                        <div class="slider-items">
                            @if( $data['autores'] )
                                @foreach ( $data['autores'] as $rsA )
                                    <div class="autor">
                                        <img src="{{ URL_MEDIA.$rsG->imagen }}" alt="{{ $rsG->nombre }}" />
                                        <div class="bg-2">
                                            <h3>{{ $rsA->nombre }}</h3>
                                            <p>{{ $rsA->biografia }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="obra" id="obra">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <h2 class="serif">Obra completa</h2>
                    </div>
                </div>
            </div>
            <iframe allowfullscreen="true" allow="fullscreen" style="border:none;width:100%;height:600px;" 
                src="issuu_embed" scrolling="no"></iframe>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="logo">
                            <img src="{{ asset('img/logo.png') }}"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="powered">
                            <p>Powered by</p>
                            <img src="{{ asset('img/powered.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </footer>

         <!-- JQuery -->
        <script src="{{ asset('assets/jquery/jquery-3.5.1.min.js') }}" ></script>
        <!-- Slick -->
        <script type="text/javascript" src="{{ asset('assets/slick/slick.min.js') }}" ></script>
        <!-- Slick Execution -->
        <script type="text/javascript" src="{{ asset('js/main-slick.js') }}?v=<?php echo uniqid();?>" ></script>
        <!-- Boostrap -->
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" ></script>
        <!-- ScrollMagic -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
        <!-- GSAP -->
        <script src="{{ asset('assets/gsap/minified/gsap.min.js') }}"></script>
        <script src="{{ asset('assets/gsap/minified/ScrollTrigger.min.js') }}"></script>
        <script src="{{ asset('assets/gsap/minified/SplitText.min.js') }}"></script>
        <script src="{{ asset('assets/gsap/minified/ScrollToPlugin.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"></script>



        <!-- <script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.6.0/polyfill.min.js" crossorigin="anonymous"></script>
        <script nomodule src="https://polyfill.io/v3/polyfill.min.js?features=Object.assign%2CElement.prototype.append%2CNodeList.prototype.forEach%2CCustomEvent%2Csmoothscroll" crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/locomotive/locomotive-scroll.js" ></script> -->
        <!-- GSAP Execution -->
        <script type="text/javascript" src="{{ asset('js/main.js') }}?v=<?php echo uniqid();?>"></script>
        <script type="text/javascript" src="{{ asset('js/main-gsap.js') }}?v=<?php echo uniqid();?>"></script>
        <!-- Hamburgers Execution -->
        <script type="text/javascript" src="{{ asset('js/main-hamburgers.js') }}"></script>

        <script>
                function id(v){return document.getElementById(v); }
                function loadbar() {
                    var ovrl = id("overlay"),
                        prog = id("progress"),
                        stat = id("progstat"),
                        img = document.images,
                        c = 0;
                        tot = img.length;

                    function imgLoaded(){
                    c += 1;
                    var perc = ((100/tot*c) << 0) +"%";
                    prog.style.width = perc;
                    stat.innerHTML = "Loading "+ perc;
                    if(c===tot) return doneLoading();
                    }
                    function doneLoading(){
                    ovrl.style.opacity = 0;
                    setTimeout(function(){ 
                        ovrl.style.display = "none";
                    }, 1500);
                    }
                    for(var i=0; i<tot; i++) {
                    var tImg     = new Image();
                    tImg.onload  = imgLoaded;
                    tImg.onerror = imgLoaded;
                    tImg.src     = img[i].src;
                    }    
                }
                document.addEventListener('DOMContentLoaded', loadbar, false);
            </script>
    </body>
</html>