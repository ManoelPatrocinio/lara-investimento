<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestramps = true;
    protected $table = "user_groups";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['user_id','group_id','permission',];

    /**
     * The attributes that shouldn´t be show for arrays.
     *
     * @var array
     */
    protected $hidden = [];

}
