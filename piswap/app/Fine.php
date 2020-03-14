<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    public $table = "fines";

    protected $fillable = [
        'date', 'fine', 'state', 'borrow_id'
    ];

    public function borrow()
    {
        return $this->belongsTo('App\Borrow');
    }
}
