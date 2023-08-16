<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TaskControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //leer datos
        $tasks = Task::latest()->paginate(4);
        //que retorne la vista del index
        return view('index' ,['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'descripcion'=> 'required',
            
        ]);
        //dd($request->all());
        //Primero crea la nueva tarea y 
        Task::create($request->all());
        //segundo nos regresa al index
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea creada exitosamente!');
        
    }




    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse    
    {
        $task->delete();
       return redirect()->route('tasks.index')->with('success', 'Tarea eliminada exitosamente!');
      // dd($task);

    }
}
