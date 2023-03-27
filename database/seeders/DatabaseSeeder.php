<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\Note;
use App\Models\User;
use App\Models\Customer;
use App\Models\NoteItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(5)->create(); // 5 usuarios
        Customer::factory(5)->create(); // 5 customers
        Note::factory(5)->create(); // 5 customers
        Item::factory(5)->create(); // 5 customers
        // Note::factory() // 15 registros en la tabla intermedia
        //     ->count(5)
        //     ->hasAttached(Item::factory()->count(3)->create(), [
        //             'quantity' => 0, 
        //             'total' => 0.0,
        //         ])
        //     ->create();
    }
}
