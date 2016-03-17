<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package App\Models
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
    public function getNameAttribute()
    {
        return $this->person->name;
    }

    public function getPhoneAttribute()
    {
        return $this->person->phone;
    }

    public function getEmailAttribute()
    {
        return $this->person->email;
    }

    public function getAddressAttribute()
    {
        return $this->person->address;
    }
}
