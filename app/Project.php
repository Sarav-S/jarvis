<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {

	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = "projects";

    protected $fillable = ["id", "creator_id", "name", "description", "due_date", "status"];


    public static function boot() {
        parent::boot();

        \App\Project::deleting(function($project) {
            $project->tasks()->delete();
        });
    }

    public function getStatusAttribute($value) {
        return ($value) ? "Completed" : "Pending";
    }
    
    public function getDueDateAttribute($date) {
    	return ($date !== "0000-00-00 00:00:00") ? Carbon::createFromFormat('Y-m-d H:i:s', $date)->format(\Config::get('jarvis.date_format')) : "No Due Date";
    }

    public function user() {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function tasks() {
        return $this->hasMany('App\Task', 'project_id');
    }
}