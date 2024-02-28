<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function categories(){
        $category=Category::all();
       
        return view('admin.category.category',[
            'categories'=>$category,
        ]);
    }
    function categories_store(Request $request){
        $request->validate([
            'category_name'=>'required',
            'category_img'=>['image','mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        $category_img=$request->category_img;
        $extension=$category_img->extension();
        $file_name=Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(1000000,9000000).'.'.$extension;
        $category_img->move(public_path('upload/category'),$file_name);
       

        Category::insert([
            'category_name'=>$request->category_name,
            'category_img'=>$file_name,


        ]);
        return back()->with('success','Category Added Sucessfully');
    }
    function categories_edit($id){
        $category=Category::find($id);
        return view('admin.category.category_edit',[
            'category'=>$category,
        ]);
    }
    function categories_update(Request $request,$id){
        $category=Category::find($id);
        $request->validate([
            'category_name'=>'required',
            'category_img'=>['image','mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
      
        if($category->category_img==null){
            $category_img=$request->category_img;
            $extension=$category_img->extension();
            $file_name=Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(1000000,9000000).'.'.$extension;
            $category_img->move(public_path('upload/category'),$file_name);
            $category=Category::find($id)->update([
                'category_name'=>$request->category_name,
                 'category_img'=>$file_name
            ]);

        }
        else{
            $curent_img=public_path('upload/category/'.$category->category_img);
            unlink($curent_img);
            $category_img=$request->category_img;
            $extension=$category_img->extension();
            $file_name=Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(1000000,9000000).'.'.$extension;
            $category_img->move(public_path('upload/category'),$file_name);
            Category::find($id)->update([
                'category_name'=>$request->category_name,
                'category_img'=>$file_name,
    
    
            ]);
        }
        return back()->with('success','Category Updated Successfully');
      
        

    }
    function categories_delete($id){
        Category::find($id)->delete();
        return back()->with('success','Category Delete Successfully');

    }
}
