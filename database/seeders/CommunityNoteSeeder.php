<?php

namespace Database\Seeders;

use App\Models\CommunityNote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunityNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $record = new CommunityNote();
        $record->title = "Biology SPM Note by ALI ABC!";
        $record->description = "Unlock the secrets of biology with 'Biology SPM Notes by Ali ABC'! Ali ABC's comprehensive notes are your guide to mastering SPM Biology. Dive into key concepts, exam strategies, and essential knowledge, ensuring you're well-prepared for success. Let Ali ABC be your partner in navigating the intricate world of biology and acing your SPM examination!";
        $record->note_url = "Biologi-Bab-4.pdf";
        $record->education_level = "secondary";
        $record->subject = 'biology';
        $record->year = 5;
        $record->save();

        $record = new CommunityNote();
        $record->title = "BM UPSR Note by NG MIAO MIAO";
        $record->description = "Dive into excellence with 'BM UPSR Notes by Ng Miao Miao'! Ng Miao Miao's insightful notes are your key to mastering Bahasa Malaysia for UPSR. Explore language nuances, boost your comprehension, and sharpen writing skills. Let Ng Miao Miao be your guide to success in the UPSR Bahasa Malaysia examination!;";
        $record->note_url = "UPSR_C6.pdf";
        $record->education_level = "primary";
        $record->subject = 'malay';
        $record->year = 6;
        $record->save();

        $record = new CommunityNote();
        $record->title = "WIX1001 Fundamental of Programming Note by Jasper Miao!";
        $record->description = "Embark on a coding adventure with 'WIX1001 Fundamentals of Programming Notes by Jasper Miao'! Jasper Miao's notes are your compass through the world of programming fundamentals. Dive into key concepts, coding techniques, and problem-solving strategies. Let Jasper Miao guide you in mastering the essentials of programming for WIX1001 and beyond!";
        $record->note_url = "UNIVERSITY_NOTE.pdf";
        $record->education_level = "university";
        $record->major = "information_technology";
        $record->save();
    }
}
