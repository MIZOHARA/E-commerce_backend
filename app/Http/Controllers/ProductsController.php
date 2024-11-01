<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\products_requests;
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
}
