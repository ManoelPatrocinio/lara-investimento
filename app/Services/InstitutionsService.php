<?php

    namespace App\Services;

    use App\Repositories\InstitutionRepository;
    use App\Validators\InstitutionValidator;
    use Prettus\Validator\Contracts\ValidatorInterface;
    use Prettus\Validator\Exceptions\ValidatorException;
    use Exception;
    use Illuminate\Database\QueryException;

    class InstitutionsService{

        private $repository;
        private $validator;

        public function __construct( InstitutionRepository $repository, InstitutionValidator $validator){
            $this->repository = $repository;
            $this->validator  = $validator;
        }

        public function store($data){
            try {

                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $institution = $this->repository->create($data);

                return [
                    'success'  => true,
                    'messages' => "Instituição cadastrado",
                    'data'    => $institution,
                ];



            } catch (Exception $e) {
                switch (get_class($e)) {
                  case QueryException::class :     return ['success' => false,'messages' =>  $e->getMessage()];
                  case ValidatorException::class : return ['success' => false,'messages' =>  $e->getMessage()];
                  case Exception::class :          return ['success' => false,'messages' =>  $e->getMessage()];

                  default:                         return ['success' => false,'messages' =>  get_class($e)];
                }
            }
        }

        public function destroy ($institution_id){
            try {

                $this->repository->delete($institution_id);


                return [
                    'success'  => true,
                    'messages' => "Instituição Removida",
                    'data'    => null,
                ];



            } catch (Exception $e) {
                switch (get_class($e)) {
                  case QueryException::class :     return ['success' => false,'messages' =>  $e->getMessage()];
                  case ValidatorException::class : return ['success' => false,'messages' =>  $e->getMessage()];
                  case Exception::class :          return ['success' => false,'messages' =>  $e->getMessage()];

                  default:                         return ['success' => false,'messages' =>  get_class($e)];
                }
            }
        }

        public function update($data, $id){

            try {
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
                $institution = $this->repository->update($data,$id);

                return [
                    'success'  => true,
                    'messages' => "Instituição Atualizada",
                    'data'    => $institution,
                ];
            }
            catch (ValidatorException $e) {

                dd($e);
                switch (get_class($e)) {
                  case QueryException::class :     return ['success' => false,'messages' =>  $e->getMessage()];
                  case ValidatorException::class : return ['success' => false,'messages' =>  $e->getMessage()];
                  case Exception::class :          return ['success' => false,'messages' =>  $e->getMessage()];

                  default:                         return ['success' => false,'messages' =>  get_class($e)];
                }
            }
        }

    }
