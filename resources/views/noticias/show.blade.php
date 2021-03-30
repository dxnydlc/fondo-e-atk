@include('layouts.frontend.partial.header')

<main>
     <section class="section cuerpo-nota">
          <div class="content">
               <h2>Noticias</h2>
               <a href="{{ route('noticia.index') }}" class="breadcrumb">Volver</a>

               <div class="cuerpo">
                    <div class="imagen">
                         <img src="{{asset('assets/frontend/images/'.$noticia->imagen_detalle)}}" alt="{{ $noticia->titular }}">
                    </div>
                    <span class="fecha-publicacion">{{ $noticia->publicacion }}</span>
                    <h2>{{ $noticia->titular }}</h2>
                    <p>{{ $noticia->bajada }}</p>
                    <p>
                         {!! $noticia->contenido !!}
                    </p>
               </div>
          </div>
     </section>


     <section class="section notas-relacionadas">
          <div class="content">
               <h2>Noticias Relacionadas</h2>
               @foreach ($relacionadas as $relacionada)
               <div class="nota-relacionada">
                    <a href="{{route('noticias.show', $relacionada->slug)}}">
                         <div class="imagen">
                              <img src="{{asset('assets/frontend/images/' . $relacionada->imagen_portada)}}" alt="Titulo Nota">
                         </div>
                         <div class="texto">
                              <span class="fecha-publicacion">{{$relacionada->publicacion}}</span>
                              <h2>{{ $relacionada->titular }}</h2>
                         </div>
                    </a>
               </div>
               @endforeach
     </section>

</main>


@include('layouts.frontend.partial.footer')
