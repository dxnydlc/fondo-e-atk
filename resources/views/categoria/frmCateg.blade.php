

<div class=" row " >
    <div class=" col-lg-3 col-md-3 " ></div>
    <!-- ./col -->
    <div class=" col-lg-6 col-md-6 " >
        <form action="" id="frmDocumento" autocomplete="off" >
            @csrf
        
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
                        <div class=" col-lg-12 col-md-12 " >
                            <div class="form-group">
                                <label for="nombre" >Nombre <i class="text-danger">*</i></label> 
                                <input type="text" name="nombre" id="nombre" class="form-control" value="" maxlength="150" />
                            </div>
                            <!-- ./form-group -->
                        </div>
                    </div>
                    <!-- ./row -->
                </div>
            </div>
            
            
        </form>
    </div>
    <!-- ./col -->
    <div class=" col-lg-3 col-md-3 " ></div>
    <!-- ./col -->
</div>
<!-- ./row -->



