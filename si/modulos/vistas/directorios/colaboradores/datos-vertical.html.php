<div class="card">
    <a href="javascript:void(0);" onclick="mostrarModalDatosContactoColaborador({{Colaborador.colaboradorID}});">
        <img class="card-img-top" src="{{Colaborador.colaboradorFOTO}}" alt="Card image cap">
    </a>
    <div class="card-body">
        <p class="card-text"><strong>{{Colaborador.Cargo.cargoTITULO}}</strong> <small class="text-muted">- {{Colaborador.Cargo.unidadTITULO}}</small></p>
        <p class="card-title"><a href="javascript:void(0);" onclick="mostrarModalDatosContactoColaborador({{Colaborador.colaboradorID}});" class="preview">{{Colaborador.Persona.personaNOMBRES}} {{Colaborador.Persona.personaAPELLIDOS}}</a></p>
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
        <!--<small class="text-muted">-->
        {% if Usuario.usuarioADMINISTRADOR == 'SI' %}
        <ul class="nav flex-column">
            <li class="nav-item">Usuario: <span class="badge badge-primary badge-pill">{{Colaborador.Usuario.usuarioNOMBRE}}</span></li>
            <li class="nav-item">Último inicio: <span class="badge badge-primary badge-pill">{{Colaborador.Usuario.usuarioULTIMAVISITA}}</span></li>
            <li class="nav-item"><a href="https://www.google.com/maps/search/?api=1&query={{Colaborador.Usuario.usuarioULTIMALATITUD}},{{Colaborador.Usuario.usuarioULTIMALONGITUD}}" target="_blank"><i class="fa fa-maps"></i>Última ubicación: <span class="badge badge-primary badge-pill">@{{Colaborador.Usuario.usuarioULTIMALATITUD|round(4)}},{{Colaborador.Usuario.usuarioULTIMALONGITUD|round(4)}}</span></a></li>
        </ul>
        {% endif %}


        <!--</small>-->

    </div>
</div>