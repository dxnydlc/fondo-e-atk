@include('layouts.frontend.partial.header')

@section('title','Noticias')

<main>
     <section class="section noticias">
          <div class="content">
               <h2>Noticias</h2>

               <div class="nota nota-destacada">
                    @foreach ($notas as $nota)
                    <div class="imagen">
                         <a href="{{route('noticias.show', $nota->slug)}}">
                              <img src="{{asset('assets/frontend/images/'.$nota->imagen_portada)}}" alt="{{ $nota->titular }}">
                         </a>
                    </div>
                    <div class="cuerpo">
                         <span class="fecha-publicacion">{{ $nota->publicacion }}</span>
                         <h3>{{ $nota->titular ?? null}}</h3>
                         <p>{{ $nota->bajada ?? null}}</p>
                         <div class="cta-btn">
                              <a href="{{route('noticias.show', $nota->slug)}}">Leer más</a>
                         </div>
                    </div>
                    @endforeach
               </div>


               @foreach ($noticias as $noticia)
               <div class="nota item-noticia">
                    <a href="{{route('noticias.show', $noticia->slug)}}">
                         <div class="imagen">
                              <img src="{{asset('assets/frontend/images/'.$noticia->imagen_portada)}}" alt="{{ $noticia->titular }}">
                         </div>
                         <div class="cuerpo">
                              <span class="fecha-publicacion">{{ $noticia->publicacion }}</span>
                              <h3>{{ $noticia->titular }}</h3>
                              <p>{{ $noticia->bajada ?? null }}</p>
                         </div>
                    </a>
               </div>
               @endforeach



               <div class="cta-link">
                    <a href="{{ route('noticia.index') }}" id="masNoticias">Ver más noticias</a>
               </div>
          </div>
     </section>
</main>

@include('layouts.frontend.partial.footer')
