<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KindergartenLanguageSeeder::class,
            KindergartenCuriccularSeeder::class,
            KindergartenInteractiveSeeder::class,
            TradingItemSeeder::class,
            DonationItemSeeder::class,
            CrashCourseSeeder::class,
            WebminarSeeder::class,
            StudyWorkplaceNoteSeeder::class,
            StudyWorkplaceTutorialSeeder::class,
            ChatRoomSeeder::class,
            MeetingRoomSeeder::class,
            PastYearPaperSeeder::class,
            CommunityNoteSeeder::class,
            MentalHealthArticleSeeder::class,
            CounsellingSectionSeeder::class,
            FinancialAidSeeder::class,
            GuestLectureSeeder::class,
            GameCollectionSeeder::class,
            FundraisingRecordSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
