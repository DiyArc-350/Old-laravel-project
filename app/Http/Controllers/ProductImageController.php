<?php

namespace App\Http\Controllers;

use Image;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\ProductImageModel;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $image = ProductImageModel::select('*')->where('product_image_deletestatus', '=', 0)->get();
        $image = ProductImageModel::leftjoin('product', 'product.product_code', '=', 'product_image.product_code')
                ->leftjoin('product_category', 'product_category.product_category_code', '=', 'product.product_category_code')
                ->where('product_image_deletestatus', '=', 0)->orderBy('product_image_insertdate','DESC')
                ->get();

        return view('backend.product_image.product_image_list', [
            'title' => 'Produk image List',
            'rows' => $image
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

        return view('backend.product_image.create_product_image',[
            'title' => 'Create Product Image',
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

        return redirect()->to(route('product.image.index'));
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
        $row = ProductImageModel::where('product_image_id', '=', $id)->first();

        return view('backend.product_image.product_image_detail',[
            'title' => 'Update Product Image',
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
        $product_image_code = "PIMG-".date("y").rand(100,999).substr(time(),-3);
        $file = $request->file('product_images');
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

        
        return redirect()->to(route('product.image.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        ProductImageModel::where('product_image_id', $id)->update([
            'product_image_deletedate' => date('Y-m-d H:i:s'),
            'product_image_deletestatus' => 1
        ]);

        return redirect()->to(route('product.image.index'));
    }
}
