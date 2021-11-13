<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\TempProduct;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sale::with("saleDetail")->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getCode = Sale::count();
        $code = $getCode+1;
        $sale = new Sale();
        $sale->sale_code = $code;
        $sale->total = $request->total;
        $sale->save();
        $tempproduct = TempProduct::all();
        foreach($tempproduct as $tempproducts){
            $sale_detail = new SaleDetail();
            $sale_detail->sale_id = $code;
            $sale_detail->product_id = $tempproducts->product_id;
            $sale_detail->qty = $tempproducts->qty;
            $sale_detail->save();
            $product = Product::find($tempproducts->id);
            $product->qty = $product->qty - $tempproducts->qty;
            $product->save();
            // return $sale_detail;
        }
        TempProduct::truncate();

        return Sale::with("saleDetail")->get();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
