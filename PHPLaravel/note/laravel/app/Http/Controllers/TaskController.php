<?php
namespace App\Http\Controllers;
use App\Http\Models\User;
use App\Http\Requests\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index()
    {
        //$this->middleware('中间件');
        //return 'task index';
        //echo Route::currentRouteAction();
        //return view('task', ['id'=>10]);

        //return 'index';
        //return response('index');
        //return [1, 2, 3];
        //return response([1, 2, 3]);
        //return response()->json([1, 2, 3]);

        //return response('index', 201);
        //return response('<b>index</b>')
        //        ->header('Content-type', 'text/plain');

//        return response()->view('task', ['id'=>10])
//                ->header('Content-type', 'text/plain');


        return view('index', [
            'list'  =>  ['id'=>1, 'name'=>'Mr.Lee', 'gender'=>'男']
        ])->with('name', '&');
    }

    public function read($id)
    {
        return 'id:'.$id;
    }

    public function url()
    {
        //$url = route('task.index', ['id'=>10], false);
        //return $url;
        //return redirect()->route('task.index');

        $url = route('task.abc.index');
        return $url;
    }

    public function form()
    {
        return view('form');
    }

    public function page()
    {
        //$users = DB::table('users')->paginate(1);
        $users = User::paginate(1);

        return view('data', [
            'list'      =>  $users
        ]);
    }

    public function receive(Request $request)
    {
//        $request->validate([
//            'username'      =>  'required|min:2|max:10',
//            'password'      =>  'required|min:6'
//        ]);

        //dd($request->validated());


        $validator = Validator::make($request->post(), [
            //'username'      =>  'required|min:2|max:10',
            //'username'      =>  'required|alpha_dash',
            //'username'      =>  'required|between:2,6',
            //'username'      =>  'required|size:2',
            //'username'      =>  'required|email',
            //'username'      =>  'required|unique:users',
            //'username'      =>  'required|different:password',
            //'username'      =>  'required|ip',
            //'username'      =>  'required|json',
            //'username'      =>  'required|in:tom,jack,lusy',
//            'username'      =>  [
//                        'required',
//                        Rule::in(['tom', 'jack', 'lusy'])
//            ],

            'username'      =>  Rule::unique('users')->where(function ($query) {
                $query->where('id', 20);
            }),

            'password'      =>  'required|min:6|confirmed'
        ]);

        $validator->after(function ($validator) {
            //判断你要判断的内容
            //$validator->errors()->add('info', '字段info有误~');
        });


        if ($validator->fails()) {
            return redirect('/task/form')->withErrors($validator)->withInput();
        }


        return '恭喜验证成功！';
    }

    public function user()
    {
        return view('user', [
            'name'  =>  'Mr.Lee',
            'num'   =>  4,
            'obj'   =>  User::all()
        ]);

//        return View::make('user', [
//            'name'  =>  'Mr.Lee'
//        ]);

        //return view('admin.index');
        //return view()->exists('admin.index');

//        return view()->first(['form', 'user', 'def'], [
//            'name'  =>  'Mr.Lee'
//        ]);
    }

}
