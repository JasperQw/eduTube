<?php

namespace Database\Seeders;

use App\Models\CounsellingSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounsellingSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $record = new CounsellingSection();
        $record->title = "Talk with Me, Your Best Personal Counsellor";
        $record->start = "2022-12-12 12:00:00";
        $record->end = "2022-12-12 13:30:00";
        $record->description = "Hi, I am Adam, a 4th year psychological counselling trainee. I would like to help anyone with problems by lending you a listening ear. Hope that I could release your tension and stress. Feel free to connect me~";
        $record->like = 10;
        $record->contact_link = "https://t.me/JasperCw";
        $record->user_id = 2;
        $record->save();
    }
}
