@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col-12">
        
        <div>
            <h2>Editar Tarea</h2>
        </div>
        <div>
            <a href="{{route('tasks.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>Se requiere llenar los campos!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{route('tasks.update',$task)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Tarea:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Tarea" value="{{$task->title}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción..." >{{ $task->descripcion}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha límite:</strong>
                    <input type="date" name="due_date" class="form-control" value={{$task->due_date}} id=''> 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Estado :</strong>
                    <select name="status" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="Pendiente" @selected("Pendiente"==$task->status)>Pendiente</option>
                        <option value="En progreso" @selected("En progreso"==$task->status)>En progreso</option>
                        <option value="Completada" @selected("Completada"==$task->status)>Completada</option>
                       <!-- <option value="">-- Elige el status --</option>
                        <option value="Pendiente" @if($task->status == "Pendiente") selected @endif style="background-color: yellow;">Pendiente</option>
                        <option value="En progreso" @if($task->status == "En progreso") selected @endif style="background-color: orange;">En progreso</option>
                        <option value="Completada" @if($task->status == "Completada") selected @endif style="background-color: green;">Completada</option>-->
                    </select>
                </div>
                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
    
</div>
@endsection