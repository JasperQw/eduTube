<?php

namespace Database\Seeders;

use App\Models\PastYearPaper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PastYearPaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $record = new PastYearPaper();
        $record->title = "Biology SPM Past Year Paper 2022 MRSM";
        $record->description = "Prepare for success with the Biology SPM Past Year Paper 2022 MRSM session! Dive into the latest MRSM Biology past papers for the SPM exam, gaining valuable insights into the exam format and refining your understanding of key concepts. Let's navigate through the challenges together, ensuring you're well-equipped for excellence in your biology examination.";
        $record->paper_url = "Biologi-Bab-4.pdf";
        $record->answer_url = "Biologi-F5-C1.pdf";
        $record->education_level = "secondary";
        $record->subject = 'biology';
        $record->year = 5;
        $record->save();

        $record = new PastYearPaper();
        $record->title = "BM UPSR Past Year Paper 2022";
        $record->description = "Gear up for excellence with the BM UPSR Past Year Paper 2022 session! Explore the latest UPSR Bahasa Malaysia past papers, honing your language skills and familiarizing yourself with the exam structure. Join us in this valuable preparation to boost your confidence and performance in the upcoming UPSR examination. Let's conquer the linguistic challenges together";
        $record->paper_url = "UPSR_C6.pdf";
        $record->answer_url = "UPSR_C6.pdf";
        $record->education_level = "primary";
        $record->subject = 'malay';
        $record->year = 6;
        $record->save();

        $record = new PastYearPaper();
        $record->title = "Universiti Malaya Year 1 Semester 1 WIX1001";
        $record->description = "Embark on your academic journey with Universiti Malaya Year 1 Semester 1 WIX1001! This course is a gateway to knowledge, introducing fundamental concepts and skills. Dive into the world of WIX1001, explore diverse topics, and build a solid foundation for your academic pursuit at Universiti Malaya. Get ready for a semester of discovery and learning!";
        $record->paper_url = "UNIVERSITY_NOTE.pdf";
        $record->education_level = "university";
        $record->major = "information_technology";
        $record->save();

    }
}
