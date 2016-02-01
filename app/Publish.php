<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
	public $timestamps = true;
	protected $primaryKey = 'id';
    protected $table = 'folio_publish';
    
    protected $guarded = ['id'];
    protected $fillable = ['category_id', 'user_id', 'picture_id', 'is_active', 'type', 'title', 'desc', 'content', 'url', 'updated_at', 'created_at'];
    protected $hidden = [];
    
    public function category() {
		return $this->belongsTo('App\Category');
	}
	
	public function user() {
		return $this->belongsTo('App\User');
	}
	
	public function pictures() {
		return $this->hasMany('App\PublishPicture');
	}
	
	public function tools() {
		return $this->hasMany('App\PublishTool');
	}
	
	public function cover() {
		return $this->belongsTo('App\Picture', 'picture_id');
	}
}
