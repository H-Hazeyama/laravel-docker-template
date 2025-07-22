<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';

    protected $fillable = [
        // 一括代入された値をそのまま使用しない
        'content',
    ];
}
