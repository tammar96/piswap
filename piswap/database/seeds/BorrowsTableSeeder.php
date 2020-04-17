<?php

use Illuminate\Database\Seeder;

class BorrowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('borrows')->insert(array(
            array('date_from' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-30 days'), 'date_to' => $faker->dateTimeBetween('-30 days', 'now'), 'user_email' => 'peter.novak@google.com', 'book_isbn' => '875-8-45-610472-4'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-30 days'), 'date_to' => $faker->dateTimeBetween('-30 days', 'now'), 'user_email' => 'peter.novak@google.com', 'book_isbn' => '875-8-45-610472-4'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'peter.novak@google.com', 'book_isbn' => '399-5-21-597320-2'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'eget.ipsum.Donec@necmollisvitae.edu', 'book_isbn' => '089-1-92-496553-0'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'eget.ipsum.Donec@necmollisvitae.edu', 'book_isbn' => '413-1-37-385296-4'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'dui.Fusce@Sedeget.edu', 'book_isbn' => '945-8-05-519602-7'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'dui.Fusce@Sedeget.edu', 'book_isbn' => '117-7-08-244424-9'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'dui.Fusce@Sedeget.edu', 'book_isbn' => '928-9-07-828201-8'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'Cras.sed.leo@sitametnulla.com', 'book_isbn' => '321-2-12-548497-1'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'Cras.sed.leo@sitametnulla.com', 'book_isbn' => '903-9-55-049889-2'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'Cras.sed.leo@sitametnulla.com', 'book_isbn' => '229-1-25-617552-7'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'Cras.sed.leo@sitametnulla.com', 'book_isbn' => '288-6-76-460964-5'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'tincidunt@mitempor.com', 'book_isbn' => '919-8-84-878286-0'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'tincidunt@mitempor.com', 'book_isbn' => '652-6-34-576222-8'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'tincidunt@mitempor.com', 'book_isbn' => '523-7-47-565196-2'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'tincidunt@mitempor.com', 'book_isbn' => '170-2-97-367914-5'),
            array('date_from' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'date_to' => $faker->dateTimeBetween('now', '+30 days'), 'user_email' => 'Sed.eget.lacus@Suspendisse.org', 'book_isbn' => '981-0-21-382667-8'),
        ));
    }
}
