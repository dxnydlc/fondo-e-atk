@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Nueva Publicación</h3>
    </div>
    <div class="card-body">
      <form action="{{route('publicaciones.store')}}" method="POST">
           @csrf
           <!-- /.Información General -->
           <div class="row">
             <div class="col-md-12">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">Información general</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label>Título</label>
                      <input type="text" class="form-control" placeholder="Título de la Publicación">
                    </div>
                    <div class="form-group">
                      <label>Resumen</label>
                      <textarea class="textarea ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Keywords</label>
                      <input type="text" class="form-control" placeholder="Agregar keywords separadas por coma">
                    </div>
                    <div class="form-group">
                      <label>Catálogo ISSUU</label>
                      <input type="text" class="form-control" placeholder="Agregar embed">
                    </div>
                    <div class="form-group">
                      <label for="portadaPublicacion">Portada Publicación</label>
                      <input type="file" id="portadaPublicacion">
                      <p class="help-block">Medidas recomendadas 1x1</p>
                    </div>
                    <div class="form-group">
                      <label for="bannerPublicacion">Banner Publicacipon</label>
                      <input type="file" id="bannerPublicacion">
                      <p class="help-block">Medidas recomendadas 1x1</p>
                    </div>
                  </div>
                  <div class="col-lg-5">
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
                      <label>Año de Publicación</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Categoría</label>
                      <select class="" name="categoriaPublicacion">
                        <option value="">2000</option>
                        <option value="">2001</option>
                        <option value="">2002</option>
                        <option value="">2003</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Paleta de Colores</label>
                      <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="1">
                        <label>Color 1</label>
                        <input type="text" class="form-control" data-original-title="" title="" aria-describedby="popover622320">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-square"></i></span>
                        </div>
                      </div>
                      <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                        <label>Color 2</label>
                        <input type="text" class="form-control" data-original-title="" title="" aria-describedby="popover622320">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-square"></i></span>
                        </div>
                      </div>
                      <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="3">
                        <label>Color 3</label>
                        <input type="text" class="form-control" data-original-title="" title="" aria-describedby="popover622320">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-square"></i></span>
                        </div>
                      </div>
                      <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="4">
                        <label>Color 4</label>
                        <input type="text" class="form-control" data-original-title="" title="" aria-describedby="popover622320">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-square"></i></span>
                        </div>
                      </div>
                      <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="5">
                        <label>Color 5</label>
                        <input type="text" class="form-control" data-original-title="" title="" aria-describedby="popover622320">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-square"></i></span>
                        </div>
                      </div>
                      <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="6">
                        <label>Color 6</label>
                        <input type="text" class="form-control" data-original-title="" title="" aria-describedby="popover622320">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-square"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
             </div>
           </div>
           <!-- /.Dedicatoria -->
           <div class="row">
             <div class="col-md-12">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">Dedicatoria</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label>Dedicatoria</label>
                      <textarea class="textarea ckeditor"></textarea>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
             </div>
           </div>
           <!-- /.Presentación -->
           <div class="row">
             <div class="col-md-12">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">Presentación</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label>Detalle</label>
                      <textarea class="textarea ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Quote</label>
                      <textarea class="textarea ckeditor"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-5">
                    <div class="form-group">
                        <label for="exampleInputFile">Imagen Relacionada</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Cargar imagen</label>
                          </div>
                          <p class="help-block">Medidas recomendadas 1x1</p>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Galeria Presentación</h3>
                          <div class="add">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-galeria">
                              Agregar
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <div>1</div>
                                </td>
                                <td>
                                  <div>Foto 1</div>
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
                              <tr>
                                <td>
                                  <div>2</div>
                                </td>
                                <td>
                                  <div>Foto 2</div>
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
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
               </div>
             </div>
           </div>
           <!-- /.Capítulo -->
           <div class="row">
             <div class="col-md-12">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">Presentación</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label>Título</label>
                      <input type="text" class="form-control" placeholder="Título del Capítulo">
                    </div>
                    <div class="form-group">
                      <label>Detalle</label>
                      <textarea class="textarea ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Cita</label>
                      <textarea class="textarea ckeditor"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Galeria Capítulo</h3>
                          <div class="add">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-capitulo">
                              Agregar
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <div>1</div>
                                </td>
                                <td>
                                  <div>Foto 1</div>
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
                              <tr>
                                <td>
                                  <div>2</div>
                                </td>
                                <td>
                                  <div>Foto 2</div>
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
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
               </div>
             </div>
           </div>
           <!-- /.Autores -->
           <div class="row">
             <div class="col-md-12">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">Autores</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Galeria Capítulo</h3>
                          <div class="add">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-autores">
                              Agregar
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <div>1</div>
                                </td>
                                <td>
                                  <div>Foto 1</div>
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
                              <tr>
                                <td>
                                  <div>2</div>
                                </td>
                                <td>
                                  <div>Foto 2</div>
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
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
               </div>
             </div>
           </div>

           <!-- /.Modal Galería -->
           <div class="modal fade" id="modal-galeria">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <h4 class="modal-title">Agregar Imagen</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label>Título</label>
                         <input type="text" class="form-control" placeholder="Título de la Imagen">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputFile">Imagen Relacionada</label>
                           <div class="input-group">
                             <div class="custom-file">
                               <input type="file" class="custom-file-input">
                               <label class="custom-file-label">Cargar imagen</label>
                             </div>
                             <p class="help-block">Medidas recomendadas 1x1</p>
                           </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="modal-footer justify-content-between">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                   <button type="button" class="btn btn-primary">Guardar</button>
                 </div>
               </div>
               <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
           </div>

           <!-- /.Modal Capítulo -->
           <div class="modal fade" id="modal-capitulo">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <h4 class="modal-title">Agregar Imagen</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <div class="row">
                     <div class="col-lg-5">
                       <div class="form-group">
                         <label>Título</label>
                         <input type="text" class="form-control" placeholder="Título de la Imagen">
                       </div>
                       <div class="form-group">
                         <label>Descripción</label>
                         <textarea class="textarea ckeditor"></textarea>
                       </div>
                     </div>
                     <div class="col-lg-5">
                       <div class="form-group">
                           <label for="exampleInputFile">Imagen Relacionada</label>
                           <div class="input-group">
                             <div class="custom-file">
                               <input type="file" class="custom-file-input">
                               <label class="custom-file-label">Cargar imagen</label>
                             </div>
                             <p class="help-block">Medidas recomendadas 1x1</p>
                           </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="modal-footer justify-content-between">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                   <button type="button" class="btn btn-primary">Guardar</button>
                 </div>
               </div>
               <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
           </div>

           <!-- /.Modal Autores -->
           <div class="modal fade" id="modal-autores">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <h4 class="modal-title">Agregar Autor</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <div class="row">
                     <div class="col-lg-5">
                       <div class="form-group">
                         <label>Título</label>
                         <input type="text" class="form-control" placeholder="Título de la Imagen">
                       </div>
                       <div class="form-group">
                         <label>Descripción</label>
                         <textarea class="textarea ckeditor"></textarea>
                       </div>
                     </div>
                     <div class="col-lg-5">
                       <div class="form-group">
                           <label for="exampleInputFile">Foto del Autor</label>
                           <div class="input-group">
                             <div class="custom-file">
                               <input type="file" class="custom-file-input">
                               <label class="custom-file-label">Cargar imagen</label>
                             </div>
                             <p class="help-block">Medidas recomendadas 1x1</p>
                           </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="modal-footer justify-content-between">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                   <button type="button" class="btn btn-primary">Guardar</button>
                 </div>
               </div>
               <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
           </div>

           <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
</div>
@stop
