<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest();

        if(request('search')) {
            $category->where('name', 'like', '%' . request('search') . '%');
        }
        $category = $category->get();


        return view('dashboard.category.index', [
            'categories' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $validateData = $request->validate([
        'name' => 'unique:categories|required',
        'image' => 'required|image'
    ]);

    // Mendapatkan nama kategori dari form
    $categoryName = Str::slug($request->name);

    if($request->file('image')) {
        // Membuat nama file baru berdasarkan nama kategori dan ekstensi file yang diunggah
        $fileName = $categoryName . '.' . $request->file('image')->getClientOriginalExtension();

        // Menyimpan file dengan nama yang disesuaikan
        $validateData['image'] = $request->file('image')->storeAs('category-images', $fileName);
    }

    Category::create($validateData);
    return redirect('/dashboard/category')->with('success', 'category added successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            'category' => $category 
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Category $category)
{
    $validateData = $request->validate([
        'name' => 'required',
        'image' => 'required|image'
    ]);

    // Mendapatkan nama kategori dari form
    $categoryName = Str::slug($request->name);
    if ($request->file('image')) {
        // Membuat nama file baru berdasarkan nama kategori dan ekstensi file yang diunggah
        $fileName = $categoryName . '.' . $request->file('image')->getClientOriginalExtension();

        // Hapus foto sebelumnya jika ada
        if ($category->image) {
            Storage::delete($category->image);
        }

        // Menyimpan file dengan nama yang disesuaikan
        $validateData['image'] = $request->file('image')->storeAs('category-images', $fileName);
    }

    // Lakukan pembaruan kategori
    Category::where('id', $category->id)->update($validateData);

    return redirect('/dashboard/category')->with('success', 'Category updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->image) {
            Storage::delete($category->image);
        }

        Category::destroy($category->id);

        return redirect('/dashboard/category')->with('success', 'category successfully deleted!');
        
    }



    public function copy($id)
{
    $category = Category::findOrFail($id);

    $newCategory = $category->replicate();
    $newCategory->name = $category->name . ' (Copy)';
    $newCategory->save();

    return redirect('/dashboard/category')->with('success', 'Category copied successfully!');
}


public function bulkDelete(Request $request)
{
    $ids = $request->input('selected');
    if ($ids) {
        Category::whereIn('id', $ids)->delete();
        return redirect('/dashboard/category')->with('success', count($ids) . ' categories deleted successfully!');
    }
    return redirect('/dashboard/category')->with('error', 'No categories selected for deletion.');
}



}
