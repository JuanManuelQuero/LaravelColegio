<x-plantilla>
    <x-slot name="titulo">Añadir</x-slot>
    <x-slot name="cabecera">Añadir Asignatura</x-slot>
    <x-errores></x-errores>
    <form action="{{route('asignaturas.store')}}" method="POST" name="a" class="p-4 bg-dark text-light">
        @csrf
        <x-form-input name="nombre" label="Nombre Asignatura" class="mb-2" />
        <x-form-input name="descripcion" label="Descripción" class="mb-2" />
        <x-form-input name="creditos" label="Créditos" class="mb-2" />
        <x-form-select name="profesor_id" :options="$misProfesores" label="Profesores"/>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Añadir</button>
            <button type="reset" class="btn btn-danger"><i class="fas fa-broom"></i> Limpiar</button>
            <a href="{{route('asignaturas.index')}}" class="btn btn-secondary"><i class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</x-plantilla>
