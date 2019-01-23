<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class FrontController extends Controller
{
   public function index(){
   	$products=Product::all();
   	return view('front.home',compact('products'));
   }

   public function shirts(){
   	$shirts=Product::all();
   	return view('front.shirts',compact('shirts'));
   }

   public function shirt(){
   	return view('front.shirt');
   }
}
