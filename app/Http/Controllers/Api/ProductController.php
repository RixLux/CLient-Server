<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        return response()->json([
            'message' => 'Produk berhasil dibuat!',
            'data'    => $product
        ], 201);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return response()->json([
            'message' => 'Produk berhasil diupdate!',
            'data'    => $product
        ], 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus!'
        ], 200);
    }

    public function search($name)
{
    $products = Product::where('name', 'like', '%' . $name . '%')->get();

    if ($products->isEmpty()) {
        return response()->json([
            'message' => 'Produk dengan nama "' . $name . '" tidak ditemukan.'
        ], 404);
    }

    return response()->json([
        'message' => 'Ditemukan ' . $products->count() . ' produk.',
        'data' => $products
    ], 200);
}

}
