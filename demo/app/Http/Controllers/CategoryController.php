<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends FrontendController
{
    public function getListProduct(Request $request)
    {
        $url = $request->segments()['1'];
        $url = preg_split('/(-)/i', $url);
        if($id = array_pop($url))
        {
            $product = Product::where([
                'pro_category_id' => $id,
                'pro_active'      => Product::STATUS_PUBLIC
            ])->orderBy('id', 'DESC')->paginate(10);

            $cateProduct = Category::find($id);

            $viewData = [
                'product' => $product,
                'cateProduct' => $cateProduct
            ];

            return view('product.index', $viewData);
        }
        return redirect('/');
    }
}
