<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    private $_roles = [
        'guest'     => 0,
        'user'      => 1,
        'librarian' => 2,
        'admin'     => 3
    ];

    public $table = "users";

    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'name', 'surname', 'email', 'role', 'address', 'telephone', 'active', 'password'
    ];

    protected $casts = [
         'address' => 'json',
     ];

    public function borrows()
    {
        return $this->hasMany('App\Borrow');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function hasRole($role)
    {
        if (!in_array($role, $this->_roles))
            return false;
        return $this->_roles[$this->role] >= $this->_roles[$role];
    }
    // TODO for fine
}
