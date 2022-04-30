<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Subcategory::with('category')->get();
        
        return view('subcategory.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::all();
    
    return view('subcategory.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'subcategory'=>'required|unique:subcategories,subcategory_name',
           'category'=>'required'
          
       ]);
      $res= Subcategory::create(['subcategory_name'=>$request->subcategory,'category_id'=>$request->category]);
      if($res){
          return redirect()->route('subcategory.index')->with('success',"subcategory Inserted");
      }else{
          return redirect()->back()->with('erros','Something went wrong!!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $cats=Category::all();
       $data=Subcategory::findOrFail($subcategory->id);
        return view('subcategory.edit',compact('data','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
         $request->validate([
             'category'=>'required',
            'subcategory'=>'required|unique:subcategories,subcategory_name,'.$subcategory->id,
         
        ]);

         $status=Subcategory::where('id',$subcategory->id)->update(['subcategory_name'=>$request->subcategory,'category_id'=>$request->category]);
         if($status){
            return redirect()->route('subcategory.index')->with('success','Subcategory Updated Successfully');
        }else{
         return redirect()->back()->with('error','Something went wrong!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $res=Subcategory::findOrFail($id);
   $status=$res->delete();
   if($status){
       return redirect()->back()->with('success','Subcategory Deleted Successfully');
   }else{
    return redirect()->back()->with('error','Something went wrong!!');
   }
    }


     public function GetSubCategory($category_id){

     	$subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
     	return json_encode($subcat);
     }
}
