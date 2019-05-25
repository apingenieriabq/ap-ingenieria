/*
 * Copyright 2017-09-08  Cámara de Comercio de Santa Marta para el Magdalena.
 * Autor: Juan Pablo Llinás Ramírez <jpllinas@ccsm.org.co at www.ccsm.org.co>.
 * Autor: Luis Montoya <lmontoya@ccsm.org.co at www.ccsm.org.co>.
 * Archivo: function.
 *
 * Licenciado bajo la Licencia Apache, VersiÃ³n 2.0;
 * Usted no puede usar este archivo excepto en conformidad con la Licencia.
 * Usted puede obtener una copia de la Licencia en
 *
 *   	http://www.apache.org/licenses/LICENSE-2.0
 *
 * A menos que sea requerido por la ley aplicable o acordado por escrito, el software
 * Distribuido bajo la licencia se distribuye en una "AS IS" o  "COMO ESTA" BASE,
 * Consulte la Licencia para los permisos y Limitaciones bajo la Licencia.
 */
var modo_pruebas = true;
function isJson(data) {
    try {
        JSON.parse(data);
    }
    catch (e) {
        return false;
    }
    return true;
}
function crearFormData(idElementoForm) {
    var formElement = document.getElementById(idElementoForm);
    var formdata = new FormData(formElement);
    // for (var key of formdata.entries()) {
    //     console.log(key[0] + ', ' + key[1]);
    // }
    return formdata;
}
function activarPlugins() {
    $("form").attr('onsubmit', 'return false;');
}



function cargarModal(tituloModal, modulo, operacion, datos = '', funcionEjecutable = function(){}) {
    bloquearPantalla();
    var datosOperacion = "modulo=" + modulo +  "&operacion=" + operacion + "&" + datos;
    ajaxApi(datosOperacion, function(data) {
        bloquearPantalla();
        if (funcionEjecutable) {
            funcionEjecutable(data);
        }
        crearModalVista(tituloModal, data);
        desbloquearPantalla();
    });
}

function crearModalVista(tituloModal, dataHTML){
    var idModal = crearHASH();

    var html =  '<div id="modal_'+idModal+'"  class="modal" tabindex="-1" role="dialog">';
        html += '<div class="modal-dialog modal-lg modal-dialog-centered" role="document">';
            html += '<div class="modal-content">';
                html += '<div class="modal-header">';
                    html += '<h5 class="modal-title">'+tituloModal+'</h5>';
                    html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>';
                html += '</div>';
                html += '<div class="modal-body">';
                    html += dataHTML;
                html += '</div>';
                // html += '<div class="modal-footer">';
                //     html += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                //     html += '<button type="button" class="btn btn-primary">Save changes</button>';
                // html += '</div>';
            html += '</div>';
        html += '</div>';
    html += '</div>';  // modalWindow

    $("#area-modales").html(html);
    $('#modal_'+idModal+'').modal();
}



function cargarVista(modulo, operacion, datos = '', nombreTabMenu = '', idTabMenu = '') {
    bloquearPantalla();
    var datosOperacion = "modulo=" + modulo + "&operacion=" + operacion + "&" + datos;
    ajaxApi(datosOperacion, function(dataVISTA) {
        if (isJson(dataVISTA)) {
            bloquearPantalla();
            controlRespuesta(dataVISTA);
            desbloquearPantalla();
        }
        else {
            bloquearPantalla();
            cargaHTMLVistaAreaPlantilla(modulo, operacion, dataVISTA);
            irArriba();
            desbloquearPantalla();
        }
    });
}

function cargaHTMLVistaAreaPlantilla(modulo, operacion, htmlVISTA, nombreTabMenu = '', idTabMenu = '') {
    bloquearPantalla();
    // ejecutarOperacion("seguridad", "datosOperacion", "modulo=" + modulo + "&operacion=" + operacion, function(datos) {

        // crearTabs(
        //   '<i class="' + datos.Operacion.operacionMENUICONO + ' fa-xs" aria-hidden="true"></i> ' +
        //   datos.Operacion.operacionNOMBRETAB + '' + nombreTabMenu,
        //   (datos.Operacion.operacionCODIGO + "" + idTabMenu).toLowerCase(),
        //   htmlVISTA
        // );
        // activarPlugins();
        $("#contenido-vista" ).html(htmlVISTA);

        desbloquearPantalla();
    // });
}

