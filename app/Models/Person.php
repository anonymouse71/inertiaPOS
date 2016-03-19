<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Person
 *
 * @property-read \App\Models\Customer $customer
 */
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
