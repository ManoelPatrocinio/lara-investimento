<?php

    namespace App\Services;

    use App\Repositories\GroupRepository;
    use App\Validators\GroupValidator;
    use Prettus\Validator\Contracts\ValidatorInterface;
    use Prettus\Validator\Exceptions\ValidatorException;

    use Exception;
    use Illuminate\Database\QueryException;

    class GroupService{

        private $repository;
        private $validator;

        public function __construct( GroupRepository $repository, GroupValidator $validator){
            $this->repository = $repository;
            $this->validator  = $validator;
        }
        /**
         * Store a newly created resource in storage.
         *
         * @param  GroupCreateRequest $request
         *
         * @return \Illuminate\Http\Response
         *
         * @throws \Prettus\Validator\Exceptions\ValidatorException
         */
        public function store($data){
            try {

                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $Group = $this->repository->create($data);

                return [
                    'success'  => true,
                    'messages' => "Grupo Cadastrado",
                    'data'    => $Group,
                ];



            } catch (Exception $e) {
                dd($e);
                switch (get_class($e)) {
                  case QueryException::class :     return ['success' => false,'messages' =>  $e->getMessage()];
                  case ValidatorException::class : return ['success' => false,'messages' =>  $e->getMessage()];
                  case Exception::class :          return ['success' => false,'messages' =>  $e->getMessage()];

                  default:                         return ['success' => false,'messages' =>  get_class($e)];
                }
            }
        }


        public function userStore($group_id, $data)
        {
            try {

                $group   = $this->repository->find($group_id);
                $user_id = $data['user_id'];

                $group->usersRelationship()->attach($user_id);


                return [
                    'success'  => true,
                    'messages' => " Usuário relacionado ao Grupo !",
                    'data'     => $group,
                ];



            } catch (Exception $e) {
                dd($e);
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
                $Group = $this->repository->update($data,$id);

                return [
                    'success'  => true,
                    'messages' => "Grupo Atualizado",
                    'data'    => $Group,
                ];



            } catch (Exception $e) {
                dd($e);
                switch (get_class($e)) {
                  case QueryException::class :     return ['success' => false,'messages' =>  $e->getMessage()];
                  case ValidatorException::class : return ['success' => false,'messages' =>  $e->getMessage()];
                  case Exception::class :          return ['success' => false,'messages' =>  $e->getMessage()];

                  default:                         return ['success' => false,'messages' =>  get_class($e)];
                }
            }
        }

        public function destroy ($group_id){
            try {

                $this->repository->delete($group_id);


                return [
                    'success'  => true,
                    'messages' => "Grupo removido",
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

    }
?>
