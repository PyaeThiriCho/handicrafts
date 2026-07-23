<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|min:3',
            'categoryDescription' => 'nullable|string',
            'categoryImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->categoryName;
        $category->description = $request->categoryDescription;

        if ($request->hasFile('categoryImage')) {
            $file = $request->file('categoryImage');
            // Creates a clean filename using the timestamp to prevent overwrites
            $filename = time() . '_' . $file->getClientOriginalName();
            // Moves the file directly to your public assets directory
            $file->move(public_path('backend_assets/img'), $filename);
            $category->image = $filename;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('backend.category.detail', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'categoryName' => 'required|min:3',
            'categoryDescription' => 'nullable|string',
            'categoryImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $category->name = $request->categoryName;
        $category->description = $request->categoryDescription;

        if ($request->hasFile('categoryImage')) {
            // Delete old file if it exists in the folder
            $oldImagePath = public_path('backend_assets/img/' . $category->image);
            if ($category->image && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $file = $request->file('categoryImage');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('backend_assets/img'), $filename);
            $category->image = $filename;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Delete the image file from the folder before removing the database record
        $imagePath = public_path('backend_assets/img/' . $category->image);
        if ($category->image && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}