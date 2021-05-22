<x-plantilla>
    <x-slot name="titulo">Gestión</x-slot>
    <x-slot name="cabecera">Gestión Profesores</x-slot>
    <x-mensaje/>
    <a href="{{route('profesores.create')}}" class="btn btn-success mb-2"><i class="fas fa-plus-circle"></i> Nuevo Profesor</a>
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Detalles</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Email</th>
            <th scope="col">Localidad</th>
            <th scope="col" colspan="2" class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($profesor as $item)
          <tr>
            <th scope="row">
                <a href="{{route('profesores.show', $item)}}" class="btn btn-secondary"><i class="fas fa-info-circle"></i> Detalle</a>
            </th>
            <td>{{$item->nombre}}</td>
            <td>{{$item->apellidos}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->localidad}}</td>
            <td class="text-center">
                <a href="{{route('profesores.edit', $item)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
            </td>
            <td class="text-center">
                <form action="{{route('profesores.destroy', $item)}}" method="POST" name="d">
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
          {{$profesor->links()}}
      </div>
</x-plantilla>
