<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;
use App\Models\ProductCategoryModel;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produccate = ProductCategoryModel::select('*')->where('product_category_deletestatus', '=', 0)->get();
        return view('backend.product_category.product_category_list', [
            'title' => 'Product Category List',
            'rows' => $produccate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = CompanyModel::select('*')->where('company_deletestatus', '=', 0)->get();
        return view('backend.product_category.create_product_category',[
            'title' => 'Create Product Category',
            'company' => $company
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
        ProductCategoryModel::insert([
            'company_code' => $request->company_code,
            'product_category_code' => 'CTG-'.rand(100,999).date('ydh'),
            'product_category_parent' => $request->product_category_parent,
            'product_category_name' => $request->product_category_name,
            'product_category_info' => $request->product_category_info,
            'product_category_sort' => $request->product_category_sort,
            // 'product_icon' => $request->product_icon,
            // 'product_icon_size' => $request->product_icon_size,
            // 'product_icon_filetype' => $request->product_icon_filetype,
            // 'product_icon_ext' => $request->product_icon_ext,
            // 'product_picture' => $request->product_picture,
            // 'product_picture_size' => $request->product_picture_size,
            // 'product_picture_filetype' => $request->product_picture_filetype,
            // 'product_picture_ext' => $request->product_picture_ext,
            'product_category_deletestatus' => '0',
            'product_category_insertby' => '100',
            'product_category_insertdate' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to(route('product-category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = CompanyModel::select('*')->where('company_deletestatus', '=', 0)->get();
        $category = ProductCategoryModel::where('product_category_id', '=', $id)->first();

        return view('backend.product_category.product_category_detail',[
            'title' => 'Update Category',
            'company' => $company,
            'row' => $category
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
        ProductCategoryModel::where('product_category_id', '=', $id)->update([
            'company_code' => $request->company_code,
            'product_category_parent' => $request->product_category_parent,
            'product_category_name' => $request->product_category_name,
            'product_category_info' => $request->product_category_info,
            'product_category_sort' => $request->product_category_sort,
            // 'product_icon' => $request->product_icon,
            // 'product_icon_size' => $request->product_icon_size,
            // 'product_icon_filetype' => $request->product_icon_filetype,
            // 'product_icon_ext' => $request->product_icon_ext,
            // 'product_picture' => $request->product_picture,
            // 'product_picture_size' => $request->product_picture_size,
            // 'product_picture_filetype' => $request->product_picture_filetype,
            // 'product_picture_ext' => $request->product_picture_ext,
            'product_category_updatedate' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to(route('product-category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        ProductCategoryModel::where('product_category_id', $id)->update([
            // 'update_date' => date('Y-m-d H:i:s'),
            // 'update_by' => Auth()->user()->employee_id,
            'product_category_deletedate' => date('Y-m-d H:i:s'),
            // 'delete_by' => Auth()->user()->employee_id,
            'product_category_deletestatus' => 1
        ]);

        return redirect()->to(route('product-category.index'));
    }
}
