<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    public $table = "borrows";
    public $timestamps = false;

    protected $fillable = [
        'date', 'user_email'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
