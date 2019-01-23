<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $products=Product::all();
     return view('admin.product.index',compact('products'));
    }

   public function index2()
    {
     $products=Product::all();
     return view('front.products.index',compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id');
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               $formInput=$request->except('image');

//        validation
        $this->validate($request,[
            'name'=>'required',
            'size'=>'required',
            'price'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:10000'
        ]);
//        image upload
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']='/images/'.$imageName;
        }

        Product::create($formInput);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $product=Product::find($id);
     $categories=Category::all();
     return view('front.products.details',compact('product','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $product=Product::findOrFail($id);
          $categories=Category::pluck('name','id');
      return view('admin.product.edit',compact('categories'))->with('product',$product);
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
    $this->validate($request,[
        'name'=>'required',
        'size'=>'required',
        'price'=>'required',
        'image'=>'required|image|mimes:png,jpg,jpeg|max:10000'
        ]);
    $formInput=$request->except('image');
      $product=Product::findOrFail($id);
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']='/images/'.$imageName;
        }
      $product->update($formInput);
       return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $product=Product::find($id);
      $product->delete();
      return redirect('/products');
    }
}
