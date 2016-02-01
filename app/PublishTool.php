<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublishTool extends Model
{
	public $timestamps = true;
	protected $primaryKey = 'id';
    protected $table = 'folio_publish_tool';
    
    protected $guarded = ['id'];
    protected $fillable = ['publish_id', 'tool_id', 'updated_at', 'created_at'];
    protected $hidden = [];
    
    public function publish() {
		return $this->belongsTo('App\Publish');
	}
	
	public function tool() {
		return $this->belongsTo('App\Tool');
	}
}
