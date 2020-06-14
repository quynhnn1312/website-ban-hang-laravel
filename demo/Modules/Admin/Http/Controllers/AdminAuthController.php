<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        return view('admin::auth.login');
    }
    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (\Auth::guard('admins')->attempt($data)) {
            // Authentication passed...
            return redirect()->route('admin.home');
        }
        return redirect()->back();
    }
}
