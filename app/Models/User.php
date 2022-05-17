<?php
namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
  use HasApiTokens, Notifiable;
  protected $fillable = [
      'first_name', 'last_name', 'email', 'password',
  ];
  protected $hidden = [
       'password', 'remember_token',
  ];
}