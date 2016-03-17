<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
    ];

    // <<<<<<<<<< Relationships >>>>>>>>>>
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
