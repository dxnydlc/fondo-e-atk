@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

@if (count($publicaciones) > 0)
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Publicaciones</h3>
              <div class="input-group-append">
                agregar
              </div>
            </div>

            <div class="card-body">
              <table id="" class="table table-bordered table-striped">

                    <!-- Table Headings -->
                    <thead>
                        <th>Orden</th>
                        <th>Título</th>
                        <th>Acciones</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($publicaciones as $publicacion)
                            <tr>
                                <td>
                                    <div>{{ $publicacion->orden }}</div>
                                </td>
                                <td>
                                    <div>{{ $publicacion->titulo }}</div>
                                </td>
                                <td>
                                    <div>
                                        <a href={{route('publicaciones.edit', $publicacion )}}><i class="fa fa-fw fa-edit"></i></a>
                                    </div>
                                    <div>
                                        <a href={{route('publicaciones.edit', $publicacion )}}><i class="fa fa-fw fa-trash"></i></a>
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
