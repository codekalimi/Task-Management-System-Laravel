<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        //fetch all data
        $todos = Todo::all();
        return view('todos/index')->with('todos',$todos);
    }
    public function show(Todo $todoId)
    {
        return view('todos/show')->with('todo',$todoId);
    }
    public function create()
    {
        return view('todos/create');
    }
    public function store()
    {
        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('message','Task Created Successfully!');

        return redirect('/todos');
    }
    public function edit(Todo $todoId)
    {
        return view('todos/edit')->with('todo',$todoId);
    }
    public function update(Todo $todoId)
    {
        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todoId->name = $data['name'];
        $todoId->description = $data['description'];
        $todoId->save();

        session()->flash('message','Task Updated Successfully!');

        return redirect('/todos');
    }
    public function destroy(Todo $todoId)
    {
        $todoId->delete();

        session()->flash('message','Task Deleted Successfully!');

        return redirect('/todos');
    }
    public function complete(Todo $todoId)
    {
        $todoId->completed = true;
        $todoId->save();

        session()->flash('message','Task Completed Successfully!');
        return redirect('/completed');
    }
}
