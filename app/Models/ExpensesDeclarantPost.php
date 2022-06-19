<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesDeclarantPost extends Model
{
    use HasFactory;

    public $table = 'expenses_declarant_posts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'spent_coins',
        'for',
        'declarant_post_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function declarant_post()
    {
        return $this->belongsTo(Declarant::class, 'declarant_post_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
