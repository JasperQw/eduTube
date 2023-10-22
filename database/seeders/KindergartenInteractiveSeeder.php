<?php

namespace Database\Seeders;

use App\Models\KindergartenInteractive;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KindergartenInteractiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $record = new KindergartenInteractive();
        $record->link = 'interactive_1.mp4';
        $record->type = "logic";
        $record->save();

        $record = new KindergartenInteractive();
        $record->link = 'interactive_1.mp4';
        $record->type = "logic";
        $record->save();

        $record = new KindergartenInteractive();
        $record->link = 'interactive_1.mp4';
        $record->type = "math";
        $record->save();
    }
}
