Dropzone.prototype.defaultOptions.dictDefaultMessage = "Arrastra y Tira aquí tus archivos";
Dropzone.prototype.defaultOptions.dictFallbackMessage = "Su navegador no admite la carga de archivos con arrastrar y soltar.";
Dropzone.prototype.defaultOptions.dictFallbackText = "Utilice el formulario de reserva a continuación para cargar sus archivos como en los días anteriores.";
Dropzone.prototype.defaultOptions.dictFileTooBig = "El archivo es demasiado grande ({{filesize}} MiB). Tamaño máximo de archivo: {{maxFilesize}} MiB.";
Dropzone.prototype.defaultOptions.dictInvalidFileType = "No puedes subir archivos de este tipo.";
Dropzone.prototype.defaultOptions.dictResponseError = "El servidor respondió con el código {{statusCode}}.";
Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancelar carga";
Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "¿Estás seguro de que quieres cancelar esta carga?";
Dropzone.prototype.defaultOptions.dictRemoveFile = "Remover archivo";
Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "No puedes subir más archivos.";

Dropzone.prototype.defaultOptions.addRemoveLinks = true;
Dropzone.prototype.defaultOptions.method = "POST";
Dropzone.prototype.defaultOptions.url = "index.php";





$.extend(true, $.fn.dataTable.defaults, {
  "buttons": ['copy', 'excel', 'pdf'],
  "searching": true,
  "ordering": true,
  "scrollX": true,
  "scrollY": "360px",
  "scrollCollapse": true,
  "paging": false,

  "dom": '<"#botonera_sobreTablaAP.botonera">frtip',

  "language": {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst": "Primero",
      "sLast": "Último",
      "sNext": "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  },
  "preDrawCallback": function (settings) {
    bloquearPantalla();
    // console.log(settings);
  },
  "initComplete": function( settings ) {
    // console.log(settings);
    desbloquearPantalla();
  },
  "drawCallback": function( settings ) {
    desbloquearPantalla();
    },
});
