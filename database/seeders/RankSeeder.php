<?php

namespace Database\Seeders;

use App\Models\Rank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        truncateTables('ranks');

        $rows = [
            ['name' => 'rank 1'],
            ['name' => 'rank 2'],
            ['name' => 'rank 3'],
        ];

        Rank::insert($rows);
    }
}
