@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD de Tareas</h2>
        </div>
        <div>
            <a href="{{route('tasks.create', $tasks)}}" class="btn btn-primary">Crear tarea</a>
        </div>
    </div>

    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{Session::get('success')}}</strong><br>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            @foreach($tasks as $task)
            <tr>
                <td class="fw-bold">{{$task->title}}</td>
                <td>{{$task->descripcion}}</td>
                <td>
                    {{$task->due_date}}
                </td>
               <!-- <td>
                <span class="badge bg warning fs-6">{{$task->status}}</span>
                </td>-->
                
                <td class="@if($task->status == 'Pendiente') bg-warning text-dark @elseif($task->status == 'En progreso')
                            bg-info text-white @else bg-success text-white @endif">
                    
                   {{$task->status}}
                   
                    
                </td>

               <!-- <td class="@if($task->status == 'Pendiente') bg-warning text-dark @elseif($task->status == 'En progreso') bg-info text-white @else bg-success text-white @endif">
    

    {{$task->status}}
</td-->

                <td>
                    <a href="{{route('tasks.edit', $task)}}" class="btn btn-warning">Editar</a>

                    <form id= "delete-form" action="{{route('tasks.destroy', $task)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete(event)">Eliminar</button>
                    </form>
                </td>
                <script>
                    function confirmDelete(event) 
                    {
                        event.preventDefault();
                            if (confirm('¿Estás seguro de que deseas eliminar esta tarea?')) 
                            {
                                document.getElementById('delete-form').submit();
                            }
                    }
            </script>

            </tr>
            @endforeach
        </table>
        {{$tasks->links()}}
    </div>
</div>
@endsection