<?php

namespace Database\Seeders;

use App\Models\KindergartenCuriccular;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KindergartenCuriccularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $record = new KindergartenCuriccular();
        $record->link = 'chess-kids.mp4';
        $record->type = "chess";
        $record->save();

        $record = new KindergartenCuriccular();
        $record->link = 'basketball-kids.mp4';
        $record->type = "basketball";
        $record->save();

        $record = new KindergartenCuriccular();
        $record->link = 'soccer-kids.mp4';
        $record->type = "soccer";
        $record->save();

    }
}