function crearTabs(nameTabMenu, idTabMenu, html) {
    // if (!$("#" + idTabMenu).length) {
        $("#contenido-vista" ).html(html);
    // } else {
    // }
}




function cargandoDivision(idDivision) {
    var top = $("#"+idDivision).css('top');
    var left = $("#"+idDivision).css('left');
    var width = $("#"+idDivision).css('width');
    var height = $("#"+idDivision).css('height');

    $("#" + idDivision).append('<div id="' + idDivision + '-load" class="cargando-division" style="z-index: ' + (zIndex() - 1) + ';position: absolute; top:' + top +'; left: ' + left +'; min-width: 100%; min-height:120px; width: ' + width +'; height: ' + height +';background: rgba(255,255,255,0.7);border-radius: 3px;" ><i class="fa fa-cog fa-spin" style="position: absolute; top: 50%; left: 50%; margin-left: -15px; margin-top: -15px; color: #000; font-size: 30px;"></i><div style="clear:both;" ></div></div>');
}

function quitarCargandoDivision(idDivision) {
    $('#' + idDivision + '-load').remove();
}

function cargarDivision(idDivision, modulo, operacion, datos, functionEjecutable = function(){}) {
    cargandoDivision(idDivision);
    var datosOperacion = "modulo=" + modulo + "&operacion=" + operacion + "&" + datos;
    ajaxApi(datosOperacion, function(data) {
        $("#" + idDivision).html(data);
        if (functionEjecutable != null) {
            functionEjecutable(data);
        }
        activarPlugins();
        // quitarCargandoDivision(idDivision);
    });
}

// function ejecutarOperacionEnDivision(idDivision, modulo, controlador, operacion, datos, funcionEjecutable = null, bloquear = true) {
//     cargandoDivision(idDivision);
//     var datosOperacion = "modulo=" + modulo + "&controlador=" + controlador + "&operacion=" + operacion + "&" + datos;
//     ajaxApi(datosOperacion, function(data) {
//         controlRespuesta(data, funcionEjecutable);
//         quitarCargandoDivision(idDivision);
//     });
// }









function ejecutarOperacion(modulo, operacion, datos, funcionEjecutable = function(){}, bloquear = true) {
    bloquearPantalla();
    var datosOperacion = "modulo=" + modulo + "&operacion=" + operacion + "&" + datos;
    if (modo_pruebas) console.log('%c Datos Enviados____', 'color: #bada55;  font-size:120%;');
    if (modo_pruebas){
        console.log(datosOperacion);
    }
    ajaxApi(datosOperacion, function(data) {
        bloquearPantalla();
        controlRespuesta(data, funcionEjecutable);
        desbloquearPantalla();
    });
}

function ejecutarOperacionFormData(modulo, operacion, formData, funcionEjecutable = function(){}) {
    bloquearPantalla();
    formData.append("modulo", modulo);
    formData.append("operacion", operacion);

    if (modo_pruebas) console.log('%c Datos Enviados____', 'color: #bada55;  font-size:120%;');
    if (modo_pruebas){
        console.log(formData);
        for (var key of formData.entries()) {
            console.log(key[0] + ', ' + key[1]);
        }
    }

    ajaxApi(formData, function(data) {
        controlRespuesta(data, funcionEjecutable);
        desbloquearPantalla();
    }, false, false);
//     $.ajax({
//         url: '/api.php',
//         type: 'post',
//         dataType: "html",
//         data: formData,
//         cache: false,
//         contentType: false,
//         processData: false
//     }).done(function(response) {
//         //console.log(response);
//         functionEjecutable(response);
//     });
}

