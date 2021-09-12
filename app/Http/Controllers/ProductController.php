<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    public function index()
    {
       
        $products=Product::all();
        return view('product.index')->with('products',$products);
        //$arr=Array('product'=>$product);
        //return view('product.index',$arr);
    }
    /*public function read()
    {
        $prod=DB::table('products')->get;
        return view('home',compact('$prod'));
    
    }*/
    public function search()
    {
       
        $search= request()->input('search');
        $products=Product::where('product_name','like',"%$search%")
        ->orwhere('description','like',"%$search%")->get();
        return view('product.search')->with('products',$products);
        
    }
    public function category($category)
    {   
        
       // $products=Product::all();
       $products=Product::where('product_category','like',$category)->get();   
       
        return view('product.category')->with('products',$products);       
    }
}
