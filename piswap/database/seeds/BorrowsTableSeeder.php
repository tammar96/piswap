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
        DB::table('borrows')->insert(array(
            array('date'=>' 2020-04-11 ','user_id'=>'peter.novak@google.com','book_id'=>'014-1-21-659614-5')
        ));
    }
}
