<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;

    public $table = 'carriers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'vehicle_model_id',
        'delivery_type_id',
        'vehicle_type_id',
        'vehicle_number',
        'trailer_size_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vehicle_model()
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

    public function delivery_type()
    {
        return $this->belongsTo(DeliveryType::class, 'delivery_type_id');
    }

    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    public function trailer_size()
    {
        return $this->belongsTo(TrailerSize::class, 'trailer_size_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
