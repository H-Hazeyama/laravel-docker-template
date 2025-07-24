<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index() // 一覧画面
    {
        $todo = new Todo();
        $todos = $todo->all();
        
        return view('todo.index', ['todos' => $todos]);
    }

    public function create() // 新規作成画面
    {
        return view('todo.create');
    }

    public function store(Request $request) // 新規作成ボタン押下時
    {
        $inputs = $request->all();
        $todo = new Todo();
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.index');
    }
        
    public function show($id) // 詳細画面
    {
        $model = new Todo();
        $todo = $model->find($id);
    }
}
