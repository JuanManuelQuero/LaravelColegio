<x-plantilla>
    <x-slot name="titulo">Editar</x-slot>
    <x-slot name="cabecera">Editar Profesor</x-slot>
    <x-errores></x-errores>
    <form action="{{route('profesores.update', $profesore)}}" method="POST" name="a" class="p-4 bg-dark text-light">
        @csrf
        @method('PUT')
        @bind($profesore)
        <x-form-input name="nombre" label="Nombre Profesor" class="mb-2" />
        <x-form-input name="apellidos" label="Apellidos Profesor" class="mb-2" />
        <x-form-input name="email" label="Email" type="mail" class="mb-2" />
        <x-form-input name="localidad" label="Localidad" type="mail" class="mb-2" />
        <div class="mt-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Actualizar</button>
            <a href="{{route('profesores.index')}}" class="btn btn-secondary"><i class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</x-plantilla>
