<?php

namespace Database\Seeders;

use App\Models\CLSRule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CLSRTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [
          ['name' => 'Procedure'],
          ['name' => 'Materials, Tools and Equipment'],
          ['name' => 'PPE'],
          ['name' => 'Working environment'],
          ['name' => 'Housekeeping'],
          ['name' => 'Line of Fire'],
          ['name' => 'Commitment Management'],
          ['name' => 'HSSE Management System'],
        ];

        try {
          CLSRule::insert($rules);
        } catch (\Throwable $th) {
          $this->command->warn($th->getMessage());
        }

        $this->command->info('Create CLSR Data!');
    }
}
