<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Institution.
 *
 * @package namespace App\Entities;
 */
class Institution extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = ['name'];
    public $timestamps  = true;

    // cria o relacionamento de 1 p\ Muitos
    
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

}
