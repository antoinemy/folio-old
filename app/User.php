<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

	public $timestamps = true;
	protected $primaryKey = 'id';
    protected $table = 'folio_user';
    
    protected $guarded = ['id'];
    protected $fillable = ['lastname', 'firstname', 'email', 'password', 'updated_at', 'created_at'];
    protected $hidden = ['password', 'remember_token'];
}
