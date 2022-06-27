<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declarant extends Model
{
    use HasFactory;

    public $table = 'declarants';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'declaration',
        'settlement_fee',
        'registration_certificate',
        'obtaining_license',
        'obtaining_permits',
        'unusual_cargo',
        'insurance',
        'status',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function description()
    {
        return $this->hasOne(DeclarantsDescription::class, 'declarant_id', 'id');
    }




    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
