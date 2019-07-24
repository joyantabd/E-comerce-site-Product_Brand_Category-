<?php

namespace App\Http\Controllers\Admin;


use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Compound;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.pages.brand.index',compact('brands'));
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
            if (!file_exists('uploads/brand'))
            {
                mkdir('uploads/brand', 0777 , true);
            }
            $image->move('uploads/brand',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->image = $imagename;
        $brand->save();
        return redirect()->route('brand.index')->with('successMsg',' A Brand  info Successfully Added !!!');

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
        $brand = Brand::find($id);
        return view('admin.pages.brand.edit',compact('brand'));
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

        $brand = Brand::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/brand'))
            {
                mkdir('uploads/brand',0777,true);
            }
            unlink('uploads/brand/'.$brand->image);
            $image->move('uploads/brand',$imagename);
        }else{
            $imagename = $brand->image;
        }
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->image = $imagename;
        $brand->save();
        return redirect()->route('brand.index')->with('successMsg','Existing Slider info Successfully Added !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if(file_exists('uploads/brand/'.$brand->image))
        {

            unlink('uploads/brand/'.$brand->image);
        }

        $brand->delete();
        return redirect()->back()->with('successMsg','Brand Information Deleted Successfully !!!');
    }
}
