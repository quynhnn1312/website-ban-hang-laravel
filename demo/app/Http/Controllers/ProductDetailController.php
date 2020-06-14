<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductDetailController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function productDetail(Request $request)
    {
        $url = $request->segments()['1'];
        $url = preg_split('/(-)/i', $url);
        if($id = array_pop($url))
        {
            $productDetail = Product::where('pro_active', Product::STATUS_PUBLIC)->find($id);
            $cateProduct = Category::find($productDetail->id);
            $ratings = Rating::with('user:id,name')->where('ra_product_id',$id)->orderBy('id','Desc')->paginate(10);
            $viewData = [
                'productDetail' => $productDetail,
                'ratings' => $ratings,
                'cateProduct' => $cateProduct
            ];

            return view('product.detail', $viewData);
        }

        return redirect('/');
    }
}
