<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\StorageModel;

class StorageController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    
    public function index()
    {   
        $storageModel = StorageModel::all();
        return view('storage.add_storage',$storageModel);
    }
    public function check_product(Request $p_request){
        $check_product = $p_request->input('checkproduct_code');
        $productModel = new ProductModel();
        //select('product.name as ten','storage.soluong as soluong') 
        $result = $productModel
        ->select('tbl_product.*','tbl_storage.product_sl')
        ->where('tbl_product.product_code',$check_product)
        ->leftJoin('tbl_storage','tbl_storage.product_code','tbl_product.product_code')
            ->get();
        $data['result'] = $result;
        return view('storage.add_storage',$data);
    }
    public function update_storage(Request $p_request){
        $check_product = $p_request->input('checkproduct_code');
        $product_code = $p_request->input('product_code');
        $product_slnt = $p_request->input('product_slnt');
        $product_slht = $p_request->input('product_slht');
        
        $storageModel = new StorageModel();
        $check = $storageModel->where('product_code',$check_product)->get();
        if(count($check)>0) {
            //da co product code tren bang kho -> update
            $storageModel->where('product_code',$check_product)
            ->update([
                'product_sl' => $product_slht+$product_slnt
            ]);
            return redirect('add-storage')->with('success','Update Storage Successfully');
        } else {
            //chua co product code tren bang kho -> insert
            $storageModel->create([
                'product_code' => $product_code,
                'product_sl' => $product_slht+$product_slnt
            ]);
            return redirect('add-storage')->with('success','Create Storage Successfully');
        }
    }
}
