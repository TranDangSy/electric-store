<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class AdminController extends Controller
{

    function __construct()
    {
        $this->middleware('checklevel')->except(['register', 'store_register', 'getLogin', 'postLogin', 'logout']);
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:3|max:32'
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn nhập chưa đúng định dạng',
                'password.required' => 'Bạn chưa nhập password',
                'password.min' => 'Password không được ít hơn 3 kí tự',
                'password.max' => 'Password không được nhiều hơn 32 kí tự'
            ]);

        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password], $request->has('remember')))
        {
            return redirect('admin');
        }
        else
        {
            return redirect('admin/login')->withErrors('Tên hoặc mật khẩu không đúng hoặc bạn không có quyền đăng nhập');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('admin/login');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function register()
    {
        return view('create');
    }

    public function create()
    {
        return view('admin/user/create');
    }

    public function store_register(StoreUserRequest $request)
    {
        $avatar = $this->upload($request->file('file'), 'admin_asset/img/user/');
        $request->merge(['avatar' => $avatar]);
        $users = User::create($request->all());

        return redirect('register')->with('thongbao','Tạo tài khoản thành công hãy đăng nhập');
    }

    public function store(StoreUserRequest $request)
    {
        $avatar = $this->upload($request->file('file'), 'admin_asset/img/user/');
        $request->merge(['avatar' => $avatar]);
        $users = User::create($request->all());

        return redirect('admin/users')->with('thongbao','Tạo tài khoản thành công');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->save();

        return redirect('admin/users');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return back();
    }

    public function upload($file, $path)
    {
        $name = sha1(date('YmdHis') . Str::random(30) . Str::random(2)) . '.' . $file->getClientOriginalExtension();

        $file->move($path, $name);

        return $path . $name;
    }
}
