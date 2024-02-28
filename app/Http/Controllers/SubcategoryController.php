<?php

namespace App\Http\Controllers;

use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    function subcategory(){
        return view('admin.subcategory.subcategory');
    }
    function subcategory_store(Request $request){
        $request->validate([
            'subcategory_name'=>'required',
            'category_id'=>'required',
        ]);
        Subcategory::insert([
            'subcategory_name'=>$request->subcategory_name,
            'category_id'=>$request->category_id,

        ]);
        return back()->with('success','Subcategory Added Successfully');

    }
    function subcategory_delete($id){
        Subcategory::find($id)->delete();
        return back()->with('delete','Subcategory Delete Successfully');
    }
    function product(){
        return view('admin.product.product');
    }
    function GetCategory(Request $request){
        $str='<option>Select Subcategory</option>';
        $subcategory=Subcategory::where('category_id',$request->category_id)->get();
        foreach($subcategory as $sub){
            $str.='<option vlaue="'.$sub->id.'">'.$sub->subcategory_name.'</option>';
        }
        echo $str;
       
    }
}
