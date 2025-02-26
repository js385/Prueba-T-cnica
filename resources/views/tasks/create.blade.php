@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($task) ? 'Editar Tarea' : 'Nueva Tarea' }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}">
                        @csrf
                        @if(isset($task))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $task->titulo ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $task->descripcion ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" id="estado" name="estado" required>
                                <option value="pendiente" {{ (old('estado', $task->estado ?? '') == 'pendiente') ? 'selected' : '' }}>Pendiente</option>
                                <option value="en progreso" {{ (old('estado', $task->estado ?? '') == 'en progreso') ? 'selected' : '' }}>En Progreso</option>
                                <option value="completada" {{ (old('estado', $task->estado ?? '') == 'completada') ? 'selected' : '' }}>Completada</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
                            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ old('fecha_vencimiento', $task->fecha_vencimiento ?? '') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Actualizar' : 'Crear' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection