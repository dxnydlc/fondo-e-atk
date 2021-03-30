

<form action="" id="frmDocumento" autocomplete="off" >
@csrf
<input type="hidden" id="imagen_desktop" name="imagen_desktop" />
<input type="hidden" id="imagen_movil" name="imagen_movil" />
<input type="hidden" id="imagen_publicacion" name="imagen_publicacion" />
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
					<label for="nombre">Nombre <i class="text-danger">*</i></label> 
					<input type="text" name="nombre" id="nombre" class="form-control" value="" maxlength="150" />
				</div>
				<!-- ./form-group -->
			</div>
			<div class=" col-lg-4 col-md-4 " >
				<div class="form-group">
					<label for="titulo" >Título <i class="text-danger">*</i></label> 
					<input type="text" name="titulo" id="titulo" class="form-control" value="" maxlength="150" />
				</div>
				<!-- ./form-group -->
			</div>
			<div class=" col-lg-4 col-md-4 " >
				<div class="form-group">
					<label for="subtitulo" >Sub-Título <i class="text-danger">*</i></label> 
					<input type="text" name="subtitulo" id="subtitulo" class="form-control" value="" maxlength="150" />
				</div>
				<!-- ./form-group -->
			</div>
		</div>
		<!-- ./row -->
		<div class=" row " >
			<div class=" col-lg-2 col-md-2 " >
				<div class="form-group">
					<label for="orden" >Orden <i class="text-danger">*</i></label> 
					<input type="number" name="orden" id="orden" class="form-control" value="" />
				</div>
				<!-- ./form-group -->
			</div>
			<!-- ./col -->
			<div class=" col-lg-2 col-md-2 " >
				<div class=" form-group ">
					<label for="activo">Estado</label>
					<select id="activo" name="activo" class="form-control" >
						<option value="1">Activo</option>
						<option value="0">Anulado</option>
					</select>
				</div>
				<!-- ./form-group -->
			</div>
			<!-- ./col -->
		</div>
		<!-- ./row -->
		<div class=" row " >
			<div class=" col-lg-5 col-md-5 " >
				<div class="form-group">
					<label for="texto_boton" >Texto del boton <i class="text-danger">*</i></label> 
					<input type="text" name="texto_boton" id="texto_boton" class="form-control" value="" maxlength="150" />
				</div>
				<!-- ./form-group -->
			</div>
			<!-- ./col -->
			<div class=" col-lg-5 col-md-5 " >
				<div class="form-group">
					<label for="enlace" >Enlace <i class="text-danger">*</i></label> 
					<input type="text" name="enlace" id="enlace" class="form-control" value="" maxlength="150" />
				</div>
				<!-- ./form-group -->
			</div>
			<!-- ./col -->
			<div class=" col-lg-2 col-md-2 " >
				<div class=" form-group ">
					<label for="nueva_ventana" >Nueva ventana</label>
					<select id="nueva_ventana" name="nueva_ventana" class="form-control" >
						<option value="0" >No</option>
						<option value="1" >Si</option>	
					</select>
				</div>
				<!-- ./form-group -->
			</div>
			<!-- ./col -->
		</div>
		<!-- ./row -->
		<div class=" row " >
			<div class=" col-lg-4 col-md-4 " >
				<div class=" form-group ">
					<label for="#" >Desktop</label>
					<div id="showoldupload" ></div>
					<img src="" alt="" class="img-thumbnail img-fluid " id="img01" />
				</div>
				<!-- ./form-group -->
			</div>
			<!-- ./col -->
			<div class=" col-lg-4 col-md-4 " >
				<div class=" form-group ">
					<label for="#" >Movil</label>
					<div id="showoldupload2" ></div>
					<img src="" alt="" class="img-thumbnail img-fluid " id="img02" />
				</div>
				<!-- ./form-group -->
			</div>
			<!-- ./col -->
			<div class=" col-lg-4 col-md-4 " >
				<div class=" form-group ">
					<label for="#" >Publicación</label>
					<div id="showoldupload3" ></div>
					<img src="" alt="" class="img-thumbnail img-fluid " id="img03" />
				</div>
				<!-- ./form-group -->
			</div>
			<!-- ./col -->
		</div>
		<!-- ./row -->
	</div>
</div>


</form>

