var __BLOQUEO_RECARGAR_SALIR = true;

function bloquearSalidaSistema() {
    window.onbeforeunload = function() {
        if (__BLOQUEO_RECARGAR_SALIR) {
            return 'Esta Saliendo de SICAM32';
        }
    };
}

function desbloquearSalidaSistema() {
    __BLOQUEO_RECARGAR_SALIR = false;
}
//Guarda una COOKIE en el navegador del usuario
function cocinarGalleta(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
//Lee la COOKIE del navegador del usuario
function comerGalleta(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
//Borrar una COOKIE en el navegador del usuario
function borrarGalleta(cname) {
    var d = new Date();
    d.setTime(0);
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=;" + expires + ";path=/";
}
//Guarda en el LocalStorage del NAvegador
function guardarEnNavegador(nombreVariable, valorVariable) {
    if (window.localStorage) {
        return localStorage.setItem(nombreVariable, valorVariable);
    }
    else {
        alert("no se pudo guardar en el navegador")
    }
}
//Saca el Valor guardado en el LocalStorage del NAvegador
function valorEnNavegador(nombreVariable) {
    if (window.localStorage) {
        return localStorage.getItem(nombreVariable);
    }
    else {
        alert("no se pudo guardar en el navegador")
    }
}
//borrar una valiablre del LocalStorage del NAvegador
function borrarValorEnNavegador(nombreVariable) {
    if (window.localStorage) {
        return localStorage.removeItem(nombreVariable);
    }
    else {
        alert("no se pudo guardar en el navegador")
    }
}
//Borra todo en el LocalStorage del Nvegador
function limpiarDatosEnNavegador() {
    if (window.localStorage) {
        return localStorage.clear();
    }
    else {
        alert("no se pudo guardar en el navegador")
    }
}
//Devuelve el ZIndex mas alto entre todos los objecto que este en el DOM
function zIndex() {
    var allElems = document.getElementsByTagName ? document.getElementsByTagName("*") : document.all; // or test for that too
    var maxZIndex = 0;
    for (var i = 0; i < allElems.length; i++) {
        var elem = allElems[i];
        var cStyle = null;
        if (elem.currentStyle) {
            cStyle = elem.currentStyle;
        }
        else if (document.defaultView && document.defaultView.getComputedStyle) {
            cStyle = document.defaultView.getComputedStyle(elem, "");
        }
        var sNum;
        if (cStyle) {
            sNum = Number(cStyle.zIndex);
        }
        else {
            sNum = Number(elem.style.zIndex);
        }
        if (!isNaN(sNum)) {
            maxZIndex = Math.max(maxZIndex, sNum);
        }
    }
    return maxZIndex + 1;
}

function esJson(str) {
    try {
        JSON.parse(str);
    }
    catch (e) {
        return false;
    }
    return true;
}
//SCROLL - Mover el scroll a un punto en la interface
function irArriba() {
    if (window.jQuery) {
        $('html, body').animate({
            scrollTop: 0
        }, 179);
    }
    else {
        window.scrollTo(0, 0);
    }
}

function scrollAlObjeto(ObjetoID) {
    if (window.jQuery) {
        $('html,body').animate({
            scrollTop: $("#" + ObjetoID).offset().top
        }, 'slow');
    }
    else {
        var e = document.getElementById(ObjetoID);
        if (!!e && e.scrollIntoView) {
            e.scrollIntoView();
        }
    }
}

function popUp(mypage, myname, w, h, scroll, pos) {
    if (w == null) {
        w = (screen.width) ? (screen.width - w) / 2 : 320;
    }
    if (h == null) {
        h = (screen.height) ? (screen.height - h) / 2 : 100;
    }
    if (scroll == null) {
        scroll = true;
    }
    if (pos == "random") {
        LeftPosition = (screen.width) ? Math.floor(Math.random() * (screen.width - w)) : 100;
        TopPosition = (screen.height) ? Math.floor(Math.random() * ((screen.height - h) - 75)) : 100;
    }
    if (pos == "center") {
        LeftPosition = (screen.width) ? (screen.width - w) / 2 : 100;
        TopPosition = (screen.height) ? (screen.height - h) / 2 : 100;
    }
    else if ((pos != "center" && pos != "random") || pos == null) {
        LeftPosition = 0;
        TopPosition = 0
    }
    settings = 'width=' + w + ',height=' + h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
    win = window.open(mypage, myname, settings);
}

function descargarURL(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    link.click();
}

function bloqueoCargando() {
    var cargando = '<div id="fondoCargando"  style=" z-index:ZINDEXMASALTO; position:fixed; top:0; left:0; width:110%; height:110%; background-color:transparent; background-position:center center; background-repeat:repeat; overflow:hidden; opacity: 0.8;" ></div>' + '<div style=" z-index:ZINDEXMASALTO; position:fixed; top:0; left:0px; width:100%; height:110%; background-color: rgba(0, 0, 10, 0.65); background-position:center center; background-repeat:repeat; overflow:hidden;" >' + '<div style="margin: 10% auto; text-align: center;">' + '<div class="col-middle">' + '<div class="text-center text-center">' + '<div id="stage" >' + '<div class="logo-cargando" >' + '<img src="images/ap-ingenieria-logo-blanco-2018.svg" style="max-width: 100%; width: 210px;" /><br />' + '<img src="images/mini-cargando-2.gif" style="max-width: 35%; width: 64px;" />' + '</div>' + '</div>' + '<div class="texto-cargando">cargando</div>' + '</div>' + '</div>' + '</div>' + '</div>' + '</div>' + '';
    var posicion = zIndex();
    cargandoHtml = cargando.replace('ZINDEXMASALTO', posicion);
    cargandoHtml = cargandoHtml.replace('ZINDEXMASALTO', posicion + 1);
    $('#cargando').html(cargandoHtml);
}

function desbloqueoCargando() {
    $('#cargando').html('');
}

function bloquearPantalla() {
    // console.log('bloquenado pantalla...........');
    bloqueoCargando();
}

function desbloquearPantalla() {
    // console.log('desbloquenado pantalla...........');
    desbloqueoCargando();
}

function pantallaCompleta(element) {
    if (element.requestFullscreen) {
        element.requestFullscreen();
    }
    else if (element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
    }
    else if (element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
    }
    else if (element.msRequestFullscreen) {
        element.msRequestFullscreen();
    }
}

function salirPantallaCompleta() {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    }
    else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    }
    else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    }
}

function crearHASH(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function alerta(mensaje) {
    Swal.fire({
        title: 'Advertencia',
        html: mensaje,
        type: 'warning',
    });
}
var frasesExito = ['Felicidades!', 'Lo hicimos....', 'Genial!!!', 'Exito', 'Bien Hecho!', 'Correcto!'];

function alertaExito(mensaje) {
    Swal.fire({
        title: "" + frasesExito[Math.round(Math.random() * (frasesExito.length - 1) )] + "",
        html: mensaje,
        type: 'success',
        timer: 97531,
    });
}

function alertaError(mensaje) {
    Swal.fire({
        title: 'Error',
        html: mensaje,
        type: 'error',
    });
}

function abrirCuadroConfirmacion(TEXTO_CONFIRMACION, functionAceptar = function() {}) {
    Swal.fire({
        title: '¿Estas segur@?',
        html: TEXTO_CONFIRMACION,
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Estoy Segur@',
        cancelButtonText: 'Cancelar'
    }).then((result) => { if (result.value) { functionAceptar(); } });
}
