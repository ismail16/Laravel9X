<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->get();

        // return $category;

        return Inertia::render('backend/category/index', compact('category'));
    }

    public function create()
    {
        return Inertia::render('backend/category/create');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $image = $request->file('image');
        if (isset($image)){
            $imagename = Str::slug($request->name).'-'.rand(10,100).'.'.$image->getClientOriginalExtension();
            if (!file_exists('images/category')){
                mkdir('images/category',0777, true);
            }
            $image->move('images/category',$imagename);
            $category->image = $imagename;
        }
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        // $category = Category::find($id);
        return Inertia('backend/category/edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        // return $request->file('image');

        // return $id;

        $category = Category::find($id);

        // return $category;


        $image = $request->file('image');
        if (isset($image)){
            $imagename = Str::slug($request->name).'-'.rand(10,100).'.'.$image->getClientOriginalExtension();
            if (!file_exists('images/category')){
                mkdir('images/category',0777, true);
            }
            $image->move('images/category',$imagename);
            $category->image = $imagename;
        }


        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if(file_exists(public_path('images/category/'.$category->image))){
            unlink(public_path('images/category/'.$category->image));
        };
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
