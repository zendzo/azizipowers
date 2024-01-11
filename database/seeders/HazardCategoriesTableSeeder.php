<?php

namespace Database\Seeders;

use App\Models\HazardCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HazardCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
          ['name' => 'Procedure', 'description' => 'N/A'],
          ['name' => 'Materials, Tools and Equipment', 'description' => 'N/A'],
          ['name' => 'PPE', 'description' => 'N/A'],
          ['name' => 'Working environment', 'description' => 'N/A'],
          ['name' => 'Housekeeping', 'description' => 'N/A'],
          ['name' => 'Line of Fire', 'description' => 'N/A'],
          ['name' => 'Commitment Management', 'description' => 'N/A'],
          ['name' => 'HSSE Management System', 'description' => 'N/A'],
        ];

        HazardCategory::insert($categories);

        $this->command->info('Create Hazard Categories Data!');
    }
}
