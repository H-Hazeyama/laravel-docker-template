<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    private $todo;

     public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index() // 一覧画面
    {
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    public function create() // 新規作成画面
    {
        return view('todo.create');
    }

    public function store(Request $request) // 新規作成ボタン押下時
    {
        $inputs = $request->all();

        $this->todo->fill($inputs);
        $this->todo->save();

        return redirect()->route('todo.index');
    }
        
    public function show($id) // 詳細画面
    {
        $todo = $this->todo->find($id);

        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs)->save();
        // dd($todo);
        return redirect()->route('todo.show', $todo->id);
    }
}
