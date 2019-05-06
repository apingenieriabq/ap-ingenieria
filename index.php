<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-4">
					<h3 class="text-center">
						Sistema de Información de AP Ingenieria
					</h3>
					<button type="button" class="btn btn-block btn-info" onclick="abrirSIAPI();" >
						Ir a SIAP
					</button>
				</div>
				<div class="col-md-4">
					<h3 class="text-center">
						Sistema de Intercambio de Datos
					</h3>
					<button type="button" class="btn btn-success btn-block" onclick="abrirAPIAPI();" >
						ir a APIAPI
					</button>
				</div>
				<div class="col-md-2">
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function abrirSIAPI(){
		window.open('https://si-ap-ingenieria-puroingeniosamario.c9users.io/si/','SIAPI');
	}
	function abrirAPIAPI(){
		window.open('https://si-ap-ingenieria-puroingeniosamario.c9users.io/api/','APIAPI');
	}
</script>