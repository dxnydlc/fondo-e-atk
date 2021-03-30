
@extends('layouts.principal')


@section('titulo')
Noticias
@endsection



@section('losCSS')

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
        <h1 class="m-0">Noticias</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item" >
            <a href="{{ url('home') }}" >Inicio</a>
          </li>
          <li class="breadcrumb-item active">Noticias</li>
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
    <h3 class="card-title">
      Contenido de la base de datos
    </h3>
    <div class="card-tools">
      <ul class="nav nav-pills ml-auto" >
        <li class="nav-item">
          <a class="nav-link active" href="#tabHome" data-toggle="tab">Búsqueda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tabDoc" data-toggle="tab">.</a>
        </li>
        <li>
          <a id="btnCrear" href="#" class="btn btn-default float-right " data-id="0" >
          <i class="icofont-plus"></i> Crear nuevo
        </a>
        </li>
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
      <div class=" col-lg-12 col-md-12 " >
        <div class="card">
          <div class="card-body">
            <h4 class="box-title">Resultado</h4>
            <hr>
            <table class=" table table-striped table-no-bordered table-hover " id="wrapperTable" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Fecha</th>
                  <th>Destacado</th>
                  <th>Estado</th>
                  <th>Creado</th>
                  <th></th>
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
        @include('noticias.frmNoti')
        <!-- /Formulario -->
    </div>
</div>






</section>

  

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




