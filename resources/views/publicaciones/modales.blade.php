
<!-- Modal  AUTORES -->
<div class="modal fade" id="mdlAutor" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="true" >
    <div class=" modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="IdAutor" />
                <div class=" row " >
                    <div class=" col-lg-7 col-md-7 " >
                        <div class=" form-group ">
                            <input type="hidden" id="txtImgAutor" >
                            <label for="#" >Publicación</label>
                            <div id="showoldupload4" ></div>
                            <img src="" alt="" class="img-thumbnail img-fluid " id="img04" />
                        </div>
                        <!-- ./form-group -->
                    </div>
                    <!-- ./col -->
                    <div class=" col-lg-5 col-md-5 " >
                        <div class=" form-group ">
                            <label for="txtAutor" >Autor</label>
                            <input type="text" id="txtAutor" class="form-control" value="" maxlength="150" />
                        </div>
                        <!-- ./form-group -->
                        <div class=" form-group ">
                            <label for="ttBioAutor" >Biografía</label>
                            <textarea id="txtBioAutor" class=" form-control " ></textarea>
                        </div>
                        <!-- ./form-group -->
                    </div>
                    <!-- ./col -->
                </div>
                <!-- ./row -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGo_Autor" >Guardar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal  GALERIA 01 -->
<div class="modal fade" id="mdlGaleria" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="true" >
    <div class=" modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar galeria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="IdGaleria" >
                <div class=" row " >
                    <div class=" col-lg-7 col-md-7 " >
                        <div class=" form-group ">
                            <input type="hidden" id="txtImagenGaleria" >
                            <label for="#" >Imagen Galeria</label>
                            <div id="showoldupload5" ></div>
                            <img src="" alt="" class="img-thumbnail img-fluid " id="img05" />
                        </div>
                        <!-- ./form-group -->
                    </div>
                    <!-- ./col -->
                    <div class=" col-lg-5 col-md-5 " >
                        <div class=" form-group ">
                            <label for="txtTitGal01" >Título</label>
                            <input type="text" name="txtTitGal01" id="txtTitGal01" class="form-control" value="" maxlength="150" />
                        </div>
                        <!-- ./form-group -->
                        <div class=" form-group ">
                            <label for="txtDescri1">Descripción</label>
                            <textarea name="txtDescri1" id="txtDescri1" class=" form-control " ></textarea>
                        </div>
                        <!-- ./form-group -->
                        <div class="form-group">
                            <label for="orden3" >Orden</label> 
                            <input type="number" name="orden3" id="orden3" class="form-control" value="" />
                        </div>
                        <!-- ./form-group -->
                    </div>
                    <!-- ./col -->
                </div>
                <!-- ./row -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGo_Galeria" >Guardar</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal  Galeria Capitulo 01 -->
<div class="modal fade" id="mdlGaleriaC" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="true" >
    <div class=" modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar galeria capítulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <input type="hidden" id="IdCapitulo" />
                <div class=" row " >
                    <div class=" col-lg-7 col-md-7 " >
                        <div class=" form-group ">
                            <input type="hidden" id="txtImagenCapitulo" />
                            <label for="#" >Imagen Galeria</label>
                            <div id="showoldupload6" ></div>
                            <img src="" alt="" class="img-thumbnail img-fluid " id="img06" />
                        </div>
                        <!-- ./form-group -->
                    </div>
                    <!-- ./col -->
                    <div class=" col-lg-5 col-md-5 " >
                        <div class=" form-group ">
                            <label for="txtTitGal02" >Título</label>
                            <input type="text" name="txtTitGal02" id="txtTitGal02" class="form-control" value="" maxlength="150" />
                        </div>
                        <!-- ./form-group -->
                        <div class=" form-group ">
                            <label for="txtDescri2">Descripción</label>
                            <textarea name="txtDescri2" id="txtDescri2" class=" form-control " ></textarea>
                        </div>
                        <!-- ./form-group -->
                        <div class="form-group">
                            <label for="orden4" >Orden</label> 
                            <input type="number" name="orden4" id="orden4" class="form-control" value="" />
                        </div>
                        <!-- ./form-group -->
                    </div>
                    <!-- ./col -->
                </div>
                <!-- ./row -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGo_Capitulo" >Guardar</button>
            </div>
        </div>
    </div>
</div>