function ejecutarOperacionArchivo(modulo, operacion, archivoFormData, funcionEjecutable = function(){}) {
    bloquearPantalla();
    archivoFormData.append("modulo", modulo);
    archivoFormData.append("operacion", operacion);
    ajaxApi(archivoFormData, function(data) {
        controlRespuesta(data, funcionEjecutable);
        desbloquearPantalla();
    }, false, false);
}





function ajaxApi(datosOperacion, funcionEjecutable, procesarDatos = false, tipoContenidoEnviado = 'application/x-www-form-urlencoded; charset=UTF-8') {


    $.ajax({
        type: 'POST',
        url: 'index.php',
        cache: false,
        contentType: tipoContenidoEnviado,
        processData: procesarDatos,
        data: datosOperacion,
        success: function(response) {
          if(typeof funcionEjecutable === 'function') { funcionEjecutable(response); }
        },
        error: function(error) {
            alertaError("Ocurrio un error en la comunicacion con el sistema.\r\n Contacte con el Centro TICS.");
            console.log(error);
            desbloquearPantalla();
            //quitarCargandoDivision(idDivision);
        }
    });
}

function controlRespuesta(data, funcionEjecutable = function(){}) {
    if (isJson(data)) {
        var response = JSON.parse(data);
        if (modo_pruebas) console.log('%c Datos Recibidos____', 'color: #F00; font-size:120%;');
        if (modo_pruebas) console.log(response);
        switch (response.RESPUESTA) {
            case 'EXITO':
                if (response.MENSAJE != null && response.MENSAJE != "") {
                    alertaExito(response.MENSAJE);
                }
                if (funcionEjecutable != null) {
                    funcionEjecutable(response.DATOS);
                }
                break;
            case 'ERROR':
                alertaError(response.MENSAJE);
                break;
            case 'FALLO':
                alerta(response.MENSAJE);
                break;
            case 'ALERTA':
                alerta(response.MENSAJE);
                if (funcionEjecutable != null) {
                    funcionEjecutable(response.DATOS);
                }
                break;
            case 'INFO':
                alertaInformacion(response.MENSAJE);
                if (funcionEjecutable != null) {
                    funcionEjecutable(response.DATOS);
                }
                break;
        }
    }
    else {
        var txtMsn = "La respuesta de la operacion, no cumple con el formato esperado.<br />Contacta con el Centro TICS. <em>SOLO PARA EL CENTRO TICS: [Verfica en la consola los datos del error]</em>.";
        alertaError(txtMsn);
        console.log(data);
    }
}

















// function cargarModal(modulo, operacion, datos = '', funcionEjecutable = null) {
//     bloquearPantalla();
//     var datosOperacion = "modulo=" + modulo + "&controlador=" + controlador + "&operacion=" + operacion + "&" + datos;
//     ajaxApi(datosOperacion, function(data) {
//         bloquearPantalla();
//         $("#area-modales").html(data);
//         if (funcionEjecutable) {
//             funcionEjecutable(data);
//         }
//         desbloquearPantalla();
//     });
// }

// function ejecutarOperacionOculta(modulo, controlador, operacion, datos, funcionEjecutable = null) {
//     var datosOperacion = "modulo=" + modulo + "&controlador=" + controlador + "&operacion=" + operacion + "&" + datos;
//     ajaxApi(datosOperacion, function(data) {
//         controlRespuesta(data, funcionEjecutable);
//     });
// }

// function ejecutarOperacionPersonalizada(modulo, operacion, datos, funcionEjecutable = null) {
//     var datosOperacion = "modulo=" + modulo +  "&operacion=" + operacion + "&" + datos;
//     ajaxApi(datosOperacion, function(data) {
//         funcionEjecutable(data);
//     });
// }

// function ejecutarOperacionArchivo(modulo, operacion, formData, funcionEjecutable) {
//     bloquearPantalla();
//     formData.append("modulo", modulo);
//     formData.append("operacion", operacion);
//     ajaxApi(formData, function(data) {
//         controlRespuesta(data, funcionEjecutable);
//         desbloquearPantalla();
//     }, false, false);
// }


