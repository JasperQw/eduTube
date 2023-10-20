<?php

namespace Database\Seeders;

use App\Models\MentalHealthArticle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MentalHealthArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $record = new MentalHealthArticle();
        $record->title = "Young people’s mental health is finally getting the attention it needs";
        
        $record->description = "The COVID-19 pandemic, a UNICEF report and a review of the latest research all highlight the urgent need for better prevention and treatment of youth anxiety and depression.";
        $record->content = "Worldwide, at least 13% of people between the ages of 10 and 19 live with a diagnosed mental-health disorder, according to the latest State of the World’s Children report, published this week by the United Nations children’s charity UNICEF. It’s the first time in the organization’s history that this flagship report has tackled the challenges in and opportunities for preventing and treating mental-health problems among young people. It reveals that adolescent mental health is highly complex, understudied — and underfunded. These findings are echoed in a parallel collection of review articles published this week in a number of Springer Nature journals.

        Anxiety and depression constitute more than 40% of mental-health disorders among young people (those aged 10–19). UNICEF also reports that, worldwide, suicide is the fourth most-common cause of death (after road injuries, tuberculosis and interpersonal violence) among adolescents (aged 15–19). In eastern Europe and central Asia, suicide is the leading cause of death for young people in that age group — and it’s the second-highest cause in western Europe and North America.
        
        Sadly, psychological distress among young people seems to be rising. One study found that rates of depression among a nationally representative sample of US adolescents (aged 12 to 17) increased from 8.5% of young adults to 13.2% between 2005 and 20171. There’s also initial evidence that the coronavirus pandemic is exacerbating this trend in some countries. For example, in a nationwide study2 from Iceland, adolescents (aged 13–18) reported significantly more symptoms of mental ill health during the pandemic than did their peers before it. And girls were more likely to experience these symptoms than were boys.

        Although most mental-health disorders arise during adolescence, UNICEF says that only one-third of investment in mental-health research is targeted towards young people. Moreover, the research itself suffers from fragmentation — scientists involved tend to work inside some key disciplines, such as psychiatry, paediatrics, psychology and epidemiology, and the links between research and health-care services are often poor. This means that effective forms of prevention and treatment are limited, and lack a solid understanding of what works, in which context and why.

        This week’s collection of review articles dives deep into the state of knowledge of interventions — those that work and those that don’t — for preventing and treating anxiety and depression in young people aged 14–24. In some of the projects, young people with lived experience of anxiety and depression were co-investigators, involved in both the design and implementation of the reviews, as well as in interpretation of the findings.";

        $record->like = 15;
        $record->user_id = 2;
        $record->save();
    }
}
