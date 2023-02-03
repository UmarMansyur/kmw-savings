<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employe;
use App\Models\Member;
use App\Models\Role;
use App\Models\Saving;
use App\Models\SavingCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            $roles = ['Admin', 'Ketua', 'Wakil Ketua', 'Bendahara', 'Sekretaris', 'Pembina'];
            foreach ($roles as $role) {
                Role::create([
                    'name' => $role
                ]);
            }
            Employe::create([
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'name' => 'Administrator',
                'role_id' => 1,
                'address' => 'Rombasan Pragaan Sumenep',
                'gender' => 'Laki-laki',
                'phone' => '082233445566',
                'thumbnail' => null
            ]);
            $this->call([
                saving_categories::class
            ]);
        } catch (\Throwable $th) {
           dd($th->getMessage());
        }
    }
}
