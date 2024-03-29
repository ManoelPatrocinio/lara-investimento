<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Contracts\Auth\Authenticatable;

class DashboardController extends Controller
{

    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        return view('User.dashboard');
    }
    public function auth( Request $request){

        $data =[
            'email'   => $request->get('username'),
            'password' => $request->get('password')
        ];

        Try{

            if (env('PASSWOR_HASH')) {
                Auth:: attempt($data,false);

            } else {
                $user = $this->repository->findWhere(['email'=> $request->get('username')])->first();

                if(!$user)
                    throw new Exception("E-mail Invalido");


                if($user->password != $request->get('password'))
                    throw new Exception("Senha Invalida");

                Auth::login($user);

            }

            return redirect()->route('user.dashboard');

        }catch(\Exception $e){
            return $e->getMessage();
        }

        dd($request->all());
    }
}
