<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";
    protected $primaryKey = 'isbn';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $primaryKey = 'isbn';

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

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
