<?php
namespace App\Http\Controllers;
use App\Http\Models\Book;
use App\Http\Models\Profile;
use App\Http\Models\Role;
use App\Http\Models\User;
use App\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Barryvdh\Debugbar\Facade as Debugbar;

class DataController
{
    public function index()
    {

        //Debugbar::enable();
        //Debugbar::info('信息！');

//        $users = User::all();
//        foreach ($users as $user) {
//            //Debugbar::info($user->username);
//            //Debugbar::info($user->toJson());
//            Debugbar::info($user->toArray());
//        }
//
//        return view('data');

        //原生SQL
        //$user = DB::select('SELECT * FROM laravel_user');
        //return $user;

        //查询构造器
        //$user = DB::table('laravel_user')->find(19);
        //dd($user);
        //return response()->json($user);
        //return [$user];

        //return Str::plural('child');
        //模型
        //$user = User::all();
        //return $user;


        //$users = DB::table('users')->get();
        //$users = DB::table('users')->first();
        //$users = DB::table('users')->value('email');
        //$users = DB::table('users')->find(20);
        //$users = DB::table('users')->pluck('username', 'id');

//        DB::table('users')->orderBy('id', 'desc')->chunk(3, function ($users) {
//            foreach ($users as $user) {
//                echo $user->username;
//            }
//            echo '---<br>';
//        });

        //return [$users];

        //return DB::table('users')->count();
        //return DB::table('users')->avg('price');

        //return [DB::table('users')->where('id', 19)->exists()];
        //return [DB::table('users')->where('id', 18)->doesntExist()];

        //$users = DB::table('users')->select('username as name', 'email')->get();
        //$base = DB::table('users')->select('username as name', 'email');
        //$users = $base->addSelect('gender')->get();

//        $users = DB::table('users')
//                    ->groupBy('gender')
//                    ->select(DB::raw('COUNT(*) AS count, gender'))
//                    ->get();

//         $users = DB::table('users')
////                ->groupBy('gender')
////                ->selectRaw('COUNT(*) AS count, gender')
////                ->havingRaw('count>5')
////                ->get();

        //$users = DB::table('users')->where('id', '=',19)->get();
        //$users = DB::table('users')->where('id',19)->get();
        //$users = DB::table('users')->where('id','>=',25)->get();
        //$users = DB::table('users')->where('username','like','%小%')->get();

//        $users = DB::table('users')->where([
//            'gender'    =>  '男',
//            'status'    =>  1
//        ])->toSql();

//        $users = DB::table('users')->where([
//            ['gender','=','男'],
//            ['price', '>=', 90]
//        ])->get();

//        $users = DB::table('users')->where('price', '>', '95')
//                                        ->orWhere('gender', '女')
//                                        ->toSql();

//        $users = DB::table('users')->where('price', '>', '95')
//                                        ->orWhere(function ($query) {
//                                            $query->where('gender', '女 ')->where('username', 'like', '%小%');
//                                        })->toSql();

        //$users = DB::table('users')->whereBetween('price',  [60,90])->toSql();
        //$users = DB::table('users')->whereNotBetween('price',  [60,90])->toSql();
        //$users = DB::table('users')->whereIn('id',  [20,30,50,90])->get();

        //$users = DB::table('users')->whereNull('uid')->toSql();
        //$users = DB::table('users')->whereDate('create_time', '2018-12-11')->toSql();
        //$users = DB::table('users')->whereYear('create_time', '2019')->get();
        //$users = DB::table('users')->whereDate('create_time','>', '2018-12-11')->toSql();

        //$users = DB::table('users')->whereColumn('create_time', 'update_time')->get();
        //$users = DB::table('users')->whereColumn('create_time', '>','update_time')->get();

        //$users = DB::table('users')->orderBy('id', 'desc')->get();
        //$users = DB::table('users')->latest('create_time')->get();
        //$users = DB::table('users')->inRandomOrder()->get();
        //$users = DB::table('users')->take(3)->toSql();
        //$users = DB::table('users')->limit(3)->toSql();
        //$users = DB::table('users')->skip(3)->take(3)->get();

//        $users = DB::table('users')->when(false, function ($query) {
//            $query->where('id', 19);
//        }, function ($query) {
//            $query->where('id', 20);
//        })->get();

        //$users = DB::table('users')->where('list->id', 19)->get();

//        $users = DB::table('users')->whereExists(function ($query) {
//            //$query->from('books')->whereRaw('laravel_books.user_id=laravel_users.id');
//            $query->selectRaw(1)->from('books')->whereColumn('books.user_id', 'users.id');
//        })->get();

//        $users = DB::table('users')->where('id', function ($query) {
//            $query->select('user_id')->from('books')->whereColumn('books.user_id', 'users.id');
//        })->get();

//        $users = DB::table('users')
//                    ->join('books', 'books.user_id', '=', 'users.id')
//                    ->join('profiles', 'profiles.user_id', '=','users.id')
//                    ->get();

//        $users = DB::table('users')
//                    ->leftJoin('books', 'books.user_id', '=', 'users.id')
//                    ->rightJoin('profiles', 'profiles.user_id', '=','users.id')
//                    ->toSql();

//        $users = DB::table('users')
//            ->select('username', 'email')
//            ->crossJoin('books')
//            ->distinct()
//            ->get();

//        $users = DB::table('users')->join('books', function ($join) {
//            $join->on('books.user_id', '=', 'users.id')->where('users.id', 19);
//        })->toSql();

        //子查询
//        $query = DB::table('books')->selectRaw('user_id, title');
//        $users = DB::table('users')->joinSub($query, 'books', function ($join) {
//            $join->on('books.user_id', '=', 'users.id');
//        })->get();

//        $query = DB::table('users');
//        $users = DB::table('users')->unionAll($query)->get();

//        $query = DB::table('users')->insert([
//            'username'  =>  '李白',
//            'password'  =>  '123456',
//            'email'     =>  'libai@163.com',
//            'details'   =>  '123'
//        ]);

//        $query = DB::table('users')->insert([
//            [
//                'username'  =>  '李白',
//                'password'  =>  '123456',
//                'email'     =>  'libai@163.com',
//                'details'   =>  '123'
//            ],[
//                'username'  =>  '李白',
//                'password'  =>  '123456',
//                'email'     =>  'libai@163.com',
//                'details'   =>  '123'
//            ]
//        ]);


//        DB::table('users')->insertOrIgnore([
//            'id'        =>  307,
//            'username'  =>  '李白',
//            'password'  =>  '123456',
//            'email'     =>  'libai@163.com',
//            'details'   =>  '123'
//        ]);

//        return DB::table('users')->insertGetId([
//            'username'  =>  '李白',
//            'password'  =>  '123456',
//            'email'     =>  'libai@163.com',
//            'details'   =>  '123'
//        ]);

//        DB::table('users')->where('id', 311)
//                    ->update([
//                        'username'  =>  '李红',
//                        'email'     =>  'lihong@163.com'
//                    ]);

//        DB::table('users')->updateOrInsert(
//            ['id'=>320],
//            [
//                'username'  =>  '李黑',
//                'password'  =>  '654321',
//                'email'     =>  'lihei@163.com',
//                'details'   =>  '321'
//            ]
//        );

//        DB::table('users')->where('id', 19)
//                ->update([
//                    'list->uid' =>  1010
//                ]);

        //DB::table('users')->where('id', 320)->increment('price', 2);


        //DB::table('users')->delete(307);
        //DB::table('users')->where('id', 308)->delete();
        //return [$users];

        //$users = User::all();
        //$users = User::get();

//        $users = User::where([
//            ['gender', '=', '男'],
//            ['price', '>', 95]
//        ])->limit(2)->get();
//
//
//        return [$users];

//        $users = new User();
//        $users->username = '辉夜';
//        $users->email    =  'huiye@163.com';
//        $users->password = '123';
//        $users->details  = '123';
//        $users->save();


//        $users = User::find(349);
//        $users->username = '夜辉';
//        $users->save();

        //$users = User::where('username', '夜辉');
        //$users->username = '辉夜';
        //$users->save();

//        User::where('username', '夜辉')
//                ->update([
//                    'username'  =>  '辉夜'
//                ]);

//        User::create([
//            'username'  =>  '辉夜',
//            'password'  => '123',
//            'email'     => 'huiye@163.com',
//            'details'   => '123',
//        ]);

//        $users = User::find(351);
//        $users->delete();

//        $users = User::where('username', '夜辉');
//        $users->delete();

        //User::destroy(348);
        //User::destroy([1,2,3]);


        //dd(\Request::all());

        //User::create(\Request::all());

        //$users = User::find(91);
        //$users->delete();
        //User::destroy(92);

        //$users = User::get();
        //$users = User::find(91);

        //$users = User::withTrashed()->get();
        //$users = User::withTrashed()->find(91);

        //$users = User::onlyTrashed()->get();
        //$users = User::onlyTrashed()->find(19);
        //return [$users];

        //$users = User::withTrashed()->find(91);
        //return $users->trashed();

        //$users = User::withTrashed()->find(92);
        //$users->restore();
        //$users->forceDelete();

//        $users = User::genderMale()
//                     ->where('price', '>', 90)
//                     ->get();


//        $users = User::gender('女', -3)
//                     ->where('price', '>', 90)
//                     ->get();

        //$users = User::get();
        //$users = User::withoutGlobalScope('status')->get();
        //$users = User::withoutGlobalScope(StatusScope::class)->get();

        //$users = User::find(19)->info;
        //dd($users);

//        User::create([
//            'username'  =>  '辉夜',
//            'password'  => '123',
//            'email'     => 'huiye@163.com',
//            'details'   => '123',
//        ]);


        //$collection = collect(['Mr.Zhang', '李四', '王五', null]);

        //dd($collection);
        //return $collection;

//        return $collection->map(function ($value, $key) {
//            return "$key.[$value]";
//        });

//        return $collection->filter(function ($value, $key) {
//            return $value === null;
//        });

//        return $collection->reject(function ($value, $key) {
//            return $value === null;
//        })->map(function ($value, $key) {
//            return "$key.[$value]";
//        });

        //return $collection->search('王五');

        //return $collection->chunk(2);

//        $collection->each(function ($value) {
//            echo $value;
//        });

//        Collection::macro('toUpper', function() {
//            return $this->map(function ($value) {
//                return strtoupper($value);
//            });
//        });
//
//        return $collection->toUpper();

        //$collection = collect(['Mr.Zhang', '李四', '王五', null]);
        //dd($collection->all());

        //$collection = collect([1, 2,2, 3, 4]);
        //return $collection->avg();
        //return $collection->count();
        //return $collection->countBy();

//        $collection = collect(['xiaoxin@163.com', 'yihu@163.com', 'xiaoying@qq.com']);
//
//        return $collection->countBy(function ($value) {
//            return substr(strrchr($value, '@'), 1);
//        });

        //$collection = collect([1, 2, 3, 4, 5]);
        //return $collection->diff([3, 5]);

        //$collection = collect([1, 2, 3, 4, 5]);
//        return $collection->first(function ($value) {
//            return $value > 2;
//        });

        //$collection = collect(['name'=>'Mr.Lee', 'details'=>['gender'=>'男', 'age'=>100]]);
        //return $collection->flatten();
        //return $collection->get('name');
        //return $collection->has('name');

        //$collection = collect([1, 2, 3, 4, 5]);
        //$collection->pop();
        //return $collection;
        //$collection = collect(['xiaoxin@163.com', 'yihu@163.com', 'xiaoying@qq.com']);
        //return $collection->slice(1);

        //$collection = collect([3, 1, 2, 5, 4]);
        //return $collection->sort()->values();
        //return $collection->sortDesc()->values();

//        $collection = collect([
//            ['name'=>'Mr.Lee', 'gender'=>'男'],
//            ['name'=>'Miss.Zhang', 'gender'=>'女']
//        ]);
//        return $collection->where('name', 'Mr.Lee');

        //$users = User::get();

        //dd($users);

//        $collection = $users->map(function ($user) {
//            $user->email = strtoupper($user->email);
//            return $user;
//        });

//        $collection = $users->filter(function ($user) {
//            return $user->gender === '女';
//        })->map(function ($user) {
//            $user->email = strtoupper($user->email);
//            return $user;
//        });

        //return $collection;

        //return $users->contains(19);
        //return $users->contains(User::find(19));

        //return $users->find(19);

        //return $users->diff(User::whereIn('id', [19,20,21])->get());
        //return $users->except([19,20,21]);
        //return $users->only([19,20,21]);
        //return $users->modelKeys();
        //return $users->count();


        //关联调用时，调用属性格式
        //$profiles = User::find(19)->profile;
        //return $profiles;

        //反向关联
        //$users = Profile::find(1)->user;
        //return $users;

        //一对多的正向关联
        //$books = User::find(19)->book;
        //return $books;

        //$books = User::find(19)->book()->where('id', 11)->get();
        //return $books;

        //$users = Book::find(11)->user;
        //return $users->username;

        //$roles = User::find(19)->role;
        //return $roles;

        //$roles = User::find(19)->role()->where('role_id', 1)->get();
        //return $roles;

        //$roles = User::find(19)->role;
        //return $roles->where('id', 1);

        //$users = Role::find(1)->user;
        //return $users->where('username', '小明');

        //$roles = User::find(19)->role;
        //return $roles;

        //$books = User::find(19)->book;
        //$books = User::find(19)->book()->get();

//        $books = User::find(19)->book()
//                    ->where('id', 1)
//                    ->orWhere('id', 11)
//                    ->get();

//        $books = User::find(19)->book()->where(function (Builder $query) {
//            $query->where('id', 1)->orWhere('id', 11);
//        })->get();

        //$users = User::has('book')->get();
        //$users = User::has('book', '>=', 3)->get();

//        $users = User::whereHas('book', function ($query) {
//            $query->where('user_id', 19);
//        })->get();

        //$users = User::doesntHave('book')->get();

        //$users = User::withCount('book')->get();
        //$users = User::withCount(['profile', 'book'])->get();

//        $users = User::withCount(['profile', 'book as b' => function ($query) {
//            $query->where('user_id', 19);
//        }])->where('id', 19)->get();
//        return $users;

//        $books = Book::all();
//
//        foreach ($books as $book) {
//            Debugbar::info($book->user->username);
//        }

//        $books = Book::with('user')->get();
//
//        foreach ($books as $book) {
//            Debugbar::info($book->user->username);
//        }

//        $books = Book::with('user:id,username')->get();
//
//        foreach ($books as $book) {
//            Debugbar::info($book->user);
//        }

//        $books = Book::with(['user' => function ($query) {
//            $query->where('id', 19);
//        }])->get();
//
//        foreach ($books as $book) {
//            if ($book->user != null) {
//                Debugbar::info($book->user->username);
//            }
//        }

//        $books = Book::all();
//
//        if (false) {
//            $books = $books->load('user');
//            foreach ($books as $book) {
//                Debugbar::info($book->user->username);
//            }
//        }

//        $users = User::all();
//
//        if (false) {
//            $users = $users->loadCount('book');
//        }
//        return $users;

        //$user = User::find(19);
        //$user->book()->save(new Book(['title' => '《哈利波特》']));

//        $user = User::find(19);
//        $user->book()->saveMany([
//            new Book(['title' => '《指环王》']),
//            new Book(['title' => '《霍比特人》']),
//        ]);

        //$user = User::find(19);
        //return $user->book()->firstOrCreate(['title' => '《修仙真人》']);

        //$user = User::find(99);
        //$user->book()->delete();
        //$user->book()->where(true)->update(['title'=>'《项链王》']);

//        $user = User::find(20);
//        $book = Book::find(30);
//        $book->user()->associate($user);
//        $book->save();

//        $book = Book::find(30);
//        $book->user()->dissociate();
//        $book->save();

//        $books = Book::with('user')->get();
//
//        foreach ($books as $book) {
//            Debugbar::info($book->user);
//        }

        $user = User::find(99);
        $roleId = 1;
        //$user->role()->attach($roleId, ['details'=>'喀']);

        //$user->role()->detach($roleId);
        //$user->role()->attach([1, 2, 3]);
        //$user->role()->detach([1, 2, 3]);
        //$user->role()->detach([1, 2, 3]);

        //$user->role()->sync([1, 2, 4]);
        //$user->role()->update(['details'=>'啦']);
        $user->role()->updateExistingPivot($roleId, ['details'=>'啪']);


        return view('data');


    }
}











