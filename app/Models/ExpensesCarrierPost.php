<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesCarrierPost extends Model
{
    use HasFactory;

    public $table = 'expenses_carrier_posts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'spent_coins',
        'for',
        'carrier_post_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function carrier_post()
    {
        return $this->belongsTo(CarrierPost::class, 'carrier_post_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
