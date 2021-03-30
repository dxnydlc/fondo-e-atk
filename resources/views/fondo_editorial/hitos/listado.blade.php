@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

@if (count($hitos) > 0)
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Hitos</h3>
              <div class="input-group-append">
                agregar
              </div>
            </div>

            <div class="card-body">
              <table id="" class="table table-bordered table-striped">

                    <!-- Table Headings -->
                    <thead>
                        <th>Año</th>
                        <th>Titulo</th>
                        <th>Acciones</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($hitos as $hito)
                            <tr>
                                <td>
                                    <div>{{ $hito->anio }}</div>
                                </td>
                                <td>
                                    <div>{{ $hito->titulo }}</div>
                                </td>
                                <td>
                                    <div>
                                        <a href="{{route('fondo-editorial.hitos.edit', $hito )}}"><i class="fa fa-fw fa-edit"></i></a>
                                    </div>
                                    <div>
                                        <a href={{route('fondo-editorial.hitos.edit', $hito )}}><i class="fa fa-fw fa-trash"></i></a>
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
