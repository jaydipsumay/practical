<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use File;
use Validator,Redirect,Response;

class ProductController extends Controller
{
    public function index()
    {
        $Product=Product::get();
        return view('Product_list',compact('Product'));
    }
    public function createOrEdit($id=NULL)
    {
        if(empty(count(Category::get()))){
            return Redirect::to('/')->with('danger', 'Please Insert at list one Category'); 
        }
        else{
            return view('Product_createOrEdit', [
                'product'        => $id ? Product::where('id', $id)->firstOrFail() : new Product,
                'category'       => Category::get()
            ]);
        }
    }
    public function store(Request $request, $id = null)
    {
         $validated = $request->validate([
            'category'      => 'required|numeric',
            'product_name'  => 'required|string|max:255|min:2',
            'description'   => 'required|string|max:255|min:2',
            'price'         => 'required|numeric|min:1',
            'image'         => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'Status'        => 'required|boolean',

        ]); 
        $product = Product::firstOrNew(['id' => $id]);
        $product->category_id=$request->category;
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->status=$request->Status;
        $product->save();

        if($request->hasFile('image')){
            $imageName = $product->id.'.'.$request->image->extension();  
            $request->image->move(public_path('image'), $imageName);
            $product->image="image/".$imageName;
            $product->save();
        }
        return Redirect::to('/')->with('success', 'product Save successfully'); 
    }
    public function delete($id){
        Product::where('id',$id)->delete();
        return response()->json([
        'success' => 'Product deleted successfully!'
        ]);
    }
    public function delete_multiple($all_id){
        $array=explode(",",$all_id);
        foreach($array as $item){
            Product::where('id',$item)->delete();
        } 
        return Redirect::to('/')->with('success', 'Product Deleted successfully'); 
    }

}