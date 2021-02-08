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


    // cria um relacionamento do tipo "pertence"

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function institutions(){
        return $this->belongsTo(Institution::class,'institution_id');
    }

    public $timestamps  = true;
}
