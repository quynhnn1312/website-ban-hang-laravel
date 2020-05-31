<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends FrontendController
{
    public function productDetail(Request $request)
    {
        $url = $request->segments()['1'];
        $url = preg_split('/(-)/i', $url);
        if($id = array_pop($url))
        {
            $productDetail = Product::where('pro_active', Product::STATUS_PUBLIC)->find($id);

            $viewData = [
                'productDetail' => $productDetail
            ];

            return view('product.detail', $viewData);
        }

        return redirect('/');
    }
}
