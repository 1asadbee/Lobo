<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Vehicle extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'vehicles';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'delivery_type_id',
        'name_uz',
        'name_cy',
        'name_ru',
        'name_en',
        'name_tr',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function vehicleVehicleTypes()
    {
        return $this->hasMany(VehicleType::class, 'vehicle_id', 'id');
    }

    public function vehicleTypeCarriers()
    {
        return $this->hasMany(Carrier::class, 'vehicle_type_id', 'id');
    }

    public function delivery_type()
    {
        return $this->belongsTo(DeliveryType::class, 'delivery_type_id');
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
