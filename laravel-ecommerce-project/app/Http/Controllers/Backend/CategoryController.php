<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\SlugGenerator;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    use SlugGenerator;

    function category(){
        $categories = Category::select('id','category','category_slug')->latest()->paginate(5);
        // dd($categories);
        return view('backend.category.addCategory',compact('categories'));
    }

    function categoryInsert(Request $request){

        $slug = $this->createSlug(Category::class, $request->category);
        $categoryStore = new Category;
        $categoryStore->category = $request->category;
        $categoryStore->category_slug = $slug;

        $categoryStore->save();
        return back();
    }

    function categoryEdit($id){
        $categoryEdit = Category::find($id);
        // dd($categoryEdit);
       
        return view('backend.category.editCategory', compact('categoryEdit'));
    }

    function categoryUpdate(Request $request , $id){
        $categoryUpdate = Category::find($id);
        $categoryUpdate->category = $request->category;
        $categoryUpdate->category_slug = Str::slug( $request->category);
        $categoryUpdate->save();
        return redirect()->route('dashboard.category');
    }

    function categoryDelete($id){
        Category::find($id)->delete();
        return back();
    }
}
