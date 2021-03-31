
@extends('layouts.principal')


@section('titulo')
Publicaciones
@endsection



@section('losCSS')

<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" />

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<link href="{{ asset('plugins/jquery-upload-file-master/css/uploadfile.css') }}" rel="stylesheet">

<style type="text/css">
  .ajax-upload-dragdrop{
    width:100%!important;
  }
</style>

@endsection

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Publicaciones</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item" >
            <a href="{{ url('home') }}" >Inicio</a>
          </li>
          <li class="breadcrumb-item active">Publicaciones</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<section class="content"   >

<div class=" card " >
  <div class="card-header">
    <!-- <h3 class="card-title">
      Contenido de la base de datos
    </h3> -->
    <div class="card-tools">
      <ul class="nav nav-pills ml-auto" >
        <li class="nav-item">
          <a class="nav-link active" href="#tabHome" data-toggle="tab">Ver listado</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tabDoc" data-toggle="tab">
            Agregar nueva
          </a>
        </li>
        <!-- <li>
          <a id="btnCrear" href="#" class="btn btn-default float-right " data-id="0" >
          <i class="icofont-plus"></i> Crear publicación
        </a>
        </li> -->
      </ul>
    </div>
  </div>
  <!-- /.card-header -->
  <!-- /.card-body -->
</div>
<!-- /.card -->

<div class="tab-content p-0">
  <!-- Morris chart - Sales -->
  <div class="chart tab-pane active" id="tabHome" >
    <div class=" row " >

      <!-- ./col -->
      <div class=" col-lg-12 col-md-12 " id="tablitaW" >
        <div class="card">
          <div class="card-body">
            <h4 class="box-title">Listado de Publicaciones</h4>
            <hr>
            <table class=" table table-striped table-no-bordered table-hover " id="wrapperTable" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Año</th>
                  <th>Destacado</th>
                  <th>Estado</th>
                  <th>Creado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- ./row -->
  </div>
  <!-- ################################################# -->
  <div class="chart tab-pane" id="tabDoc" ">
    <!-- Formulario -->
    @include('publicaciones.frmPubs')
    <!-- /Formulario -->
  </div>
</div>

</section>





@include('publicaciones.modales')


@endsection

@section('scripts')

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js" ></script>

<script src="https://momentjs.com/downloads/moment.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>

<script src="{{ asset('plugins/select2-4.0.6-rc.1/dist/js/select2.full.js') }}"></script>

<script src="{{ asset('plugins/jquery-upload-file-master/js/jquery.uploadfile.min.js') }}" ></script>

<script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}" ></script>




