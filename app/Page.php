<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	public $timestamps = true;
	protected $primaryKey = 'id';
    protected $table = 'folio_page';
    
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'picture_id', 'is_active', 'meta_title', 'meta_desc', 'title_h1', 'title_h2', 'desc', 'content', 'sender', 'updated_at', 'created_at'];
    protected $hidden = [];
    
    public function user() {
		return $this->belongsTo('App\User');
	}
	
	public function pictures() {
		return $this->hasMany('App\PagePicture');
	}
	
	public function cover() {
		return $this->belongsTo('App\Picture', 'picture_id');
	}
}
