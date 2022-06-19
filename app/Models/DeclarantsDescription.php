<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeclarantsDescription extends Model
{
    use HasFactory;

    public $table = 'declarants_descriptions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'declarant_id',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function declarant()
    {
        return $this->belongsTo(Declarant::class, 'declarant_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
