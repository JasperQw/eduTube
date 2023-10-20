<?php

namespace Database\Seeders;

use App\Models\MeetingRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $record = new MeetingRoom();
        $record->title = "Jom My Biology Discussion!";
        $record->description = "Jom My Biology Discussion! beckons you to an engaging meeting where the wonders of biology come alive. Join the conversation as we unravel the mysteries of life, exploring topics from cellular intricacies to ecological marvels. Let's dive into the fascinating world of biology together and cultivate a shared understanding!";
        $record->start = "10/7/2023 13:00:00";
        $record->end = "10/7/2023 14:00:00";
        $record->link = "https://meet.google.com/rix-qkam-vhv";
        $record->user_id = 4;
        $record->education_level = 'secondary';
        $record->year = 4;
        $record->save();

        $record = new MeetingRoom();
        $record->title = "Jom My Physics Discussion!";
        $record->description = "Jom My Physics Discussion! beckons you to a dynamic gathering where the wonders of physics take center stage. Join us for an exploration of forces, energy, and the fundamental principles shaping our universe. Let's unravel the mysteries of the physical world together and ignite a shared passion for the marvels of physics!";
        $record->start = "11/7/2023 13:00:00";
        $record->end = "11/7/2023 14:00:00";
        $record->link = "https://meet.google.com/rix-qkam-vhv";
        $record->user_id = 4;
        $record->education_level = 'secondary';
        $record->year = 4;
        $record->save();

        $record = new MeetingRoom();
        $record->title = "Machine Learning discussion with Ali Muhammad";
        $record->description = "Machine Learning Discussion with Ali Muhammad invites you to a thought-provoking session where the realms of artificial intelligence unfold. Join Ali Muhammad for an insightful conversation on machine learning, exploring its applications, challenges, and future possibilities. Engage in a dialogue that transcends algorithms and delves into the cutting-edge landscape of intelligent technologies.";
        $record->start = "11/8/2023 14:00:00";
        $record->end = "11/8/2023 15:00:00";
        $record->link = "https://meet.google.com/rix-qkam-vhv";
        $record->user_id = 1;
        $record->education_level = 'university';
        $record->major = 'information_technology';
        $record->save();

    }
}