<script type="text/javascript">
/* ------------------------------------------------------------- */
var table;
/* ------------------------------------------------------------- */
var uploadObj,uploadObj2,uploadObj3;
/* ------------------------------------------------------------- */
var CKEDITOR, contenido;
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
//
(function($){
	$(document).ready(function()
		{
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
            $("#frmDocumento #destacado").prop("checked", false);
            $('a[href="#tabDoc"]').tab('show');
            $('#frmDocumento textarea').each(function(e){
                $(this).val('');
            });
            $('#frmDocumento input[type="hidden"]').each(function(e){
                $(this).val('');
            });
            $('#frmDocumento input[type="text"]').each(function(e){
                $(this).val('');
            });
            $('#frmDocumento input[type="number"]').each(function(e){
                $(this).val('0');
            });
            $('#frmDocumento #img01').attr('src','');
            $('#frmDocumento #img02').attr('src','');
            $('#frmDocumento #img03').attr('src','');
            renovarToken();
        });
        /* ------------------------------------------------------------- */
        contenido = CKEDITOR.replace( 'contenido',{
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
        /* ------------------------------------------------------------- */
        getAll();
        cargarCategorias();
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
                confirmButtonText: 'Yes, delete it!'
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
        var $eventcategoria = $('#frmDocumento #categoria').select2({
            width : '100%'
        });
        /* ------------------------------------------------------------- */
        $eventcategoria.on("select2:select", function (e) { 
            var Texto = e.params.data.text;
        });
        /* ------------------------------------------------------------- */
        uploadObj = $("#showoldupload").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/noticias/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            maxFileCount    : 1,
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
            console.log( files, data );
            uploadObj.reset();
            var $n = files.responses.length - 1;
            var  json = files.responses[$n];
            console.log(json);
            $('#frmDocumento #img01').attr('src',json.url);
            $('#frmDocumento #imagen_portada').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        uploadObj2 = $("#showoldupload2").uploadFile({
            url             :  _URL_HOME+ 'adjuntar/noticias/' ,
            dragDrop        : true,
            fileName        : "formData",
            formData: {     '_token'  : $('meta[name="csrf-token"]').attr('content') , 'token' : _SessionToken } ,
            returnType      : "json",
            showDelete      : true,
            statusBarWidth  : 500,
            dragdropWidth   : 500,
            maxFileSize     : 20000*1024,
            showPreview     : true,
            maxFileCount    : 1,
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
            console.log( files, data );
            uploadObj2.reset();
            var $n = files.responses.length - 1;
            var  json = files.responses[$n];
            console.log(json);
            $('#frmDocumento #img02').attr('src',json.url);
            $('#frmDocumento #imagen_detalle').val(json.archivo);
            }
        });
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
        /* ------------------------------------------------------------- */
	});

})(jQuery);
/* ------------------------------------------------------------- */
function getAll()
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
    $.post( _URL_HOME + 'listar/noticias/', _data , function(data, textStatus, xhr) {
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
        $('#frmDocumento').waitMe('hide');
    })
    .always(function() {
        $('#frmDocumento').waitMe('hide');
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
            $o.push(`<a href="#" data-id="${value.id}" data-uuid="${value.uu_id}" class=" openDoc " >${value.titular}</a>`);
            var $fecha = moment( value.publicacion ).format('DD/MM/YYYY');
            $o.push($fecha);
            var destacado = parseInt( value.destacado );
            if( destacado == 1 ){
                $o.push(`SI`);
            }else{
                $o.push(`NO`);
            }
            //
            var $fecha = moment( value.created_at ).format('DD/MM/YYYY h:mm a');

            if( value.activo == 1 ){
                $o.push(`<span class="badge bg-green">Activo</span>`);
                $o.push($fecha);
                $o.push(`<button data-id="${value.id}" data-nombre="${value.titular}" data-uuid="${value.uu_id}" type="button" class=" delData btn btn-block btn-danger btn-xs">Anular</button>`);
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
    $.post( _URL_HOME + 'actualizar/noticias/'+$uuid , _data , function(data, textStatus, xhr) {
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
                'Banner anulado correctamente',
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
    // Cargando los textarea
    var scontenido = CKEDITOR.instances.contenido.getData();
    $('#frmDocumento #contenido').val(scontenido);
    //
    var url = `${_URL_HOME}guardar/noticias`;
    var _dataSerializada = $('#frmDocumento').serialize();
    var Id = parseInt( $('#frmDocumento #id').val() ),uu_id = $('#frmDocumento #uu_id').val()
    if( Id > 0 ){
        url = `${_URL_HOME}guardar/noticias/${uu_id}`;
    }
    var _token = $('meta[name="csrf-token"]').attr('content');
    $('#frmDocumento input[name="_token"]').val(_token)
    var _data = $('#frmDocumento').serialize();
    $('#frmDocumento').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
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
            Swal.fire(
                'Correcto',
                'Datos guardados correctamente',
                'success'
            );
            $('#frmDocumento #id').val( json.data.id );
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
    $("#frmDocumento #destacado").prop("checked", false);
    $.post( _URL_HOME+'cargar/noticias/'+uuid, _data , function(data, textStatus, xhr) {
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
                    $.each( json.data , function( key, value ) {
                        $('#frmDocumento #'+key).val(value);
                    });
                    // check
                    var destacado = parseInt( json.data.destacado );
                    if( destacado == 1 ){
                        $("#frmDocumento #destacado").prop("checked", true);  
                    }
                    // Editores
                    CKEDITOR.instances.contenido.setData(json.data.contenido);
                    $('#frmDocumento #img01').attr('src',_URL_MEDIA+json.data.imagen_portada);
                    $('#frmDocumento #img02').attr('src',_URL_MEDIA+json.data.imagen_detalle);
                    $('#frmDocumento #categoria').trigger('change');
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
        url     : `${_URL_NODE3}/api/noticias/buscar`,
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
function cargarCategorias()
{
    var _data = { 
        '_token' : $('meta[name="csrf-token"]').attr('content')
    };
    $('#frmDocumento').waitMe({
        effect  : 'facebook',
        text    : 'Espere...',
        bg      : 'rgba(255,255,255,0.7)',
        color   : '#146436',fontSize:'20px',textPos : 'vertical',
        onClose : function() {}
    });
    $.post( _URL_HOME + 'listar/categorias/', _data , function(data, textStatus, xhr) {
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
                    var _html = '<option value="" >Todos</option>';
                    $.each( json.data , function( key, value ) {
                        _html += '<option value="'+value.id+'" >'+value.nombre+'</option>'; 
                    });
                    $('#categoria').html( _html );
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
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
/* ------------------------------------------------------------- */
</script>

@endsection