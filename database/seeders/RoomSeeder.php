<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'name' => 'Ruang Diskusi 1',
            'capacity' => 5,
            'description' => 'Ruang diskusi dengan kapasitas 5 orang, dilengkapi dengan proyektor dan whiteboard.',
            'created_at' => now()
        ]);

        Room::create([
            'name' => 'Ruang Diskusi 2',
            'capacity' => 5,
            'description' => 'Ruang diskusi dengan kapasitas 5 orang, dilengkapi dengan proyektor dan whiteboard.',
            'created_at' => now()
        ]);
        
        Room::create([
            'name' => 'Ruang Diskusi 3',
            'capacity' => 7,
            'description' => 'Ruang diskusi dengan kapasitas 7 orang, dilengkapi dengan proyektor dan whiteboard.',
            'created_at' => now()
        ]);
    }
}