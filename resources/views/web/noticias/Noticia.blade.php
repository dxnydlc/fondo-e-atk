@extends('layouts.webPrincipal')


@section('titulo')
Noticias | Fondo Editorial del BCP
@endsection

@section('MetaTags')
<meta name="description" content="El BCP pone a disposición mediante su portal la descarga de libros perteneciente a la colección Arte y Tesoros del Perú"/>
<link rel="canonical" href="" />

<meta property="og:locale" content="es_ES" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $data['data']->seo_titulo }}" />
<meta property="og:description" content="{{ $data['data']->seo_descripcion }}" />
<meta property="og:url" content="https://www.fondoeditorial.com/noticias/bcp-ofrece-acceso-y-descarga-gratuito-a-los-libros-de-su-fondo-editorial/" />
<meta property="og:site_name" content="Fondo Editorial BCP" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="{{ $data['data']->seo_descripcion }}" />
<meta name="twitter:title" content="{{ $data['data']->seo_titulo }}" />
<meta name="twitter:site" content="Fondo Editorial BCP" />
<!-- <meta name="twitter:image" content="assets/img/share.jpg" /> -->
@endsection


@section('content')

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TBMFJPT"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<header>

		<div class="content">
			<a href="{{ URL('/') }}" >
				<h1>Fondo Editorial BCP</h1>
				<img src="{{ ASSET('assets/images/logo_fondo-editorial.png') }}" alt="Fondo Editorial BCP">
			</a>
			<div class="final-barra">
				<div class="buscador-internas">
					<form action="">
						<div class="control">
							<label for="buscador">
								<input id="buscador" type="text" name="buscador" placeholder="Busca todas nuestras publicaciones">
							</label>
						</div>
					</form>
					<div class="lista-resultados">
						<ul id="resultado"></ul>
					</div>
				</div>
				<div id="nav-icon">
				  <span></span>
				  <span></span>
				  <span></span>
				  <span></span>
				</div>
			</div>
			<nav id="menuOpciones">
				<ul>
					<li><a href="{{ url('/') }}" >Inicio</a></li>
					<li><a href="{{ url('publicaciones') }}" >Publicaciones</a></li>
					<li><a href="{{ url('fondo-editorial') }}" >Fondo Editorial</a></li>
					<li><a class="active" href="{{ url('noticias') }}" >Noticias</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<section class="section cuerpo-nota">
			<div class="content">
				<h2>Noticias</h2>
				<a href="{{ url('/') }}" class="breadcrumb">Volver</a>

				<div class="cuerpo">
					<div class="imagen">
						<img src="{{ URL_MEDIA.$data['data']->imagen_detalle }}" alt="{{ $data['data']->titular }}" />
					</div>
					<span class="fecha-publicacion">{{ $data['data']->publicacion }}</span>
					<h2>{{ $data['data']->titular }}</h2>
					
                    {!! $data['data']->contenido !!}

				</div>
			</div>
		</section>
		<section class="section notas-relacionadas">
			<div class="content">
				<h2>Noticias Relacionadas</h2>
                @if( count( $data['noticias'] ) > 0 )
                    @foreach ( $data['noticias'] as $rs )
                        <div class="nota-relacionada">
                            <a href="{{ url('noticias').'/'.$rs->slug }}" >
                                <div class="imagen">
                                    <img src="{{ URL_MEDIA.$rs->imagen_portada }}" alt="{{ $rs->titular }}" />
                                </div>
                                <div class="texto">
                                    <span class="fecha-publicacion">{{ $rs->publicacion }}</span>
                                    <h2>{{ $rs->titular }}</h2>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
				

			</div>
		</section>

	</main>

@endsection



