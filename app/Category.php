<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public $timestamps = true;
	protected $primaryKey = 'id';
    protected $table = 'folio_category';
    
    protected $guarded = ['id'];
    protected $fillable = ['term', 'color', 'updated_at', 'created_at'];
    protected $hidden = [];
}
