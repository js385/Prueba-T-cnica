@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tareas</div>
                <div class="card-body">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Nueva Tarea</a>
                    
                    @foreach ($tasks as $task)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $task->titulo }}</h5>
                                <p class="card-text">{{ $task->descripcion }}</p>
                                <p class="card-text"><strong>Estado:</strong> {{ $task->estado }}</p>
                                <p class="card-text"><strong>Vence:</strong> {{ $task->fecha_vencimiento }}</p>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $tasks->links() }} <!-- Paginación -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection