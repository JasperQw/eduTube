<?php

namespace Database\Seeders;

use App\Models\FinancialAid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinancialAidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $record = new FinancialAid();
        $record->name = "JPA – Program Khas JPA MARA (PKJM)";
        $record->link = "https://biasiswa.co/biasiswa-jpa-program-khas-jpa-mara-pkjm/";
        $record->start = "12 JUN 2023";
        $record->end = "26 JUN 2023";
        $record->type = 'scholarship';
        $record->save();

        $record = new FinancialAid();
        $record->name = "JPA – Program Khas Jepun, Korea, Perancis dan Jerman (JKPJ)";
        $record->link = "https://bit.ly/Apply-JPA-JKPJ";
        $record->start = "12 JUN 2023";
        $record->end = "26 JUN 2023";
        $record->type = 'scholarship';
        $record->save();

        $record = new FinancialAid();
        $record->name = "PETRONAS Education Sponsorship Programme (PESP)";
        $record->link = "https://bit.ly/Apply-Biasiswa-Petronas";
        $record->start = "8 JUN 2023";
        $record->end = "16 JUN 2023";
        $record->type = 'scholarship';
        $record->save();

        $record = new FinancialAid();
        $record->name = "BANK NEGARA – THE KIJANG Scholarship";
        $record->link = "https://bit.ly/Apply-BNM-Scholarship";
        $record->start = "6 JUN 2023";
        $record->end = "26 JUN 2023";
        $record->type = 'scholarship';
        $record->save();

        $record = new FinancialAid();
        $record->name = "YAYASAN UEM Scholarship";
        $record->link = "https://bit.ly/Apply-UEM-Scholarship";
        $record->start = "8 JUN 2023";
        $record->end = "21 JUN 2023";
        $record->type = 'scholarship';
        $record->save();

        $record = new FinancialAid();
        $record->name = "SHELL Scholarship";
        $record->link = "https://bit.ly/Apply-Shell-Scholarship";
        $record->start = "8 JUN 2023";
        $record->end = "25 JUN 2023";
        $record->type = 'scholarship';
        $record->save();

        $record = new FinancialAid();
        $record->name = "AMMA Foundation Study Loan";
        $record->link = "http://www.ammafoundation.com.my/html/news_details.aspx?NID=dC6S927MNn5puyKUh5JQgA==";
        $record->type = 'loan';
        $record->save();
        
        $record = new FinancialAid();
        $record->name = "ECM Libra Foundation Study Loan";
        $record->link = "https://www.ecmlibrafoundation.com/student-loan/";
        $record->type = 'loan';
        $record->save();

        $record = new FinancialAid();
        $record->name = "MARA Loans";
        $record->link = "https://www.mara.gov.my/en/index/education/education-financing/";
        $record->type = 'loan';
        $record->save();
    }
}
