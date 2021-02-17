<?php
namespace App\Http\Controllers;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class UserController
{
    public function index(Request $request, $id, $uid, TaskController $task)
    {
        //return $request->input('name');
        //return $request->all();

        //return $id.$uid;

        //return $request->path();
        //return $request->url();
        //return $request->fullUrl();
        //return $request->is('user/*');
        //return $request->isMethod('post');

        //$task = new TaskController();
        //return $task->read(10);

        //return $request->input('abc', 'no name');
        //return $request->input();
        //return $request->name;

        //return $request->input('select.1');
        //return $request->input('select.1.b');

        //return $request->ip();
        //return $request->only(['name', 'age']);
        //return $request->has('name');

        return request()->input();
    }

    public function view()
    {
        return redirect(URL::signedRoute('url.id', ['id'=>5]));
        return view('view');
    }

    public function url()
    {
        $user = User::find(19);
        //return url('/user/'.$user->id);

        //return url()->current();
        //return url()->full();
        //return url()->previous();

        //return action('UserController@url', ['id'=>5]);

        return request()->hasValidSignature();
    }

    public function cookies()
    {
        //return $_COOKIE['laravel_session'];
        //return request()->cookie('laravel_session');

        //return Cookie::get('laravel_session');
        //return Cookie::has('laravel_session');

        //return response('Hello Cookie')->cookie('name', 'Mr.Lee', 10);

        //Cookie::queue('age', 100, 10);

        //$cookie = cookie('gender', '男', 10);
        //Cookie::queue($cookie);

        //Cookie::queue('name', 'Mr.Lee', 10);
    }

    public function sess()
    {
        //return request()->session()->all();
        //return \request()->session()->get('_token');
        //return Session::get('_token');
//        return Session::get('name', function () {
//            return 'no session name';
//        });

        //return \session('_token');
        //return Session::has('_token');

        //Session::put('name', 'Mr.Lee');
        //return Session::get('name');

//        Session::push('info.name', 'Mr.Lee');
//        Session::push('info.name', 'Mr.Wang');
//        Session::push('info.name', 'Mr.Zhang');
//        return Session::get('info');

        //Session::flash('name', 'Mr.Lee');
        //return Session::get('name');

        //Session::flash('name', 'Mr.Lee');
        //Session::put('age', 100);

        //return Session::all();

        //Session::flash('name', 'Mr.Lee');
        //Session::reflash();
        //return Session::get('name');

        //Session::forget('info');
        //return Session::all();

        //Session::regenerate();
        return Cookie::get('laravel_session');
    }


}










