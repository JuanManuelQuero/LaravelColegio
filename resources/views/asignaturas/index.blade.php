<x-plantilla>
    <x-slot name="titulo">Gestión</x-slot>
    <x-slot name="cabecera">Gestión Asignaturas</x-slot>
    <x-mensaje/>
    <a href="{{route('asignaturas.create')}}" class="btn btn-success mb-2"><i class="fas fa-plus-circle"></i> Nueva Asignatura</a>
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Detalles</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Créditos</th>
            <th scope="col" colspan="2" class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($asignatura as $item)
          <tr>
            <th scope="row">
                <a href="{{route('asignaturas.show', $item)}}" class="btn btn-secondary"><i class="fas fa-info-circle"></i> Detalle</a>
            </th>
            <td>{{$item->nombre}}</td>
            <td>{{$item->descripcion}}</td>
            <td>{{$item->creditos}}</td>
            <td class="text-center">
                <a href="{{route('asignaturas.edit', $item)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
            </td>
            <td class="text-center">
                <form action="{{route('asignaturas.destroy', $item)}}" method="POST" name="d">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-2">
          {{$asignatura->links()}}
      </div>
</x-plantilla>
