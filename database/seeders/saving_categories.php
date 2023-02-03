<?php

namespace Database\Seeders;

use App\Models\SavingCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class saving_categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $savingCategory = [
            [
                'name' => 'gold',
                'limit' => 37500000
            ],
            [
                'name' => 'blue',
                'limit' => 36700000
            ],
            [
                'name' => 'silver',
                'limit' => 35700000
            ],
        ];
        foreach ($savingCategory as $key => $value) {
            SavingCategory::create($value);
        }
    }
}
