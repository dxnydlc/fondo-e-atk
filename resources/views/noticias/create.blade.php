@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Nueva Noticia</h3>
    </div>
    <div class="card-body">
      <form action="{{route('noticias.store')}}" method="POST">
           @csrf
           <div class="row">
               <div class="col-lg-5">
                 <div class="form-group">
                   <label>Título</label>
                   <input type="text" class="form-control" placeholder="Título de la Noticia">
                 </div>
                 <div class="form-group">
                   <label>Bajada</label>
                   <textarea class="textarea ckeditor"></textarea>
                   <input type="text" class="form-control" placeholder="Agregar bajada">
                 </div>
                 <div class="form-group pad">
                   <label>Cuerpo de la nota</label>
                   <div class="mb-3">
                     <textarea class="textarea ckeditor"></textarea>
                  </div>
                 </div>
                 <div class="form-group">
                   <label>Keywords</label>
                   <input type="text" class="form-control" placeholder="">
                 </div>
               </div>
               <div class="col-lg-5">
                 <div class="form-group">
                   <label>Fecha de Publicación</label>
                   <input type="date" class="form-control">
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
