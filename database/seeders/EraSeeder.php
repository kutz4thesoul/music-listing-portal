<?php

namespace Database\Seeders;

use App\Models\Era;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        $filePath = storage_path('app/public/era_slugs.csv'); // Path to your CSV file
        $file = fopen($filePath, 'r');

        $header = fgetcsv($file); // Read the first row as header

        while ($row = fgetcsv($file)) {
            
            $data = array_combine($header, $row);

            // DB::table('tags')->insert($data);

            Era::create($data);
        }

        fclose($file);
    }
}
