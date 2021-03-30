@include('layouts.frontend.partial.header')

<main>
     <section class="publicacion-detalle">
          <div class="content">
               <div class="portada">
                    <div class="imagen">
                         <img src="{{asset('assets/frontend/images/banner_01.jpg')}}" alt="titulo publicacion">
                    </div>
                    <div class="publicacion">
                         <img src="{{asset('assets/frontend/images/portada-libro.png')}}" alt="titulo publiccacion">
                    </div>
                    <div class="cta-btn">
                         <a href="#" class="visualizar">Visualizar</a>
                    </div>
               </div>
               <h2>{{ $publicacion->titulo ?? null }}</h2>
               <p>{!! $publicacion->resumen ?? null !!}</p>
               <div class="resenias">
                    <div class="slider-resenias fade">
                         <div class="item">
                              <div class="foto">
                                   <img src="{{asset('assets/frontend/images/foto-autor.png')}}">
                              </div>
                              <div class="texto">
                                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                   <p class="autor">Lorem ipsum dolor</p>
                              </div>
                         </div>
                         <div class="item">
                              <div class="texto completo">
                                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                   <p class="autor">Lorem ipsum dolor</p>
                              </div>
                         </div>
                         <div class="item">
                              <div class="foto">
                                   <img src="{{asset('assets/frontend/images/foto-autor.png')}}">
                              </div>
                              <div class="texto">
                                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                   <p class="autor">Lorem ipsum dolor</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <section class="section galeria">
          <div class="content">
               <h2>Galería</h2>
               <div class="galeria-content multiple-items">
                    <div class="item">
                         <img src="{{asset('assets/frontend/images/galeria.png')}}">
                         <div class="hover">
                              <h2>Lorem ipsum dolor</h2>
                              <p>Lorem ipsum dolor sit amet, consectturadipis cing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                         </div>
                    </div>
                    <div class="item">
                         <img src="{{asset('assets/frontend/images/galeria.png')}}">
                         <div class="hover">
                              <h2>Lorem ipsum dolor</h2>
                              <p>Lorem ipsum dolor sit amet, consectturadipis cing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                         </div>
                    </div>
                    <div class="item">
                         <img src="{{asset('assets/frontend/images/galeria.png')}}">
                         <div class="hover">
                              <h2>Lorem ipsum dolor</h2>
                              <p>Lorem ipsum dolor sit amet, consectturadipis cing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <section class="section otras-publicaciones">
          <div class="content">
               <h2>Publicaciones Relacionadas</h2>
               <div class="lista-otras multiple-items">
                    <div class="item">
                         <a href="#">
                              <div class="imagen">
                                   <img src="{{asset('assets/frontend/images/portada-libro.png')}}" alt="titulo publicacion">
                              </div>
                              <h3>La Magia del Agua en el Lago Titicaca</h3>
                         </a>
                    </div>
                    <div class="item">
                         <a href="#">
                              <div class="imagen">
                                   <img src="{{asset('assets/frontend/images/portada-libro.png')}}" alt="titulo publicacion">
                              </div>
                              <h3>La Amazonía</h3>
                         </a>
                    </div>
                    <div class="item">
                         <a href="#">
                              <div class="imagen">
                                   <img src="{{asset('assets/frontend/images/portada-libro.png')}}" alt="titulo publicacion">
                              </div>
                              <h3>Fiestas y Danzas del Perú</h3>
                         </a>
                    </div>
                    <div class="item">
                         <a href="#">
                              <div class="imagen">
                                   <img src="{{asset('assets/frontend/images/portada-libro.png')}}" alt="titulo publicacion">
                              </div>
                              <h3>La Amazonía</h3>
                         </a>
                    </div>
               </div>
          </div>
     </section>

{{-- <a href="{{ route('publicaciones.edit', $publicacion) }}">Editar Publicacion</a> --}}
</main>


@include('layouts.frontend.partial.footer')