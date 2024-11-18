<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\products_requests;
use App\Http\Requests\products_update_request;
use App\Http\Resources\ProductsUpdateRresource;
use App\Models\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function Store_products(products_requests $products_requests)
    {
        products::create($products_requests->all());
    }

    public function show_product($id)
    {
        $products = products::find($id);
        if (is_null($products)) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        else{
            return response()->json($products);
        }
    }

    public function show_products_list()
    {
        $products = products::all();
        return response()->json($products);
    }

    public function update_product(products_update_request $products_update_request , products $products)
    {
        $products->update($products_update_request->all());
        return response()->json([
            "message" => "records updated successfully",
            "data" => new ProductsUpdateRresource($products)
        ],200);
    }

    public function delete_product(products $products)
    {
       $products->delete();
       return response()->json(["message" => "records deleted successfully"], 200);
    }
}
