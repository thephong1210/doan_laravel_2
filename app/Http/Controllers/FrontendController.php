<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\OrderDetail;



class FrontendController extends Controller
{
    public function  index()
    {
     $products = Product::all();
     $category = Category::with('products')->paginate(2);

     return view('public.home', compact('products', 'category'));
    }
    public function category($id)
    {
        $products = Product::where('categories_id', $id)->get();
        $category = Category::findOrFail($id);

        return view('public.product', compact('products', 'category'));
//        dd($products);
    }
    public function productDetail($id)
    {
        $product = Product::findOrFail($id);

        return view('public.product-detail', compact('product'));
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
//        return view('public.shop');
        \Cart::add($id, $product->name,1, $product->price);
//        $cartCollection = \Cart::content();
        return redirect()->back();
//
//        $cartCollection = \Cart::getContent();
//
//        dd($cartCollection);

//        return redirect()->back()->with('add-to-cart', 'Da them thanh cong san pham vao gio hang !');
    }
    public function removeCart($rowId)
    {
        \Cart::remove($rowId);
        return redirect()->back();
    }
    public function orderDetail(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'address'=> 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->all();
        $data['password'] = md5(str_shuffle('1234567'));

        $user = new User($data);
        $user->save();

        $cartCollection = \Cart::content();

        $dataUser = null;

        try{
            foreach ($cartCollection as $product) {
                $dataUser['users_id'] = $user->id;
                $dataUser['products_id'] = (int) $product->id;
                $dataUser['qty'] = $product->quantity;
                $dataUser['status'] = 0;

                $orderDetail = new OrderDetail($dataUser);
                $orderDetail->save();
            }
            \Cart::destroy();
        }catch (\Exception $e) {

        }
        return redirect('/shop')->with('successfully', 'Order thanh cong !');
    }
}
