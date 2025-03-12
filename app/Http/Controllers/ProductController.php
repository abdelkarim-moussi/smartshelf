<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Category;
use App\Models\Range;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category, Range $range)
    {

        return [
            'category_id'=>$category->id,
            'categorie'=>$category->ranges,
            'products'=>$range->products
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate(
            [
                'name'=>'required|min:3|max:255',
                'description'=>'required|min:3',
                'price'=>'required|numeric',
                'stock'=>'required|int',
                'promotion'=>'nullable',
                'range_id'=>'required'
            ]
            );

        $product = Product::create($fields);

        return [
            'product'=>$product
        ];
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
        //
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
}
