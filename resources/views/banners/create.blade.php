@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Nuevo Banner</h3>
    </div>
    <div class="card-body">
      <form action="{{route('noticias.store')}}" method="POST">
           @csrf
           <div class="row">
               <div class="col-lg-5">
                 <div class="form-group">
                   <label>Nombre</label>
                   <input type="text" class="form-control" placeholder="Nombre descriptivo">
                 </div>
                 <div class="form-group">
                   <label>Título</label>
                   <input type="text" class="form-control" placeholder="Título del Banner">
                 </div>
                 <div class="form-group">
                   <label>Subtítulo</label>
                   <input type="text" class="form-control" placeholder="Subtítulo del Banner">
                 </div>
                 <div class="form-group">
                   <label>Botón</label>
                   <input type="text" class="form-control" placeholder="Texto del botón">
                   </br>
                   <input type="text" class="form-control" placeholder="Link del botón">
                 </div>
                 <div class="form-group">
                   <label>Orden</label>
                   <input type="num" class="form-control">
                 </div>
                 <div class="row form-group">
                   <div class="icheck-primary d-inline col-lg-4">
                     <input type="checkbox" id="active">
                     <label for="active">
                       Activo
                     </label>
                   </div>
                   <div class="icheck-primary d-inline col-lg-4">
                     <input type="checkbox" id="newPage">
                     <label for="newPage">
                       Nueva Página
                     </label>
                   </div>
                </div>
               </div>
               <div class="col-lg-5">
                  <div class="form-group">
                    <label for="exampleInputFile">Banner Desktop</label>
                    <input type="file" id="bannerDesktop">
                    <p class="help-block">Medidas recomendadas 1x1</p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Banner Mobile</label>
                    <input type="file" id="bannerMobile">
                    <p class="help-block">Medidas recomendadas 1x1</p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Publicación</label>
                    <input type="file" id="imagePublication">
                    <p class="help-block">Medidas recomendadas 1x1</p>
                  </div>
               </div>
           </div>

           <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
</div>

@stop
