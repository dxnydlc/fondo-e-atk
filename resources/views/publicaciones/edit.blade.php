@include('layouts.frontend.partial.header')
<br>
<br>
<br>
<h1>Editar Publicaciones</h1>

<form action="{{route('publicaciones.update', $publicacion )}}" method="POST">

     @csrf

     @method('put')

     <label>
          Titulo:
          <br>
     <input type="text" name="titulo" value="{{ $publicacion->titulo }}">
     </label>
<br>
     <label>
          slug:
          <br>
          <input type="text" name="slug" value="{{ $publicacion->slug }}">
     </label>
<br>
     <label>
          Resumen:
          <br>
          <textarea name="resumen" rows="10">{{ $publicacion->resumen }}</textarea>
     </label>
<br>
     <label>
          Año:
          <br>
          <input type="number" name="anio" value="{{ $publicacion->anio }}">
     </label>
     <br>
     <button type="submit">Actualizar Formulario</button>
</form>

@include('layouts.frontend.partial.footer')