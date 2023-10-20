<?php

namespace Database\Seeders;

use App\Models\DonationItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $record = new DonationItem();
        $record->name = "Focus KSSM 2023 Bahasa Melayu";
        $record->description = "Focus KSSM Tingkatan 1.2.3 - siri teks rujukan yang lengkap dan padat dengan ciri-ciri istimewa untuk meningkatkan pembelajaran murid secara menyeluruh. Siri ini merangkumi Kuriklum Standard Sekolah Menengah (KSSM) yang baharu serta mengintegrasikan keperluan Ujian Akhir Sesi Akademik (UASA). Pastinya satu sumber yang hebat bagi setiap murid!";
        $record->image = "FOCUS_BM_PT3.png";
        $record->status = "available";
        $record->user_id = 1;
        $record->condition = 9;
        $record->education_level = "secondary";
        $record->save();

        $record = new DonationItem();
        $record->name = "SPM BOT SEJARAH";
        $record->description = "BOT SPM Tingkatan 4 & 5 KSSM (Edisi 2024)
        Buku rujukan beraudio dengan saiz sederhana berdasarkan silibus dan format SPM terkini.
        Ciri dan keistimewaan BOT SPM KSSM:
        • Nota padat dan ringkas dalam bentuk poin
        • Praktis SPM dengan penerapan KBAT
        • Halaman 100% berwarna
        • Setiap poin penting dicetak tebal dan diwarnakan
        • Jawapan berkualiti dan lengkap
        BONUS DIGITAL
        •|Audio nota
        •|Bahan ekstra berbentuk contoh/praktis ekstra/kuiz
        Nota padat, praktis efektif!";
        $record->image = "SPM_SEJARAH_BOT.jpeg";
        $record->status = "not_available";
        $record->user_id = 1;
        $record->condition = 9;
        $record->education_level = "secondary";
        $record->save();
        
        $record = new DonationItem();
        $record->name = "Focus UPSR Math - Part A (FREE eContent)";
        $record->description = "Written based on the KSSR curriculum, it comes with: example questions with complete solution steps to help students fully master the mathematical skills they have learned; mind map notes to allow students to review effectively; high-level thinking skills (KBAT) questions to train students' thinking skills; complete unit exercises , small review and general review allow students to evaluate effectively; exquisite color pages allow students to memorize commonly used conversions, formulas, etc. The title on the gold list all depends on it!";
        $record->image = "UPSR_MATH.jpeg";
        $record->status = "available";
        $record->user_id = 2;
        $record->condition = 9;
        $record->education_level = "primary";
        $record->save();

        $record = new DonationItem();
        $record->name = "Thank You, Omu!";
        $record->description = "When Omu makes her thick red stew, the delicious smell attracts many visitors hoping for a taste. Selflessly, she gives every last bit away—but her grateful neighbors have a plan to say thanks. This is the perfect story to act out with your class.";
        $record->image = "KINDERGARTEN_DONATION.jpeg";
        $record->status = "available";
        $record->user_id = 1;
        $record->condition = 9;
        $record->education_level = "kindergarten";
        $record->save();

        $record = new DonationItem();
        $record->name = "Introduction to the History of Architecture, Art & Design";
        $record->description = "Chronicling the times in which major works of architecture, art and design were created, this compact book includes images of major artworks from each period. The best examples from each period are illustrated together with their famous creators, alongside timelines that track the evolution of the artistic disciplines throughout history.";
        $record->image = "UNIVERSITY_DONATION.jpeg";
        $record->status = "available";
        $record->user_id = 1;
        $record->condition = 9;
        $record->education_level = "university";
        $record->save();
    }
}
