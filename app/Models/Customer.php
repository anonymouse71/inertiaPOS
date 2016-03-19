<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 *
 * @package App\Models
 * @property-read \App\Models\Person $person
 * @property-read mixed $name
 * @property-read mixed $phone
 * @property-read mixed $email
 * @property-read mixed $address
 */
class Customer extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'person_id',
        'company_name',
        'courier',
    ];
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * @var array
     */
    protected $with = ['person'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    // <<<<<<<<<< Accessors & Mutators >>>>>>>>>>
    /**
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->person->name;
    }

    /**
     * @return mixed
     */
    public function getPhoneAttribute()
    {
        return $this->person->phone;
    }

    /**
     * @return mixed
     */
    public function getEmailAttribute()
    {
        return $this->person->email;
    }

    /**
     * @return mixed
     */
    public function getAddressAttribute()
    {
        return $this->person->address;
    }
}
