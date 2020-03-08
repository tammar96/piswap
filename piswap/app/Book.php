<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "Book";

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function borrows()
    {
        return $this->hasMany('App\Borrow');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }
}
