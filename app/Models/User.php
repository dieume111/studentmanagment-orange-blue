<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'user_id';
    protected $fillable = ['username', 'password'];
    protected $hidden = ['password', 'remember_token'];
}
?>