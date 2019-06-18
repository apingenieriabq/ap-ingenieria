<div class="container box_1620">
  <div class="banner_inner d-flex align-items-center">
		<div class="banner_content">
			<div class="media">
				<div class="d-flex">
					<img src="{{Colaborador.colaboradorFOTO}}" style="min-height: 380px;max-height: 420px;min-width: 260px;max-width: 380px;" alt="">
				</div>
				<div class="media-body">
					<div class="personal_text">
						<h6>{{Colaborador.Cargo.Unidad.unidadTITULO}}</h6>
						<h3>{{Colaborador.Persona.personaNOMBRES}} {{Colaborador.Persona.personaAPELLIDOS}}</h3>
						<h4>{{Colaborador.Cargo.cargoTITULO}}</h4>
						<div style="padding: 0px 20px;" >
							<ul  class="list-group">
								<li class="list-group-item"><i class="fas fa-mobile-alt"></i> {{Colaborador.colaboradorCELULAR}}</a></li>
								<li class="list-group-item"><i class="fas fa-mobile"></i> {{Colaborador.Persona.personaCELULAR}}</a></li>
								<li class="list-group-item"><i class="fas fa-phone"></i> {{Colaborador.Persona.personaTELEFONO}}</a></li>
								<li class="list-group-item"><i class="fas fa-envelope"></i> {{Colaborador.colaboradorEMAIL}}</a></li>
								<li class="list-group-item"><i class="fas fa-envelope"></i> {{Colaborador.Persona.personaEMAIL}}</a></li>
								<li class="list-group-item"><i class="fas fa-home"></i> {{Colaborador.Persona.personaDIRECCION}}, {{Colaborador.Persona.Municipio.municipioNOMBRE}}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>