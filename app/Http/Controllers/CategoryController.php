<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        return view('categories.index', [
            'categories' => $categories,
        ]);
        
    }


    public function create()
    {

        return view('categories.create');
    }

    public function store(Request $request)
    {  

        $category= Category::create(
            [
            'category_name' => $request->category_name,
        ]);
        return redirect()->route('categories.index');
    }


}
