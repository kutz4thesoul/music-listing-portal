<?php

namespace Database\Seeders;

use App\Models\Instrument;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        $filePath = storage_path('app/public/instrument_slugs.csv'); // Path to your CSV file
        $file = fopen($filePath, 'r');

        $header = fgetcsv($file); // Read the first row as header

        while ($row = fgetcsv($file)) {
            
            $data = array_combine($header, $row);

            // DB::table('tags')->insert($data);

            Instrument::create($data);
        }

        fclose($file);
    }
}
