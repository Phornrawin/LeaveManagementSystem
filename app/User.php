<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
        'firstname', 'lastname', 'gender', 'image', 
        'supervisor_id', 'department_id', 'position',
        'tel', 'facebook', 'line', 'is_admin', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin'
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
    public function tasks() {
        return $this->hasMany('App\Task', 'assign_to');
    }
    public function getRecentLeaveAttribute() {
        $leaves = $this->leaves;
        if (count($leaves)==0) return null;
        $recentLeave = $leaves[0];
        foreach ($leaves as $leave) {
            if ($recentLeave->start_date > $leave->start_date) {
                $recentLeave = $leave;
            }
        }
        return $recentLeave;
    }
    public function isAdmin() {
        return $this->is_admin;
    }

    public function getFullNameAttribute() {
        return ($this->gender=="male" ? "Mr." : "Ms.")." ".$this->firstname." ".$this->lastname;
    }
}
