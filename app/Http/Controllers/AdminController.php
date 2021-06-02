<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    public function validator(array $data)
    {
        # code...
        return Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:0',
        ]);
    }
    public function login(Request $request)
    {
        echo $request->method();
        if($request->isMethod('post')){
            $email = $request->input('email');
            $password = $request->input('password');
            $validator = $this->validator($request->all());
            if($validator->fails()){
                return Redirect::to('/login')->withInput()->withErrors($validator);
            }
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                Redirect::to('/');
            }
            else{
                return Redirect::to('/login')->withInput()->withErrors("Email hoặc mật khẩu không đúng");
            }
            return back()->withInput();
        }
        return view('admin.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function validatorRegis(array $data)
    {
        # code...
        return Validator::make($data, [
            'name' => 'required|name|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|min:3',
        ]);
    }
    public function register(Request $request)
    {
        echo $request->method();
        if($request->isMethod('post')){
            $data['name'] = $request->input('name');
            $data['email'] = $request->input('email');
            $data['password'] = $request->input('password');
            $validator = $this->validatorRegis($data);
            if($validator->fails()){
                return Redirect::to('/register')->withInput()->withErrors($validator);
            }
            if($this->regis($data)){
                Redirect::to('/');
            }
            return back();
        }
        return view('admin.register');
    }
    public function regis(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
}
