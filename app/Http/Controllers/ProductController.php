<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::where('status', 1)->limit(10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Product/Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', // name must not be empty
            'description' => 'string',
            'status' => 'required|boolean'
        ]);
        
        $product = Product::create($validated); // Create a product if the request attributes are validated

        return response()->json([
            'message' => 'product has been successfully inserted',
            'product' => $product->name
        ], 201);
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
        return Inertia::render('Product/Edit', [
            'product' => $product, // passing all of product data as a prop
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * Get the latest products available in the database
     */
    public function latest(){
        return Product::orderBy('created_at', 'desc')->limit(9)->get();
    }
}
