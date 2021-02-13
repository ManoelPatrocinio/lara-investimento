<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\InstitutionRepository;
use App\Repositories\UserRepository;
use App\Validators\GroupValidator;
use App\Services\GroupService;

/**
 * Class GroupsController.
 *
 * @package namespace App\Http\Controllers;
 */
class GroupsController extends Controller
{
    /**
     * @var GroupRepository
     */
    protected $repository;

    /**
     * @var GroupValidator
     */
    protected $validator;
    protected $service;
    protected $institutionsRepository;
    protected $userRepository;

    /**
     * GroupsController constructor.
     *
     * @param GroupRepository $repository
     * @param GroupValidator $validator
     */
    public function __construct(GroupRepository $repository, GroupValidator $validator, GroupService $service,
                                InstitutionRepository $institutionsRepository,UserRepository $userRepository)
    {
        $this->institutionsRepository = $institutionsRepository;
        $this->userRepository         = $userRepository;
        $this->repository             = $repository;
        $this->validator              = $validator;
        $this->service                = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups            = $this->repository->all();
        $user_list         = $this->userRepository->selectBoxList();
        $institutions_list = $this->institutionsRepository->selectBoxList();

		return view('groups.index',[
            'groups'            => $groups,
            'user_list'         => $user_list,
            'institutions_list' => $institutions_list,
        ]);
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
    public function store(GroupCreateRequest $request)
    {
        $request = $this->service->store($request->all());  //cria uma instituição atraves do Service

        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);
        return redirect()->route('group.index');
    }

    public function userStore(Request $request, $group_id)
    {
        $request = $this->service->userStore($group_id, $request->all());  //cria uma instituição atraves do Service

        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);
        return redirect()->route('group.show', [$group_id]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $group = $this->repository->find($id);
        $user_list = $this->userRepository->selectBoxList();

        return view('groups.show',[
            'group'     => $group,
            'user_list' => $user_list,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->repository->find($id);

        return view('group.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GroupUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(GroupUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $group = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Group updated.',
                'data'    => $group->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($goups_id)
    {
        $request = $this->service->destroy($goups_id);  //cria um usuáŕio atraves do UserService

        session()->flash('success',[
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);
        return redirect()->route('group.index');

    }
}
