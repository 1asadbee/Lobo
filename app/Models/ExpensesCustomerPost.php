<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesCustomerPost extends Model
{
    use HasFactory;

    public $table = 'expenses_customer_posts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'spent_coins',
        'for',
        'customer_post_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customer_post()
    {
        return $this->belongsTo(CustomerPost::class, 'customer_post_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
