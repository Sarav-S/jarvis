<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
	
	protected $table = "tasks";

	protected $fillable = ["name", "description", "category_id", "project_id", 'creator_id', 'due_date', 'status'];

	public function getDueDateAttribute($date) {
    	return ($date !== "0000-00-00 00:00:00") ? Carbon::createFromFormat('Y-m-d H:i:s', $date)->format(\Config::get('jarvis.date_format')) : "No Due Date";
    }

    public function user() {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function category() {
    	return $this->belongsTo('App\Category', 'category_id');
    }

    public function project() {
    	return $this->belongsTo('App\Project', 'project_id');
    }

    public function getStatusAttribute($value) {
        return ($value) ? "Completed" : "Pending";
    }
}