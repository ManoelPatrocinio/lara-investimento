<?php

namespace App\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf','name','phone','birth','gender','notes','email','password','status','permission',
    ];

    /**
     * The attributes that shouldn´t be show for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($value ){
        $this->attributes['password'] = env('PASSWOR_HASH') ? bcrypt($value) : $value;
    }

    public function groups(){
        // cria um relacionamento do tipo " N p\ N"
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    /*
    * Mascara para exibição dos atributos de User
    */

    public function getFormattedCpfAttribute(){
        $cpf = $this->attributes['cpf'];
        return substr($cpf,0,3).'.'.substr($cpf,3,3) . '.' . substr($cpf,7,3). '-' . substr($cpf,-2);
    }

    public function getFormattedPhoneAttribute(){
        $phone = $this->attributes['phone'];
        return "(".substr($phone,0,2).')'.substr($phone,2,5) . '-' . substr($phone,4,4);
    }

    public function getFormattedBirthAttribute(){
        $birth = explode('-', $this->attributes['birth']);
        if(count($birth) != 3)
            return "";

        $birth = $birth[2] . '/' . $birth[1] . '/'. $birth[0];
        return $birth;
    }

}


