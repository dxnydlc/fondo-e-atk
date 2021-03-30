<!DOCTYPE html>
<html>
<head>
	<html lang="{{ app()->getLocale() }}">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
	<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-ELH1X4KLV5"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-ELH1X4KLV5');
	</script>

	<meta name="description" content="A un solo clic de descubrir nuestras recientes publicaciones sobre el Perú"/>
	<link rel="canonical" href="" />

	@section('MetaTags')@show
	<meta property="og:locale" content="es_ES" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Publicaciones del Fondo Editorial BCP" />
	<meta property="og:description" content="A un solo clic de descubrir nuestras recientes publicaciones sobre el Perú." />
	<meta property="og:url" content="https://www.fondoeditorial.com/publicaciones/" />
	<meta property="og:site_name" content="Fondo Editorial BCP" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="A un solo clic de descubrir nuestras recientes publicaciones sobre el Perú." />
	<meta name="twitter:title" content="Publicaciones del Fondo Editorial BCP" />
	<meta name="twitter:site" content="Fondo Editorial BCP" />
	<!-- <meta name="twitter:image" content="assets/img/share.jpg" /> -->

	<title>@yield('titulo') | Fondo Editorial del BCP</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/normalize.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" >
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TBMFJPT');</script>
	<!-- End Google Tag Manager -->

	<script> 
        var _URL_HOME = '{{ WEB_URL }}', _URL_MEDIA = '{{ URL_MEDIA }}';
        var libros = [];
    </script>

</head>
<body>

@yield('content')

    <footer>
		<div class="content">
			<a href="{{ url('/') }}">
				<img src="{{ asset('assets/images/logo_fondo-editorial.png') }}" alt="Fondo Editorial BCP">
			</a>
			<a href="http://atomikal.com/" target="_blank">
				<img src="{{ asset('assets/images/powerdby.png') }}" alt="Atomikal PRO">
			</a>
		</div>
	</footer>
	<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets/js/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

<script type="text/javascript">
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
//
(function($){
	$(document).ready(function()
		{
			/* ------------------------------------------------------------- */
            getBuscador();
			/* ------------------------------------------------------------- */
			/* ------------------------------------------------------------- */
			/* ------------------------------------------------------------- */
		});

})(jQuery);
/* ------------------------------------------------------------- */
function getBuscador()
{
    var _data = { 
        '_token'  : $('meta[name="csrf-token"]').attr('content') , 
    };

    $.post( _URL_HOME + 'json/publicacion', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        //
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                //
            break;
            case 'OK':
                console.log( json.data );
                libros = json.data
            break;
        }
        //$('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        //$('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
</script>
<script type="text/javascript" src="{{ asset('assets/js/buscador.js') }}"></script>
</body>
</html>