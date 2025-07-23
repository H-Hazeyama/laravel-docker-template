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

    public function create() // TOP→新規作成画面
    {
        return view('todo.create');
    }

    public function store(Request $request) // 新規作成ボタン押下時
    {
        $inputs = $request->all(); // 入力されたtodo取得
        
        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo = new Todo();
        // 2. Todoインスタンスのカラム名のプロパティに一括で代入
        $todo->fill($inputs);
        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $todo->save();

        return redirect()->route('todo.index'); // 一覧画面へリダイレクト
    }
}
