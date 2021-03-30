@include('layouts.frontend.partial.header')

<main>
    <section class="section publicaciones-destacadas">
        <div class="content">
            <h2>Publicaciones</h2>
            <div class="slider-publicaciones">
                {{-- validacion para destacados --}}
                <h3>Destacados</h3>
                <div class="slider multiple-items">
                    @foreach ($publicaciones as $publicacion)
                        <div class="item">
                            <a href="{{route('publicacion.show', $publicacion->slug)}}">
                                <div class="imagen">
                                    <img src="{{asset('assets/frontend/images/'.$publicacion->imagen_portada)}}" alt="{{ $publicacion->titulo }}">
                                </div>
                                <h3>{{ $publicacion->titulo }}</h3>
                            </a>
                        </div>
                    @endforeach
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
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select> 
                    </label>
                </div>
                <div class="control">
                    <label for="coleccion">
                        {{-- llamar de bbdd --}}
                        <select name="coleccion" id="coleccion">
                            <option value="" selected disabled>Colección</option>
                            @foreach ($colecciones as $coleccion)
                                <option value="{{ $coleccion->id }}">{{ $coleccion->nombre }}</option>
                            @endforeach
                            
                        </select>
                    </label>
                </div>
                <div class="control">
                    <label for="publicacionDate">
                        {{-- llamar de bbdd solo años de pub activas --}}
                        <select name="publicacionDate" id="publicacionDate">
                            <option value="" selected disabled>Fecha de Publicación</option>
                            @foreach ($anios as $anio)
                                <option value="{{ $anio}}">{{ $anio->anio }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>
            <div class="resultados">
                @foreach ($publicaciones as $publicacion)
                    <div class="item">
                        <a href="{{route('publicacion.show', $publicacion->id)}}">
                            <div class="imagen">
                                <img src="{{asset('assets/frontend/images/'.$publicacion->imagen_portada)}}" alt="{{ $publicacion->titulo }}">
                            </div>
                            <h3>{{ $publicacion->titulo }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- <div class="cta-link">
                 <a href="#" id="masResultados">Ver más publicaciones</a>
            </div> -->
        </div>
    </section>
</main>

@include('layouts.frontend.partial.footer')
