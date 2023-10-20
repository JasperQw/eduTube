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
        $record->link = 'ABC_video.mp4';
        $record->type = "alphabet";
        $record->save();

        $record = new KindergartenInteractive();
        $record->link = 'action_song_1.mp4';
        $record->type = "vocab";
        $record->save();

        $record = new KindergartenInteractive();
        $record->link = 'action_song_2.mp4';
        $record->type = "vocab";
        $record->save();
    }
}
