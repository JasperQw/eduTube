<?php

namespace Database\Seeders;

use App\Models\CrashCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrashCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $record = new CrashCourse();
        $record->title = "Godot Tutorial for Unity Developers (and other beginners)";
        $record->description = "Learn the basics of Godot for game development. This course is perfect for Unity developers transitioning to Gadot, but it will also help people who are new to game development in general. You will learn how to navigate the interface and build a simple Flappy bird game.";
        $record->like = 20;
        $record->yt_code = "1EFKe24X8vI";
        $record->education_level = 'university';
        $record->major = 'information_technology';
        $record->save();

        $record = new CrashCourse();
        $record->title = "Prompt Engineering Tutorial – Master ChatGPT and LLM Responses";
        $record->description = "Learn prompt engineering techniques to get better results from ChatGPT and other LLMs.";
        $record->yt_code = "_ZvnD73m40o";
        $record->education_level = 'university';
        $record->major = 'information_technology';
        $record->save();

        $record = new CrashCourse();
        $record->title = "Learn HTML – Full Tutorial for Beginners (2022)";
        $record->description = "Learn HTML in this complete course for beginners. This is an all-in-one beginner tutorial to help you learn web development skills. This course teaches HTML5. ";
        $record->like = 10;
        $record->yt_code = "kUMe1FH4CHE";
        $record->education_level = 'university';
        $record->major = 'information_technology';
        $record->save();

        $record = new CrashCourse();
        $record->title = "UML Diagrams Full Course (Unified Modeling Language)";
        $record->description = "Learn about how to use UML diagrams to visualize the design of databases or systems. You will learn the most widely used Unified Modeling Language diagrams, their basic notation, and applications. UML diagrams are frequently used in software development.";
        $record->like = 40;
        $record->yt_code = "WnMQ8HlmeXc";
        $record->education_level = 'university';
        $record->major = 'information_technology';
        $record->save();
    }
}
