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
                'name' => 'Admin',
                'role_id' => 1,
                'address' => 'Rombasan Pragaan Sumenep',
                'gender' => 'Laki-laki',
                'phone' => '082233445566',
                'thumbnail' => null
            ]);
            $this->call([
                saving_categories::class,
                // saving::class,
                // member::class,
                // employe::class,
            ]);
            // Employe::factory(10)->create();
            // Member::factory(10)->create();
            // Saving::factory(10)->create();
        } catch (\Throwable $th) {
           dd($th->getMessage());
        }
    }
}
