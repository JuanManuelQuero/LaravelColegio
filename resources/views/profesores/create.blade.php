<x-plantilla>
    <x-slot name="titulo">Añadir</x-slot>
    <x-slot name="cabecera">Añadir Profesor</x-slot>
    <x-errores></x-errores>
    <form action="{{route('profesores.store')}}" method="POST" name="a" class="p-4 bg-dark text-light">
        @csrf
        <x-form-input name="nombre" label="Nombre Profesor" class="mb-2" />
        <x-form-input name="apellidos" label="Apellidos Profesor" class="mb-2" />
        <x-form-input name="email" label="Email" type="mail" class="mb-2" />
        <x-form-input name="localidad" label="Localidad" type="mail" class="mb-2" />
        <div class="mt-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Añadir</button>
            <button type="reset" class="btn btn-danger"><i class="fas fa-broom"></i> Limpiar</button>
            <a href="{{route('profesores.index')}}" class="btn btn-secondary"><i class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</x-plantilla>
