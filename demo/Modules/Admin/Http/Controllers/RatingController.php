<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('user:id,name', 'product:id,pro_name')->paginate(10);
        $viewData = [
          'ratings' => $ratings
        ];
        return view('admin::rating.index', $viewData);
    }

    public function destroy($id)
    {
        Rating::destroy($id);
        return redirect()->back();
    }

}
