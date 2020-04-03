<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\StorageModel;
use App\Models\OderModel;
use App\Models\OderDetailModel;

class OderController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    private $proModel;
    private $stoModel;
    public function __construct()
    {
        // $this->middleware('auth');
        $this->proModel = new ProductModel();
        $this->stoModel = new StorageModel();
    }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function index()
    {
        return view('oder.add_oder');
    }
    public function checkproduct(Request $p_request){
        $product_code = $p_request->input('product_code');
        $resutl = $this->proModel->where('tbl_product.product_code',$product_code)
        ->leftJoin('tbl_storage','tbl_storage.product_code','tbl_product.product_code')->first();
        return $resutl;
    }
    public function addnew(Request $p_request){
        $data = $p_request->input('data');
        $money = $p_request->input('money');
        // $user_id = Auth::user()->id;
        //insert Order
        $orderModel = new OderModel();

        $insert_value = ['money'=>$money,'user_id'=>'2','customer_name'=>'anh K'];
        $orderModel = new OderModel();
        $order_id = $orderModel->create($insert_value);

        // $id = $order_id->oder_id;
        echo "<pre>";
        print_r($order_id->oder_id  );
        echo '</pre>';
        //print_r($order_id->oder_id) ;
        die();
        //insert Odrer Detail
        // $data_insert = [];
        // foreach($data as $item){
        //     $insert_value = [
        //         'oder_id' => $order_id,
        //         'product_code' => $item['product_code'],
        //         'soluong' => $item['soluong'],
        //         'giathanh' => $item['price']
        //     ];
        //     $data_insert[] = $insert_value;
        // }
        // $orderDetailModel = new OderDetailModel();
        // $result = $orderDetailModel->insert($data_insert);
    }
}
