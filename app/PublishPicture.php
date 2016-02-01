<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublishPicture extends Model
{
	public $timestamps = true;
	protected $primaryKey = 'id';
    protected $table = 'folio_publish_picture';
    
    protected $guarded = ['id'];
    protected $fillable = ['publish_id', 'picture_id', 'updated_at', 'created_at'];
    protected $hidden = [];
    
    public function publish() {
		return $this->belongsTo('App\Publish');
	}
	
	public function picture() {
		return $this->belongsTo('App\Picture');
	}
}