// function activarInactividad() {
//     ejecutarOperacion('usuarios', 'Sesion', 'activarInactividad', null, function(data) {
//         //actualizarNavagador();
//         localStorage.setItem("BLOQUEO_INACTIVIDAD", true);
//         //console.log("No se puede recargar porque se pierde el trabajo en memoria.\r\nPor ahora solo bloquer la pantalla como cuando se carga una vista.");
//     });
// }

// function controlVista(modulo, controlador, operacion, datos, idDivision = null, functionEjecutable = null) {
//     if (idDivision == null) {
//         cargarVista(modulo, controlador, operacion, datos);
//     }
//     else {
//         cargarDivisionSicam(idDivision, modulo, controlador, operacion, datos, functionEjecutable);
//     }
// }

// function ejecutarOperacionHTML(modulo, controlador, operacion, datos, funcionEjecutable = null, bloquear = true) {
//     bloquearPantalla();
//     var datosOperacion = "modulo=" + modulo + "&controlador=" + controlador + "&operacion=" + operacion + "&" + datos;
//     ajaxApi(datosOperacion, function(data) {
//         funcionEjecutable(data);
//         desbloquearPantalla();
//     });
// }

// function ejecutarOperacionOcultaJSON(controlador, operacion, datos, functionEjecutable) {
//     var datosOperacion = "controlador=" + controlador + "&operacion=" + operacion + "&" + datos;
//     $.post("/api.php", datosOperacion, function(data) {
//         //console.log(data);
//         if (esJson(data)) {
//             datos = JSON.parse(data);
//             functionEjecutable(datos);
//         }
//         else {
//             console.log('Hubo un problema con la operación. Por favor, contacte con el Centro de Servicios TICS.');
//             console.log(datos);
//         }
//     });
// }

// function ejecutarOperacionJSON(controlador, operacion, datos = null, functionEjecutable = null) {
//     var datosOperacion = "controlador=" + controlador + "&operacion=" + operacion + "&" + datos;
//     bloquearPantalla();
//     $.post("/api.php", datosOperacion, function(data) {
//         //alert(data);
//         //console.log(data);
//         if (esJson(data)) {
//             datos = JSON.parse(data);
//             functionEjecutable(datos);
//             desbloquearPantalla();
//         }
//         else {
//             console.log('Hubo un problema con la operación. Por favor, contacte con el Centro de Servicios TICS.');
//             console.log(data);
//             desbloquearPantalla();
//         }
//     });
// }

// function ejecutarOperacionFormData(formData, functionEjecutable) {
//     $.ajax({
//         url: '/api.php',
//         type: 'post',
//         dataType: "html",
//         data: formData,
//         cache: false,
//         contentType: false,
//         processData: false
//     }).done(function(response) {
//         //console.log(response);
//         functionEjecutable(response);
//     });
// }

// function popUp(mypage, myname, w, h, scroll, pos) {
//     if (pos == "random") {
//         LeftPosition = (screen.width) ? Math.floor(Math.random() * (screen.width - w)) : 100;
//         TopPosition = (screen.height) ? Math.floor(Math.random() * ((screen.height - h) - 75)) : 100;
//     }
//     if (pos == "center") {
//         LeftPosition = (screen.width) ? (screen.width - w) / 2 : 100;
//         TopPosition = (screen.height) ? (screen.height - h) / 2 : 100;
//     }
//     else if ((pos != "center" && pos != "random") || pos == null) {
//         LeftPosition = 0;
//         TopPosition = 20
//     }
//     settings = 'width=' + w + ',height=' + h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
//     win = window.open(mypage, myname, settings);
// }



// function cargandoDivision(idDivision) {
//     $('<div id="' + idDivision + '-load" class="cargando-division" style="z-index: ' + (zIndex() - 1) + ';" ><i class="fa fa-refresh fa-spin"></i></div>').insertAfter("#" + idDivision);
// }

// function quitarCargandoDivision(idDivision) {
//     $('#' + idDivision + '-load').remove();
// }

