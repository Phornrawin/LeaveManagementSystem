<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
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
    public function scopeOnDate($query, $date) {
        return $query->where('start_date', '<=', $date)->where('end_date', '>=', $date);
    }
    public function scopeOnMonth($query, $date) {
        return $query->where('start_date', 'like', $date."%");
    }
    public function isPending() {
        return $this->status == "new" or $this->status == "wait for approval";
    }
    public function isApproved() {
        return $this->status == "approved";
    }
    public function isRevoked() {
        return $this->status == "rejected" or $this->status == "rejected by substitute" or $this->status == "cancel";
    }
}
