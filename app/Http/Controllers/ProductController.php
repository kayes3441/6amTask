<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use Validator;
class ProductController extends BaseController
{
    /**
     * index function
     */
    public function index(){
        return view('admin.product.index',[

            'categories'        => Category::all(),
            'brands'            => Brand::all(),
        ]);
    }

    /**
     * Create function
     */
    public function create(Request $request){

        //return $request->all();
        $validator = Validator::make($request->all(),[
            'category_id'            =>'required',
            'brand_id'               =>'required',
            'product_name'           =>'required',
            'stock_amount'           =>'required|numeric',
            'price'                  =>'required|numeric',
            'description'            =>'required',


        ]);
        if ($validator->fails()){
            return $this->sendError('Validator Error',$validator->errors());
        }

        $product                = new Product();
        $product->category_id   = $request->category_id;
        $product->product_name  = $request->product_name;
        if ($request->brand_id == 'new'){
            $brand              = new Brand();
            $brand->brand_name  =$request->brand_name;
            $brand->save();
            $product->brand_id  = $brand->id;
        }
        else {

            $product->brand_id  = $request->brand_id;
        }

        $product->stock_amount  = $request->stock_amount;
        $product->price         = $request->price;
        $product->description   = $request->description;
        $product ->save();
        if($request->hasFile('product_image')){
            foreach ($request->file('product_image') as $img){
                $product_image                = new ProductImage();
                $img_file                   = $img;
                $image_name                 = $img_file->getClientOriginalName();
                $directory                  ='ProductImages/';
                $img_file                   ->move($directory,$image_name);

                $product_image->product_id  =$product->id;
                $product_image->image       =$image_name;
                $product_image->save();
            }
        }


        return redirect()->back()->with('message','Product Create Successfully');

    }

    /**
     * showing Data in DataTable
     */

    public function manage(){
        $product = Product::orderBy('id','desc')->with('category','brand')->get();
        return view('admin.product.manage',[
           'products'=> $product,
        ]);
    }


    /**
     * editing Page
     */
    public function edit($id){

        $product        = Product::find($id);
        $productImage   = ProductImage::where('product_id',$id)->get();
        //return $productImage;
        return view('admin.product.edit',
        [
            "product"      => $product,
            "categories"    => Category::all(),
            "brands"        => Brand::all(),
            "productImages" => $productImage,

        ]);
    }

    /**
     * updating  the Data
     */
    public function update(Request $request,$id){

        $validator = Validator::make($request->all(),[
            'category_id'            =>'required',
            'brand_id'               =>'required',
            'product_name'           =>'required',
            'stock_amount'           =>'required|numeric',
            'price'                  =>'required|numeric',
            'description'            =>'required',


        ]);
        if ($validator->fails()){
            return $this->sendError('Validator Error',$validator->errors());
        }

        $product                = Product::find($id);
        $product->category_id   = $request->category_id;
        $product->product_name  = $request->product_name;

        if ($request->brand_id == 'new'){
            $brand              = new Brand();
            $brand->brand_name  =$request->brand_name;
            $brand->save();
            $product->brand_id  = $brand->id;
        }
        else {

            $product->brand_id  = $request->brand_id;
        }

        $product->stock_amount  = $request->stock_amount;
        $product->price         = $request->price;
        $product->description   = $request->description;
        $product ->save();



        if($request->hasFile('product_image')){

            $productImage   = ProductImage::where('product_id',$id)->get();

            foreach($productImage as $image){
                if (file_exists($image->image))
                {
                    unlink($image->image);
                }
                $image->delete();
            }
            foreach ($request->file('product_image') as $img){
                $product_image                = new ProductImage();
                $img_file                   = $img;
                $image_name                 = $img_file->getClientOriginalName();
                $directory                  ='ProductImages/';
                $img_file                   ->move($directory,$image_name);


                $product_image->product_id  =$product->id;
                $product_image->image       =$image_name;
                $product_image->save();
            }
        }

        return redirect('/product/manage')->with('message','Product Update Successfully');
    }



    /**
     * deleting the Data
     */
    public function delete($id){
        $product = Product::find($id)->delete();

        $productImage   = ProductImage::where('product_id',$id)->get();
        foreach($productImage as $image){
            if (file_exists($image->image))
            {
                unlink($image->image);
            }
            $image->delete();
        }

        return redirect('/product/manage')->with('message','Product Deleted Successfully');

    }
}
