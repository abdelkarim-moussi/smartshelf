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
    public function index(Product $products)
    {
        return [
            'products'=>$products::all()
        ];
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
        $product = Product::find($product->id);

        return $product;
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $fields = $request->validate(
            [
                'name'=>'min:3|max:255',
                'description'=>'min:3',
                'price'=>'numeric',
                'stock'=>'int',
                'promotion'=>'nullable',
                'range_id'=>'required'
            ]
            );

        $product = Product::where('id',$product->id)->first();

        $product->update($fields);
        
        return [
            'product'=> $product
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product::where('id',$product->id)->first();
        $product->delete();
        return [
            'message'=>'product deleted succefully .'
        ];
    }
}
