<?php
namespace App\Services;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;

class ProductService{

    function index(){
        return Product::all();
    }

    function store(CreateProductRequest $request){
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->stock = $request->stock;
        $product->buyprice = $request->buyprice;
        $product->save();
        return $product;
    }
    
}
