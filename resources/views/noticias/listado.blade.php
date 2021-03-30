@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

@if (count($noticias) > 0)
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Noticias</h3>
              <div class="input-group-append">
                <button class="btn btn-navbar">
                  Agregar
                </button>
              </div>
            </div>

            <div class="card-body">
              <table id="" class="table table-bordered table-striped">

                    <!-- Table Headings -->
                    <thead>
                        <th>Fecha de Publicación</th>
                        <th>Título</th>
                        <th>Keywords</th>
                        <th>Acciones</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($noticias as $noticia)
                            <tr>
                                <td>
                                    <div>{{ $noticia->publicacion }}</div>
                                </td>
                                <td>
                                    <div>{{ $noticia->titular }}</div>
                                </td>
                                <td>
                                  <div>{{ $noticia->keywords }}</div>
                                </td>
                                <td>
                                    <div>
                                        <a href={{route('noticias.edit', $noticia )}}><i class="fa fa-fw fa-edit"></i></a>
                                    </div>
                                    <div>
                                        <a href={{route('noticias.edit', $noticia )}}><i class="fa fa-fw fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@stop
