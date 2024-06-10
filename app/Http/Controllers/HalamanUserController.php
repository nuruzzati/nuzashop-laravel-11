<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HalamanUserController extends Controller
{
    public function index() {
    $category = Category::all();
    $product = Product::take(10)->get();
    $latestProducts = Product::latest()->take(5)->get();

        return view('user.index', [
          'title' => 'Nuzashop',
          'categories' => $category,
          'product' => $product,
          'latestProducts' => $latestProducts
        ]);
    }


    public function productDetail($id) {
      $product = Product::find($id);

         if ($product) {
            // return 'tes';
            return view('user.product_detail', compact('product'));
        } else {
            return abort(404);
        }
    }



    // public function cart() {
    //     $product = Product::all();
    //     return view('user.cart', [
    //         'product' => $product
    //     ]); 
    // }
}