// function cargarDivisionSicam(idDivision, modulo, controlador, operacion, datos, functionEjecutable = null) {
//     cargandoDivision(idDivision);
//     var datosOperacion = "modulo=" + modulo + "&controlador=" + controlador + "&operacion=" + operacion + "&" + datos;
//     ajaxApi(datosOperacion, function(data) {
//         $("#" + idDivision).html(data);
//         if (functionEjecutable != null) {
//             functionEjecutable(data);
//         }
//         activarPlugins();
//         quitarCargandoDivision(idDivision);
//     });
// }

// function cargarDivision(idDivision, modulo, controlador, operacion, datos, functionEjecutable = null) {
//     cargandoDivision(idDivision);
//     var datosOperacion = "modulo=" + modulo + "&controlador=" + controlador + "&operacion=" + operacion + "&" + datos;
//     ajaxApi(datosOperacion, function(data) {
//         $("#" + idDivision).html(data);
//         if (functionEjecutable != null) {
//             functionEjecutable(data);
//         }
//         activarPlugins();
//         quitarCargandoDivision(idDivision);
//     });
// }

// function ejecutarOperacionEnDivision(idDivision, modulo, controlador, operacion, datos, funcionEjecutable = null, bloquear = true) {
//     cargandoDivision(idDivision);
//     var datosOperacion = "modulo=" + modulo + "&controlador=" + controlador + "&operacion=" + operacion + "&" + datos;
//     ajaxApi(datosOperacion, function(data) {
//         controlRespuesta(data, funcionEjecutable);
//         quitarCargandoDivision(idDivision);
//     });
// }




// // function encriptarDatosUsuario() {

// //   var txtUsuario = document.getElementById("nombre_usuario").value.trim();
// //   var txtClave = document.getElementById("clave_usuario").value.trim();
// //   if (txtClave != "") {
// //     var encryptedpassword = btoa(txtClave);
// //     document.getElementById("clave_usuario").value = encryptedpassword;
// //   }
// // }
// function ejecutarOperacion(modulo, operacion, datos, functionDespuesEnvio){
//   bloquearPantalla();
//   if(datos === null){
//     datos = new FormData();
//   }
//   datos.append('modulo', modulo);
//   datos.append('operacion', operacion);
//   traerDatosJSON(datos, function(respuesta){
//     functionDespuesEnvio(respuesta);
//     desbloquearPantalla();
//   }, function(error){
//     //alert('error' + error);
//     desbloquearPantalla();
//   });
// }
// function traerDatosJSON(  datosFormulario = null , functionExito = null , functionError = null ){
//   fetch('index.php', {
//   	method: 'post',
//   	body: datosFormulario
//   }).then(function(response) {
//     return response.json();
//   }).then(function(objJSON) {
//   	console.log(objJSON);
//   	switch (objJSON.RESPUESTA) {
//   	  case 'EXITO':
//         if (typeof functionExito === 'function') {
//           functionExito(objJSON);
//         }
//   	    break;
//   	  case 'FALLO':
//         alerta(objJSON.MENSAJE);
//   	    break;
//   	}
//     desbloquearPantalla();
//   	return objJSON;
//   }).catch(function(ERROR) {
//     console.log(ERROR);
//     if (typeof functionError === 'function') {
//       functionError(ERROR);
//     }
//   });
// }


// // function cargarVista(modulo, operacion){
// //   bloquearPantalla();
// //   var datos = new FormData();
// //   datos.append('modulo', modulo);
// //   datos.append('operacion', operacion);
// //   traerVistaHTML(datos, function(respuesta){
// //     document.getElementById('contenido-vista').innerHTML = respuesta;
// //     desbloquearPantalla();
// //   }, function(error){
// //     //alert('error' + error);
// //     desbloquearPantalla();
// //   });
// // }

