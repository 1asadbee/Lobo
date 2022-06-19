<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPostsDescription extends Model
{
    use HasFactory;

    public $table = 'customer_posts_descriptions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'customer_post_id',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customer_post()
    {
        return $this->belongsTo(CustomerPost::class, 'customer_post_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
