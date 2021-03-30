@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

@if (count($banners) > 0)
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Banners</h3>
              <div class="input-group-append">
                agregar
              </div>
            </div>

            <div class="card-body">
              <table id="" class="table table-bordered table-striped">

                    <!-- Table Headings -->
                    <thead>
                        <th>Orden</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td>
                                    <div>{{ $banner->orden }}</div>
                                </td>
                                <td>
                                    <div>{{ $banner->titulo }}</div>
                                </td>
                                <td>
                                    <div>
                                        <a href={{route('banners.edit', $banner )}}><i class="fa fa-fw fa-edit"></i></a>
                                    </div>
                                    <div>
                                        <a href={{route('banners.edit', $banner )}}><i class="fa fa-fw fa-trash"></i></a>
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
