<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth')->except('login', 'loginForm');
    }

    //
    public function loginForm()
    {
        return view('admin.entry.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\think\response\Redirect|void
     */
    public function login(Request $request)
    {
        $status = Auth::guard('admin')->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);
        if (!$status) {
            return redirect('/admin/login')->with('error', '用户名或密码错误');
        }
        return redirect('/admin/index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function index()
    {
        return view('admin.entry.index');
    }

    public function loginout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login')->with('error', '退出成功！');
    }

}
