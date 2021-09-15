<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator,Redirect,Response;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::get();

        return view('category_list',compact('category'));
    }
    public function createOrEdit($id = null)
    {
        	return view('category_createOrEdit', [
                'category'        => $id ? Category::where('id', $id)->firstOrFail() : new Category
    		]);
    }
    public function store(Request $request,$id=NULL)
    {
        $validated = $request->validate([
        'category_name' => 'required|string|max:255|min:2',
        'Status' => 'required|boolean',
    ]);
        $category = Category::firstOrNew(['id' => $id]);
        $category->name=$request->category_name;
        $category->status=$request->Status;
        $category->save();
        return Redirect::to('category')->with('success', 'Category Save successfully'); 
    }
    public function delete($id){
        Category::where('id',$id)->delete();
        return response()->json([
        'success' => 'Category deleted successfully!'
        ]);
    }
    public function delete_multiple($all_id){
        
        $array=explode(",",$all_id);
        foreach($array as $item){
            Category::where('id',$item)->delete();
        } 
        return Redirect::to('category')->with('success', 'Category Deleted successfully'); 
    }
}
