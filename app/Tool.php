<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
	public $timestamps = true;
	protected $primaryKey = 'id';
    protected $table = 'folio_tool';
    
    protected $guarded = ['id'];
    protected $fillable = ['term', 'updated_at', 'created_at'];
    protected $hidden = [];
    
    public function publishes() {
		return $this->hasMany('App\Publish');
	}
}
