<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            ['name' => 'Novel', 'description' => 'Karya fiksi berbentuk prosa panjang.'],
            ['name' => 'Fantasi', 'description' => 'Cerita dengan unsur dunia imajinatif.'],
            ['name' => 'Sejarah', 'description' => 'Cerita berlatar peristiwa sejarah.'],
            ['name' => 'Fiksi Ilmiah', 'description' => 'Cerita berbasis sains dan teknologi.'],
            ['name' => 'Komedi', 'description' => 'Cerita bernuansa humor.'],
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}