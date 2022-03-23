<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::get()->all();
    }


    public function store(StorePostRequest $request)
    {
        $request->validated();
        return Product::create($request->all());
    }


    public function show($id)
    {
        return Product::find($id);
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;

    }


    public function destroy($id)
    {
        return Product::destroy($id);
    }


    public function search($name)
    {
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }
}
