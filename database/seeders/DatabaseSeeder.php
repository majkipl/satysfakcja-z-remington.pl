<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Voivodeship;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dataVoivodeships = [];

        $dataVoivodeships[] = ['name' => 'kujawsko-pomorskie'];
        $dataVoivodeships[] = ['name' => 'lubelskie'];
        $dataVoivodeships[] = ['name' => 'lubuskie'];
        $dataVoivodeships[] = ['name' => 'łódzkie'];
        $dataVoivodeships[] = ['name' => 'małopolskie'];
        $dataVoivodeships[] = ['name' => 'mazowieckie'];
        $dataVoivodeships[] = ['name' => 'opolskie'];
        $dataVoivodeships[] = ['name' => 'podkarpackie'];
        $dataVoivodeships[] = ['name' => 'podlaskie'];
        $dataVoivodeships[] = ['name' => 'pomorskie'];
        $dataVoivodeships[] = ['name' => 'śląskie'];
        $dataVoivodeships[] = ['name' => 'świętokrzyskie'];
        $dataVoivodeships[] = ['name' => 'warmińsko-mazurskie'];
        $dataVoivodeships[] = ['name' => 'wielkopolskie'];
        $dataVoivodeships[] = ['name' => 'zachodniopomorskie'];

        Voivodeship::insert($dataVoivodeships);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
