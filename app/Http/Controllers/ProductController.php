<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('dashboard.product.index', [
            'products' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('dashboard.product.create', [
            'categories' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0'
        ]);


          if ($request->hasFile('image')) {
             $imagePath = $request->file('image')->store('product-images');
            $validateData['image'] = $imagePath;
         }

        Product::create($validateData);

        return redirect('/dashboard/product')->with('success', 'product added successfully!');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('dashboard.product.edit', [
            'product' => $product,
            'categories' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Product $product)
{
    $validatedData = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'weight' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required|string',
        'stock' => 'required|integer|min:0'
    ]);

    if ($request->hasFile('image')) {
        // Simpan gambar baru
        $imagePath = $request->file('image')->store('product-images');
        // Hapus gambar lama jika ada
        if ($product->image) {
            Storage::delete($product->image);
        }
        $validatedData['image'] = $imagePath;
    }

    // Perbarui data produk
    $product->update($validatedData);

    return redirect('/dashboard/product')->with('success', 'Produk berhasil diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
         if($product->image) {
            Storage::delete($product->image);
        }

        Product::destroy($product->id);

        return redirect('/dashboard/product')->with('success', 'product successfully deleted!');
    }
}
