<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public $table = 'currencies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_uz',
        'name_cy',
        'name_ru',
        'name_en',
        'name_tr',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function currencyCustomerPosts()
    {
        return $this->hasMany(CustomerPost::class, 'currency_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
