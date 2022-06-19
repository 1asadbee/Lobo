<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierPost extends Model
{
    use HasFactory;

    public $table = 'carrier_posts';

    protected $dates = [
        'departure_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'from_id',
        'to_id',
        'status',
        'departure_time',
        'free_weight',
        'free_area',
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

    public function getDepartureTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDepartureTimeAttribute($value)
    {
        $this->attributes['departure_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function description()
    {
        return $this->belongsTo(CarrierPostsDescription::class, 'carrier_posts_description_id');
    }

    public function delivery_type($user_id)
    {
        $carrier = Carrier::where('user_id',$user_id)->first();

        $delivery_type = DeliveryType::where('id',$carrier->delivery_type_id)->first();

        return $delivery_type;
    }

    public function vehicle_type($user_id)
    {
        $carrier = Carrier::where('user_id',$user_id)->first();

        $vehicle_type = VehicleType::where('id',$carrier->vehicle_type_id)->first();

        return $vehicle_type;
    }

    public function trailer_size($user_id)
    {
        $carrier = Carrier::where('user_id',$user_id)->first();

        $trailer_size = TrailerSize::where('id',$carrier->trailer_size_id)->first();

        return $trailer_size;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
