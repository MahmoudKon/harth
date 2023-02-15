<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        truncateTables('services');

        $rows = [
            ['name' => 'services 1'],
            ['name' => 'services 2'],
            ['name' => 'services 3'],
        ];

        Service::insert($rows);
    }
}
