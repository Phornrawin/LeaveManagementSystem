<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    
    protected $fillable = [
        'user_id', 'substitute_id', 'category_id',
        'task_id', 'start_date', 'end_date', 'status',
    ];
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function substitute() {
        return $this->belongsTo('App\User', 'substitute_id');
    }
    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function task() {
        return $this->belongsTo('App\Task', 'task_id');
    }
}
