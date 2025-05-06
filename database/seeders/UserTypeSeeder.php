<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    //Create variable and assign data
    
    public function run(): void
    {
        //create variable and assign data
        $userType = [           
            ['type' => 'Admin'],
            ['type' => 'Seller'],
            ['type' => 'Customer'],
            ['type' => 'Supplier'],
        ];
        //create a loop to run multiple
        foreach ($userType as $key => $item) {
            UserType::create($item);
        }
    }
}
