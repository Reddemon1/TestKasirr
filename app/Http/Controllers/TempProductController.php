<?php

namespace App\Http\Controllers;

use App\Models\TempProduct;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class TempProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TempProduct::with("product")->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {;
        $check = TempProduct::all();
        // foreach($check as $model){
        //     if($model->id == $request->product_id){
        //         $model = TempProduct::find($request->product_id);
        //         $model->qty = $model->qty + 1;
        //         $model->save();
        //     }else{

        //     }
        // }
        $checkId = TempProduct::where("product_id","=",$request->product_id)->first();
        if($checkId == null){
            $tempproduct = new TempProduct();
            $tempproduct->product_id = $request->product_id;
            $tempproduct->qty = $request->qty;
            $tempproduct->save();
            return $tempproduct;
        }else{
            $checkId->qty = $checkId->qty + 1;
            $checkId->save();
            return $checkId;
        }

        // $tempproduct->product_id = $request->product_id;
        // $tempproduct->qty = $request->qty;
        // $tempproduct->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tempproduct  $tempproduct
     * @return \Illuminate\Http\Response
     */
    public function show(tempproduct $tempproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tempproduct  $tempproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(tempproduct $tempproduct)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tempproduct  $tempproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $tempproduct = TempProduct::find($id);
        if($request->qty == 0){
            $tempproduct->delete();
        }else{
            $tempproduct->product_id = $request->product_id;
            $tempproduct->qty = $request->qty;

            $tempproduct->save();
        }
        return $tempproduct;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tempproduct  $tempproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(tempproduct $tempproduct)
    {
        //
    }
}