<script type="text/javascript">
/* ------------------------------------------------------------- */
var table, tblGaleria,tblCapitulo,tblAutores,tblGaleriaGeneral;
/* ------------------------------------------------------------- */
var uploadObj,uploadObj2,uploadObj3,uploadObj4,uploadObj5,uploadObj6,uploadObj7,uploadObj8,showoldupload9;
/* ------------------------------------------------------------- */
var CKEDITOR, resumen, dedicatoria, presentacion_quote, presentacion_detalle,capitulo_descripcion,capitulo_cita;
/* ------------------------------------------------------------- */
var ArAutores = [];
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
//
(function($){
	$(document).ready(function()
		{
        /* ------------------------------------------------------------- */
        getCategorias();
        getColecciones();
        /* ------------------------------------------------------------- */
        table = $('#wrapperTable').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [25, 50, 100],
                [25, 50, 100]
            ],
            "searching" : true,
            buttons: [
                {
                    extend: 'collection',
                    exportOptions: {
                        modifier: {
                        page: 'all',
                        search: 'none'
                        }
                    },
                    text: 'Exportar',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }
            ],
            language : {
                sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
            sFirst: "|<",
            sLast: ">|",
            sNext: ">",
            sPrevious: "<",
            },
            oAria: {
            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
            sSortDescending: ": Activar para ordenar la columna de manera descendente",
            }
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "initComplete": function(settings, json) {
            // Ocultamos el buscados - preloader
            $('#wrapperTable').waitMe('hide');
            },
            "drawCallback": function( settings ) {
            var api = this.api();
            // Ocultamos el buscados - preloader
            $('#wrapperTable').waitMe('hide');
            }
        });
        /* ------------------------------------------------------------- */
        $('#btnCrear').click(function (e) {
            e.preventDefault();
            $('a[href="#tabDoc"]').tab('show');
            $('#frmDocumento input[type="text"]').each(function(e){
                $(this).val('');
            });
            $('#frmDocumento input[type="hidden"]').each(function(e){
                $(this).val('');
            });
            $('#frmDocumento input[type="number"]').each(function(e){
                $(this).val('0');
            });
            $('#frmDocumento #anio').val({{ ANIO }});
            $('#frmDocumento #coleccion_id').val(1);
            // Editores
            CKEDITOR.instances.resumen.setData(``);
            CKEDITOR.instances.dedicatoria.setData(``);
            CKEDITOR.instances.presentacion_quote.setData(``);
            CKEDITOR.instances.presentacion_detalle.setData(``);
            CKEDITOR.instances.capitulo_descripcion.setData(``);
            CKEDITOR.instances.capitulo_cita.setData(``);
            $('#frmDocumento #activo').prop( "checked", false  );
            $('#frmDocumento #destacado').prop( "checked", false  );

            tblGaleria.clear();
            tblGaleria.rows.add([]).draw();
            tblCapitulo.clear();
            tblCapitulo.rows.add([]).draw();
            tblAutores.clear();
            tblAutores.rows.add([]).draw();

            renovarToken();
        });
        /* ------------------------------------------------------------- */
        getAll();
        /* ------------------------------------------------------------- */
        $(document).delegate('.delData', 'click', function(event) {
            event.preventDefault();
            var $id = $(this).data('id'), $uuid = $(this).data('uuid'), $nombre = $(this).data('nombre');
            Swal.fire({
                title: 'Confirmar',
                text: "Anular clase: "+$nombre,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, quitar'
            }).then((result) => {
                if (result.isConfirmed) {
                delDocumento( $uuid );
                }
            });
        });
        /* ------------------------------------------------------------- */
        $(document).delegate('.cerrarFrame','click',function(e){
            e.preventDefault();
            $('a[href="#tabHome"]').tab('show');
        });
        /* ------------------------------------------------------------- */
        $('#frmDocumento #btnGuardar').click(function (e) {
            e.preventDefault();
            guardar();
        });
        /* ------------------------------------------------------------- */
        $(document).delegate('.openDoc','click',function(e){
            e.preventDefault();
            $('a[href="#tabDoc"]').tab('show');
            //
            var uuid = $(this).data('uuid'),id = $(this).data('id');
            $('#frmDocumento input[type="text"]').each(function(e){
                $(this).val('');
            });
            $('#frmDocumento input[type="hidden"]').each(function(e){
                $(this).val('');
            });
            $('#frmDocumento input[type="number"]').each(function(e){
                $(this).val('0');
            });
            //
            cargarDoc( uuid );
            //
        });
        /* ------------------------------------------------------------- */
        $('#btnBuscar').click(function (e) {
            e.preventDefault();
            buscar();
        });
        /* ------------------------------------------------------------- */
        // TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
        /* ------------------------------------------------------------- */
        uploadObj = $("#showoldupload").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/publicacion/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            previewHeight   : "70px",
            previewWidth    : "70px",
            dragDropStr     : "<span><b>Arrastra tus archivos aquí :)</b></span>",
            abortStr        : "Abandonar",
            cancelStr       : "Mejor no...",
            doneStr         : "Correcto",
            multiDragErrorStr : "Por favor revisa las restricciónes de archivos.",
            allowedTypes    : 'jpg,png,jpeg',
            extErrorStr     : "Sólo archivo de imágenes ()JPG,JPEG,PNG)",
            sizeErrorStr    : "El máximo de tamaño es 20Mb:",
            uploadErrorStr  : "Error",
            uploadStr       : "Cargar",
            dynamicFormData: function()
            {
                //var data ="XYZ=1&ABCD=2";
                var data ={"XYZ":1,"ABCD":2};
                return data;
            },
            deleteCallback: function (data, pd) {
                var $datita = { '_token'  : $('meta[name="csrf-token"]').attr('content') , 'id' : data.data.id , 'uu_id' : data.data.uu_id };
                // console.log( 'Hola!!! >>>' , data , $datita );
                if( data.data != undefined ){
                    $.post( "del/archivo/post" , $datita ,
                        function (resp,textStatus, jqXHR) {
                            //Show Message
                            // alert("File Deleted");
                    });
                }
                pd.statusbar.hide(); //You choice.
            },
            afterUploadAll:function(files,data,xhr,pd)
            {
                uploadObj.reset();
                var $n = files.responses.length - 1;
                var  json = files.responses[$n];
                $('#frmDocumento #img01').attr('src',json.url);
                $('#frmDocumento #imagen_portada').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        uploadObj2 = $("#showoldupload2").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/publicacion/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            previewHeight   : "70px",
            previewWidth    : "70px",
            dragDropStr     : "<span><b>Arrastra tus archivos aquí :)</b></span>",
            abortStr        : "Abandonar",
            cancelStr       : "Mejor no...",
            doneStr         : "Correcto",
            multiDragErrorStr : "Por favor revisa las restricciónes de archivos.",
            allowedTypes    : 'jpg,png,jpeg',
            extErrorStr     : "Sólo archivo de imágenes ()JPG,JPEG,PNG)",
            sizeErrorStr    : "El máximo de tamaño es 20Mb:",
            uploadErrorStr  : "Error",
            uploadStr       : "Cargar",
            dynamicFormData: function()
            {
                //var data ="XYZ=1&ABCD=2";
                var data ={"XYZ":1,"ABCD":2};
                return data;
            },
            deleteCallback: function (data, pd) {
                var $datita = { '_token'  : $('meta[name="csrf-token"]').attr('content') , 'id' : data.data.id , 'uu_id' : data.data.uu_id };
                // console.log( 'Hola!!! >>>' , data , $datita );
                if( data.data != undefined ){
                    $.post( "del/archivo/post" , $datita ,
                        function (resp,textStatus, jqXHR) {
                            //Show Message
                            // alert("File Deleted");
                    });
                }
                pd.statusbar.hide(); //You choice.
            },
            afterUploadAll:function(files,data,xhr,pd)
            {
                uploadObj2.reset();
                var $n = files.responses.length - 1;
                var  json = files.responses[$n];
                $('#frmDocumento #img02').attr('src',json.url);
                $('#frmDocumento #imagen_detalle').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        uploadObj3 = $("#showoldupload3").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/banner/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            previewHeight   : "70px",
            previewWidth    : "70px",
            dragDropStr     : "<span><b>Arrastra tus archivos aquí :)</b></span>",
            abortStr        : "Abandonar",
            cancelStr       : "Mejor no...",
            doneStr         : "Correcto",
            multiDragErrorStr : "Por favor revisa las restricciónes de archivos.",
            allowedTypes    : 'jpg,png,jpeg',
            extErrorStr     : "Sólo archivo de imágenes ()JPG,JPEG,PNG)",
            sizeErrorStr    : "El máximo de tamaño es 20Mb:",
            uploadErrorStr  : "Error",
            uploadStr       : "Cargar",
            dynamicFormData: function()
            {
                //var data ="XYZ=1&ABCD=2";
                var data ={"XYZ":1,"ABCD":2};
                return data;
            },
            deleteCallback: function (data, pd) {
                var $datita = { '_token'  : $('meta[name="csrf-token"]').attr('content') , 'id' : data.data.id , 'uu_id' : data.data.uu_id };
                // console.log( 'Hola!!! >>>' , data , $datita );
                if( data.data != undefined ){
                    $.post( "del/archivo/post" , $datita ,
                        function (resp,textStatus, jqXHR) {
                            //Show Message
                            // alert("File Deleted");
                    });
                }
                pd.statusbar.hide(); //You choice.
            },
            afterUploadAll:function(files,data,xhr,pd)
            {
                uploadObj3.reset();
                var $n = files.responses.length - 1;
                var  json = files.responses[$n];
                $('#frmDocumento #img03').attr('src',json.url);
                $('#frmDocumento #presentacion_imagen').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        uploadObj4 = $("#showoldupload4").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/banner/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            previewHeight   : "70px",
            previewWidth    : "70px",
            dragDropStr     : "<span><b>Arrastra tus archivos aquí :)</b></span>",
            abortStr        : "Abandonar",
            cancelStr       : "Mejor no...",
            doneStr         : "Correcto",
            multiDragErrorStr : "Por favor revisa las restricciónes de archivos.",
            allowedTypes    : 'jpg,png,jpeg',
            extErrorStr     : "Sólo archivo de imágenes ()JPG,JPEG,PNG)",
            sizeErrorStr    : "El máximo de tamaño es 20Mb:",
            uploadErrorStr  : "Error",
            uploadStr       : "Cargar",
            dynamicFormData: function()
            {
                //var data ="XYZ=1&ABCD=2";
                var data ={"XYZ":1,"ABCD":2};
                return data;
            },
            deleteCallback: function (data, pd) {
                var $datita = { '_token'  : $('meta[name="csrf-token"]').attr('content') , 'id' : data.data.id , 'uu_id' : data.data.uu_id };
                // console.log( 'Hola!!! >>>' , data , $datita );
                if( data.data != undefined ){
                    $.post( "del/archivo/post" , $datita ,
                        function (resp,textStatus, jqXHR) {
                            //Show Message
                            // alert("File Deleted");
                    });
                }
                pd.statusbar.hide(); //You choice.
            },
            afterUploadAll:function(files,data,xhr,pd)
            {
                uploadObj4.reset();
                var $n = files.responses.length - 1;
                var  json = files.responses[$n];
                $('#img04').attr('src',json.url);
                $('#txtImgAutor').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        uploadObj5 = $("#showoldupload5").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/banner/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            previewHeight   : "70px",
            previewWidth    : "70px",
            dragDropStr     : "<span><b>Arrastra tus archivos aquí :)</b></span>",
            abortStr        : "Abandonar",
            cancelStr       : "Mejor no...",
            doneStr         : "Correcto",
            multiDragErrorStr : "Por favor revisa las restricciónes de archivos.",
            allowedTypes    : 'jpg,png,jpeg',
            extErrorStr     : "Sólo archivo de imágenes ()JPG,JPEG,PNG)",
            sizeErrorStr    : "El máximo de tamaño es 20Mb:",
            uploadErrorStr  : "Error",
            uploadStr       : "Cargar",
            dynamicFormData: function()
            {
                //var data ="XYZ=1&ABCD=2";
                var data ={"XYZ":1,"ABCD":2};
                return data;
            },
            deleteCallback: function (data, pd) {
                var $datita = { '_token'  : $('meta[name="csrf-token"]').attr('content') , 'id' : data.data.id , 'uu_id' : data.data.uu_id };
                // console.log( 'Hola!!! >>>' , data , $datita );
                if( data.data != undefined ){
                    $.post( "del/archivo/post" , $datita ,
                        function (resp,textStatus, jqXHR) {
                            //Show Message
                            // alert("File Deleted");
                    });
                }
                pd.statusbar.hide(); //You choice.
            },
            afterUploadAll:function(files,data,xhr,pd)
            {
                uploadObj5.reset();
                var $n = files.responses.length - 1;
                var  json = files.responses[$n];
                $('#img05').attr('src',json.url);
                $('#txtImagenGaleria').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        uploadObj6 = $("#showoldupload6").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/banner/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            previewHeight   : "70px",
            previewWidth    : "70px",
            dragDropStr     : "<span><b>Arrastra tus archivos aquí :)</b></span>",
            abortStr        : "Abandonar",
            cancelStr       : "Mejor no...",
            doneStr         : "Correcto",
            multiDragErrorStr : "Por favor revisa las restricciónes de archivos.",
            allowedTypes    : 'jpg,png,jpeg',
            extErrorStr     : "Sólo archivo de imágenes ()JPG,JPEG,PNG)",
            sizeErrorStr    : "El máximo de tamaño es 20Mb:",
            uploadErrorStr  : "Error",
            uploadStr       : "Cargar",
            dynamicFormData: function()
            {
                //var data ="XYZ=1&ABCD=2";
                var data ={"XYZ":1,"ABCD":2};
                return data;
            },
            deleteCallback: function (data, pd) {
                var $datita = { '_token'  : $('meta[name="csrf-token"]').attr('content') , 'id' : data.data.id , 'uu_id' : data.data.uu_id };
                // console.log( 'Hola!!! >>>' , data , $datita );
                if( data.data != undefined ){
                    $.post( "del/archivo/post" , $datita ,
                        function (resp,textStatus, jqXHR) {
                            //Show Message
                            // alert("File Deleted");
                    });
                }
                pd.statusbar.hide(); //You choice.
            },
            afterUploadAll:function(files,data,xhr,pd)
            {
                uploadObj6.reset();
                var $n = files.responses.length - 1;
                var  json = files.responses[$n];
                $('#img06').attr('src',json.url);
                $('#txtImagenCapitulo').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        uploadObj7 = $("#showoldupload7").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/pdf/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            previewHeight   : "70px",
            previewWidth    : "70px",
            dragDropStr     : "<span><b>Arrastra tus archivos aquí :)</b></span>",
            abortStr        : "Abandonar",
            cancelStr       : "Mejor no...",
            doneStr         : "Correcto",
            multiDragErrorStr : "Por favor revisa las restricciónes de archivos.",
            allowedTypes    : 'pdf',
            extErrorStr     : "Sólo archivo de PDF",
            sizeErrorStr    : "El máximo de tamaño es 20Mb:",
            uploadErrorStr  : "Error",
            uploadStr       : "Cargar",
            dynamicFormData: function()
            {
                //var data ="XYZ=1&ABCD=2";
                var data ={"XYZ":1,"ABCD":2};
                return data;
            },
            deleteCallback: function (data, pd) {
                var $datita = { '_token'  : $('meta[name="csrf-token"]').attr('content') , 'id' : data.data.id , 'uu_id' : data.data.uu_id };
                // console.log( 'Hola!!! >>>' , data , $datita );
                if( data.data != undefined ){
                    $.post( "del/archivo/post" , $datita ,
                        function (resp,textStatus, jqXHR) {
                            //Show Message
                            // alert("File Deleted");
                    });
                }
                pd.statusbar.hide(); //You choice.
            },
            afterUploadAll:function(files,data,xhr,pd)
            {
                uploadObj7.reset();
                var $n = files.responses.length - 1;
                var  json = files.responses[$n];
                $('#filePDF').attr('href',json.url);
                $('#filePDF').html(`${json.archivo}`);
                $('#frmDocumento #archivo_issuu').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        uploadObj8 = $("#showoldupload8").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/pdf/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            previewHeight   : "70px",
            previewWidth    : "70px",
            dragDropStr     : "<span><b>Arrastra tus archivos aquí :)</b></span>",
            abortStr        : "Abandonar",
            cancelStr       : "Mejor no...",
            doneStr         : "Correcto",
            multiDragErrorStr : "Por favor revisa las restricciónes de archivos.",
            aallowedTypes    : 'jpg,png,jpeg',
            extErrorStr     : "Sólo archivo de imágenes ()JPG,JPEG,PNG)",
            sizeErrorStr    : "El máximo de tamaño es 20Mb:",
            uploadErrorStr  : "Error",
            uploadStr       : "Cargar",
            dynamicFormData: function()
            {
                //var data ="XYZ=1&ABCD=2";
                var data ={"XYZ":1,"ABCD":2};
                return data;
            },
            deleteCallback: function (data, pd) {
                var $datita = { '_token'  : $('meta[name="csrf-token"]').attr('content') , 'id' : data.data.id , 'uu_id' : data.data.uu_id };
                // console.log( 'Hola!!! >>>' , data , $datita );
                if( data.data != undefined ){
                    $.post( "del/archivo/post" , $datita ,
                        function (resp,textStatus, jqXHR) {
                            //Show Message
                            // alert("File Deleted");
                    });
                }
                pd.statusbar.hide(); //You choice.
            },
            afterUploadAll:function(files,data,xhr,pd)
            {
                uploadObj8.reset();
                var $n = files.responses.length - 1;
                var  json = files.responses[$n];
                $('#frmDocumento #img08').attr('src',json.url);
                $('#frmDocumento #preambulo_imagen_fondo').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        showoldupload9 = $("#showoldupload9").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/pdf/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            previewHeight   : "70px",
            previewWidth    : "70px",
            dragDropStr     : "<span><b>Arrastra tus archivos aquí :)</b></span>",
            abortStr        : "Abandonar",
            cancelStr       : "Mejor no...",
            doneStr         : "Correcto",
            multiDragErrorStr : "Por favor revisa las restricciónes de archivos.",
            aallowedTypes    : 'jpg,png,jpeg',
            extErrorStr     : "Sólo archivo de imágenes ()JPG,JPEG,PNG)",
            sizeErrorStr    : "El máximo de tamaño es 20Mb:",
            uploadErrorStr  : "Error",
            uploadStr       : "Cargar",
            dynamicFormData: function()
            {
                //var data ="XYZ=1&ABCD=2";
                var data ={"XYZ":1,"ABCD":2};
                return data;
            },
            deleteCallback: function (data, pd) {
                var $datita = { '_token'  : $('meta[name="csrf-token"]').attr('content') , 'id' : data.data.id , 'uu_id' : data.data.uu_id };
                // console.log( 'Hola!!! >>>' , data , $datita );
                if( data.data != undefined ){
                    $.post( "del/archivo/post" , $datita ,
                        function (resp,textStatus, jqXHR) {
                            //Show Message
                            // alert("File Deleted");
                    });
                }
                pd.statusbar.hide(); //You choice.
            },
            afterUploadAll:function(files,data,xhr,pd)
            {
                showoldupload9.reset();
                var $n = files.responses.length - 1;
                var  json = files.responses[$n];
                $('#mdlGaleriaGeneral #img09').attr('src',json.url);
                $('#mdlGaleriaGeneral #txtImagenGaleriaG').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        // TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
        /* ------------------------------------------------------------- *
        CKEDITOR.editorConfig = function( config ) {
            config.language = 'es';
            config.uiColor = '#F7B42C';
            config.height = 300;
            config.toolbarCanCollapse = true;
            config.removePlugins = 'easyimage, cloudservices';
            config.filebrowserUploadUrl =  _URL_HOME+'/simple/carga/archivo?CKEditorFuncNum=1';
        };
        /* ------------------------------------------------------------- *
        resumen = CKEDITOR.replace( 'resumen',{
            toolbar: [
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'align',
                    items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
            ],

            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

            // Adding drag and drop image upload.
            extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
            uploadUrl: _URL_HOME+'/simple/carga/archivo',

            // Configure your file manager integration. This example uses CKFinder 3 for PHP.
            filebrowserBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html',
            filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
            filebrowserUploadUrl: _URL_HOME+'/simple/carga/archivo',
            filebrowserImageUploadUrl: _URL_HOME+'/simple/carga/archivo',
            fileTools_requestHeaders : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            isFileUploadSupported : true,
            height: 260,

            removeDialogTabs: 'image:advanced;link:advanced'
        });
        /* ------------------------------------------------------------- *
        dedicatoria = CKEDITOR.replace( 'dedicatoria',{
            toolbar: [
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'align',
                    items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
            ],

            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

            // Adding drag and drop image upload.
            extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
            uploadUrl: _URL_HOME+'/simple/carga/archivo',

            // Configure your file manager integration. This example uses CKFinder 3 for PHP.
            filebrowserBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html',
            filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
            filebrowserUploadUrl: _URL_HOME+'/simple/carga/archivo',
            filebrowserImageUploadUrl: _URL_HOME+'/simple/carga/archivo',

            height: 260,

            removeDialogTabs: 'image:advanced;link:advanced'
        });
        /* ------------------------------------------------------------- *
        presentacion_quote = CKEDITOR.replace( 'presentacion_quote',{
            toolbar: [
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'align',
                    items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
            ],

            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

            // Adding drag and drop image upload.
            extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
            uploadUrl: _URL_HOME+'/simple/carga/archivo',

            // Configure your file manager integration. This example uses CKFinder 3 for PHP.
            filebrowserBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html',
            filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
            filebrowserUploadUrl: _URL_HOME+'/simple/carga/archivo',
            filebrowserImageUploadUrl: _URL_HOME+'/simple/carga/archivo',

            height: 260,

            removeDialogTabs: 'image:advanced;link:advanced'
        });
        /* ------------------------------------------------------------- *
        presentacion_detalle = CKEDITOR.replace( 'presentacion_detalle',{
            toolbar: [
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'align',
                    items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
            ],

            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

            // Adding drag and drop image upload.
            extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
            uploadUrl: _URL_HOME+'/simple/carga/archivo',

            // Configure your file manager integration. This example uses CKFinder 3 for PHP.
            filebrowserBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html',
            filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
            filebrowserUploadUrl: _URL_HOME+'/simple/carga/archivo',
            filebrowserImageUploadUrl: _URL_HOME+'/simple/carga/archivo',

            height: 260,

            removeDialogTabs: 'image:advanced;link:advanced'
        });
        /* ------------------------------------------------------------- *
        capitulo_descripcion = CKEDITOR.replace( 'capitulo_descripcion',{
            toolbar: [
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'align',
                    items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
            ],

            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

            // Adding drag and drop image upload.
            extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
            uploadUrl: _URL_HOME+'/simple/carga/archivo',

            // Configure your file manager integration. This example uses CKFinder 3 for PHP.
            filebrowserBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html',
            filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
            filebrowserUploadUrl: _URL_HOME+'/simple/carga/archivo',
            filebrowserImageUploadUrl: _URL_HOME+'/simple/carga/archivo',

            height: 260,

            removeDialogTabs: 'image:advanced;link:advanced'
        });
        /* ------------------------------------------------------------- *
        capitulo_cita = CKEDITOR.replace( 'capitulo_cita',{
            toolbar: [
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'align',
                    items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
            ],

            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

            // Adding drag and drop image upload.
            extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
            uploadUrl: _URL_HOME+'/simple/carga/archivo',

            // Configure your file manager integration. This example uses CKFinder 3 for PHP.
            filebrowserBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html',
            filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
            filebrowserUploadUrl: _URL_HOME+'/simple/carga/archivo',
            filebrowserImageUploadUrl: _URL_HOME+'/simple/carga/archivo',

            height: 260,

            removeDialogTabs: 'image:advanced;link:advanced'
        });
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        // Color 1
        $('#frmDocumento .my-colorpicker1').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker1').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker1 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 2
        $('#frmDocumento .my-colorpicker2').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker2').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker2 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 3
        $('#frmDocumento .my-colorpicker3').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker3').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker3 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 4
        $('#frmDocumento .my-colorpicker4').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker4').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker4 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 5
        $('#frmDocumento .my-colorpicker5').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker5').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker5 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 6
        $('#frmDocumento .my-colorpicker6').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker6').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker6 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 7
        $('#frmDocumento .my-colorpicker7').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker7').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker7 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 8
        $('#frmDocumento .my-colorpicker8').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker8').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker8 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 9
        $('#frmDocumento .my-colorpicker9').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker9').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker9 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 10
        $('#frmDocumento .my-colorpicker10').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker10').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker10 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 11
        $('#frmDocumento .my-colorpicker11').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker11').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker11 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        // Color 12
        $('#frmDocumento .my-colorpicker12').colorpicker()
        /* ------------------------------------------------------------- */
        $('#frmDocumento .my-colorpicker12').on('colorpickerChange', function(event) {
            $('#frmDocumento .my-colorpicker12 .fa-square').css('color', event.color.toString());
        });
        /* ------------------------------------------------------------- */
        tblGaleria = $('#tblGaleria').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [25, 50, 100],
                [25, 50, 100]
            ],
            "order" 	 : [[ 0, "desc" ]],
            "aaSorting"  : [],
            "searching"  : true,
            "responsive" : true,
            "scrollX" 	 : true ,
            buttons: [
                {
                    extend: 'collection',
                    exportOptions: {
                        modifier: {
                        page: 'all',
                        search: 'none'
                        }
                    },
                    text: 'Exportar',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }
            ],
            language : {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún dato disponible en esta tabla",
                sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "Buscar:",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                sFirst: "|<",
                sLast: ">|",
                sNext: ">",
                sPrevious: "<",
                },
                    oAria: {
                    sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                    sSortDescending: ": Activar para ordenar la columna de manera descendente",
                }
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "initComplete": function(settings, json) {
                // Ocultamos el buscados - preloader
                $('#tblGaleria').waitMe('hide');
            },
            "drawCallback": function( settings ) {
                var api = this.api();
                // Ocultamos el buscados - preloader
                $('#tblGaleria').waitMe('hide');
            }
        });
        /* ------------------------------------------------------------- */
        tblCapitulo = $('#tblCapitulo').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [25, 50, 100],
                [25, 50, 100]
            ],
            "order" 	 : [[ 0, "desc" ]],
            "aaSorting"  : [],
            "searching"  : true,
            "responsive" : true,
            "scrollX" 	 : true ,
            buttons: [
                {
                    extend: 'collection',
                    exportOptions: {
                        modifier: {
                        page: 'all',
                        search: 'none'
                        }
                    },
                    text: 'Exportar',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }
            ],
            language : {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún dato disponible en esta tabla",
                sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "Buscar:",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                sFirst: "|<",
                sLast: ">|",
                sNext: ">",
                sPrevious: "<",
                },
                    oAria: {
                    sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                    sSortDescending: ": Activar para ordenar la columna de manera descendente",
                }
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "initComplete": function(settings, json) {
                // Ocultamos el buscados - preloader
                $('#tblGaleria').waitMe('hide');
            },
            "drawCallback": function( settings ) {
                var api = this.api();
                // Ocultamos el buscados - preloader
                $('#tblGaleria').waitMe('hide');
            }
        });
        /* ------------------------------------------------------------- */
        tblAutores = $('#tblAutores').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [25, 50, 100],
                [25, 50, 100]
            ],
            "order" 	 : [[ 0, "desc" ]],
            "aaSorting"  : [],
            "searching"  : true,
            "responsive" : true,
            "scrollX" 	 : true ,
            buttons: [
                {
                    extend: 'collection',
                    exportOptions: {
                        modifier: {
                        page: 'all',
                        search: 'none'
                        }
                    },
                    text: 'Exportar',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }
            ],
            language : {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún dato disponible en esta tabla",
                sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "Buscar:",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                sFirst: "|<",
                sLast: ">|",
                sNext: ">",
                sPrevious: "<",
                },
                    oAria: {
                    sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                    sSortDescending: ": Activar para ordenar la columna de manera descendente",
                }
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "initComplete": function(settings, json) {
                // Ocultamos el buscados - preloader
                $('#tblGaleria').waitMe('hide');
            },
            "drawCallback": function( settings ) {
                var api = this.api();
                // Ocultamos el buscados - preloader
                $('#tblGaleria').waitMe('hide');
            }
        });
        /* ------------------------------------------------------------- */
        tblGaleriaGeneral = $('#tblGaleriaGeneral').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [25, 50, 100],
                [25, 50, 100]
            ],
            "order" 	 : [[ 0, "desc" ]],
            "aaSorting"  : [],
            "searching"  : true,
            "responsive" : true,
            "scrollX" 	 : true ,
            buttons: [
                {
                    extend: 'collection',
                    exportOptions: {
                        modifier: {
                        page: 'all',
                        search: 'none'
                        }
                    },
                    text: 'Exportar',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }
            ],
            language : {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún dato disponible en esta tabla",
                sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "Buscar:",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                sFirst: "|<",
                sLast: ">|",
                sNext: ">",
                sPrevious: "<",
                },
                    oAria: {
                    sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                    sSortDescending: ": Activar para ordenar la columna de manera descendente",
                }
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "initComplete": function(settings, json) {
                // Ocultamos el buscados - preloader
                $('#tblGaleriaGeneral').waitMe('hide');
            },
            "drawCallback": function( settings ) {
                var api = this.api();
                // Ocultamos el buscados - preloader
                $('#tblGaleriaGeneral').waitMe('hide');
            }
        });
        /* ------------------------------------------------------------- */
        $('#btnAddGaleria').click(function (e) {
            e.preventDefault();
            $('#IdGaleria').val(0);
            $('#txtImagenGaleria').val('');
            $('#txtTitGal01').val('');
            $('#orden3').val('0');
            uploadObj5.reset();
            $('#img05').attr('src','');
            $('#mdlGaleria').modal('show');
        });
        /* ------------------------------------------------------------- */
        $('#btnAddGaleriaC').click(function (e) {
            e.preventDefault();
            $('#mdlGaleriaC #IdCapitulo').val(0)
            $('#txtImagenCapitulo').val('');
            $('#txtTitGal02').val('');
            $('#txtDescri2').val('');
            $('#orden4').val('0');
            uploadObj6.reset();
            $('#img06').attr('src','');
            $('#mdlGaleriaC').modal('show');
        });
        /* ------------------------------------------------------------- */
        $('#btnAddGaleriaG').click(function (e) {
            e.preventDefault();
            $('#mdlGaleriaGeneral #IdGaleriaG').val(0)
            $('#mdlGaleriaGeneral #txtImagenGaleriaG').val('');
            $('#mdlGaleriaGeneral #txtTitGal01G').val('');
            $('#mdlGaleriaGeneral #txtDescri1G').val('');
            $('#mdlGaleriaGeneral #orden3G').val('0');
            showoldupload9.reset();
            $('#mdlGaleriaGeneral #img09').attr('src','');
            $('#mdlGaleriaGeneral').modal('show');
        });
        /* ------------------------------------------------------------- */
        $('#btnGo_GaleriaG').click(function (e) {
            e.preventDefault();
            agregarGaleria01General();
        });
        /* ------------------------------------------------------------- */
        $(document).delegate('.btnDelGaleria1General', 'click', function(event) {
            event.preventDefault();
            var $id = $(this).data('id'), $uuid = $(this).data('uuid'), $nombre = $(this).data('nombre');
            Swal.fire({
                title: 'Confirmar',
                text: "Quitar imagen: "+$nombre,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, quitar'
            }).then((result) => {
                if (result.isConfirmed) {
                    delGaleria01General( $id );
                }
            });
        });
        /* ------------------------------------------------------------- */
        $(document).delegate('.cargarGaleGeneral', 'click', function(event) {
            event.preventDefault();
            var Id = $(this).data('id'), $uuid = $(this).data('uuid');
            cargar_galeriaGeneral( Id );
        });
        /* ------------------------------------------------------------- */
        $('#btnAddAuor').click(function (e) {
            e.preventDefault();
            $('#IdAutor').val(0);
            $('#txtAutor').val('');
            $('#txtBioAutor').val('');
            $('#txtImgAutor').val('');
            uploadObj4.reset();
            $('#mdlAutor').modal('show');
        });
        /* ------------------------------------------------------------- */
        var $eventAutor = $('#cboAutor').select2({
            width : '100%'
        });
        /* ------------------------------------------------------------- */
        $eventAutor.on("select2:select", function (e) {
            var _idUser = e.params.data.id;
            console.log("select2:select", _idUser );
        });
        /* ------------------------------------------------------------- */
        $('#btnGo_Autor').click(function (e) {
            e.preventDefault();
            agregarAutor();
        });
        /* ------------------------------------------------------------- */
        var $evencategoria_id = $('#categoria_id').select2({
            width : '100%'
        });
        /* ------------------------------------------------------------- */
        $(document).delegate('.btnDelAutor', 'click', function(event) {
            event.preventDefault();
            var $id = $(this).data('id'), $uuid = $(this).data('uuid'), $nombre = $(this).data('nombre');
            Swal.fire({
                title: 'Confirmar',
                text: "Quitar autor: "+$nombre,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, quitar'
            }).then((result) => {
                if (result.isConfirmed) {
                    delAutores( $id );
                }
            });
        });
        /* ------------------------------------------------------------- */
        $('#btnGo_Galeria').click(function (e) {
            e.preventDefault();
            agregarGaleria01();
        });
        /* ------------------------------------------------------------- */
        $(document).delegate('.btnDelGaleria1', 'click', function(event) {
            event.preventDefault();
            var $id = $(this).data('id'), $uuid = $(this).data('uuid'), $nombre = $(this).data('nombre');
            Swal.fire({
                title: 'Confirmar',
                text: "Quitar imagen: "+$nombre,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, quitar'
            }).then((result) => {
                if (result.isConfirmed) {
                    delGaleria01( $id );
                }
            });
        });
        /* ------------------------------------------------------------- */
        $('#btnGo_Capitulo').click(function (e) {
            e.preventDefault();
            agregarCapitulo01();
        });
        /* ------------------------------------------------------------- */
        $(document).delegate('.getCapi', 'click', function(event) {
            event.preventDefault();
            var Id = $(this).data('id'), $uuid = $(this).data('uuid');
            cargar_capitulo( Id );
        });
        /* ------------------------------------------------------------- */
        $(document).delegate('.cargarGale', 'click', function(event) {
            event.preventDefault();
            var Id = $(this).data('id'), $uuid = $(this).data('uuid');
            cargar_galeria( Id );
        });
        /* ------------------------------------------------------------- */
        $(document).delegate('.getAutor', 'click', function(event) {
            event.preventDefault();
            var Id = $(this).data('id'), $uuid = $(this).data('uuid');
            cargar_Autores( Id );
        });
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
    });

})(jQuery);
/* ------------------------------------------------------------- */
function getAll()
{
  // /todos/banner
  var _data = {
    '_token'  : $('meta[name="csrf-token"]').attr('content') ,
  };
  $('#tablitaW').waitMe({
    effect  : 'facebook',
    text    : 'Espere...',
    bg      : 'rgba(255,255,255,0.7)',
    color   : '#146436',fontSize:'20px',textPos : 'vertical',
    onClose : function() {}
  });
  $.post( _URL_HOME + 'listar/publicacion/', _data , function(data, textStatus, xhr) {
    /*optional stuff to do after success */
  }, 'json')
  .fail(function(xhr, status, error) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: error,
      });
  })
  .done( function( json ) {
    switch(json.estado)
    {
      case 'ERROR':
        var $texto = '', $arError = [];
        $.each( json.errores , function( key, value ) {
          $arError.push( value );
        });
        $texto = $arError.join(', ');
        Swal.fire({
          icon: 'error',
          title: 'Revise lo siguiente...',
          text: `${$texto}`
        });
      break;
      case 'OK':
        // negocio...
        var $jsonData = populateCC( json );
        table.clear();
        table.rows.add($jsonData).draw();
      break;
    }
    $('#tablitaW').waitMe('hide');
  })
  .always(function() {
    $('#tablitaW').waitMe('hide');
  });
}
/* ------------------------------------------------------------- */
function populateCC( json )
{
	//
	var $data = [], $CSGO = 1;
	if( json.data != undefined ){
		$.each( json.data , function( key, value ) {
            var $o = [];
            $o.push($CSGO);
            $o.push(`<a href="#" data-id="${value.id}" data-uuid="${value.uu_id}" class=" openDoc " >${value.titulo}</a>`);
            $o.push(value.anio);
            //$o.push(value.capitulo_titulo);
            var destacado = parseInt( value.destacado );
            if( destacado == 1 ){
                $o.push(`Si`);
            }else{
                $o.push(`No`);
            }
            //
            var $fecha = moment( value.created_at ).format('DD/MM/YYYY h:mm a');

            var activo = parseInt( value.activo );
            if( activo == 1 ){
                $o.push(`<span class="badge bg-green">Activo</span>`);
                $o.push($fecha);
                $o.push(`<button data-id="${value.id}" data-nombre="${value.titulo}" data-uuid="${value.uu_id}" type="button" class=" delData btn btn-block btn-danger btn-xs">Anular</button>`);
            }else{
                $o.push(`<span class="badge bg-red">Anulado</span>`);
                $o.push($fecha);
                $o.push(``);
            }
            //
            $data.push( $o );
            $CSGO++;
		});
	}
	//
	return $data;
}
/* ------------------------------------------------------------- */
function delDocumento( $uuid )
{
	//
	var _data = {
    '_token' : $('meta[name="csrf-token"]').attr('content') ,
    'activo' : 0
  };
  $('#wrapperTable').waitMe({
    effect  : 'facebook',
    text    : 'Espere...',
    bg      : 'rgba(255,255,255,0.7)',
    color   : '#146436',fontSize:'20px',textPos : 'vertical',
    onClose : function() {}
  });
  $.post( _URL_HOME + 'actualizar/publicacion/'+$uuid , _data , function(data, textStatus, xhr) {
    /*optional stuff to do after success */
  }, 'json')
  .fail(function(xhr, status, error) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: error,
      });
  })
  .done( function( json ) {
    switch(json.estado)
    {
      case 'ERROR':
        var $texto = '', $arError = [];
        $.each( json.errores , function( key, value ) {
          $arError.push( value );
        });
        $texto = $arError.join(', ');
        Swal.fire({
          icon: 'error',
          title: 'Revise lo siguiente...',
          text: `${$texto}`
        });
      break;
      case 'OK':
        // negocio...
        Swal.fire(
          'Correcto',
          'Publicación anulada correctamente',
          'success'
        );
        getAll();
      break;
    }
    $('#wrapperTable').waitMe('hide');
  })
  .always(function() {
    $('#wrapperTable').waitMe('hide');
  });
	//
}
/* ------------------------------------------------------------- */
function renovarToken()
{
    var length = 12;
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    result += '-';
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    result += '-';
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    $('#frmDocumento #uu_id').val( result );
}
/* ------------------------------------------------------------- */
function guardar()
{
    //
    var url = `${_URL_HOME}guardar/publicacion`;
    var _dataSerializada = $('#frmDocumento').serialize();
    var Id = parseInt( $('#frmDocumento #id').val() ),uu_id = $('#frmDocumento #uu_id').val()
    if( Id > 0 ){
        url = `${_URL_HOME}actualizar/publicacion/${uu_id}`;
    }
    var _token = $('meta[name="csrf-token"]').attr('content');
    $('#frmDocumento input[name="_token"]').val(_token)

    $('#frmDocumento').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    // Cargando los textarea
    //var sresumen = CKEDITOR.instances.resumen.getData(), sdedicatoria = CKEDITOR.instances.dedicatoria.getData(),
    //spresentacion_quote = CKEDITOR.instances.presentacion_quote.getData(), spresentacion_detalle = CKEDITOR.instances.presentacion_detalle.getData(),
    //scapitulo_descripcion = CKEDITOR.instances.capitulo_descripcion.getData(), scapitulo_cita = CKEDITOR.instances.capitulo_cita.getData();
    //$('#frmDocumento #resumen').val(sresumen);
    //$('#frmDocumento #dedicatoria').val(sdedicatoria);
    //$('#frmDocumento #presentacion_quote').val(spresentacion_quote);
    //$('#frmDocumento #presentacion_detalle').val(spresentacion_detalle);
    //$('#frmDocumento #capitulo_descripcion').val(scapitulo_descripcion);
    //$('#frmDocumento #capitulo_cita').val(scapitulo_cita);
    
    //
    tranformarBRTextArea( 1 );
    var _data = $('#frmDocumento').serialize();
    //
    $.post( url , _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
        case 'ERROR':
            var $texto = '', $arError = [];
            $.each( json.errores , function( key, value ) {
                $arError.push( value );
            });
            $texto = $arError.join(', ');
                Swal.fire({
                icon: 'error',
                title: 'Revise lo siguiente...',
                text: `${$texto}`
            });
        break;
        case 'OK':
            tranformarBRTextArea( 2 );
            Swal.fire(
                'Correcto',
                'Datos guardados correctamente',
                'success'
            );
            $('#frmDocumento #id').val( json.data.id )
            getAll();
        break;
        }
        $('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        $('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function cargarDoc( uuid )
{
    //
    var _data = {
        '_token'  : $('meta[name="csrf-token"]').attr('content') ,
    };
    $('#frmDocumento').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $('#frmDocumento input[type="text"]').each(function(e){
        $(this).val('');
    });
    $('#frmDocumento input[type="hidden"]').each(function(e){
        $(this).val('');
    });
    $('#frmDocumento input[type="number"]').each(function(e){
        $(this).val('0');
    });
    $.post( _URL_HOME+'cargar/publicacion/'+uuid, _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
    switch(json.estado)
    {
        case 'ERROR':
            var $texto = '', $arError = [];
            $.each( json.errores , function( key, value ) {
            $arError.push( value );
            });
            $texto = $arError.join(', ');
            Swal.fire({
            icon: 'error',
            title: 'Revise lo siguiente...',
            text: `${$texto}`
            });
        break;
        case 'OK':
            
            if( json.data != undefined ){
                $.each( json.data , function( key, value ) {
                    $('#frmDocumento #'+key).val(value);
                });
                tranformarBRTextArea( 2 );
                $('#frmDocumento #img01').attr('src',_URL_MEDIA+json.data.imagen_portada);
                $('#frmDocumento #img02').attr('src',_URL_MEDIA+json.data.imagen_detalle);
                $('#frmDocumento #img03').attr('src',_URL_MEDIA+json.data.presentacion_imagen);
                $('#frmDocumento #img08').attr('src',_URL_MEDIA+json.data.preambulo_imagen_fondo);
                var rs = json.data;
                $('#frmDocumento #categoria_id').trigger('change');
                $('#frmDocumento #coleccion_id').trigger('change');
                $('#frmDocumento #activo').val(1);
                $('#frmDocumento #destacado').val(1);
                if( rs.activo == 1 ){
                    $('#frmDocumento #activo').prop( "checked", true );
                }else{
                    $('#frmDocumento #activo').prop( "checked", false  );
                }
                if( rs.destacado == 1 ){
                    $('#frmDocumento #destacado').prop( "checked", true );
                }else{
                    $('#frmDocumento #destacado').prop( "checked", false  );
                }
                // Archivo ISSUU
                $('#frmDocumento #filePDF').attr('href',_URL_MEDIA+json.data.archivo_issuu);
                $('#frmDocumento #filePDF').html(`${json.data.archivo_issuu}`);
                // Editores
                //CKEDITOR.instances.resumen.setData(rs.resumen);
                //CKEDITOR.instances.dedicatoria.setData(rs.dedicatoria);
                //CKEDITOR.instances.presentacion_quote.setData(rs.presentacion_quote);
                //CKEDITOR.instances.presentacion_detalle.setData(rs.presentacion_detalle);
                //CKEDITOR.instances.capitulo_descripcion.setData(rs.capitulo_descripcion);
                //CKEDITOR.instances.capitulo_cita.setData(rs.capitulo_cita);
                // Color picker
                if( rs.color_base ){
                    $('#frmDocumento #color_base').trigger('change');
                }
                if( rs.color_alterno ){
                    $('#frmDocumento #color_alterno').trigger('change');
                }
                if( rs.color_titulo_base ){
                    $('#frmDocumento #color_titulo_base').trigger('change');
                }
                if( rs.color_titulo_alterno ){
                    $('#frmDocumento #color_titulo_alterno').trigger('change');
                }
                if( rs.color_imagen_titulo_base ){
                    $('#frmDocumento #color_imagen_titulo_base').trigger('change');
                }
                if( rs.color_imagen_titulo_alterno ){
                    $('#frmDocumento #color_imagen_titulo_alterno').trigger('change');
                }
                if( rs.color_subtitulo_base ){
                    $('#frmDocumento #color_subtitulo_base').trigger('change');
                }
                if( rs.color_subtitulo_alterno ){
                    $('#frmDocumento #color_subtitulo_alterno').trigger('change');
                }
                if( rs.color_texto_base ){
                    $('#frmDocumento #color_texto_base').trigger('change');
                }
                if( rs.color_text_alterno ){
                    $('#frmDocumento #color_text_alterno').trigger('change');
                }
                if( rs.color_icono_quote ){
                    $('#frmDocumento #color_icono_quote').trigger('change');
                }
                if( rs.color_hover_galeria ){
                    $('#frmDocumento #color_hover_galeria').trigger('change');
                }
                // Tablas
                var $jsonData = populateAutores( json.autores );
                tblAutores.clear();
                tblAutores.rows.add($jsonData).draw();
                // Galeria 1
                var $jsonData = populateGaleria01( json.galeria );
                tblGaleria.clear();
                tblGaleria.rows.add($jsonData).draw();
                // Galeria general
                var $jsonData = populateGaleria01General( json.galeriaGeneral );
                tblGaleriaGeneral.clear();
                tblGaleriaGeneral.rows.add($jsonData).draw();
                // Capitulos
                var $jsonData = populateCapitulo02( json.capitulos );
                tblCapitulo.clear();
                tblCapitulo.rows.add($jsonData).draw();
            }
        break;
    }
        $('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        $('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function buscar()
{
  //
  $('#wrapperTable').waitMe({
    effect  : 'facebook',
    text    : 'Espere...',
    bg      : 'rgba(255,255,255,0.7)',
    color   : '#146436',fontSize:'20px',textPos : 'vertical',
    onClose : function() {}
  });
  $.ajax({
    url     : `${_URL_NODE3}/api/sub_clase_producto01/buscar`,
    method  : "POST",
    data    : { 'id' : $('#txtID').val(),'nombre' : $('#txtNombre').val() },
    dataType: "json",
    headers : {
      "api-token"  : _TokenUser,
      "user-token" : _token_node
    }
  })
  .done(function(  json ) {
    switch(json.estado)
    {
      case 'ERROR':
        alert(json.error);
      break;
      case 'OK':
        // negocio...
        var $jsonData = populateCC( json );
        table.clear();
        table.rows.add($jsonData).draw();
      break;
    }
  })
  .fail(function(xhr, status, error) {
    if( xhr.status == 422 )
    {
      // 422 es decir un error de validacion de datos...
      var $errores = xhr.responseJSON, $texto = '', $arError = [];
      $.each( $errores.errores , function( key, value ) {
        $arError.push( value.msg );
      });
      $texto = $arError.join(', ');
      Swal.fire({
        icon: 'error',
        title: 'Revise lo siguiente...',
        text: `${$texto}`
      });
    }else{
      alert('Error al ejecutar');
    }
    $('#wrapperTable').waitMe('hide');
  })
  .always(function() {
    $('#wrapperTable').waitMe('hide');
  });

}
/* ------------------------------------------------------------- */
function getCategorias()
{
    var _data = {
        '_token'  : $('meta[name="csrf-token"]').attr('content') ,
    };

    $.post( _URL_HOME + 'listar/categorias', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                $arError.push( value );
                });
                $texto = $arError.join(', ');
                Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                var _html = `<option value="" >Seleccione</option>`;
                if( json.data != undefined ){
                    $.each( json.data , function( key, rs ) {
                        _html += `<option value="${rs.id}" >${rs.nombre}</option>`;
                    });
                }
                $('#frmDocumento #categoria_id').html(_html);
                $('#frmDocumento #categoria_id').trigger('change');
            break;
        }
        //$('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        //$('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function getColecciones()
{
    var _data = {
        '_token'  : $('meta[name="csrf-token"]').attr('content') ,
    };

    $.post( _URL_HOME + 'listar/colecciones', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                $arError.push( value );
                });
                $texto = $arError.join(', ');
                Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                var _html = `<option value="" >Seleccione</option>`;
                if( json.data != undefined ){
                    $.each( json.data , function( key, rs ) {
                        _html += `<option value="${rs.id}" >${rs.nombre}</option>`;
                    });
                }
                $('#frmDocumento #coleccion_id').html(_html);
                $('#frmDocumento #coleccion_id').trigger('change');
            break;
        }
        //$('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        //$('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function agregarAutor()
{
    var _data = {
        '_token'    : $('meta[name="csrf-token"]').attr('content') ,
        'nombre'    : $('#mdlAutor #txtAutor').val(),
        'biografia' : $('#mdlAutor #txtBioAutor').val(),
        'imagen'    : $('#mdlAutor #txtImgAutor').val(),
        'slug'      : $('#frmDocumento #uu_id').val(),
        'publicacion_id' : $('#frmDocumento #id').val(),
        'id' : $('#mdlAutor #IdAutor').val()
    };
    $('#mdlAutor .modal-body').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'guardar/autor', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                $arError.push( value );
                });
                $texto = $arError.join(', ');
                Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                Swal.fire(
                    'Correcto',
                    'Autor agregado',
                    'success'
                );
                var IdAutor = parseInt( $('#mdlAutor #IdAutor').val() );
                if( IdAutor == 0 ){
                    $('#mdlAutor #IdAutor').val( 0 );
                    $('#txtAutor').val('');
                    $('#txtBioAutor').val('');
                    $('#txtImgAutor').val('');
                    $('#img04').attr('src','');
                }else{
                    //
                }
                var $jsonData = populateAutores( json.data );
                tblAutores.clear();
                tblAutores.rows.add($jsonData).draw();
            break;
        }
        $('#mdlAutor .modal-body').waitMe('hide');
    })
    .always(function() {
        $('#mdlAutor .modal-body').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function populateAutores( json )
{
	// $('#IdAutor').val(0);
	var $data = [], $CSGO = 1;
	if( json != undefined ){
		$.each( json , function( key, value ) {
			var $o = [];
			$o.push($CSGO);
            $o.push(`<a href="#" class=" getAutor " data-id="${value.id}" data-uuid="${value.uu_id}" >${value.nombre}</a>`);
            $o.push(`<button data-id="${value.id}" data-uuid="${value.uu_id}" data-nombre="${value.nombre}" type="button" class=" btnDelAutor btn btn-block btn-danger btn-xs">Anular</button>`);
			//
			$data.push( $o );
			$CSGO++;
		});
	}
	//
	return $data;
}
/* ------------------------------------------------------------- */
function delAutores( $uuid )
{
	var _data = {
        '_token' : $('meta[name="csrf-token"]').attr('content') ,
        'uuid'   : $uuid ,
        'slug'   : $('#frmDocumento #uu_id').val(),
        'publicacion_id' : $('#frmDocumento #id').val()
    };
    $('#frmDocumento').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'del/autor', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                    Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                Swal.fire(
                    'Correcto',
                    'Autor eliminado',
                    'success'
                );
                var $jsonData = populateAutores( json.data );
                tblAutores.clear();
                tblAutores.rows.add($jsonData).draw();
            break;
        }
        $('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        $('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function cargar_Autores( Id )
{
    var _data = {
        '_token'  : $('meta[name="csrf-token"]').attr('content') ,
        'id' : Id
    };
    $('body').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'get/autor', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                // negocio...
                if( json.data != undefined ){
                    var rs = json.data;
                    $('#mdlAutor #IdAutor').val( rs.id );
                    $('#mdlAutor #txtImgAutor').val( rs.imagen );
                    $('#mdlAutor #img04').attr( 'src', _URL_MEDIA+rs.imagen );
                    $('#mdlAutor #txtAutor').val( rs.nombre );
                    $('#mdlAutor #txtBioAutor').val( rs.biografia );
                    $('#mdlAutor').modal('show');
                }
            break;
        }
        $('body').waitMe('hide');
    })
    .always(function() {
        $('body').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function agregarGaleria01()
{
    var _data = {
        '_token'    : $('meta[name="csrf-token"]').attr('content') ,
        'titulo'    : $('#mdlGaleria #txtTitGal01').val(),
        'descripcion': $('#mdlGaleria #txtDescri1').val(),
        'imagen'    : $('#mdlGaleria #txtImagenGaleria').val(),
        'orden'     : $('#mdlGaleria #orden3').val(),
        'activo'    : 1,
        'tipo'      : 1,
        'token'     : $('#frmDocumento #uu_id').val(),
        'id_publicacion' : $('#frmDocumento #id').val(),
        'id'        : $('#mdlGaleria #IdGaleria').val()
    };
    $('#mdlGaleria .modal-body').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'galeria/publicacion', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                Swal.fire({
                icon: 'error',
                title: 'Revise lo siguiente...',
                text: `${$texto}`
                });
            break;
            case 'OK':
                Swal.fire(
                    'Correcto',
                    'Galeria agregada',
                    'success'
                );
                var _IdImg = parseInt( _data.id );
                if( _IdImg == 0 ){
                    $('#mdlGaleria #IdGaleria').val(0);
                    $('#txtImagenGaleria').val('');
                    $('#txtTitGal01').val('');
                    $('#orden3').val('');
                    $('#txtDescri1').val('');
                    $('#img05').attr('src','');
                }
                var $jsonData = populateGaleria01( json.data );
                tblGaleria.clear();
                tblGaleria.rows.add($jsonData).draw();
            break;
        }
        $('#mdlGaleria .modal-body').waitMe('hide');
    })
    .always(function() {
        $('#mdlGaleria .modal-body').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function populateGaleria01( json )
{
	//
	var $data = [], $CSGO = 1;
	if( json != undefined ){
		$.each( json , function( key, value ) {
			var $o = [];
			$o.push(value.orden);
            $o.push(`<a href="#" class=" cargarGale " data-id="${value.id}" data-uuid="${value.uu_id}" >${value.titulo}</a>`);
            $o.push(`<button data-id="${value.id}" data-uuid="${value.uu_id}" data-nombre="${value.titulo}" type="button" class=" btnDelGaleria1 btn btn-block btn-danger btn-xs">Eliminar</button>`);
			//
			$data.push( $o );
			$CSGO++;
		});
	}
	//
	return $data;
}
/* ------------------------------------------------------------- */
function delGaleria01( $uuid )
{
	var _data = {
        '_token' : $('meta[name="csrf-token"]').attr('content') ,
        'uuid'   : $uuid ,
        'slug'   : $('#frmDocumento #uu_id').val(),
        'publicacion_id' : $('#frmDocumento #id').val(),
        'tipo'      : 1,
    };
    $('#frmDocumento').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'del/galeria', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                    Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                Swal.fire(
                    'Correcto',
                    'Imagen eliminada',
                    'success'
                );
                var $jsonData = populateGaleria01( json.data );
                tblGaleria.clear();
                tblGaleria.rows.add($jsonData).draw();
            break;
        }
        $('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        $('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function agregarCapitulo01()
{
    var _data = {
        '_token'    : $('meta[name="csrf-token"]').attr('content') ,
        'titulo'    : $('#txtTitGal02').val(),
        'descripcion': $('#txtDescri2').val(),
        'imagen'    : $('#txtImagenCapitulo').val(),
        'orden'     : $('#orden4').val(),
        'activo'    : 1,
        'tipo'      : 2,
        'token'     : $('#frmDocumento #uu_id').val(),
        'id_publicacion' : $('#frmDocumento #id').val(),
        'id' : $('#mdlGaleriaC #IdCapitulo').val()
    };
    $('#mdlGaleriaC .modal-body').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'galeria/publicacion', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                Swal.fire(
                    'Correcto',
                    'Galeria agregada',
                    'success'
                );
                var IdCapi = parseInt( $('#mdlGaleriaC #IdCapitulo').val() );
                if( IdCapi == 0 ){
                    $('#mdlGaleriaC #IdCapitulo').val(0)
                    $('#txtImagenCapitulo').val('');
                    $('#txtTitGal02').val('');
                    $('#orden4').val('');
                    $('#txtDescri2').val('');
                    $('#img06').attr('src','');
                }
                var $jsonData = populateCapitulo02( json.data );
                tblCapitulo.clear();
                tblCapitulo.rows.add($jsonData).draw();
            break;
        }
        $('#mdlGaleriaC .modal-body').waitMe('hide');
    })
    .always(function() {
        $('#mdlGaleriaC .modal-body').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function delCapitulo02( $uuid )
{
	var _data = {
        '_token' : $('meta[name="csrf-token"]').attr('content') ,
        'uuid'   : $uuid ,
        'slug'   : $('#frmDocumento #uu_id').val(),
        'publicacion_id' : $('#frmDocumento #id').val(),
        'tipo'      : 2,
    };
    $('#frmDocumento').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'del/galeria', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                    Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                Swal.fire(
                    'Correcto',
                    'Imagen eliminada',
                    'success'
                );
                var $jsonData = populateCapitulo02( json.data );
                tblCapitulo.clear();
                tblCapitulo.rows.add($jsonData).draw();
            break;
        }
        $('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        $('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function populateCapitulo02( json )
{
	//
	var $data = [], $CSGO = 1;
	if( json != undefined ){
		$.each( json , function( key, value ) {
			var $o = [];
            $o.push(value.orden);
			$o.push(`<a href="#" class=" getCapi " data-id="${value.id}" data-uuid="${value.uu_id}" >${value.titulo}</a>`);

            $o.push(`<button data-id="${value.id}" data-uuid="${value.uu_id}" data-nombre="${value.titulo}" type="button" class=" btnDelGaleria1 btn btn-block btn-danger btn-xs">Eliminar</button>`);
			//
			$data.push( $o );
			$CSGO++;
		});
	}
	//
	return $data;
}
/* ------------------------------------------------------------- */
function cargar_capitulo( Id )
{
    var _data = {
        '_token'  : $('meta[name="csrf-token"]').attr('content') ,
        'id' : Id
    };
    $('body').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'get/galeria', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                // negocio...
                if( json.data != undefined ){
                    var rs = json.data;
                    $('#mdlGaleriaC #IdCapitulo').val( rs.id );
                    $('#mdlGaleriaC #txtImagenCapitulo').val( rs.imagen );
                    $('#mdlGaleriaC #img06').attr( 'src', _URL_MEDIA+rs.imagen );
                    $('#mdlGaleriaC #txtTitGal02').val( rs.titulo );
                    $('#mdlGaleriaC #txtDescri2').val( rs.descripcion );
                    $('#mdlGaleriaC #orden4').val( rs.orden );
                    $('#mdlGaleriaC').modal('show');
                }
            break;
        }
        $('body').waitMe('hide');
    })
    .always(function() {
        $('body').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function cargar_galeria( Id )
{
    var _data = {
        '_token' : $('meta[name="csrf-token"]').attr('content') ,
        'id' : Id
    };
    $('#frmDocumento').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'get/galeria', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                // negocio...
                if( json.data != undefined ){
                    var rs = json.data;
                    $('#mdlGaleria #IdGaleria').val( rs.id );
                    $('#mdlGaleria #txtImagenGaleria').val( rs.imagen );
                    $('#mdlGaleria #img05').attr( 'src', _URL_MEDIA+rs.imagen );
                    $('#mdlGaleria #txtTitGal01').val( rs.titulo );
                    $('#mdlGaleria #txtDescri1').val( rs.descripcion );
                    $('#mdlGaleria #orden3').val( rs.orden );
                    $('#mdlGaleria').modal('show');
                }
            break;
        }
        $('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        $('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function tranformarBRTextArea( Tipo )
{
    var resumen = $('#frmDocumento #resumen').val(),
    dedicatoria = $('#frmDocumento #dedicatoria').val(),
    presentacion_quote = $('#frmDocumento #presentacion_quote').val(),
    presentacion_detalle = $('#frmDocumento #presentacion_detalle').val(),
    capitulo_descripcion = $('#frmDocumento #capitulo_descripcion').val(),
    capitulo_cita = $('#frmDocumento #capitulo_cita').val(),
    preambulo_detalle = $('#frmDocumento #preambulo_detalle').val();
    if( Tipo == 1 ){
        //
        var arrBR = resumen.split("\n");
        resumen = arrBR.join('<br/>');
        $('#frmDocumento #resumen').val(resumen);
        // - //
        var arrBR = dedicatoria.split("\n");
        dedicatoria = arrBR.join('<br/>');
        $('#frmDocumento #dedicatoria').val(dedicatoria);
        // - //
        var arrBR = presentacion_quote.split("\n");
        presentacion_quote = arrBR.join('<br/>');
        $('#frmDocumento #presentacion_quote').val(presentacion_quote);
        // - //
        var arrBR = presentacion_detalle.split("\n");
        presentacion_detalle = arrBR.join('<br/>');
        $('#frmDocumento #presentacion_detalle').val(presentacion_detalle);
        // - //
        var arrBR = capitulo_descripcion.split("\n");
        capitulo_descripcion = arrBR.join('<br/>');
        $('#frmDocumento #capitulo_descripcion').val(capitulo_descripcion);
        // - //
        var arrBR = capitulo_cita.split("\n");
        capitulo_cita = arrBR.join('<br/>');
        $('#frmDocumento #capitulo_cita').val(capitulo_cita);
        // - //
        var arrBR = preambulo_detalle.split("\n");
        preambulo_detalle = arrBR.join('<br/>');
        $('#frmDocumento #preambulo_detalle').val(preambulo_detalle);
        // - //
    }else{
        var arrBR = resumen.split("<br/>");
        resumen = arrBR.join("\n");
        $('#frmDocumento #resumen').val(resumen);
        // - //
        var arrBR = dedicatoria.split("<br/>");
        dedicatoria = arrBR.join("\n");
        $('#frmDocumento #dedicatoria').val(dedicatoria);
        // - //
        var arrBR = presentacion_quote.split("<br/>");
        presentacion_quote = arrBR.join("\n");
        $('#frmDocumento #presentacion_quote').val(presentacion_quote);
        // - //
        var arrBR = presentacion_detalle.split("<br/>");
        presentacion_detalle = arrBR.join("\n");
        $('#frmDocumento #presentacion_detalle').val(presentacion_detalle);
        // - //
        var arrBR = capitulo_descripcion.split("<br/>");
        capitulo_descripcion = arrBR.join("\n");
        $('#frmDocumento #capitulo_descripcion').val(capitulo_descripcion);
        // - //
        var arrBR = capitulo_cita.split("<br/>");
        capitulo_cita = arrBR.join("\n");
        $('#frmDocumento #capitulo_cita').val(capitulo_cita);
        // - //
        var arrBR = preambulo_detalle.split("<br/>");
        preambulo_detalle = arrBR.join("\n");
        $('#frmDocumento #preambulo_detalle').val(preambulo_detalle);
        // - //
        
    }
}
/* ------------------------------------------------------------- */
function agregarGaleria01General()
{
    var _data = {
        '_token'    : $('meta[name="csrf-token"]').attr('content') ,
        'titulo'    : $('#mdlGaleriaGeneral #txtTitGal01G').val(),
        'descripcion': $('#mdlGaleriaGeneral #txtDescri1G').val(),
        'imagen'    : $('#mdlGaleriaGeneral #txtImagenGaleriaG').val(),
        'orden'     : $('#mdlGaleriaGeneral #orden3G').val(),
        'activo'    : 1,
        'tipo'      : 3,
        'token'     : $('#frmDocumento #uu_id').val(),
        'id_publicacion' : $('#frmDocumento #id').val(),
        'id'        : $('#mdlGaleriaGeneral #IdGaleriaG').val()
    };
    $('#mdlGaleriaGeneral .modal-body').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'galeria/publicacion', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                Swal.fire({
                icon: 'error',
                title: 'Revise lo siguiente...',
                text: `${$texto}`
                });
            break;
            case 'OK':
                Swal.fire(
                    'Correcto',
                    'Galeria general agregada',
                    'success'
                );
                var _id = $('#mdlGaleriaGeneral #IdGaleriaG').val();
                var _IdImg = parseInt( _data.id );
                if( _id == 0 ){
                    $('#mdlGaleriaGeneral #IdGaleriaG').val(0);
                    $('#mdlGaleriaGeneral #txtImagenGaleriaG').val('');
                    $('#mdlGaleriaGeneral #txtTitGal01G').val('');
                    $('#mdlGaleriaGeneral #orden3G').val('');
                    $('#mdlGaleriaGeneral #txtDescri1G').val('');
                    $('#mdlGaleriaGeneral #img09').attr('src','');
                    showoldupload9.reset();
                }else{
                    $('#mdlGaleriaGeneral #IdGaleriaG').val(json.item.id);
                }
                var $jsonData = populateGaleria01General( json.data );
                tblGaleriaGeneral.clear();
                tblGaleriaGeneral.rows.add($jsonData).draw();
            break;
        }
        $('#mdlGaleriaGeneral .modal-body').waitMe('hide');
    })
    .always(function() {
        $('#mdlGaleriaGeneral .modal-body').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function populateGaleria01General( json )
{
	//
	var $data = [], $CSGO = 1;
	if( json != undefined ){
		$.each( json , function( key, value ) {
			var $o = [];
			$o.push(value.orden);
            $o.push(`<a href="#" class=" cargarGaleGeneral " data-id="${value.id}" data-uuid="${value.uu_id}" >${value.titulo}</a>`);
            $o.push(`<button data-id="${value.id}" data-uuid="${value.uu_id}" data-nombre="${value.titulo}" type="button" class=" btnDelGaleria1General btn btn-block btn-danger btn-xs">Eliminar</button>`);
			//
			$data.push( $o );
			$CSGO++;
		});
	}
	//
	return $data;
}
/* ------------------------------------------------------------- */
function delGaleria01General( $uuid )
{
	var _data = {
        '_token' : $('meta[name="csrf-token"]').attr('content') ,
        'uuid'   : $uuid ,
        'slug'   : $('#frmDocumento #uu_id').val(),
        'publicacion_id' : $('#frmDocumento #id').val(),
        'tipo'      : 3,
    };
    $('#frmDocumento').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'del/galeria', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                    Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                Swal.fire(
                    'Correcto',
                    'Imagen eliminada',
                    'success'
                );
                var $jsonData = populateGaleria01( json.data );
                tblGaleriaGeneral.clear();
                tblGaleriaGeneral.rows.add($jsonData).draw();
            break;
        }
        $('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        $('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
function cargar_galeriaGeneral( Id )
{
    var _data = {
        '_token' : $('meta[name="csrf-token"]').attr('content') ,
        'id' : Id
    };
    $('#frmDocumento').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'get/galeria', _data , function(data, textStatus, xhr) {
        /*optional stuff to do after success */
    }, 'json')
    .fail(function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    })
    .done( function( json ) {
        switch(json.estado)
        {
            case 'ERROR':
                var $texto = '', $arError = [];
                $.each( json.errores , function( key, value ) {
                    $arError.push( value );
                });
                $texto = $arError.join(', ');
                Swal.fire({
                    icon: 'error',
                    title: 'Revise lo siguiente...',
                    text: `${$texto}`
                });
            break;
            case 'OK':
                // negocio...
                if( json.data != undefined ){
                    var rs = json.data;
                    $('#mdlGaleriaGeneral #IdGaleriaG').val( rs.id );
                    $('#mdlGaleriaGeneral #txtImagenGaleriaG').val( rs.imagen );
                    $('#mdlGaleriaGeneral #img09').attr( 'src', _URL_MEDIA+rs.imagen );
                    $('#mdlGaleriaGeneral #txtTitGal01G').val( rs.titulo );
                    $('#mdlGaleriaGeneral #txtDescri1G').val( rs.descripcion );
                    $('#mdlGaleriaGeneral #orden3G').val( rs.orden );
                    $('#mdlGaleriaGeneral').modal('show');
                }
            break;
        }
        $('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        $('#frmDocumento').waitMe('hide');
    });
}
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
</script>

@endsection
