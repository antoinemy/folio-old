<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagePicture extends Model
{
	public $timestamps = true;
	protected $primaryKey = 'id';
    protected $table = 'folio_page_picture';
    
    protected $guarded = ['id'];
    protected $fillable = ['page_id', 'picture_id', 'updated_at', 'created_at'];
    protected $hidden = [];
    
    public function page() {
		return $this->belongsTo('App\Page');
	}
	
	public function picture() {
		return $this->belongsTo('App\Picture');
	}
}
