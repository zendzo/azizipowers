<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
          ['name' => 'HSSE Inspection'],
          ['name' => 'MWT'],
          ['name' => 'CSMS Audit PSB'],
          ['name' => 'CSMS Audit PB'],
          ['name' => 'CSMS Audit PA'],
          ['name' => 'Drill'],
          ['name' => 'Incident'],
        ];

        Event::insert($events);

        $this->command->info('Create Events Data!');
    }
}
