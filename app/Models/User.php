<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use the following to use eloquent well
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Attributes\Attribute;
//to use hash
use Illuminate\Support\Facades\Hash;
//U can use str
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        //added manually
        'Image',
        'email',
        'password',
    ];
    //it means that all data entered by the user has no security reasons
    // It is the opposite of $fillable
    //U can pass in the parameter of the field u want to restrict
    // protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

       //creating an accessor to convert the letters to Upper case automatically 
    //So password is the name of the field u a changing

    
        protected function getNameAttribute($value)
        {
            // return strtoupper($value);
            return str::upper($value);
        }
    
    //creating a mutator to encrypt the password automatically 
    //So password is the name of the field u a changing
    // protected function password(): Attribute{
    //     return Attribute::make(
    //         set: fn ($value) => bcrypt($value)
    //     );
    // }
   
    protected function setPasswordAttribute($value)
    {
       return $this->attributes['password'] = bcrypt($value);
    }
}
