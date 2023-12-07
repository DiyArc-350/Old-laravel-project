<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductInfoModel;
use App\Models\ProductModel;

class ProductInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $info = ProductInfoModel::select('*')->where('product_info_deletestatus', '=', 0)->get();
        $info = ProductInfoModel::leftjoin('product', 'product.product_code', '=', 'product_info.product_code')
                ->leftjoin('product_category', 'product_category.product_category_code', '=', 'product.product_category_code')
                ->where('product_info_deletestatus', '=', 0)->orderBy('product_info_insertdate','DESC')
                ->get();


        // dd($product);


        return view('backend.product_info.product_info_list', [
            'title' => 'Produk Info List',
            'rows' => $info
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = ProductModel::select('product_code', 'product_name')->where('product_deletestatus', '=', 0)->get();

        return view('backend.product_info.create_product_info',[
            'title' => 'Create Product Info',
            'category' => 'E-Commerse',
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->product_info_name as $key=>$insert) {
            $product_info_code = "PRI-".date('Y').rand(100,999).substr(time(), -3);
            $data = [
                'product_info_code'   =>$product_info_code,
                'product_code'   =>$request->product_code,
                'product_info_name'   =>$request->product_info_name[$key],
                'product_info_value'   =>$request->product_info_value[$key],
                'product_info_visible'   =>$request->product_info_visible[$key],
                'product_info_deletestatus' => '0',
                'product_info_insertdate' => date('Y-m-d H:i:s'),
            ];
            ProductInfoModel::insert($data);
        }

        return redirect()->to(route('product.info.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductModel::select('product_code', 'product_name')->where('product_deletestatus', '=', 0)->get();
        $row = ProductInfoModel::where('product_info_id', '=', $id)->first();

        return view('backend.product_info.product_info_detail',[
            'title' => 'Update Product Info',
            'category' => 'E-Commerse',
            'row' => $row,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'product_code'   =>$request->product_code,
            'product_info_name'   =>$request->product_info_name,
            'product_info_value'   =>$request->product_info_value,
            'product_info_visible'   =>$request->product_info_visible,
            'product_info_updatedate' => date('Y-m-d H:i:s'),
        ];
        ProductInfoModel::where('product_info_id', $id)->update($data);

        return redirect()->to(route('product.info.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        ProductInfoModel::where('product_info_id', $id)->update([
            'product_info_deletedate' => date('Y-m-d H:i:s'),
            'product_info_deletestatus' => 1
        ]);

        return redirect()->back();
    }
}
