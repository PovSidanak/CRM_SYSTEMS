<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function Product(){

        $product = Product::latest()->get();
        return view('backend.product',compact('product'));
    }//End Method
}
