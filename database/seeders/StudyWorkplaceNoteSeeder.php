<?php

namespace Database\Seeders;

use App\Models\StudyWorkplaceNote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyWorkplaceNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            $record = new StudyWorkplaceNote();
            $record->title = "Biologi Form 4 Bab 4 : Komposisi Kimia Dalam Sel";
            $record->description = "In Biologi Form 4 Bab 4, the spotlight falls on 'Komposisi Kimia Dalam Sel' or Chemical Composition Within Cells. This chapter unravels the molecular tapestry of life, delving into the substances that constitute cells. From proteins to nucleic acids, students embark on a microscopic journey, understanding the building blocks that orchestrate the intricate dance of cellular processes. Bab 4 illuminates the biochemical intricacies fundamental to comprehending the essence of life at the cellular level.";
            $record->education_level = "secondary";
            $record->year = 4;
            $record->like = 10;
            $record->note_url = "Biologi-Bab-4.pdf";
            $record->save();

            $record = new StudyWorkplaceNote();
            $record->title = "Biologi Form 5 Bab 1 : Pengangkutan";
            $record->description = "In Biologi Form 5 Bab 1, the focus shifts to 'Pengangkutan' or Transportation. This chapter navigates the intricate pathways of biological transport systems. From the circulation of nutrients in plants to the cardiovascular marvels in animals, students explore the mechanisms that sustain life. Bab 1 lays the groundwork for a comprehensive understanding of how living organisms efficiently transport essential elements vital for their survival.";
            $record->education_level = "secondary";
            $record->year = 5;
            $record->like = 20;
            $record->note_url = "Biologi-F5-C1.pdf";
            $record->save();

            $record = new StudyWorkplaceNote();
            $record->title = "Form 2 Science Chapter 7 : Dynamic";
            $record->description = "Form 2 Science Chapter 7 delves into the dynamic realm of scientific principles. Exploring motion, forces, and the interplay of energy, students encounter the dynamic forces shaping our physical world. This chapter engages learners in understanding the dynamic nature of natural phenomena, laying the foundation for a deeper appreciation of physics and the forces that govern our surroundings.";
            $record->education_level = "secondary";
            $record->year = 2;
            $record->like = 40;
            $record->note_url = "form_2_science_c2.pdf";
            $record->save();

            $record = new StudyWorkplaceNote();
            $record->title = "Primary 6 Science Chapter 7 : Eclipse";
            $record->description = "In Primary 6 Science Chapter 7, students delve into the captivating phenomenon of eclipses. Exploring the alignment of celestial bodies, the curriculum demystifies solar and lunar eclipses, fostering a basic understanding of astronomical events. This chapter ignites young minds, introducing them to the cosmic dance of shadows and light in our vast universe.";
            $record->education_level = "primary";
            $record->year = 6;
            $record->like = 10;
            $record->note_url = "UPSR_C6.pdf";
            $record->save();

            $record = new StudyWorkplaceNote();
            $record->title = "Markov Chain";
            $record->description = "Markov chains are mathematical models that describe a sequence of events, where the probability of each event depends only on the state of the previous one. Named after Russian mathematician Andrey Markov, these chains find applications in various fields, from economics to biology and computer science. The system's future state is determined solely by its current state, embodying the principle of memorylessness. Markov chains are employed in predictive text algorithms, weather forecasting, and even board games. Their simplicity and versatility make them a powerful tool for understanding and simulating sequential processes in diverse realms of study.";
            $record->education_level = "university";
            $record->like = 1000;
            $record->major = "information_technology";
            $record->note_url = "UNIVERSITY_NOTE.pdf";
            $record->save();
    }
}
