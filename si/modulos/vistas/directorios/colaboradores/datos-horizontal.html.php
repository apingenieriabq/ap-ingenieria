<div class="col-md-6 ">

    <div class="card mb-3" >
      <div class="row no-gutters">
        <div class="col-md-4">
            <a href="javascript:void(0);" onclick="mostrarModalDatosContactoColaborador({{Colaborador.colaboradorID}});" class="preview">
                <img src="{{Colaborador.colaboradorFOTO}}" class="card-img" alt="{{Colaborador.colaboradorFOTO}}">
            </a>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h3 class="card-title"><a href="javascript:void(0);" onclick="mostrarModalDatosContactoColaborador({{Colaborador.colaboradorID}});" class="preview">{{Colaborador.Persona.personaNOMBRES}} {{Colaborador.Persona.personaAPELLIDOS}}</a></h3>
            <p class="card-text">{{Colaborador.Cargo.cargoTITULO}} - {{Colaborador.Persona.personaIDENTIFICACION}}</p>
            <div class="card-text"> 
                <div class="row mb-1">
                    <div class="col">
                        <small><strong>Vinculación</strong></small>
                        <span>{{Colaborador.TipoColaborador.tipoColaboradorTITULO}}</span>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col">
                        <small><strong>Correo </strong></small>
                        <span>{{Colaborador.colaboradorEMAIL}}</span>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col">
                        <small><strong>Celular</strong></small>
                        <span>{{Colaborador.colaboradorCELULAR}}</span>
                    </div>
                </div>
            </div>
            <p class="card-text"><small class="text-muted">colaborador desde {{Colaborador.colaboradorFCHINGRESO}}</small><br /><small class="text-muted">Estado: <strong>{{Colaborador.colaboradorESTADO}}</strong></small></p>
          </div>
        </div>
      </div>
    </div>

</div>