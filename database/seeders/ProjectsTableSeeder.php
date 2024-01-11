<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
          'SPS',
          'BKP',
          'HCA',
          'SPU & SNB',
          'NPU',
          'CPU',
          'BKP3 PROJECT',
          'PECIKO 8B PROJECT',
          'Bekapai AL Project',
          'SWPG Debottlenecking',
          'WCON PRJ RSES',
          'SNB AOI Project',
          'All Sites',
          'Other',
        ];

        foreach ($projects as $project) {
          Project::create(['name' => $project]);
        }

        $this->command->info('Create Data Projects');
    }
}
