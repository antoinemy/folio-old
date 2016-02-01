<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
	public $timestamps = true;
	protected $primaryKey = 'id';
    protected $table = 'folio_picture';
    
    protected $guarded = ['id'];
    protected $fillable = ['name', 'url', 'updated_at', 'created_at'];
    protected $hidden = [];
    
    public function pages() {
		return $this->hasMany('App\Page');
	}
}
