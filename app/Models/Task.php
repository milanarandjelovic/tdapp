<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'duedate',
        'completed',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function setDuedateAttribute($date)
    {
        $this->attributes['duedate'] = Carbon::parse($date);
    }

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }

    public function project()
    {
        $this->belongsTo('App\Models\Project');
    }

    public function subtasks()
    {
        $this->hasMany('App\Models\Subtask');
    }
}