// function cargarVista(modulo, controlador, operacion, datos = '', nombreTabMenu = '', idTabMenu = '') {
//     bloquearPantalla();
//     var datosOperacion = "modulo=" + modulo + "&controlador=" + controlador + "&operacion=" + operacion + "&" + datos;
//     ajaxApi(datosOperacion, function(dataVISTA) {
//         if (isJson(dataVISTA)) {
//             bloquearPantalla();
//             controlRespuesta(dataVISTA);
//             desbloquearPantalla();
//         }
//         else {
//             cargaHTMLVistaAreaPlantilla(modulo, controlador, operacion, dataVISTA);
//             irArriba();
//         }
//     });
// }

// function cargaHTMLVistaAreaPlantilla(modulo, controlador, operacion, htmlVISTA, nombreTabMenu = '', idTabMenu = '') {
//     bloquearPantalla();
//     ejecutarOperacion("sistema", "OperacionesSistema", "datosParaTab", "operacionmodulo=" + modulo + "&operacionControlador=" + controlador + "&operacionOperacion=" + operacion, function(datos) {
//         bloquearPantalla();
//         cambiarTITULO('' + datos.Operacion.operacionNOMBRETAB + ' :: ' + datos.Operacion.controladorTITULO + ' / ' + datos.Operacion.moduloTITULO);
//         crearTabs('<i class="' + datos.Operacion.operacionMENUICONO + ' fa-xs" aria-hidden="true"></i> ' + datos.Operacion.operacionNOMBRETAB + '' + nombreTabMenu, (datos.Operacion.operacionCODIGO + "" + idTabMenu).toLowerCase(), htmlVISTA);
//         activarPlugins();
//         desbloquearPantalla();
//     });
// }

// function cargandoDivision(idDivision) {
//     $('<div id="' + idDivision + '-load" class="cargando-division" style="z-index: ' + (zIndex() - 1) + ';" ><i class="fa fa-refresh fa-spin"></i></div>').insertAfter("#" + idDivision);
// }

// function quitarCargandoDivision(idDivision) {
//     $('#' + idDivision + '-load').remove();
// }





// function ejecutarOperacionHTML(modulo, operacion, datos, functionDespuesEnvio){
//   bloquearPantalla();
//   if(datos === null){
//     datos = new FormData();
//   }
//   datos.append('modulo', modulo);
//   datos.append('operacion', operacion);
//   traerVistaHTML(datos, function(respuesta){
//     functionDespuesEnvio(respuesta);
//     desbloquearPantalla();
//   }, function(error){
//     //alert('error' + error);
//     desbloquearPantalla();
//   });
// }

// function traerVistaHTML(  datosFormulario = null , functionExito = null , functionError = null ){

// $.ajax({
//         url: 'index.php',
//         type: 'post',
//         dataType: "html",
//         data: datosFormulario,
//         cache: false,
//         contentType: false,
//         processData: false
//     }).done(function(response) {
//         //console.log(response);
//         if(typeof functionExito === 'function') {
//           functionExito(response);
//         }
//         // functionEjecutable(response);
//     }).fail(function() {
//     alert( "error" );
//   })
//   .always(function() {
//     // alert( "finished" );
//   });

//   // fetch('index.php', {
//   // 	method: 'post',
//   // 	body: datosFormulario
//   // }).then((resp)=>{ return resp.text() }).then((text)=>{
//   //   // console.log(text)
//   //   if(typeof functionExito === 'function') {
//   //     functionExito(text);
//   //   }
//   //   return text;
//   // }).catch(function(ERROR) {
//   //   console.log(ERROR);
//   //   if (typeof functionError === 'function') {
//   //     functionError(ERROR);
//   //   }
//   // });




//   // then(function(response) {
//   //   console.log("      1      ");
//   //   console.log(response);
//   //   console.log("      2             ");
//   //   console.log(response.text());
//   //     return response.text();
//   // }).then(function(texto) {
//   //   if (typeof functionExito === 'function') {
//   //     functionExito(texto);
//   //   }
//   //   return texto;
//   // }).catch(function(ERROR) {
//   //   console.log(ERROR);
//   //   if (typeof functionError === 'function') {
//   //     functionError(ERROR);
//   //   }
//   // });
// }

