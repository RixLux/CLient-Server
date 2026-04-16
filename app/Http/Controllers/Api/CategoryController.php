<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'message' => 'Daftar kategori berhasil diambil.',
            'data'    => $categories
        ], 200);
    }

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name|max:255'
        ]);

        $category = Category::create($validated);

        return response()->json([
            'message' => 'Kategori berhasil ditambahkan!',
            'data'    => $category
        ], 201);
    }

    /**
     * Menampilkan detail satu kategori beserta produk di dalamnya.
     */
    public function show(Category $category)
    {
        // Memuat produk yang berelasi dengan kategori ini
        return response()->json([
            'message' => 'Detail kategori berhasil ditemukan.',
            'data'    => $category->load('products')
        ], 200);
    }

    /**
     * Memperbarui data kategori.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id
        ]);

        $category->update($validated);

        return response()->json([
            'message' => 'Kategori berhasil diperbarui!',
            'data'    => $category
        ], 200);
    }

    /**
     * Menghapus kategori.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'Kategori berhasil dihapus!'
        ], 200);
    }
}
