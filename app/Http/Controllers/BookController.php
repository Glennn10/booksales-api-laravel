<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genre'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar buku',
            'data' => $books,
        ]);
    }

    public function show($id)
    {
        $book = Book::with(['author', 'genre'])->find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail buku',
            'data' => $book,
        ]);
    }
}