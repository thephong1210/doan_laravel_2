<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;
use Illuminate\Http\Request;
use App\Category;
use App\Product;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // with la ham ma lay ra moi quan he
        /// select * From where id = 2;;;;
        $categories = Category::all();

//        Session::get();
//        $categories = Category::all();

        return view('admin.categories.main', ['categories' => $categories]);
//        dd($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
//         $request->validate([
//             'name'=>'required',
//         ]);

        $data = $request->all();
    //    dd($data);
//        dd($data);

        $categories = new Category($data);
        $categories->save();
        return redirect('/category');

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
        $categories = Category::find($id);

        return view('admin.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//    ty_hint: import 1 class vao 1 actions/function
    public function update(UpdateCategory $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $data = $request->all();
        $category = Category::find($id);


        $category->update($data);

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->back();
    }
    public function search($category_id, $product_name) {
        header('Access-Control-Allow-Origin: *');

        $product = Product::where('categories_id',$category_id)->where('name','like','%'.$product_name.'%')->get();
        return response()->json($product);
    }

}
