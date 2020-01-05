<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreUserRequest;

class AdminController extends Controller
{

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

        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin');
        }
        else
        {
            return redirect('admin/login')->withErrors('Tên hoặc mật khẩu không đúng hoặc bạn không có quyền đăng nhập');
        }
    }

    public function index()
    {
        //
    }

    public function create()
    {
        return view('create');
    }

    public function store(StoreUserRequest $request)
    {
        $avatar = $this->upload($request->file('file'), 'admin_asset/img/user/');
        $request->merge(['avatar' => $avatar]);
        $users = User::create($request->all());

        return redirect('create')->with('thongbao','Tạo tài khoản thành công hãy đăng nhập');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function upload($file, $path)
    {
        $name = sha1(date('YmdHis') . Str::random(30) . Str::random(2)) . '.' . $file->getClientOriginalExtension();

        $file->move($path, $name);

        return $path . $name;
    }
}
