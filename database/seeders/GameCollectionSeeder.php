<?php

namespace Database\Seeders;

use App\Models\GameCollection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $record = new GameCollection();
        $record->name = "Slither.io";
        $record->description = "Play against other people online! Can you become the longest slither? If your head touches another player, you will explode and then it's game over.";
        $record->link = "http://slither.io";
        $record->image_url = "worm.png";
        $record->like = 30;
        $record->save();

        $record = new GameCollection();
        $record->name = "2048";
        $record->description = "2048 is an easy and fun puzzle game. Even if you don't love numbers you will love this game.";
        $record->link = "https://play2048.co";
        $record->like = 40;
        $record->image_url = "2048.png";
        $record->save();

        $record = new GameCollection();
        $record->name = "Cookie Clicker";
        $record->description = "Cookie Clicker is an idle game where you click to bake cookies, unlock upgrades, and expand your cookie empire. It's strangely addicting.";
        $record->link = "https://orteil.dashnet.org/cookieclicker/";
        $record->image_url = "cookie-clicker.png";
        $record->save();
    }
}
