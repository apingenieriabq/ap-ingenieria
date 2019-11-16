<!DOCTYPE HTML>
<!--
        Alpha by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Servidor de Aplicaciones de AP Ingeneria S.A.S. - Solo personal autorizado.</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body class="landing is-preload">
        <div id="page-wrapper">

            <!-- Banner -->
            <section id="banner">
                <h2>AP Ingenieria S.A.S.</h2>
                <p>Servidor de Aplicaciones.</p>
                <ul class="actions special">
                    <li>
                        <button type="button" class="btn btn-block btn-info button primary" onclick="abrirSIAPI();" >
                            Ir a SIAP
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-success btn-block button" onclick="abrirAPIAPI();" >
                            ir a APIAPI
                        </button>
                    </li>
                </ul>
            </section>

            <!-- Footer -->
            <footer id="footer">
                <ul class="icons">
                    <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
                    <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
                    <li><a href="#" class="icon brands fa-google-plus"><span class="label">Google+</span></a></li>
                </ul>
                <ul class="copyright">
                    <li>&copy; AP Ingenieria S.A.S.</li>
                </ul>
            </footer>

        </div> 

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

        <script type="text/javascript">
                            function abrirSIAPI() {
                                <?php if($_SERVER['SERVER_ADDR'] == '159.203.126.221'): ?>
                                    window.open('http://159.203.126.221/ap/si/', 'SIAPI');
                                <?php else: ?>
                                    window.open('https://si.apingenieria.net/', 'SIAPI');
                                <?php endif; ?>
                            }
                            function abrirAPIAPI() {
                                <?php if($_SERVER['SERVER_ADDR'] == '159.203.126.221'): ?>
                                window.open('http://159.203.126.221/ap/api/', 'APIAPI');
                                <?php else: ?>
                                window.open('https://api.apingenieria.net/', 'APIAPI');
                                <?php endif; ?>
                            }
        </script>

    </body>
</html>