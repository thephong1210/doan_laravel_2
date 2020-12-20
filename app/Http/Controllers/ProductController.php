<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index(Request $request)
    {
        $param_search = $request->get('q');

        if (isset($param_search) && $request->has('q')) {
            $products = Product::with('category')->where('name', 'like', '%'. $param_search . '%')->get();
        }else {
            $products = Product::with('category')->orderByDesc('id')->get();
        }

        return view('admin.products.main', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $path = null;
        if ($request->file('image')) {
            $path = $request->file('image')->store('public/products');
        }

        $data = $request->all();
        $data['image'] = $path;
//        dd($data);
//        dd($data);

        $product = new Product($data);
        $product->save();

        $products = Product::with('category')->orderByDesc('id')->get();

        return view('admin.products.main', compact('products'))->with('message', 'Created successfully !');
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
        $products = Product::find($id);

        $categories = Category::all();

        return view('admin.products.edit',compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {

        $data = $request->all();
        $product = Product::find($id);

        $path = null;
        if ($request->file('image')) {
            $path = $request->file('image')->store('public/products');
            // @unlink('storage/'. $product->image);
            $data['image'] = $path;
        }


        $product->update($data);

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->back();
    }
}
