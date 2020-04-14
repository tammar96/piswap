<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            array('title' => 'Action', 'description' => 'Action and adventure books constantly have you on the edge of your seat with excitement, as your fave main character repeatedly finds themselves in high stakes situations. The protagonist has an ultimate goal to achieve and is always put in risky, often dangerous situations. This genre typically crosses over with others like mystery, crime, sci-fi, and fantasy.'),
            array('title' => 'Classics', 'description' => 'You may think of these books as the throwback readings you were assigned in English class. (Looking at you, Charles Dickens.) The classics have been around for decades, and were often groundbreaking stories at their publish time, but have continued to be impactful for generations, serving as the foundation for many popular works we read today.'),
            array('title' => 'Comic', 'description' => 'The stories in comic books and graphic novels are presented to the reader through engaging, sequential narrative art (illustrations and typography) that is either presented in a specific design or the traditional panel layout you find in comics. With both, you\'ll often find the dialogue presented in the tell-tale "word balloons" next to the respective characters.'),
            array('title' => 'Crime', 'description' => 'As the name suggests, this book genre deals with crime, criminal motives and the investigation and detection of the crime and criminals.'),
            array('title' => 'Drama', 'description' => 'Dramas are stories composed in verse or prose, usually for theatrical performance, where conflicts and emotions are expressed through dialogue and actions.'),
            array('title' => 'Fable', 'description' => 'Fables are fictional narratives in prose or verse that typically features personified animals, mythical and legendary creatures, plants, etc. as the main characters. The characters in fable possess human qualities, such as the ability to speak in human language. These legendary tales demonstrate some useful truth and are meant to teach a moral lesson.'),
            array('title' => 'Fairy Tale', 'description' => 'Fairy tale is usually a story for children that involves imaginary creatures and magical events.'),
            array('title' => 'Fan-fiction', 'description' => 'Fan Fiction, as the name suggests, is a fiction written by a fan of a particular book or book series. The characters and the plot of fan fiction are usually taken from the original work but the story is different.'),
            array('title' => 'Fantasy', 'description' => 'A Book under this genre contains a story set in a fantasy world – a world that is not real and often includes magic, magical creatures, and supernatural events.'),
            array('title' => 'Historical', 'description' => 'Historical fiction is a genre of book that includes writings that reconstruct the past. The story is set in the past keeping the manners, social conditions and other details of that period unchanged. The writers incorporate the past events or people in their fictitious stories.'),
            array('title' => 'Horror', 'description' => 'Horror is a genre that is intended to or has the ability to create the feeling of fear, repulsion, fright or terror in the readers. In other words, it creates a frightening and horror atmosphere.'),
            array('title' => 'Humor', 'description' => 'Humor fiction is usually full of fun, fancy, and excitement. It is meant to entertain and sometimes cause intended laughter in readers.'),
            array('title' => 'Legend', 'description' => 'It’s a story, sometimes of a national or folk hero that is considered to be based on facts but also includes imaginative material. Narratives in this genre may demonstrate human values, and possess certain qualities that give the readers a reason to believe in the tale.'),
            array('title' => 'Magical', 'description' => 'It is a genre of book wherein magical or unreal elements play a natural part in an otherwise-realistic environment. Mystery books have a suspenseful plot that often involves a mysterious crime. Suspects and motives are considered and clues throughout the story lead to a solution to the problem.'),
            array('title' => 'Mythology', 'description' => 'These books include a legend or traditional narrative, often based in part on historical events, that reveals human behavior and natural phenomena by its symbolism and often pertaining to the actions of the gods.'),
            array('title' => 'Romance', 'description' => 'The primary focus of romance fiction is on the relationship and romantic love between two people. These books have an emotionally satisfying and optimistic ending.'),
            array('title' => 'Sci-Fi', 'description' => 'Science Fiction typically deals with imaginative and futuristic concepts such as advanced science and technology, time travel, extraterrestrial life, etc. The stories are often set in the future or on other planets.'),
            array('title' => 'Thriller', 'description' => 'This genre of book is characterized and defined by the moods they evoke among the readers, giving them heightened feelings of suspense, excitement, thrill, surprise, anticipation, and anxiety. Literary devices such as plot twists and cliffhangers are extensively used in this genre.'),
            array('title' => 'Biography', 'description' => 'Biography is a narrative on someone’s life written by someone else. When a person himself writes about his life, then the book is called an autobiography.'),
            array('title' => 'Poetry', 'description' => 'Poetry is one of the most important genres of books in which the expression of feelings and ideas is given intensity by the use of distinctive style and rhythm. Poems written under poetry can be of different types according to the style in which they are written.')
        ));
    }
}
