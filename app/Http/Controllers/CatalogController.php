<?php

namespace App\Http\Controllers;

use App\Undercategories;
use App\Path_eat;
use App\Category;
use App\Eat;
use Illuminate\Http\Request;
class CatalogController extends Controller
{
    public function category(Request $request,$slug) {

        $category = Category::where('slug', $slug)->firstOrFail();
        $eats = Eat::where('cat_id', $category->id)->get();
        $path_eats = Path_eat::all();
        if ($request->filled('cost')) {
        $eats = Eat::where('cat_id', $category->id)->orderBy('cost',$request->cost)->get();    
       
        }
         if ($request->filled('weight')) {
        $eats = Eat::where('cat_id', $category->id)->orderBy('weight',$request->weight)->get();    
       
        }
        $focost=$request->cost;
        $foweight=$request->weight;
        return view('product', compact('category', 'eats','path_eats','focost','foweight'));
    }
    public function undercategory(Request $request,$slug) {

        $undercategory = undercategories::where('slug', $slug)->firstOrFail();
        $eats = Eat::all();
        $path_eats = Path_eat::all();
       

        return view('underproduct', compact('undercategory', 'eats','path_eats'));
    }
}
