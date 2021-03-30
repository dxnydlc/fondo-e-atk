@extends('layouts.webPrincipal')


@section('titulo')
Noticias | Fondo Editorial del BCP
@endsection

@section('MetaTags')
<meta name="description" content="Entérate de las últimas novedades y actividades del Fondo Editorial BCP"/>
<link rel="canonical" href="" />

<meta property="og:locale" content="es_ES" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Fondo Editorial BCP" />
<meta property="og:description" content="Entérate de las últimas novedades y actividades del Fondo Editorial BCP." />
<meta property="og:url" content="https://www.fondoeditorial.com/" />
<meta property="og:site_name" content="Fondo Editorial BCP" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="Entérate de las últimas novedades y actividades del Fondo Editorial BCP." />
<meta name="twitter:title" content="Fondo Editorial BCP" />
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
			<a href="{{ url('/') }}">
				<h1>Fondo Editorial BCP</h1>
				<img src="{{ asset('assets/images/logo_fondo-editorial.png') }}" alt="Fondo Editorial BCP">
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
					li><a href="{{ url('home') }}">Inicio</a></li>
					<li><a class="active" href="{{ url('publicaciones') }}" >Publicaciones</a></li>
					<li><a href="{{ url('fondo-editorial') }}" >Fondo Editorial</a></li>
					<li><a class="active" href="{{ url('noticias') }}" >Noticias</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<section class="section noticias">
			<div class="content">
				<h2>Noticias</h2>
				@php
					$CSGO = 1;$clase = 'nota-destacada';
				@endphp
				@if( count( $data['noticias'] ) > 0 )
					@foreach ( $data['noticias'] as $rs )
					<div class="nota {{ $clase }} " >
						@if ( $CSGO == 1)
							<div class="imagen" >
								<a href="{{ url('noticias').'/'.$rs->slug }}" >
									<img src="{{ URL_MEDIA.$rs->imagen_portada }}" alt="{{ $rs->titular }}" />
								</a>
							</div>
							<div class="cuerpo" >
								<span class="fecha-publicacion">{{ $rs->publicacion }}</span>
								<h3>{{ $rs->titular }}</h3>
								{{ $rs->bajada }}
								<div class="cta-btn">
									<a href="{{ url('noticias').'/'.$rs->slug }}">Leer más</a>
								</div>
							</div>
						@else
							<a href="{{ url('noticias').'/'.$rs->slug }}" >
								<div class="imagen">
									<img src="{{ URL_MEDIA.$rs->imagen_portada }}" alt="{{ $rs->titular }}" />
								</div>
								<div class="cuerpo">
									<span class="fecha-publicacion">{{ $rs->publicacion }}</span>
									<h3>{{ $rs->titular }}</h3>
									{{ $rs->bajada }}
								</div>
							</a>
						@endif
						
					</div>
					@php
						$CSGO++;
						$clase = 'item-noticia';
					@endphp
					@endforeach
				@endif


			</div>
		</section>
	</main>
@endsection





