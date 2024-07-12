<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\category;
use App\Models\post;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       


        User::create([
            'password' => Hash::make('12345'),
            'username' => '1001391',
            'name' => 'mekar jaya',

        ]);
            
        category::create([
            'name' => 'Teknik Informatika',
            'slug' => 'teknik_informatika',
        ]);
            
        category::create([
            'name' => 'Akutansi',
            'slug' => 'akutansi',
            ]);
            category::create([
                'name' => 'Teknik Pendingin Dan Tata Udara',
                'slug' => 'teknik_Pendingin_Udara',
                ]);
            
         \App\Models\User::factory(2)->create();
        //  \App\Models\post::factory(13)->create();

        
       
            
            

        
    }
}
