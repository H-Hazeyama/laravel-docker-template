<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo(); // Modelクラスのインスタンス化
        $todos = $todo->all(); // todosテーブル全件取得(連想配列)
        
        return view('todo.index', ['todos' => $todos]); // Viewとして表示するファイルを指定
    }
}
