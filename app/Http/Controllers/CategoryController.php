<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return response()->json(
            [
                'categories'=> DB::table('categories')->get(['*'])
            ]
            );

    }

 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate(
            [
                'name'=>'required|string',
            ]
            );

        $category = DB::table('categories')->insert($fields);

        return response()->json(
            [
                'category'=>$category
            ]
            );

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = DB::table('categories')->where('id',$category->id)->first();

        return response()->json([
            'category'=> $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $fields = $request->validate( [
            'name'=>'required|string'
        ]);

        DB::table('categories')->where('id',$category->id)
        ->update($fields);

        $category = DB::table('categories')->where('id',$category->id)->get();

        return response()->json([
            'category'=>$category
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::table('categories')->where('id',$category->id)->delete();

        return response()->json(
            [
                'message'=>'category deleted succefully'
            ]
            );
    }
}
