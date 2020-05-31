<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::whereRaw(1);

        $users = $users->orderBy('id', 'DESC')->paginate(10);

        $viewData = [
            'users' => $users
        ];

        return view('admin::user.index', $viewData);
    }



}
