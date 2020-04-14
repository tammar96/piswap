<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('reservations')->insert(array(
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'sit.amet@tristique.net', 'book_isbn' => '939-8-09-194620-6'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'sit.amet@tristique.net', 'book_isbn' => '151-3-36-637737-0'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'sit.amet@tristique.net', 'book_isbn' => '007-6-04-713537-2'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'sit.amet@tristique.net', 'book_isbn' => '044-2-40-494884-0'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'sit.amet@tristique.net', 'book_isbn' => '945-8-05-519602-7'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'a.scelerisque.sed@urnasuscipit.ca', 'book_isbn' => '945-8-05-519602-7'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'a.scelerisque.sed@urnasuscipit.ca', 'book_isbn' => '329-6-19-732159-2'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'a.scelerisque.sed@urnasuscipit.ca', 'book_isbn' => '638-1-06-033769-0'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'nisi.Mauris@risus.edu', 'book_isbn' => '053-5-78-027121-1'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'nisi.Mauris@risus.edu', 'book_isbn' => '188-1-85-291753-7'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'nec.malesuada.ut@litoratorquent.co.uk', 'book_isbn' => '117-7-08-244424-9'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'nec.malesuada.ut@litoratorquent.co.uk', 'book_isbn' => '775-4-24-390773-8'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'nec.malesuada.ut@litoratorquent.co.uk', 'book_isbn' => '102-3-06-154960-3'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'risus.Nulla.eget@arcuvelquam.com', 'book_isbn' => '826-9-48-662544-1'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'risus.Nulla.eget@arcuvelquam.com', 'book_isbn' => '585-2-95-411447-9'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'non.sollicitudin.a@ac.net', 'book_isbn' => '585-2-95-411447-9'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'non.sollicitudin.a@ac.net', 'book_isbn' => '964-3-07-981413-4'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'in.consectetuer.ipsum@scelerisque.com', 'book_isbn' => '775-7-89-398549-7'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'ultricies@Integer.org', 'book_isbn' => '659-9-33-452395-7'),
            array('date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'), 'user_email' => 'sem@idnunc.org', 'book_isbn' => '273-2-30-038332-1'),
        ));
    }
}
