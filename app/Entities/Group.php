<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Group.
 *
 * @package namespace App\Entities;
 */
class Group extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name','user_id','institution_id'];




    public function user(){
        // cria um relacionamento do tipo "pertence" entre grupos e usuarios
        return $this->belongsTo(User::class,'user_id');
    }


    public function institutions(){
        // cria um relacionamento do tipo "pertence" entre grupos e instituições
        return $this->belongsTo(Institution::class,'institution_id');
    }



    public function usersRelationship(){
        // cria um relacionamento do tipo " N p\ N entre groupos e usuário"
        return $this->belongsToMany(User::class, 'user_groups', 'user_id', 'group_id');
    }

    public $timestamps  = true;
}
