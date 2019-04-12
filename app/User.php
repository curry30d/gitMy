<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
        // Schema::create('manager', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('username',20)->notNull();
        //     $table->string('password')->notNull();
        //     $table->enum('gender',[1,2,3])->notNull()->default('1');
        //     $table->string('mobie',11)->notNull();
        //     $table->string('email',40)->notNull();
        //     $table->tinyInteger('role_id');
        //     $table->timestamps();
        //     $table->rememberToken();
        //     $table->enum('status',[1,2])->notNUll()->default('2');