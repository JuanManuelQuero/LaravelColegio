<x-plantilla>
    <x-slot name="titulo">Detalle</x-slot>
    <x-slot name="cabecera">Detalle Asignatura</x-slot>
    <x-errores></x-errores>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><b>Nombre: </b>{{$asignatura->nombre}}</h5>
          <h6 class="card-subtitle mb-2"><b>Descripción: </b>{{$asignatura->descripcion}}</h6>
          <p class="card-text text-muted"><b>Créditos: </b>{{$asignatura->creditos}}</p>
          <p class="card-text"><b>Profesor</b>
            <a href="{{route('profesores.show', $asignatura->profesor->id)}}"> #{{$asignatura->profesor->nombre}}</a>
          </p>
        </div>
    </div>
    <a href="{{route('asignaturas.index')}}" class="btn btn-secondary mt-2"><i class="fas fa-backward"></i> Volver</a>
</x-plantilla>
