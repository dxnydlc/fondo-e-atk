@extends('layouts.webPrincipal')


@section('titulo')
Fondo Editorial | BCP
@endsection

@section('MetaTags')
<meta name="description" content="{{ $data['data']->seo_descripcion }}"/>
<link rel="canonical" href="https://www.fondoeditorial.com/" />

<meta property="og:locale" content="es_ES" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $data['data']->seo_titulo }}" />
<meta property="og:description" content="{{ $data['data']->seo_descripcion }}" />
<meta property="og:url" content="https://www.fondoeditorial.com/" />
<meta property="og:site_name" content="Fondo Editorial BCP" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="{{ $data['data']->seo_descripcion }}" />
<meta name="twitter:title" content="{{ $data['data']->seo_titulo }}" />
<meta name="twitter:site" content=https://www.fondoeditorial.com/"" />
<!-- <meta name="twitter:image" content="../assets/img/share.jpg" /> -->
@endsection


@section('content')
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TBMFJPT"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<header>

		<div class="content">
			<a href="{{ url('/') }}" >
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
					<<li><a class="active" href="{{ url('home') }}">Inicio</a></li>
					<li><a href="{{ url('publicaciones/') }}">Publicaciones</a></li>
					<li><a href="{{ url('fondo-editorial/') }}">Fondo Editorial</a></li>
					<li><a href="{{ url('noticias/') }}">Noticias</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<section class="section cuerpo-editorial">
			<div class="content">
				<div class="bloque bloque-uno">
					<div class="texto">
						<h2>{{ $data['data']->titulo }}</h2>
                        {!! $data['data']->contenido !!}
					</div>
					<div class="imagen-relacionada">
						<img src="{{ URL_MEDIA.$data['data']->imagen }}" alt="{{ $data['data']->titulo }}" />
					</div>
				</div>
				<!--<div class="bloque bloque-dos">
					<div class="imagen-relacionada">
						<img src="../assets/images/bloque-fondo-editorial.png" alt="Fondo Editorial BCP">
					</div>
					<div class="texto">
						<h3>Lorem ipsum dolor sit amet, consectetur</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam </p>

						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam,</p>

						<p>Quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
					</div>
				</div>-->
			</div>
		</section>
		<section class="section time-line">
			<div class="content">
				<div class="slider-dates multiple-items">

                    @if( count( $data['hitos'] ) > 0 )
                        @foreach ( $data['hitos'] as $rs )
                            <div class="item anio">
                                <!--<span class="tag-anio">En la actualidad</span>-->
                                <span class="tag-anio">{{ $rs->titulo }}</span>
                                <div class="box">
                                    <h3>{{ $rs->anio }}</h3>
                                    <p>{!! $rs->descripcion !!}</p>
                                    <img src="{{ URL_MEDIA.$rs->imagen }}" alt="{{ $rs->titulo }}" />
                                </div>
                            </div>
                        @endforeach
                    @endif

					
				</div>
			</div>
		</section>
	</main>
@endsection








