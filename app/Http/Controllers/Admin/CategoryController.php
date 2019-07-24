<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Compound;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        return view('admin.pages.category.index',compact('categories','main_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/category'))
            {
                mkdir('uploads/category', 0777 , true);
            }
            $image->move('uploads/category',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->image = $imagename;
        $category->save();
        return redirect()->route('category.index')->with('successMsg',' A Category  info Successfully Added !!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $category= Category::find($id);
        if (!is_null($category)) {
            return view('admin.pages.category.edit', compact('category', 'main_categories'));
        }else {
            return redirect()->route('admin.pages.category');
        }
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

        $category = Category::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/category'))
            {
                mkdir('uploads/category',0777,true);
            }
            unlink('uploads/category/'.$category->image);
            $image->move('uploads/category',$imagename);
        }else{
            $imagename = $category->image;
        }
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->image = $imagename;
        $category->save();
        return redirect()->route('category.index')->with('successMsg','Existing Category info Successfully Added !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(file_exists('uploads/category/'.$category->image))
        {

            unlink('uploads/category/'.$category->image);
        }

        $category->delete();
        return redirect()->back()->with('successMsg','Category Information Deleted Successfully !!!');
    }
}
