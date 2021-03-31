<form action="" id="frmDocumento" autocomplete="off" >
    @csrf
    <input type="hidden" id="uu_id" name="uu_id" />
    <input type="hidden" id="archivo_issuu" name="archivo_issuu" />
    <input type="hidden" id="imagen_portada" name="imagen_portada" />
    <input type="hidden" id="imagen_detalle" name="imagen_detalle" />

    <input type="hidden" id="presentacion_imagen" name="presentacion_imagen" />
    <input type="hidden" id="coleccion_id" name="coleccion_id" value="0" />

    <input type="hidden" id="preambulo_imagen_fondo" name="preambulo_imagen_fondo" />



    <div class=" card " >
        <div class=" card-body " >
            <h4 class="box-title">Nueva Publicación</h4>
            <hr>
            <div class=" row " >
                <div class="col-lg-2 col-md-2 " >
                    <div class="form-group">
                        <label for="id" >Id</label>
                        <input type="number" name="id" id="id" class="form-control" value="" readonly />
                    </div>
                    <!-- ./form-group -->
                </div>
                <div class=" col-lg-5 col-md-5 " >
                </div>
                <div class="col-lg-3 col-md-3"></div>
                <div class=" col-lg-2 col-md-2 " >
                    <a id="btnGuardar" href="#" class=" btn btn-success float-right " ><i class="fa fa-saved"></i> Guardar</a>
                </div>
            </div>
            <!-- ./row -->
            <div class=" row " >
                <div class=" col-lg-4 col-md-4 " >
                    <div class="form-group">
                        <label for="titulo" >Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
                <div class=" col-lg-4 col-md-4 " >
                    <div class="form-group">
                        <label for="sub_titulo" >Sub Título</label>
                        <input type="text" name="sub_titulo" id="sub_titulo" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
                <div class=" col-lg-4 col-md-4 " >
                  <div class="row row-estados">
                    <label for="activo" >Estados</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" >
                        <label class="form-check-label" for="activo">Activo</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="destacado" name="destacado" value="1" >
                        <label class="form-check-label" for="destacado">Destacado</label>
                    </div>
                  </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->

                <!-- ./col -->
            </div>
            <!-- ./row -->
            <div class=" row " >
                <div class=" col-lg-8 col-md-8 " >
                    <div class=" form-group ">
                        <label for="resumen">Resumen</label>
                        <textarea rows="6" name="resumen" id="resumen" class=" form-control " ></textarea>
                    </div>
                    <!-- ./form-group -->
                    <div class=" row " >
                        <div class=" col-lg-6 col-md-6 " >
                            <div class=" form-group ">
                                <label for="#" >Portada publicación (vertical)</label>
                                <div id="showoldupload" ></div>
                                <img src="" alt="" class="img-thumbnail img-fluid " id="img01" />
                            </div>
                            <!-- ./form-group -->
                        </div>
                        <!-- ./col -->
                        <div class=" col-lg-6 col-md-6 " >
                            <div class=" form-group ">
                                <label for="#" >Banner Publicación (horizontal)</label>
                                <div id="showoldupload2" ></div>
                                <img src="" alt="" class="img-thumbnail img-fluid " id="img02" />
                            </div>
                            <!-- ./form-group -->
                        </div>
                        <!-- ./col -->
                    </div>
                </div>
                <!-- ./col -->
                <div class=" col-lg-4 col-md-4 " >
                    <div class=" col-lg-6 col-md-6 " >
                      <div class="form-group">
                          <label for="anio" >Año</label>
                          <input type="number" name="anio" id="anio" class="form-control" value="{{ ANIO }}" />
                      </div>
                      <!-- ./form-group -->
                    </div>
                    <div class=" row " >
                        <div class=" col-lg-6 col-md-6" >
                            <div class=" form-group ">
                                <label for="categoria_id">Categoría</label>
                                <select name="categoria_id" id="categoria_id" class="form-control" ></select>
                            </div>
                            <!-- ./form-group -->
                        </div>
                        <!-- ./col -->
                        <div class=" col-lg-6 col-md-6" >
                            <div class=" form-group ">
                                <label for="coleccion_id" >Colección</label>
                                <select name="coleccion_id" id="coleccion_id" class="form-control" ></select>
                            </div>
                            <!-- ./form-group -->
                        </div>
                        <!-- ./col -->
                    </div>

                    <div class="form-group">
                        <label for="seo_keywords">Keywords</label>
                        <input type="text" name="seo_keywords" id="seo_keywords" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                    <div class="form-group">
                        <label for="seo_descripcion">SEO Descripcion</label>
                        <input type="text" name="seo_descripcion" id="seo_descripcion" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                    <!-- ./row -->
                </div>

                <div class="col-lg-12 col-md-12">
                    <h4>Paleta de Colores</h4>
                    <div class=" row " >
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Color 1</label>
                            <!-- <label>Base</label> -->
                            <div class="input-group my-colorpicker1" >
                                <input type="text" class="form-control" id="color_base" name="color_base" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Color 2</label>
                            <!--<label>Título base</label>-->
                            <div class="input-group my-colorpicker3" >
                                <input type="text" class="form-control" id="color_titulo_base" name="color_titulo_base" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Color 3</label>
                            <!--<label>Img. título base</label>-->
                            <div class="input-group my-colorpicker5" >
                                <input type="text" class="form-control" id="color_imagen_titulo_base" name="color_imagen_titulo_base" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Color 4</label>
                            <!--<label>Sub-título base</label>-->
                            <div class="input-group my-colorpicker7" >
                                <input type="text" class="form-control" id="color_subtitulo_base" name="color_subtitulo_base" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-groupcol-lg-2 col-md-2" style="display:none;" >
                            <label>Texto base</label>
                            <div class="input-group my-colorpicker9" >
                                <input type="text" class="form-control" id="color_texto_base" name="color_texto_base" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group col-lg-2 col-md-2" style="display:none;" >
                            <label>Icono quote</label>
                            <div class="input-group my-colorpicker11" >
                                <input type="text" class="form-control" id="color_icono_quote" name="color_icono_quote" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    <!-- ############################## ./ROW ############################## -->
                    </div>
                    <div class=" row " style="display:none;" >
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Alterno</label>
                            <div class="input-group my-colorpicker2" >
                                <input type="text" class="form-control" id="color_alterno" name="color_alterno" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Título alterno</label>
                            <div class="input-group my-colorpicker4" >
                                <input type="text" class="form-control" id="color_titulo_alterno" name="color_titulo_alterno" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Img. Título alterno</label>
                            <div class="input-group my-colorpicker6" >
                                <input type="text" class="form-control" id="color_imagen_titulo_alterno" name="color_imagen_titulo_alterno" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Sub-título alterno</label>
                            <div class="input-group my-colorpicker8" >
                                <input type="text" class="form-control" id="color_subtitulo_alterno" name="color_subtitulo_alterno" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Texto alterno</label>
                            <div class="input-group my-colorpicker10" >
                                <input type="text" class="form-control" id="color_text_alterno" name="color_text_alterno" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Hover galeria</label>
                            <div class="input-group my-colorpicker12" >
                                <input type="text" class="form-control" id="color_hover_galeria" name="color_hover_galeria" >
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                    <!-- ############################## ./ROW ############################## -->
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->



            <hr>
            <h4>Detalle de publicación</h4>
            <div class=" row " >
                <div class=" col-lg-8 col-md-8 " >
                    <div class="form-group">
                        <label for="dedicatoria">Dedicatoria</label>
                        <small class="text-muted" >Un un salto de línea simple por cada párrafo</small>
                        <textarea rows="6" name="dedicatoria" id="dedicatoria" class=" form-control " ></textarea>
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="issuu_embed">ISSU</label>
                        <input type="text" name="issuu_embed" id="issuu_embed" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                    <div class="form-group">
                        <label for="Cliente">Archivo PDF</label>
                        <a href="#" target="_blank" id="filePDF" ></a>
                    </div>
                    <!-- ./form-group -->
                    <div class=" form-group ">
                        <div id="showoldupload7" ></div>
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->


            <hr>
            <h4>Presentación</h4>
            <div class=" row " >
                <div class=" col-lg-8 col-md-8 " >
                    
                    <div class="form-group">
                        <label for="presentacion_quote" >Quote</label>
                        <textarea rows="6" name="presentacion_quote" id="presentacion_quote" class=" form-control " ></textarea>
                    </div>
                    <!-- ./form-group -->
                    <div class="form-group">
                        <label for="presentacion_detalle" >Detalle</label>
                        <textarea rows="6" name="presentacion_detalle" id="presentacion_detalle" class=" form-control " ></textarea>
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
                <div class=" col-lg-4 col-md-4 " >
                    <div class=" form-group ">
                        <label for="#" >Imagen relacionada</label>
                        <div id="showoldupload3" ></div>
                        <img src="" alt="" class="img-thumbnail img-fluid " id="img03" />
                    </div>
                    <!-- ./form-group -->
                    <div class="form-group">
                        <label for="presentacion_titulo">Título presentación</label> 
                        <input type="text" name="presentacion_titulo" id="presentacion_titulo" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                    <div class="form-group">
                        <label for="presentacion_sub_titulo">Sub título presentación</label> 
                        <input type="text" name="presentacion_sub_titulo" id="presentacion_sub_titulo" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->



            <hr>
            <div class=" row " >
                <div class=" col-lg-3 col-md-3 " >
                  <h4>Galería general</h4>
                </div>
                <div class=" col-lg-6 col-md-6" ></div>
                <!-- ./col -->
                <div class=" col-lg-3 col-md-3 align-rigth" >
                    <a href="#" class=" btn btn-primary pull-right " id="btnAddGaleriaG" >Agregar Imagen</a>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->
            <hr>
            <div class=" row " >
                <div class=" col-lg-12 col-md-12 " >
                    <table class="table table-striped " id="tblGaleriaGeneral" style="width:100%" >
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->





            <hr>
            <div class=" row " >
                <div class=" col-lg-3 col-md-3 " >
                  <h4>Galería presentación</h4>
                </div>
                <div class=" col-lg-6 col-md-6" ></div>
                <!-- ./col -->
                <div class=" col-lg-3 col-md-3 align-rigth" >
                    <a href="#" class=" btn btn-primary pull-right " id="btnAddGaleria" >Agregar Imagen</a>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->
            <hr>
            <div class=" row " >
                <div class=" col-lg-12 col-md-12 " >
                    <table class="table table-striped " id="tblGaleria" style="width:100%" >
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->




            <hr>
            <h4>Preambulo</h4>
            <div class=" row " >
                <div class=" col-lg-8 col-md-8 " >
                    <div class="form-group">
                        <label for="preambulo_detalle" >Texto</label>
                        <textarea rows="6" name="preambulo_detalle" id="preambulo_detalle" class=" form-control " ></textarea>
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
                <div class=" col-lg-4 col-md-4 " >
                    <div class=" form-group ">
                        <label for="#" >Imagen preambulo</label>
                        <div id="showoldupload8" ></div>
                        <img src="" alt="" class="img-thumbnail img-fluid " id="img08" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
                <!-- preambulo_imagen_fondo -->


            </div>
            <!-- ./row -->


            <hr>
            <h4>Capítulo</h4>

            <div class=" row " >
                <div class=" col-lg-8 col-md-8 " >
                    <div class="form-group">
                        <label for="capitulo_titulo" >Título</label>
                        <input type="text" name="capitulo_titulo" id="capitulo_titulo" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->


            </div>
            <!-- ./row -->

            <div class=" row " >
                <div class=" col-lg-8 col-md-8 " >
                    <div class=" form-group ">
                        <label for="capitulo_descripcion">Detalle</label>
                        <textarea rows="6" name="capitulo_descripcion" id="capitulo_descripcion" class=" form-control " ></textarea>
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->

            <div class=" row " >
                <div class=" col-lg-8 col-md-8 " >
                    <div class=" form-group ">
                        <label for="capitulo_cita">Cita</label>
                        <textarea rows="6" name="capitulo_cita" id="capitulo_cita" class=" form-control " ></textarea>
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->




            <hr>
            <div class=" row " >
                <div class=" col-lg-3 col-md-3 " >
                  <h4>Galería capítulo</h4>
                </div>
                <div class=" col-lg-6 col-md-6" ></div>
                <!-- ./col -->
                <div class=" col-lg-3 col-md-3 align-rigth" >
                    <a href="#" class=" btn btn-primary pull-right " id="btnAddGaleriaC" >Agregar Imagen</a>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->
            <hr>
            <div class=" row " >
                <div class=" col-lg-12 col-md-12 " >
                    <table class="table table-striped " id="tblCapitulo" style="width:100%" >
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->



            <hr>
            <div class=" row " >
                <div class=" col-lg-3 col-md-3 " >
                  <h4>Autores</h4>
                </div>
                <div class=" col-lg-6 col-md-6" ></div>
                <!-- ./col -->
                <div class=" col-lg-3 col-md-3 align-rigth" >
                    <a href="#" class=" btn btn-primary pull-right " id="btnAddAuor" >Agregar Autor</a>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->
            <hr>
            <div class=" row " >
                <div class=" col-lg-12 col-md-12 " >
                    <table class="table table-striped " id="tblAutores" style="width:100%" >
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Autor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->
        </div>
    </div>
</form>
