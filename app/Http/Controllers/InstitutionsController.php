<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InstitutionCreateRequest;
use App\Http\Requests\InstitutionUpdateRequest;
use App\Repositories\InstitutionRepository;
use App\Validators\InstitutionValidator;
use App\Services\InstitutionsService;
/**
 * Class InstitutionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class InstitutionsController extends Controller
{

    protected $repository;
    protected $validator;
    protected $service;

    /**
     * InstitutionsController constructor.
     *
     * @param InstitutionRepository $repository
     * @param InstitutionValidator $validator
     */
    public function __construct(InstitutionRepository $repository, InstitutionValidator $validator, InstitutionsService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service   = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = $this->repository->all();
		return view('institutions.index',[
            'institutions' => $institutions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InstitutionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(InstitutionCreateRequest $request)
    {

        $request = $this->service->store($request->all());  //cria uma instituição atraves do Service

        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);
        return redirect()->route('institutions.index');
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
        $institutions = $this->repository->find($id);


        return view('institutions.show',[
            'institutions' => $institutions,
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
        $institution = $this->repository->find($id);

        return view('institutions.edit', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InstitutionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(InstitutionUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $institution = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Institution updated.',
                'data'    => $institution->toArray(),
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
    public function destroy($institution_id)
    {
        $request = $this->service->destroy($institution_id);  //cria um usuáŕio atraves do UserService

        session()->flash('success',[
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);
        return redirect()->route('institutions.index');
    }
}
