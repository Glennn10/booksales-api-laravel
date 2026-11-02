<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    private array $relations = ['customer', 'book.author', 'book.genre'];

    public function index()
    {
        $transactions = Transaction::with($this->relations)->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar transaksi',
            'data' => $transactions,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|integer|exists:books,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        $book = Book::find($request->book_id);

        $transaction = Transaction::create([
            'order_number' => 'TRX-'.now()->format('YmdHis').'-'.Str::upper(Str::random(4)),
            'customer_id' => $request->user()->id,
            'book_id' => $book->id,
            'total_amount' => $book->price,
        ]);

        $transaction->load($this->relations);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaction,
        ], 201);
    }

    public function show(Request $request, $id)
    {
        $transaction = Transaction::with($this->relations)
            ->where('customer_id', $request->user()->id)
            ->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail transaksi',
            'data' => $transaction,
        ]);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::where('customer_id', $request->user()->id)->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'book_id' => 'required|integer|exists:books,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        $book = Book::find($request->book_id);

        $transaction->update([
            'book_id' => $book->id,
            'total_amount' => $book->price,
        ]);

        $transaction->load($this->relations);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil diperbarui',
            'data' => $transaction,
        ]);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dihapus',
        ]);
    }
}