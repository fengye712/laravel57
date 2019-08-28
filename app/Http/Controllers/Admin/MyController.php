<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPost;
use Auth;

class MyController extends Controller
{
    //
    public function changePass(AdminPost $request)
    {
        $model=Auth::guard('admin')->user();
        $model->password=bcrypt($request->input('password'));
        flash('密码修改成功');

        $model->save();
        return redirect('/admin/changePass')->with("error","密码修改成功");
    }

    public function changepassForm()
    {
        return view('admin.user.changepass');
    }

}
