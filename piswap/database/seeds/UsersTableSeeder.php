<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = new DateTime('now'); // In case if it's needed

        DB::table('users')->insert(array(
            array(
                'name'      => 'Peter',
                'surname'   => 'Novak',
                'email'     => 'peter.novak@google.com',
                'role'      => 'user',
                'address'   => json_encode(array(
                    "State" => "Slovakia",
                    "City"  => "Sered",
                    "Street"=> "Hlavna cesta",
                    "Number"=> "123"
                )),
                'telephone' => '0905636912',
                'active'    => True,
                'password'   => bcrypt('123456789')
            ),
        ));
    }
}
