@include('layouts.frontend.partial.header')

@section('title','Fondo Editorial')

<main>
    <section class="section cuerpo-editorial">
        <div class="content">
            @foreach ($fondos as $fondo)
                <div class="bloque bloque-uno">
                    <div class="texto">
                        <h2>Fondo Editorial</h2>
                        <p>{!! $fondo->contenido !!}</p>
                    </div>
                    <div class="imagen-relacionada">
                        <img src="{{asset('assets/frontend/images/'.$fondo->imagen)}}" alt="{{ $fondo->titulo }}">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="section time-line">
        <div class="content">
            <div class="slider-dates multiple-items desktop">
                @foreach ($hilos as $hilo)
                    <div class="item anio active">
                        <!--<span class="tag-anio">En la actualidad</span>-->
                        <span class="tag-anio">{{$hilo->titulo}}</span>
                        <div class="box">
                            <h3>{{$hilo->anio}}</h3>
                            <p>{{$hilo->descripcion}}</p>
                            <img src="{{asset('assets/frontend/images/'.$hilo->imagen)}}" alt="{{$hilo->titulo}}">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</main>


@include('layouts.frontend.partial.footer')
