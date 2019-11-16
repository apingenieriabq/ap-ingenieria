<!doctype html>
<html class="no-js h-100" lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <base href="si/" />
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{{titulo_plantilla}} - Sistema de Informaci&oacute;n de AP Ingenieria</title>
  <meta name="description" content="A premium collection of beautiful hand-crafted Bootstrap 4 admin dashboard templates and dozens of custom components built for data-driven applications.">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="plantilla/basica/styles/use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="plantilla/basica/styles/fonts.googleapis.com/icone91f.css?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="plantilla/basica/styles/stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script async defer src="plantilla/basica/styles/buttons.github.io/buttons.js"></script>
  <!-- https://cdnjs.com/libraries/crypto-js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>


  <link rel="stylesheet" id="main-stylesheet" data-version="1.3.1" href="plantilla/basica/styles/shards-dashboards.1.3.1.min.css">
  {% block archivo_cabeza %}{% endblock %}
  <link rel="stylesheet" href="plantilla/basica/styles/extras.1.3.1.min.css">
  <link rel="stylesheet" href="plantilla/basica/styles/personalizado.css">

</head>
<body class="h-100" onload="" >

  {% include 'basica/includes/switcher.html.php' %}
  <div class="container-fluid {% block clase_contenedor %}{% endblock %}">
    <div class="row {% block clase_fila_contenedor %}{% endblock %}">
      {% block area_sidebar_izquierda %}{% endblock %}
      {% block area_central %}{% endblock %}
    </div>
  </div>
  {% block debajo_contenedor %}{% endblock %}
  <div id="cargando"></div>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
  <script src="plantilla/basica/scripts/extras.1.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.8.7/dist/sweetalert2.all.min.js"></script>
  <script src="js/funciones.js"></script>
  <script src="js/consultas.js"></script>

  {% block archivos_script %}{% endblock %}

  {% block scripts_al_pie %}{% endblock %}

  <script type="text/javascript">
  bloquearPantalla();
  $( document ).ready(function() {
      setTimeout(desbloquearPantalla, 1234);
  });
  </script>
</body>
</html>