<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productModels = ProductModel::all();
        return view('product.add_product')->with(compact('productModels'));
    }
    public function edit_product($id){
        $product_edit =ProductModel::find($id);
        return view('product.edit_product')->with(compact('product_edit'));
    }
    public function insert_product(Request $p_request){
        $filename = '';
        $product_name = $p_request->input('product_name');
        $product_code = $p_request->input('product_code');
        $product_type = $p_request->input('product_type');
        $product_price = $p_request->input('product_price');
        $product_image = $p_request->input('product_image');
        $product_nsx = $p_request->input('product_nsx');
        if($p_request->hasFile('product_image')){
            $file = $p_request->product_image;
            $filename = $product_code.date('yymdhis').'.png';
            $df = $file->getClientOriginalExtension();
            if($df !='png') {
                die('file ko hợp lệ');
            }
            $file->move('upload', $filename );
        }
        $productModel = new ProductModel();
        $insertValue = ['product_name' => $product_name,
        'product_code' => $product_code,
        'product_type' => $product_type,
        'product_price' => $product_price,
        'product_image' => $filename,
        'product_nsx' => $product_nsx ];
        $productModel->create($insertValue);
        return redirect('add-product')->with('success','Insert Data Successfully');
        
    }
    public function update_product(Request $p_request, $id){
        $productModel = ProductModel::find($id);
        $filename = '';
        $product_name = $p_request->input('product_name');
        $product_code = $p_request->input('product_code');
        $product_type = $p_request->input('product_type');
        $product_price = $p_request->input('product_price');
        $product_image = $p_request->input('product_image');
        $product_nsx = $p_request->input('product_nsx');
        if($p_request->hasFile('product_image')){
            $file = $p_request->product_image;
            $filename = $product_code.date('yymdhis').'.png';
            $df = $file->getClientOriginalExtension();
            if($df !='png') {
                die('file ko hợp lệ');
            }
            $file->move('upload', $filename );
    
        }
        $updateValue = ['product_name' => $product_name,
        'product_code' => $product_code,
        'product_type' => $product_type,
        'product_price' => $product_price,
        'product_image' => $filename,
        'product_nsx' => $product_nsx 
        ];
        $productModel->update($updateValue);
        $productModel->save();
        return redirect('add-product')->with('success','Update Data Successfully');
    }
    public function delete_product($id){
        $productModel = ProductModel::find($id);
        $productModel->delete();
        return redirect('add-product')->with('success','Delete Data Successfully');
    }
}
