<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        $query = Product::query();

        // Search by Name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by Category
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        $products = $query->with('category')->latest()->paginate(15);
        $categories = \App\Models\Category::all();

        return view('backend.product.list', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required|min:3',
            'productCategory' => 'required|exists:categories,id',
            'productPrice' => 'required|numeric',
            'productStock' => 'required|integer',
            'productImage' => 'nullable|image|mimes:jpg,png,jpg,gif,svg|max:2048',
            'productDescription' => 'nullable|min:5',
        ]);

        $product = new Product();
        $product->name = $request->productName;
        $product->category_id = $request->productCategory;
        $product->price = $request->productPrice;
        $product->stock = $request->productStock;
        $product->description = $request->productDescription;

        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('images/products');
            $image->move($uploadPath, $imageName);
            $product->image = 'images/products/' . $imageName;
        }

        $product->save();
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('backend.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'productName' => 'required|min:3',
            'productCategory' => 'required|exists:categories,id',
            'productPrice' => 'required|numeric',
            'productStock' => 'required|integer',
            'productImage' => 'nullable|image|mimes:jpg,png,jpg,gif,svg|max:2048',
            'productDescription' => 'nullable|min:5',
        ]);

        $product->name = $request->productName;
        $product->category_id = $request->productCategory;
        $product->price = $request->productPrice;
        $product->stock = $request->productStock;
        $product->description = $request->productDescription;

        if ($request->hasFile('productImage')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $image = $request->file('productImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('images/products');
            $image->move($uploadPath, $imageName);
            $product->image = 'images/products/' . $imageName;
        }

        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
