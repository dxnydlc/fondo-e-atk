
<form action="" id="frmDocumento" autocomplete="off" >
    @csrf
    <input type="hidden" id="imagen_portada" name="imagen_portada" />
    <input type="hidden" id="imagen_detalle" name="imagen_detalle" />
    <input type="hidden" id="uu_id" name="uu_id" />
    
    <div class=" card " >
        <div class=" card-body " >
            <h4 class="box-title">Registro de banner</h4>
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
                        <label for="titular">Titular <i class="text-danger">*</i></label> 
                        <input type="text" name="titular" id="titular" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <div class=" col-lg-4 col-md-4 " >
                    <div class="form-group">
                        <label for="publicacion" >publicacion</label> 
                        <input type="date" name="publicacion" id="publicacion" class="form-control" value="{{ FECHA_MYSQL }}">
                    </div>
                    <!-- ./form-group -->
                    <!-- ./form-group -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="destacado" name="destacado" value="1" >
                        <label class="form-check-label" for="destacado">Destacado</label>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-4 " >
                    <div class=" form-group ">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria" class="form-control" ></select>
                    </div>
                    <!-- ./form-group -->
                </div>
            </div>
            <!-- ./row -->
            <div class=" row " >
                <div class=" col-lg-6 col-md-6 " >
                    <div class=" form-group ">
                        <label for="bajada">Bajada</label>
                        <textarea name="bajada" id="bajada" class=" form-control " ></textarea>
                    </div>
                    
                </div>
                <!-- ./col -->
                <div class=" col-lg-6 col-md-6 " >
                    <div class=" form-group ">
                        <label for="contenido">Contenido</label>
                        <textarea name="contenido" id="contenido" class=" form-control " ></textarea>
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->

                

            <div class=" row " >
                <div class=" col-lg-4 col-md-4 " >
                    <div class="form-group">
                        <label for="seo_keywords" >SEO KeyWord</label> 
                        <input type="text" name="seo_keywords" id="seo_keywords" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
                <div class=" col-lg-4 col-md-4 " >
                    <div class="form-group">
                        <label for="seo_titulo" >SEO título</label> 
                        <input type="text" name="seo_titulo" id="seo_titulo" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
                <div class=" col-lg-4 col-md-4 " >
                    <div class="form-group">
                        <label for="seo_descripcion" >SEO descripcion</label> 
                        <input type="text" name="seo_descripcion" id="seo_descripcion" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->



            <div class=" row " >
                <div class=" col-lg-4 col-md-4 " >
                    <div class=" form-group ">
                        <label for="#" >Portada</label>
                        <div id="showoldupload" ></div>
                        <img src="" alt="" class="img-thumbnail img-fluid " id="img01" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
                <div class=" col-lg-4 col-md-4 " >
                    <div class=" form-group ">
                        <label for="#" >Detalle</label>
                        <div id="showoldupload2" ></div>
                        <img src="" alt="" class="img-thumbnail img-fluid " id="img02" />
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
                <div class=" col-lg-4 col-md-4 " >
                    <div class=" form-group ">
                        <label for="Cliente">Estado</label>
                        <select name="activo" id="activo" class="form-control" >
                            <option value="1">Activo</option>
                            <option value="0">Anulado</option>
                        </select>
                    </div>
                    <!-- ./form-group -->
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->
        </div>
    </div>
    
    
</form>
    
    