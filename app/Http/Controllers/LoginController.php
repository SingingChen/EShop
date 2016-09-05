<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2016/9/2
 * Time: 下午 04:13
 */

namespace App\Http\Controllers;
use Redirect;
use Auth;
use Validator;
use Request;

class LoginController extends Controller
{
    public function show()
    {
return view('admin.login');
    }

    public function login()
    {
        $input = Request::all();
        $rules = ['email'=>'required|email',
            'password'=>'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $attempt = Auth::attempt([
                'email' => $input['email'],
                'password' => $input['password']
            ]);
            if ($attempt) {
                return Redirect::intended('post');
            }
            return Redirect::to('login')
                ->withErrors(['fail'=>'Email or password is wrong!']);
        }
        //fails
        return Redirect::to('login')
            ->withErrors($validator)
            ->withInput(Request::except('password'));
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('login');
    }


}