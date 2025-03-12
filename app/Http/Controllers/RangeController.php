<?php

namespace App\Http\Controllers;

use App\Models\Range;
use App\Http\Requests\StoreRangeRequest;
use App\Http\Requests\UpdateRangeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Range $range)
    {
        return [
            'ranges'=> Range::all(),
        ];
    }

 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fieldes = $request->validate(
            [
                'number'=>'required|integer',
                'category_id'=>'required|'
            ]
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Range $range)
    {
        return [
            'range'=> $range
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Range $range)
    {

        $fields = $request->validate( [
            'number'=>'required|integer',
            'category_id'=>'required|'
        ]);

        DB::table('ranges')->where('id',$range->id)
        ->update($fields);

        $range = DB::table('ranges')->where('id',$range->id)->get();

        return [
            'range'=>$range
        ];

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Range $range)
    {
        DB::table('ranges')->where('id',$range->id)->delete();

        return response()->json(
            [
                'message'=>'range deleted succefully'
            ]
            );
    }
}
