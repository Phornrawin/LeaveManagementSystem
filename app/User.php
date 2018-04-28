<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
        'firstname', 'lastname', 'gender', 'image', 
        'supervisor_id', 'department_id', 'position',
        'tel', 'facebook', 'line',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function leaves() {
        return $this->hasMany('App\Leave', 'user_id');
    }
    public function substitutings() {
        return $this->hasMany('App\Leave', 'substitute_id');
    }
    public function supervisor() {
        return $this->belongsTo('App\User', 'supervisor_id');
    }
    public function department() {
        return $this->belongsTo('App\Department', 'department_id');
    }
    public function position() {
        return $this->belongsTo('App\Position', 'position_id');
    }
    public function subordinates() {
        return $this->hasMany('App\User', 'supervisor_id');
    }
}
