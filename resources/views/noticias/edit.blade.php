@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Editar Noticia</h3>
    </div>
    <div class="card-body">
      <form action="{{route('noticias.update', $noticia )}}" method="POST">
           @csrf
           @method('put')
           <div class="row">
               <div class="col-lg-5">
                 <div class="form-group">
                   <label>Título</label>
                   <input type="text" class="form-control" value="{{ $noticia->titular }}">
                   <span>Slug: {{ $noticia->slug }}</span>
                 </div>
                 <div class="form-group">
                   <label>Bajada</label>
                   <div class="mb-3">
                     <textarea class="textarea ckeditor" value="{{ $noticia->bajada }}"></textarea>
                   </div>
                 </div>
                 <div class="form-group pad">
                   <label>Cuerpo de la nota</label>
                   <div class="mb-3">
                     <textarea class="textarea ckeditor" value="{{ $noticia->contenido }}"></textarea>
                   </div>
                 </div>
                 <div class="form-group">
                   <label>Keywords</label>
                   <input type="text" class="form-control" value="{{ $noticia->seo_keywords }}">
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
                    <label for="exampleInputFile">Imagen Portada</label>
                    <input type="file" id="imagenPortada">
                    <p class="help-block">Medidas recomendadas 1x1</p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Imagen Detalle</label>
                    <input type="file" id="imagenDetalle">
                    <p class="help-block">Medidas recomendadas 1x1</p>
                  </div>
               </div>
           </div>

           <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
</div>

@stop
