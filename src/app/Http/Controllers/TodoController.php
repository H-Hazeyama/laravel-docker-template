<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
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

    public function store(TodoRequest $request) // 新規作成ボタン押下時
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

    public function edit($id) // 編集画面
    {
        $todo = $this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id) // 更新処理
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs)->save();
        return redirect()->route('todo.show', $todo->id);
    }

    public function delete(Todo $request, $id)
    {
        $todo = $this->todo->find($id);
        // dd($todo);
        $todo->delete();

        return redirect()->route('todo.index');
    }
}
