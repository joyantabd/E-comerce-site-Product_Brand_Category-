<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Compound;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $brandCount = Brand::count();
        $categoryCount = Category::count();
    return view('admin.dashboard',compact('productCount','brandCount','categoryCount'));
    }
}
