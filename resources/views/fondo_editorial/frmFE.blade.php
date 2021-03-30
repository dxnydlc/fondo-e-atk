
<form action="" id="frmDocumento" autocomplete="off" >
    @csrf
    <input type="hidden" id="imagen" name="imagen" />
    
    <input type="hidden" id="uu_id" name="uu_id" />
    
    <div class=" card " >
        <div class=" card-body " >
            <h4 class="box-title">Registro de fondo editorial</h4>
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
                        <label for="titulo">Título <i class="text-danger">*</i></label> 
                        <input type="text" name="titulo" id="titulo" class="form-control" value="" maxlength="150" />
                    </div>
                    <!-- ./form-group -->
                </div>
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
                <div class=" col-lg-6 col-md-6 " >
                    <div class="form-group">
                        <label for="resumen" >Resumen</label> 
                        <textarea name="resumen" id="resumen" class=" form-control " ></textarea>
                    </div>
                    <!-- ./form-group -->
                </div>
                <div class=" col-lg-6 col-md-6 " >
                    <div class=" form-group ">
                        <label for="contenido" >Contenido</label>
                        <textarea name="contenido" id="contenido" class=" form-control " ></textarea>
                    </div>
                    <!-- ./form-group -->
                </div>
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
                <div class=" col-lg-8 col-md-8 " >
                    <legend>Hitos</legend>
                    <div class=" row " >
                        <div class=" col-lg-12 col-md-12 " >
                            <a href="#" class=" btn btn-primary float-right " id="btnAddHitos" >Agregar</a>
                            <p id="indica" >Debe guardar el documento para agregar hitos</p>
                        </div>
                    <!-- ./col -->
                    </div>
                    <!-- ./row -->
                    <hr>
                    <table class="table" id="tblHitos" style="width:100%" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Anio</th>
                                <th>Creado</th>
                                <th></th>
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
    
    