@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Fondo Editorial</h3>
    </div>
    <div class="card-body">
      <form action="{{route('fondo-editorial.store')}}" method="POST">
           @csrf
           <div class="row">
               <div class="col-lg-5">
                 <div class="form-group">
                   <label>Título</label>
                   <input type="text" class="form-control" placeholder="Título del Bloque">
                 </div>
                 <div class="form-group">
                   <label>Bajada</label>
                   <textarea name="name"></textarea>
                 </div>
               </div>
               <div class="col-lg-5">
                 <div class="form-group">
                   <label>Botón</label>
                   <input type="text" class="form-control" placeholder="Texto del botón">
                   </br>
                   <input type="text" class="form-control" placeholder="Link del botón">
                 </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Banner Desktop</label>
                    <input type="file" id="bannerDesktop">
                    <p class="help-block">Medidas recomendadas 1x1</p>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Contenido</label>
                    <textarea name="name"></textarea>
                  </div>
                </div>
              </div>
           <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
</div>
@stop
