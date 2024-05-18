<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Tag::truncate();

        
        $filePath = storage_path('app/public/mood_slugs.csv'); // Path to your CSV file
        $file = fopen($filePath, 'r');

        $header = fgetcsv($file); // Read the first row as header

        while ($row = fgetcsv($file)) {
            
            $data = array_combine($header, $row);

            // DB::table('tags')->insert($data);

            Tag::create($data);
        }

        fclose($file);

    }
}
