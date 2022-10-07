<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTodoRequest;
use App\Models\TodoModel;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function home()
    {
        $todos = TodoModel::orderBy('status')->orderByDesc('id')->get();
        return view('home', ['todos' => $todos, 'statuses' => config('todos.statuses')]);
    }

    public function remove(int $id)
    {
        TodoModel::destroy($id);
        return redirect()->route('home');
    }

    public function add(AddTodoRequest $req)
    {
        TodoModel::create($req->validated());
        return redirect()->route('home');
    }

    public function change_status(TodoModel $id, string $status)
    {
        $id->update(['status' => $status]);
        return redirect()->route('home');
    }

    public function edit(TodoModel $id)
    {
        return view('edit', ['todo' => $id, 'statuses' => config('todos.statuses')]);
    }

    public function update(TodoModel $id, AddTodoRequest $req)
    {
        $id->update(array_merge($req->validated(), ['status' => $req->input()['status']]));
        return redirect()->route('home');
    }
}
