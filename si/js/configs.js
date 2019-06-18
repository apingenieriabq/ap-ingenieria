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
    "buttons": [{
            extend: 'copy',
            className: 'btn btn-sm btn-outline-dark  ',
            text: '<i class="far fa-copy"></i>',
            titleAttr: 'Copiar todos los datos',
            init: function (api, node, config) {
                $(node).removeClass('dt-button')
            }
        }, {
            extend: 'excel',
            className: 'btn btn-sm btn-outline-java ',
            text: '<i class="far fa-file-excel"></i>',
            titleAttr: 'Exportar a EXCEL',
            init: function (api, node, config) {
                $(node).removeClass('dt-button')
            }
        }, {
            extend: 'pdf',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            className: 'btn btn-sm btn-outline-danger ',
            text: '<i class="far fa-file-pdf"></i>',
            titleAttr: 'Exportar a PDF',
            init: function (api, node, config) {
                $(node).removeClass('dt-button')
            }
//        }, {
//            extend: 'print',
//            className: 'btn btn-sm btn-royal-blue',
//            text: '<i class="fas fa-print"></i>',
        },
    ],
    "searching": true,
    "ordering": true,
    "scrollX": true,
    "scrollY": "360px",
    "scrollCollapse": true,
    "paging": false,
    "dom": '<"#botonera_sobreTablaAP.botonera"><"#botonera_exportarTablaAP.botonera" B >frtip ',
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
    "initComplete": function (settings) {
        // console.log(settings);
        desbloquearPantalla();
    },
    "drawCallback": function (settings) {
        desbloquearPantalla();
    },
});

$.fn.dataTable.ext.buttons.print = {
    extend: 'print',
    orientation: 'landscape',
    pageSize: 'LEGAL',
    className: 'btn btn-sm btn-royal-blue',
    text: '<i class="fas fa-print"></i>',
}


$.extend($.summernote.lang, {
    'es-ES': {
        font: {
            bold: 'Negrita',
            italic: 'Cursiva',
            underline: 'Subrayado',
            clear: 'Quitar estilo de fuente',
            height: 'Altura de línea',
            name: 'Fuente',
            strikethrough: 'Tachado',
            superscript: 'Superíndice',
            subscript: 'Subíndice',
            size: 'Tamaño de la fuente',
        },
        image: {
            image: 'Imagen',
            insert: 'Insertar imagen',
            resizeFull: 'Redimensionar a tamaño completo',
            resizeHalf: 'Redimensionar a la mitad',
            resizeQuarter: 'Redimensionar a un cuarto',
            floatLeft: 'Flotar a la izquierda',
            floatRight: 'Flotar a la derecha',
            floatNone: 'No flotar',
            shapeRounded: 'Forma: Redondeado',
            shapeCircle: 'Forma: Círculo',
            shapeThumbnail: 'Forma: Marco',
            shapeNone: 'Forma: Ninguna',
            dragImageHere: 'Arrastrar una imagen o texto aquí',
            dropImage: 'Suelta la imagen o texto',
            selectFromFiles: 'Seleccionar desde los archivos',
            maximumFileSize: 'Tamaño máximo del archivo',
            maximumFileSizeError: 'Has superado el tamaño máximo del archivo.',
            url: 'URL de la imagen',
            remove: 'Eliminar imagen',
            original: 'Original',
        },
        video: {
            video: 'Vídeo',
            videoLink: 'Link del vídeo',
            insert: 'Insertar vídeo',
            url: '¿URL del vídeo?',
            providers: '(YouTube, Vimeo, Vine, Instagram, DailyMotion o Youku)',
        },
        link: {
            link: 'Link',
            insert: 'Insertar link',
            unlink: 'Quitar link',
            edit: 'Editar',
            textToDisplay: 'Texto para mostrar',
            url: '¿Hacia que URL lleva el link?',
            openInNewWindow: 'Abrir en una nueva ventana',
        },
        table: {
            table: 'Tabla',
            addRowAbove: 'Añadir fila encima',
            addRowBelow: 'Añadir fila debajo',
            addColLeft: 'Añadir columna izquierda',
            addColRight: 'Añadir columna derecha',
            delRow: 'Borrar fila',
            delCol: 'Eliminar columna',
            delTable: 'Eliminar tabla',
        },
        hr: {
            insert: 'Insertar línea horizontal',
        },
        style: {
            style: 'Estilo',
            p: 'p',
            blockquote: 'Cita',
            pre: 'Código',
            h1: 'Título 1',
            h2: 'Título 2',
            h3: 'Título 3',
            h4: 'Título 4',
            h5: 'Título 5',
            h6: 'Título 6',
        },
        lists: {
            unordered: 'Lista desordenada',
            ordered: 'Lista ordenada',
        },
        options: {
            help: 'Ayuda',
            fullscreen: 'Pantalla completa',
            codeview: 'Ver código fuente',
        },
        paragraph: {
            paragraph: 'Párrafo',
            outdent: 'Menos tabulación',
            indent: 'Más tabulación',
            left: 'Alinear a la izquierda',
            center: 'Alinear al centro',
            right: 'Alinear a la derecha',
            justify: 'Justificar',
        },
        color: {
            recent: 'Último color',
            more: 'Más colores',
            background: 'Color de fondo',
            foreground: 'Color de fuente',
            transparent: 'Transparente',
            setTransparent: 'Establecer transparente',
            reset: 'Restaurar',
            resetToDefault: 'Restaurar por defecto',
        },
        shortcut: {
            shortcuts: 'Atajos de teclado',
            close: 'Cerrar',
            textFormatting: 'Formato de texto',
            action: 'Acción',
            paragraphFormatting: 'Formato de párrafo',
            documentStyle: 'Estilo de documento',
            extraKeys: 'Teclas adicionales',
        },
        help: {
            'insertParagraph': 'Insertar párrafo',
            'undo': 'Deshacer última acción',
            'redo': 'Rehacer última acción',
            'tab': 'Tabular',
            'untab': 'Eliminar tabulación',
            'bold': 'Establecer estilo negrita',
            'italic': 'Establecer estilo cursiva',
            'underline': 'Establecer estilo subrayado',
            'strikethrough': 'Establecer estilo tachado',
            'removeFormat': 'Limpiar estilo',
            'justifyLeft': 'Alinear a la izquierda',
            'justifyCenter': 'Alinear al centro',
            'justifyRight': 'Alinear a la derecha',
            'justifyFull': 'Justificar',
            'insertUnorderedList': 'Insertar lista desordenada',
            'insertOrderedList': 'Insertar lista ordenada',
            'outdent': 'Reducir tabulación del párrafo',
            'indent': 'Aumentar tabulación del párrafo',
            'formatPara': 'Cambiar estilo del bloque a párrafo (etiqueta P)',
            'formatH1': 'Cambiar estilo del bloque a H1',
            'formatH2': 'Cambiar estilo del bloque a H2',
            'formatH3': 'Cambiar estilo del bloque a H3',
            'formatH4': 'Cambiar estilo del bloque a H4',
            'formatH5': 'Cambiar estilo del bloque a H5',
            'formatH6': 'Cambiar estilo del bloque a H6',
            'insertHorizontalRule': 'Insertar línea horizontal',
            'linkDialog.show': 'Mostrar panel enlaces',
        },
        history: {
            undo: 'Deshacer',
            redo: 'Rehacer',
        },
        specialChar: {
            specialChar: 'CARACTERES ESPECIALES',
            select: 'Selecciona Caracteres especiales',
        }
    },
});


