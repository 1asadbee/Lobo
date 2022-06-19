<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierPostsDescription extends Model
{
    use HasFactory;

    public $table = 'carrier_posts_descriptions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'carrier_post_id',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function carrier_post()
    {
        return $this->belongsTo(CarrierPost::class, 'carrier_post_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
