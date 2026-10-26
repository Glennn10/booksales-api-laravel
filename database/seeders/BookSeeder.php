<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'Laskar Pelangi', 'description' => 'Kisah anak-anak Belitung.', 'price' => 85000, 'stock' => 20, 'genre_id' => 1, 'author_id' => 1],
            ['title' => 'Bumi', 'description' => 'Petualangan Raib dan kawan-kawan.', 'price' => 90000, 'stock' => 15, 'genre_id' => 2, 'author_id' => 2],
            ['title' => 'Bumi Manusia', 'description' => 'Novel pertama Tetralogi Buru.', 'price' => 110000, 'stock' => 10, 'genre_id' => 3, 'author_id' => 3],
            ['title' => 'Supernova: Ksatria, Putri, dan Bintang Jatuh', 'description' => 'Seri pertama Supernova.', 'price' => 95000, 'stock' => 12, 'genre_id' => 4, 'author_id' => 4],
            ['title' => 'Kambing Jantan', 'description' => 'Catatan harian pelajar Indonesia di Australia.', 'price' => 75000, 'stock' => 25, 'genre_id' => 5, 'author_id' => 5],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}