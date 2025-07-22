<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
         return view('todo.index'); // Viewとして表示するファイルを指定
    }
}
