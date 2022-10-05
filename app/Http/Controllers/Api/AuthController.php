<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Http\Requests\AuthRequest\LoginRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $Users = new Users;
        $exist = Users::where('email', $request->email)->first();
        $result = array('state'=>'', 'msg' => '');
        try {
            if ($exist) {
                $result['state'] = 'failed';
                $result['msg'] = 'An account with the given email already exists.';
            } else {
                $Users->name = $request->name;
                $Users->email = $request->email;
                $Users->password = $request->password;
                if ( $request->email === 'admin@gmail.com' && $request->name === 'admin' ) {
                    $Users->role = 'admin';
                } else {
                    $Users->role = 'user';
                }
                $Users->save();
                $result['state'] = 'success';
                $result['msg'] = 'You have successfully registered, Login to access your dashboard.';
            }
        } catch(err){
            $result['state'] = 'error';
            $result['msg'] = 'Server error.';
        }
        return $result;
    }

    public function login(LoginRequest $request) {
        $Users = new Users;
        $exist = Users::where('email', $request->email)->first();
        $result = array('state'=>'', 'msg' => '', 'data' => array());
        if ($exist) {
            if ($exist['password'] === $request->password) {
                $result['data'] = $exist;
                $result['state'] = 'success';
                $result['msg'] = 'You have successfully logined.';
            } else {
                $result['state'] = 'failed';
                $result['msg'] = 'Incorrect username or password.';
            }
        } else {
            $result['state'] = 'failed';
            $result['msg'] = 'Incorrect username or password.';
        }
        return $result;
    }
}
