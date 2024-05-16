<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HalamanUserController extends Controller
{
    public function index() {
    $category = Category::all();
        return view('user.index', [
          'title' => 'Nuzashop',
          'categories' => $category
        ]);
    }
}
