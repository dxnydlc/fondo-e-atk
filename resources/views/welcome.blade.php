
@extends('layouts.webPrincipal')


@section('titulo')
Fondo Editorial del BCP
@endsection

@section('MetaTags')
<meta property="og:locale" content="es_ES" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Fondo Editorial BCP" />
<meta property="og:description" content="Estamos comprometidos con difundir la cultura peruana a través de publicaciones gratuitas." />
<meta property="og:url" content="https://www.fondoeditorial.com/" />
<meta property="og:site_name" content="Fondo Editorial BCP" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="Estamos comprometidos con difundir la cultura peruana a través de publicaciones gratuitas." />
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
			<a href="{{ url('home') }}">
				<h1>Fondo Editorial BCP</h1>
				<img src="{{ asset('assets/images/logo_fondo-editorial.png') }}" alt="Fondo Editorial BCP">
			</a>
			<div id="nav-icon">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div>
			<nav id="menuOpciones">
				<ul>
					<li><a class="active" href="{{ url('home') }}">Inicio</a></li>
					<li><a href="{{ url('publicaciones/') }}">Publicaciones</a></li>
					<li><a href="{{ url('fondo-editorial/') }}">Fondo Editorial</a></li>
					<li><a href="{{ url('noticias/') }}">Noticias</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<section class="banner-home">
			<div class="content">
				<div class="slider-home fade">
                    @if( $data['banners'] )
                        @foreach ( $data['banners'] as $rsBN )
                            <div class="item">
                                <picture>
                                    <source srcset="{{ URL_MEDIA.$rsBN->imagen_movil }}" media="(min-width: 300px) and (max-width: 768px)">
                                    <img src="{{ URL_MEDIA.$rsBN->imagen_movil }}" alt="{{ $rsBN->titulo }}" />
                                </picture>
                                <div class="caption">
                                    <div class="texto">
                                        <h2>{{ $rsBN->titulo }}</h2>
                                        <p>{{ $rsBN->subtitulo }}</p>
                                        <div class="cta-btn">
                                            @if( $rsBN->enlace != '' )
                                                <a href="{{ $rsBN->enlace }}" >{{ $rsBN->texto_boton }}</a>
                                            @else
                                            <a href="#" >{{ $rsBN->texto_boton }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="portada-publicacion">
                                    <img src="{{ URL_MEDIA.$rsBN->imagen_publicacion }}" alt="{{ $rsBN->texto_boton }}" />
                                </div>
                            </div>
                            <!-- ./ -->
                        @endforeach
                    @endif
				</div>
			</div>
		</section>
		<section class="buscador">
			<div class="content">
				<form action="">
					<div class="control">
						<label for="buscador">
							<input id="buscador" type="text" name="buscador" placeholder="Busca todas nuestras publicaciones" class="buscador-home">
						</label>
					</div>
				</form>
				<div class="lista-resultados home">
					<ul id="resultado"></ul>
				</div>
			</div>
		</section>
		<section class="section publicaciones-destacadas-home">
			<div class="content">
				<h2>Publicaciones</h2>
				<div class="slider-publicaciones multiple-items">
                    @if( $data['publicaciones'] )
                        @foreach ( $data['publicaciones'] as $rsP )
                        <div class="item destacada">
                            <div class="content">
                                <div class="imagen">
                                    <img src="{{ URL_MEDIA.$rsP->imagen_detalle }}">
                                </div>
                                <div class="caption">
                                    <h3>{{ $rsP->titulo }}</h3>
                                    <div class="cta-btn">
                                        <a href="{{ WEB_URL.'publicacion/'.$rsP->slug }}">Conoce más</a>
                                    </div>
                                </div>
                                <div class="portada-publicacion">
                                    <img src="{{ URL_MEDIA.$rsP->imagen_portada }}" alt="{{ $rsBN->titulo }}" />
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

					
				</div>
				<div class="cta-link">
					<a href="publicaciones/">Todas las publicaciones</a>
				</div>
			</div>
		</section>
		<section class="section fondo-editorial-home">
			<div class="content">
				<div class="texto">
					<h2>{{ $data['fondo']->titulo }}</h2>
					{!! $data['fondo']->resumen !!}
					<div class="cta-btn solo-desktop">
						<a href="{{ url('fondo-editorial') }}">Conoce más</a>
					</div>
				</div>
				<div class="imagen">
					<img src="{{ URL_MEDIA.$data['fondo']->imagen }}" alt="{{ $data['fondo']->titulo }}" />
				</div>
				<div class="cta-btn solo-mobile">
					<a href="{{ url('fondo-editorial') }}">Conoce más</a>
				</div>
			</div>
		</section>
		<section class="section ultimas-noticias-home">
			<div class="content">
				<h2>Noticias</h2>
				<div class="bloque-noticias">
					<div class="ultima-noticia">
						<div class="nota">
							<a href="{{ url('noticias').'/'.$data['lastNoti']->slug }}" >
								<img src="{{ URL_MEDIA.$data['lastNoti']->imagen_portada }}" alt="{{ $data['lastNoti']->titular }}" />
								<span class="fecha-publicacion" >{{ $data['lastNoti']->publicacion }}</span>
								<p>{{ $data['lastNoti']->titular }}</p>
							</a>
						</div>
					</div>
					<div class="otras-noticias">
						@if( count( $data['noticias'] ) > 0 )
							@foreach ( $data['noticias'] as $rsN )
							<div class="nota">
								<a href="{{ url('noticias').'/'.$rsN->slug }}" >
									<img src="{{ URL_MEDIA.$rsN->imagen_portada }}" alt="{{ $rsN->titular }}" />
									<div>
										<span class="fecha-publicacion">{{ $rsN->publicacion }}</span>
										<p>{{ $rsN->titular }}</p>									
									</div>
								</a>
							</div>
							@endforeach
						@endif

						</div>
					</div>
				</div>
				<div class="cta-link">
					<a href="{{ url('noticias') }}" >Ver más noticias</a>
				</div>
			</div>
		</section>
	</main>
@endsection
