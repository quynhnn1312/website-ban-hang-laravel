<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $transactions = Transaction::with('user:id,name')->paginate(10);
        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::transaction.index', $viewData);
    }

    public function viewOrder(Request $request, $id)
    {

            $orders = Order::with('product')->where('or_transaction_id', $id)->get();

            $html = view('admin::components.order',compact('orders'))->render();
            return response()->json($html);

    }

    /**
     * @param xu ly trang thai don hang
     */
    public function actionTransaction($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('or_transaction_id', $transaction->id)->get();

        if($orders)
        {
            // tang pay san pham len 1 don vi
            // tru di so luong cua san pham
            foreach ($orders as $order)
            {
                $product = Product::find($order->or_product_id);
                $product->pro_number = $product->pro_number - $order->or_qty;
                $product->pro_pay++;
                $product->save();
            }
        }
        // update user total_pay
        \DB::table('users')->where('id',$transaction->tr_user_id)->increment('total_pay');

        // cap nhat trang thai don hang
        $transaction->tr_status = Transaction::STATUS_DONE;
        $transaction->save();
        return redirect()->back()->with('xử lý đơn hàng thành công!');
    }

    public  function  action()
    {

    }
}
