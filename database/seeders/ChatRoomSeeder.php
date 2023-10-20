<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $record = new ChatRoom();
        $record->message = "Hi, Good Morning everyone!";
        $record->user_id = 2;
        $record->education_level = 'university';
        $record->major = 'information_technology';
        $record->save();

        $record = new ChatRoom();
        $record->message = "Hi, Good Morning Jasper!";
        $record->user_id = 1;
        $record->education_level = 'university';
        $record->major = 'information_technology';
        $record->save();

        $record = new ChatRoom();
        $record->message = "How is your day Ching Wei?";
        $record->user_id = 2;
        $record->education_level = 'university';
        $record->major = 'information_technology';
        $record->save();

        $record = new ChatRoom();
        $record->message = "I am fine, thank you!";
        $record->user_id = 1;
        $record->education_level = 'university';
        $record->major = 'information_technology';
        $record->save();

        // !! Primary

        $record = new ChatRoom();
        $record->message = "Hi, Good Morning everyone I am Ng Wei Wei!";
        $record->user_id = 3;
        $record->education_level = 'primary';
        $record->year = 1;
        $record->save();

        $record = new ChatRoom();
        $record->message = "HIHIHIHIHIHIHIHIHIHIHI";
        $record->user_id = 3;
        $record->education_level = 'primary';
        $record->year = 1;
        $record->save();

        $record = new ChatRoom();
        $record->message = "Why you guys dont reply to me :<";
        $record->user_id = 3;
        $record->education_level = 'primary';
        $record->year = 1;
        $record->save();

        $record = new ChatRoom();
        $record->message = "Please reply me T.T";
        $record->user_id = 3;
        $record->education_level = 'primary';
        $record->year = 1;
        $record->save();
    }
}
