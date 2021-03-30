
<?php
$rs = $data['p'];
?>

@extends('layouts.webPrincipal')


@section('titulo')
{{ $data['p']->titulo }} | Fondo Editorial del BCP
@endsection


@section('MetaTags')
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
					<li><a href="{{ url('home') }}">Inicio</a></li>
					<li><a class="active" href="{{ url('publicaciones') }}" >Publicaciones</a></li>
					<li><a href="{{ url('fondo-editorial') }}" >Fondo Editorial</a></li>
					<li><a href="{{ url('noticias') }}" >Noticias</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<section class="publicacion-detalle">
			<div class="content">
				<div class="portada">
					<div class="imagen">
						<img src="{{ URL_MEDIA.$rs->imagen_detalle }}" alt="{{ $rs->titulo }}" />
					</div>
					<div class="publicacion">
						<img src="{{ URL_MEDIA.$rs->imagen_portada }}" alt="{{ $rs->titulo }}" />
					</div>
					<div class="cta-btn">
						<a id="visualizar" href="#obra_completa" class="visualizar">Visualizar</a>
					</div>
				</div>
				<h2>{!! $rs->titulo !!}</h2>
				<!-- ############## -->
				{!! $rs->resumen !!}
				<!-- ############## -->
				
				<div class="resenias">
					<div class="slider-resenias fade">
						@if( $data['autores'] )
							@foreach ( $data['autores'] as $rsA )
							<div class="item">
								<!--<div class="foto">
									<img src="../../assets/images/foto-autor.png">
								</div>-->
								<div class="texto">
									<p>{{ $rsA->biografia }}</p>
									<p class="autor">{{ $rsA->nombre }}</p>
								</div>
							</div>
							@endforeach
                    	@endif
					</div>
				</div>
			</div>
		</section>
		<section class="section galeria">
			<div class="content">
				<h2>Galería</h2>
				<div class="galeria-content multiple-items">
					@if( $data['galeria'] )
						@foreach ( $data['galeria'] as $rsG )
						<div class="item" >
							<img src="{{ URL_MEDIA.$rsG->imagen }}" alt="{{ $rsG->titulo }}">
							<div class="hover">
								<h2>{{ $rsG->titulo }}</h2>
								<p>{{ $rsG->descripcion }}</p>
							</div>
						</div>
						@endforeach
					@endif

				</div>
			</div>
		</section>
		<section class="section obra_completa" id="obra_completa">
			<div class="content" style="padding-bottom: 0;">
				<!--<h2>Obra completa</h2>-->
				<div>
					<iframe allowfullscreen="true" allow="fullscreen" style="border:none;width:100%;height:600px;" src="{{ $rs->issuu_embed }}" ></iframe>
				</div>
				<div class="descargar cta-btn">
					<!-- TO-DO -->
					@if( $rs->archivo_issuu != '' )
					<a href="{{ URL_MEDIA.$rs->archivo_issuu }}" download="{{ URL_MEDIA.$rs->archivo_issuu }}" target="_blank" >Descargar</a>
					@endif
				</div>
			</div>
		</section>		
		<section class="section otras-publicaciones">
			<div class="content">
				<h2>Publicaciones Relacionadas</h2>
				<div class="lista-otras multiple-items">
					@if( $data['relacionadas'] )
						@foreach ( $data['relacionadas'] as $rsR )
						<div class="item">
							<a href="{{ WEB_URL.'publicacion/'.$rsR->slug }}">
								<div class="imagen">
									<img src="{{ URL_MEDIA.$rsR->imagen_portada }}" alt="{{ $rsR->titulo }}">
								</div>
								<h3>{{ $rsR->titulo }}</h3>
							</a>
						</div>
						@endforeach
					@endif
				</div>
			</div>
		</section>
	</main>
@endsection






