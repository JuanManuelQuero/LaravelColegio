<x-plantilla>
    <x-slot name="titulo">Editar</x-slot>
    <x-slot name="cabecera">Editar Asignatura</x-slot>
    <x-errores></x-errores>
    <form action="{{route('asignaturas.update', $asignatura)}}" method="POST" name="a" class="p-4 bg-dark text-light">
        @csrf
        @method('PUT')
        @bind($asignatura)
        <x-form-input name="nombre" label="Nombre Asignatura" class="mb-2" />
        <x-form-input name="descripcion" label="Descripción" class="mb-2" />
        <x-form-input name="creditos" label="Créditos" class="mb-2" />
        <x-form-select name="profesor_id" :options="$misProfesores" label="Profesores"/>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Actualizar</button>
            <a href="{{route('asignaturas.index')}}" class="btn btn-secondary"><i class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</x-plantilla>
