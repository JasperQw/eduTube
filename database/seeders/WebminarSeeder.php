<?php

namespace Database\Seeders;

use App\Models\Webminar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebminarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            $record = new Webminar();
            $record->title = "WEBINAR KECEMERLANGAN SPM BAHASA MELAYU SIRI 1 TAHUN 2023";
            $record->description = "";
            $record->like = 50;
            $record->yt_code = "DjgjnOFlAOc";
            $record->education_level = 'secondary';
            $record->year = "5";
            $record->type = 'previous';
            $record->save();

            $record = new Webminar();
            $record->title = "WEBINAR KECEMERLANGAN SPM BAHASA INGGERIS TAHUN 2023";
            $record->description = "";
            $record->like = 20;
            $record->yt_code = "pgbif9uwuAI";
            $record->education_level = 'secondary';
            $record->year = "5";
            $record->type = 'previous';
            $record->save();

            $record = new Webminar();
            $record->title = "iBSS Webinar pt3";
            $record->description = "Part 3 of the iBSS webinar with Vanilla Plus and MDS";
            $record->yt_code = "PjRDrgAnVc8";
            $record->education_level = 'secondary';
            $record->year = "3";
            $record->type = 'previous';
            $record->save();

            $record = new Webminar();
            $record->title = "WEBINAR KECEMERLANGAN UPSR 2021";
            $record->description = "ENGLISH AND MATH";
            $record->like = 10;
            $record->yt_code = "uZiNOOem7w0";
            $record->education_level = 'primary';
            $record->year = "6";
            $record->type = 'previous';
            $record->save();

            $record = new Webminar();
            $record->title = "Andrew Ng: Opportunities in AI - 2023";
            $record->description = "This discussion took place on July 26, 2023, at Cemex Auditorium, Stanford University, and was hosted by the Stanford Graduate School of Business.

            This talk covers:
            Trends in AI Technologies and Tools
            Supervised Learning
            Generative AI
            The Adoption of AI
            Opportunities in AI
            Process for Building Startups
            AI Risks and Social Impact";
            $record->like = 1000;
            $record->yt_code = "5p248yoa3oE";
            $record->education_level = 'university';
            $record->type = 'streaming';
            $record->major = 'information_technology';
            $record->save();
    }
}
