<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public $table = 'states';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'country_id',
        'name_uz',
        'name_ru',
        'name_en',
        'name_tr',
        'name_cy',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function fromCarrierPosts()
    {
        return $this->hasMany(CarrierPost::class, 'from_id', 'id');
    }

    public function toCarrierPosts()
    {
        return $this->hasMany(CarrierPost::class, 'to_id', 'id');
    }

    public function fromCustomerPosts()
    {
        return $this->hasMany(CustomerPost::class, 'from_id', 'id');
    }

    public function toCustomerPosts()
    {
        return $this->hasMany(CustomerPost::class, 'to_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
