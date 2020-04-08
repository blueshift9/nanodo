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
        'name', 'description', 'display_order'
    ];

    public function users()
    {
        return $this->belongsToMany("App\User");
    }
}
