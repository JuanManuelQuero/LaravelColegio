<x-plantilla>
    <x-slot name="titulo">Detalle</x-slot>
    <x-slot name="cabecera">Detalle Profesor</x-slot>
    <x-errores></x-errores>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><b>Nombre: </b>{{$profesore->nombre}}</h5>
          <h6 class="card-subtitle mb-2"><b>Apellidos: </b>{{$profesore->apellidos}}</h6>
          <p class="card-text text-muted"><b>Email: </b>{{$profesore->email}}</p>
          <p class="card-text text-muted"><b>Localidad: </b>{{$profesore->localidad}}</p>
          <p class="card-text"><b>Asignaturas: </b>
            <ul>
                @foreach ($profesore->asignaturas as $item )
                    <li><a href="{{route('asignaturas.show', $item)}}">#{{$item->nombre}}</a></li>
                @endforeach
            </ul>
          </p>
        </div>
    </div>
    <a href="{{route('profesores.index')}}" class="btn btn-secondary mt-2"><i class="fas fa-backward"></i> Volver</a>
</x-plantilla>
