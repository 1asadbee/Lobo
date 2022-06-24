<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPost extends Model
{
    use HasFactory;

    public $table = 'customer_posts';

    protected $dates = [
        'daten',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'from_id',
        'to_id',
        'from_city',
        'to_city',
        'delivery_type_id',
        'vehicle_type_id',
        'load',
        'load_type_id',
        'weight',
        'area',
        'daten',
        'price',
        'currency_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function from()
    {
        return $this->belongsTo(State::class, 'from_id');
    }

    public function to()
    {
        return $this->belongsTo(State::class, 'to_id');
    }

    public function delivery_type()
    {
        return $this->belongsTo(DeliveryType::class, 'delivery_type_id');
    }

    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    public function load_type()
    {
        return $this->belongsTo(LoadType::class, 'load_type_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s',$value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }
    public function setDateAttribute($value)
    {
        $this->attributes['daten'] = $value ? Carbon::createFromFormat(config('panel.date_format'). ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    public function description()
    {
        return $this->hasOne(CustomerPostsDescription::class, 'customer_post_id', 'id');
    }
}
