@extends('layouts.webPrincipal')


@section('titulo')
Publicaciones | Fondo Editorial del BCP
@endsection

@section('MetaTags')
<meta name="description" content="A un solo clic de descubrir nuestras recientes publicaciones sobre el Perú"/>
<link rel="canonical" href="" />

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
					<li><a href="{{ url('/') }}">Inicio</a></li>
					<li><a class="active" href="{{ url('publicaciones') }}" >Publicaciones</a></li>
					<li><a href="{{ url('fondo-editorial') }}" >Fondo Editorial</a></li>
					<li><a href="{{ url('noticias') }}" >Noticias</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<section class="section publicaciones-destacadas">
			<div class="content">
				<h2>Publicaciones</h2>
				<div class="slider-publicaciones">
					<h3>Destacados</h3>
					<div class="slider multiple-items">
                        @if( count( $data['destacadas'] ) > 0 )
                            @foreach ( $data['destacadas'] as $rsDS )
                            <div class="item">
                                <a href="{{ url('publicacion').'/'.$rsDS->slug }}">
                                    <div class="imagen">
                                        <img src="{{ URL_MEDIA.$rsDS->imagen_portada }}" alt="{{ $rsDS->titulo }}" />
                                    </div>
                                    <h3>{{ $rsDS->titulo }}</h3>
                                </a>
                            </div>
                            @endforeach
                        @endif
					</div>					
				</div>
			</div>
		</section>
		<section class="section biblioteca">
			<div class="content">
				<h2>Biblioteca</h2>
				<div class="filtros">
					<div class="control">
						<label for="categorias">
							<select name="categorias" id="categorias">
								<option value="" selected disabled>Categorías</option>
                                @if( count( $data['categorias'] ) > 0 )
                                    @foreach ( $data['categorias'] as $rsCC )
                                    <option value="categ-{{  $rsCC->id }}" >{{  $rsCC->nombre }}</option>
                                    @endforeach
                                @endif
								<!--<option value="arte">Arte</option>
								<option value="costumbres">Costumbres</option>
								<option value="historia">Historia</option>
								<option value="naturaleza">Naturaleza</option>
								<option value="religion">Religión</option>-->
							</select>
						</label>
					</div>
					<div class="control">
						<label for="coleccion">
							<select name="coleccion" id="coleccion">
								<option value="" selected disabled>Colección</option>
                                @if( count( $data['colecciones'] ) > 0 )
                                    @foreach ( $data['colecciones'] as $rsC )
                                    <option value="coleccion-{{  $rsC->id }}" >{{  $rsC->nombre }}</option>
                                    @endforeach
                                @endif
								<!--<option value="coleccion-2">Colección 2</option>
								<option value="coleccion-3">Colección 3</option>-->
							</select>
						</label>
					</div>
					<div class="control">
						<label for="publicacionDate">
							<select name="publicacionDate" id="publicacionDate">
								<option value="" selected disabled>Fecha de Publicación</option>
                                @if( count( $data['anios'] ) > 0 )
                                    @foreach ( $data['anios'] as $rsA )
                                    <option value="{{  $rsA->anio }}" >{{  $rsA->anio }}</option>
                                    @endforeach
                                @endif
								<!--<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>-->
							</select>
						</label>
					</div>
				</div>
				<div class="resultados" >
                    @if( count( $data['publicaciones'] ) > 0 )
                        @foreach ( $data['publicaciones'] as $rsP )
                            <div class="item item-resultados categ-{{ $rsP->categoria_id }} coleccion-{{ $rsP->coleccion_id }} {{ $rsP->anio }} " >
                                <a href="arte-imperial-inca/">
                                    <div class="imagen">
                                        <img src="{{ URL_MEDIA.$rsP->imagen_portada }}" alt="{{ $rsP->titulo }}" />
                                    </div>
                                    <h3>{{ $rsP->titulo }}</h3>
                                </a>
                            </div>
                        @endforeach
                    @endif

				</div>
				<!-- <div class="cta-link">
					<a href="#" id="masResultados">Ver más publicaciones</a>
				</div> -->
			</div>
		</section>
	</main>
@endsection







