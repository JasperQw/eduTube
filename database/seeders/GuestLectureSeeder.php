<?php

namespace Database\Seeders;

use App\Models\GuestLecture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $record = new GuestLecture();
        $record->title = "32 bit Single Precision floating point";
        $record->description = "32-bit Single Precision floating point is a binary representation format used in computing to store and manipulate real numbers with precision. It allocates 32 bits, organized into sign, exponent, and fraction fields. Widely employed in graphics, scientific computations, and more, it balances accuracy and storage efficiency for various applications.";
        $record->like = 20;
        $record->yt_code = "TIrGxZagS7A";
        $record->education_level = 'university';
        $record->major = 'information_technology';
        $record->save();

        $record = new GuestLecture();
        $record->title = "What is 0 to the power of 0?";
        $record->description = "The concept of 0 to the power of 0 is mathematically ambiguous and lacks a universally agreed-upon definition. While some contexts treat it as an undefined form due to potential inconsistencies, others approach it differently. This mathematical curiosity sparks debates and requires careful consideration within specific applications and disciplines.";
        $record->yt_code = "r0_mi8ngNnM";
        $record->education_level = 'secondary';
        $record->year = 3;
        $record->save();

        $record = new GuestLecture();
        $record->title = "The sum of all counting numbers equals WHAT?";
        $record->description = "This is a well-known and hugely controversial result. The proof I've demonstrated is not the only way to show it - there are far more sophisticated and convincing ways to do it - but suffice to say that I went through it to raise questions and provoke thought rather than to make a statement about its validity or otherwise! Hope it makes you think.";
        $record->like = 10;
        $record->yt_code = "P913qwtXihk";
        $record->education_level = 'secondary';
        $record->year = 5;
        $record->save();

        $record = new GuestLecture();
        $record->title = "Can 1^x=2?";
        $record->description = "Is it possible to have 1^x=2? We know that 1 to any power is 1 so does that mean the exponential equation 1^x=2 really has no solutions? While WolframAlpha didn't provide a solution for this exponential equation, maybe we can still try to find some complex solutions. This is a very interesting equation and we will see how to solve it!";
        $record->like = 40;
        $record->yt_code = "9wJ9YBwHXGI";
        $record->education_level = 'primary';
        $record->year = 6;
        $record->save();
    }
}
