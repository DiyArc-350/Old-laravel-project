<?php

namespace App\Http\Controllers;

use Image;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\DiscountModel;
use App\Models\ProductInfoModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductDiscountModel;
use App\Models\ProductImageModel;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = ProductModel::select('*')->where('product_deletestatus', '=', 0)->get();
        $product = ProductModel::leftjoin('product_category', 'product_category.product_category_code', '=', 'product.product_category_code')
                ->where('product_deletestatus', '=', 0)
                ->get();

        return view('backend.product.product_list', [
            'title' => 'Product List',
            'rows' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discount = ProductDiscountModel::select('*')->where('product_discount_deletestatus', '=', 0)->get();;
        $category = ProductCategoryModel::select('*')->where('product_category_deletestatus', '=', 0)->get();
        return view('backend.product.create_product',[
            'title' => 'Create Product',
            'discount' => $discount,
            'category' => 'E-Commerce',
            'ctg' => $category  
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
        $validatedData = $request->validate([
            'product_picture' => 'required|mimes:jpeg,png,jpg'
          ]);
        $file = $request->file('product_picture');
        $fileName = $file->getClientOriginalName().'_'.time().'.'.pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

        //save file 
        $productimg = $file->storeAs('public/images/product_temp', $fileName);
        $iconimg = $file->storeAs('public/images/icon_temp', $fileName);

        
        // file path in prj folder
        $icon = public_path('storage/images/icon_temp/' . $fileName);
        $picture = public_path('storage/images/product_temp/' . $fileName);
        // dd($icon);
        
        //compress image
        $product_picture = Image::make($picture)->resize('700', null, function($constraint) {
            $constraint->aspectRatio();
        }); 
        $product_picture->save($picture);

        $product_icon = Image::make($icon)->resize('150', null, function($constraint) {
            $constraint->aspectRatio();
        });
        $product_icon->save($icon);
        
        
        ProductModel::insert([
            'product_category_code' => $request->product_category_code,
            'discount_code' => $request->discount_code,
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'product_info' => $request->product_info,
            'product_sort' => $request->product_sort,
            'product_sku' => $request->product_sku,
            'product_price_sell' => $request->product_price_sell,
            'product_price_purchase' => $request->product_price_purchase,
            'product_stock' => $request->product_stock,
            'product_unit' => $request->product_unit,
            'product_heavy' => $request->product_heavy,
            'product_icon' => file_get_contents($icon),
            'product_icon_filename' => $fileName,
            'product_icon_filesize' => Storage::size('public/images/icon_temp/' . $fileName),
            'product_icon_filetype' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_icon_fileext' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_picture' => file_get_contents($picture),
            'product_picture_filename' => $fileName,
            'product_picture_filesize' => Storage::size('public/images/product_temp/' . $fileName),
            'product_picture_filetype' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_picture_fileext' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_deletestatus' => '0',
            'product_insertby' => '100',
            'product_insertdate' => date('Y-m-d H:i:s'),
        ]);

        ProductImageModel::insert([
            'product_code' => $request->product_code,
            'product_image_code' => "PIMG-".date("y").rand(100,999).substr(time(),-3),
            'product_image_big' => file_get_contents($picture),
            'product_image_big_filename' => $fileName,
            'product_image_big_filesize' => Storage::size('public/images/product_temp/' . $fileName),
            'product_image_big_filetype' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_image_big_fileext' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_image_small' => file_get_contents($icon),
            'product_image_small_filename' => $fileName,
            'product_image_small_filesize' => Storage::size('public/images/icon_temp/' . $fileName),
            'product_image_small_filetype' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_image_small_fileext' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_image_deletestatus' => '0',
            'product_image_insertdate' => date('Y-m-d H:i:s'),
        ]);

        // foreach($request->product_info_name as $key=>$insert) {
        //     $product_info_code = "PRI-".date('Y').rand(100,999).substr(time(), -3);
        //     $data = [
        //         'product_info_code'   =>$product_info_code,
        //         'product_code'   =>$request->product_code,
        //         'product_info_name'   =>$request->product_info_name[$key],
        //         'product_info_value'   =>$request->product_info_value[$key],
        //         'product_info_deletestatus' => '0',
        //         'product_info_insertdate' => date('Y-m-d H:i:s'),
        //     ];
        //     ProductInfoModel::insert($data);
        // }

        $product_icon->destroy();
        $product_picture->destroy();
       // delete file
        $icon = Storage::delete('public/images/icon_temp/' . $fileName);
        $picture = Storage::delete('public/images/product_temp/' . $fileName);
    
        return redirect()->to(route('product.index'));
    }


    public function store_photo_detail(Request $request)
    {
        // $validatedData = $request->validate([
        //     'product_images[]' => 'required|mimes:jpeg,png,jpg'
        //   ]);
        // dd($request->all());
        
        foreach($request->file('product_images') as $img) {
            $product_image_code = "PIMG-".date("y").rand(100,999).substr(time(),-3);
            $file = $img;
            $fileName = $file->getClientOriginalName().'_'.time().'.'.pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
    
            //save file 
            $productimg = $file->storeAs('public/images/product_temp', $fileName);
            $iconimg = $file->storeAs('public/images/icon_temp', $fileName);
    
            
            // file path in prj folder
            $icon = public_path('storage/images/icon_temp/' . $fileName);
            $picture = public_path('storage/images/product_temp/' . $fileName);
            // dd($icon);
            
            //compress image
            $product_picture = Image::make($picture)->resize('500', null, function($constraint) {
                $constraint->aspectRatio();
            }); 
            $product_picture->save($picture);
    
            $product_icon = Image::make($icon)->resize('150', null, function($constraint) {
                $constraint->aspectRatio();
            });
            $product_icon->save($icon);

            ProductImageModel::insert([
                'product_code' => $request->product_code,
                'product_image_code' => $product_image_code,
                'product_image_big' => file_get_contents($picture),
                'product_image_big_filename' => $fileName,
                'product_image_big_filesize' => Storage::size('public/images/product_temp/' . $fileName),
                'product_image_big_filetype' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
                'product_image_big_fileext' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
                'product_image_small' => file_get_contents($icon),
                'product_image_small_filename' => $fileName,
                'product_image_small_filesize' => Storage::size('public/images/icon_temp/' . $fileName),
                'product_image_small_filetype' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
                'product_image_small_fileext' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
                'product_image_deletestatus' => '0',
                'product_image_insertdate' => date('Y-m-d H:i:s'),
            ]);
    
            $product_icon->destroy();
            $product_picture->destroy();
           // delete file
            $icon = Storage::delete('public/images/icon_temp/' . $fileName);
            $picture = Storage::delete('public/images/product_temp/' . $fileName);
        }

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $product = ProductModel::select('*')->where('product_code', '=', $code)->first();
        $productImg = ProductImageModel::select('*')->where('product_code', '=', $code)->where('product_image_deletestatus', '=', 0)->get();
        $discount = ProductDiscountModel::select('*')->where('product_discount_deletestatus', '=', 0)->get();
        $category = ProductCategoryModel::select('*')->where('product_category_deletestatus', '=', 0)->get();
        $info = ProductInfoModel::select('*')->where('product_code', '=', $code)->get();
        // dd($product);
        return view('backend.product.product_detail',[
            'title' => 'Detail product',
            'row' => $product,
            'img' => $productImg,
            'discount' => $discount,
            'category' => 'E-commerce',
            'ctg' => $category,
            'info' => $info
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
    public function update(Request $request, $code)
    {
        ProductModel::where('product_code', '=', $code)->update([
            'product_category_code' => $request->product_category_code,
            'discount_code' => $request->discount_code,
            'product_name' => $request->product_name,
            'product_info' => $request->product_info,
            'product_heavy' => $request->product_heavy,
            'product_sort' => $request->product_sort,
            'product_sku' => $request->product_sku,
            'product_price_sell' => $request->product_price_sell,
            'product_price_purchase' => $request->product_price_purchase,
            'product_stock' => $request->product_stock,
            'product_unit' => $request->product_unit,
            'product_updatedate' => date('Y-m-d H:i:s'),
        ]);
        // foreach($request->product_info_code as $key=>$update) {
        //     ProductInfoModel::where('product_info_code', '=', $request->product_info_code[$key])->update([
        //         'product_info_name'   =>$request->product_info_name[$key],
        //         'product_info_value'   =>$request->product_info_value[$key],
        //         'product_info_deletestatus' => '0',
        //         'product_info_updatedate' => date('Y-m-d H:i:s'),
        //     ]);
        // }
        return redirect()->to(route('product.index'));
    }


    public function update_thumbnail(Request $request, $code)
    {
        $validatedData = $request->validate([
            'product_picture' => 'required|mimes:jpeg,png,jpg'
          ]);
        $file = $request->file('product_picture');
        $fileName = $file->getClientOriginalName().'_'.time().'.'.pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

        //save file 
        $productimg = $file->storeAs('public/images/product_temp', $fileName);
        $iconimg = $file->storeAs('public/images/icon_temp', $fileName);

        
        // file path in prj folder
        $icon = public_path('storage/images/icon_temp/' . $fileName);
        $picture = public_path('storage/images/product_temp/' . $fileName);
        // dd($icon);
        
        //compress image
        $product_picture = Image::make($picture)->resize('700', null, function($constraint) {
            $constraint->aspectRatio();
        }); 
        $product_picture->save($picture);

        $product_icon = Image::make($icon)->resize('150', null, function($constraint) {
            $constraint->aspectRatio();
        });
        $product_icon->save($icon);
        

        ProductModel::where('product_code', '=', $code)->update([
            'product_icon' => file_get_contents($icon),
            'product_icon_filename' => $fileName,
            'product_icon_filesize' => Storage::size('public/images/icon_temp/' . $fileName),
            'product_icon_filetype' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_icon_fileext' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_picture' => file_get_contents($picture),
            'product_picture_filename' => $fileName,
            'product_picture_filesize' => Storage::size('public/images/product_temp/' . $fileName),
            'product_picture_filetype' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_picture_fileext' => pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION),
            'product_updatedate' => date('Y-m-d H:i:s'),
        ]);

        $product_icon->destroy();
        $product_picture->destroy();
       // delete file
        $icon = Storage::delete('public/images/icon_temp/' . $fileName);
        $picture = Storage::delete('public/images/product_temp/' . $fileName);
        
        return redirect()->to(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        ProductModel::where('product_code', $id)->update([
            'product_deletedate' => date('Y-m-d H:i:s'),
            'product_deletestatus' => 1
        ]);

        return redirect()->to(route('product.index'));
    }

    public function delete_product_images($id)
    {
        ProductImageModel::where('product_image_id', $id)->update([
            'product_image_deletedate' => date('Y-m-d H:i:s'),
            'product_image_deletestatus' => 1
        ]);

        return redirect()->back();
    }
}
