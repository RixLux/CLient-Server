<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Dedoc\Scramble\Attributes\QueryParameter;


class ProductController extends Controller
{
    #[QueryParameter('search', description: 'Cari produk berdasarkan nama', example: 'mouse')]
    #[QueryParameter('category_id', description: 'Filter berdasarkan ID kategori', example: '1')]
    #[QueryParameter('page', description: 'Filter berdasarkan halaman', example: '1')]

    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        return response()->json($query->paginate(5));
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

    public function update(UpdateProductRequest $request, Product $product)
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
