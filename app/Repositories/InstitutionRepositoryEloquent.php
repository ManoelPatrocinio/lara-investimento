<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\InstitutionRepository;
use App\Entities\Institution;
use App\Validators\InstitutionValidator;

/**
 * Class InstitutionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class InstitutionRepositoryEloquent extends BaseRepository implements InstitutionRepository
{

    public function selectBoxList(string $descricao = "name", string $chave = "id")
    {
        return $this->model->pluck( $descricao, $chave)->all();
    }


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Institution::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return InstitutionValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
