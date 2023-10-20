<?php

namespace Database\Seeders;

use App\Models\TradingItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TradingItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $record = new TradingItem();
        $record->name = "SPM KOLEKSI KERTAS PEPERIKSAAN AKHIR SIJIL PENDIDIKAN MRSM SEJARAH";
        $record->description = "Koleksi Kertas Peperiksaan Akhir Sijil Pendidikan MRSM SPM";
        $record->image = "MRSM_sejarah.jpeg";
        $record->price = 7.90;
        $record->status = "available";
        $record->user_id = 1;
        $record->condition = 9;
        $record->education_level = "secondary";
        $record->save();

        $record = new TradingItem();
        $record->name = "SPM KERTAS PERCUBAAN BAHASA MELAYU";
        $record->description = "* 4-6 set kertas percubaan\n
        * soalan mirio soalan SPM sebenar\n
        * KBAT\n
        * Cadangan jawapan\n";
        $record->image = "SPM_BM.jpeg";
        $record->price = 5.50;
        $record->status = "not_available";
        $record->user_id = 1;
        $record->condition = 9;
        $record->education_level = "secondary";
        $record->save();

        $record = new TradingItem();
        $record->name = "SPM KERTAS PERCUBAAN MATEMATIK TAMBAHAN (DWIBAHASA)";
        $record->description = "* 4-6 set kertas percubaan
        * soalan mirio soalan SPM sebenar
        * KBAT
        * Cadangan jawapan";
        $record->image = "SPM_AM.jpeg";
        $record->price = 5.50;
        $record->status = "available";
        $record->user_id = 2;
        $record->condition = 8;
        $record->education_level = "secondary";
        $record->save();

        $record = new TradingItem();
        $record->name = "Focus Visual PT3 2020 Geografi";
        $record->description = "Siri ini menyediakan nota padat, tepat dan mudah diingat, illustrasi dan gambar foto menerik dan berfungsi, cabaran KBAT, soalan uji diri dan animasi tiga dimensi dengan kemudahan Augmented Reality (AR)";
        $record->image = "PT3_GEO.jpeg";
        $record->price = 31.95;
        $record->status = "available";
        $record->user_id = 1;
        $record->condition = 9;
        $record->education_level = "secondary";
        $record->save();
        
        $record = new TradingItem();
        $record->name = "250 UPSR Model Writing English SK";
        $record->description = "This book is written based on the latest UPSR English SK format.";
        $record->image = "UPSR_BI.jpeg";
        $record->price = 17.90;
        $record->status = "available";
        $record->user_id = 2;
        $record->condition = 9;
        $record->education_level = "primary";
        $record->save();

        $record = new TradingItem();
        $record->name = "Swashby and the Sea";
        $record->description = "Captain Swashby is a reclusive retired sailor happy with his quiet life by the sea—until an energetic girl and her grandmother move in next door. This delightful book checks all the right boxes for kindergarten books: lovable and diverse characters, heartwarming themes, charming artwork, and discussion-worthy vocabulary. There are even a handful of authentic chances to review phonics skills and sight words as students decipher messages written in the sand.";
        $record->image = "KINDERGARTEN_EXP_TRADE.jpeg";
        $record->price = 37.90;
        $record->status = "available";
        $record->user_id = 1;
        $record->condition = 9;
        $record->education_level = "kindergarten";
        $record->save();

        $record = new TradingItem();
        $record->name = "Diabetes : Disarming the Silent Killer (Sunway Academe)";
        $record->description = "Gathers a prominent group of global researchers who share expert knowledge and views on diabetes. Readers will gain insights into groundbreaking therapies and approaches to preventing and managing diabetes complications. The book, a result of the 3rd Cambridge-Oxford-Sunway Biomedical Symposium, further shares the most recent advances in diabetes research from a Malaysian perspective.";
        $record->image = "UNIVERSITY_BOOK_TRADE.jpeg";
        $record->price = 168.00;
        $record->status = "available";
        $record->user_id = 1;
        $record->condition = 9;
        $record->education_level = "university";
        $record->save();

    }
}
