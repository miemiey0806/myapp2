<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth; //+

class AuthController extends Controller
{
    /**public function __construct()
    {
        $this->middleware('guest', ['except'=>'getLogout']);
    }*/

    /**
     * @param Request $request
     * @return \Dingo\Api\Http\Response|void
     */
    public function authenticate(Request $request)
    {
        $credentials=$request->only('email', 'password');

        try
        {
            if(! $token=JWTAuth::attempt($credentials))
            {
                return $this->response->errorUnauthorized();
            }
        }
        catch(JWTException $ex)
        {
            return $this->response->errorInternal();
        }

        return $this->response->array(compact('token'))->setStatusCode(200);
    }

    public function create(array $data)
    {
        return User::create
        (
            [
                'email'=>$data['email'],
                'phone'=>$data['phone'],
                'password'=>bcrypt($data['password']),
            ]
        );
    }

    //get all users
    public function index()
    {
        try
        {
            return User::all();
        }
        catch (Exception $ex)
        {
            return $ex;
        }

    }

    //get user based on id
    public function show()
    {
        return JWTAuth::parseToken()->toUser();
    }
}