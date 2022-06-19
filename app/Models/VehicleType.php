<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VehicleType extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'vehicle_types';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'name_tr',
        'name_cy',
        'vehicle_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function vehicleTypeCustomerPosts()
    {
        return $this->hasMany(CustomerPost::class, 'vehicle_type_id', 'id');
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

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
