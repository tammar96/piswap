<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    public $table = "borrows";

    protected $fillable = [
        'date', 'user_id'
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
