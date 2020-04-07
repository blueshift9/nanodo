<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'todolist_id', 'user_id',
    ];
}
