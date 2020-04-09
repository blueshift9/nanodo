<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Listitem extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'display_order',
        'sort_when_creating' => true,
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'todolist_id', 'body', 'display_order'
    ];

    public function users()
    {
        return $this->belongsTo("App\Todolist");
    }


}
