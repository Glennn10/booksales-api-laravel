<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            ['name' => 'Andrea Hirata', 'bio' => 'Penulis novel Laskar Pelangi.'],
            ['name' => 'Tere Liye', 'bio' => 'Penulis novel populer Indonesia.'],
            ['name' => 'Pramoedya Ananta Toer', 'bio' => 'Penulis Tetralogi Buru.'],
            ['name' => 'Dee Lestari', 'bio' => 'Penulis seri Supernova.'],
            ['name' => 'Raditya Dika', 'bio' => 'Penulis buku komedi.'],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}