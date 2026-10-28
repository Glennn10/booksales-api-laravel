<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withCount('books')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar penulis',
            'data' => $authors,
        ]);
    }

    public function show($id)
    {
        $author = Author::with('books')->find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Penulis tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail penulis',
            'data' => $author,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        $author = Author::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Penulis berhasil ditambahkan',
            'data' => $author,
        ], 201);
    }
}