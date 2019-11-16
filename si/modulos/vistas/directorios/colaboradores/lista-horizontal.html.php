<div class="" >
    <div class="card-deck directorio row" >
        {% set pCmitad = (Directorio.Colaboradores|length/2) %}
        {% for Colaborador in Directorio.Colaboradores %}
        {% include 'directorios/colaboradores/datos-horizontal.html.php' %}
        {% set pCi = pCi + 1 %}
        {% endfor %}
    </div>
</div>