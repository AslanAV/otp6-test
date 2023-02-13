<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'phone_number',
        'email',
        'address',
        'sum_of_order',
        'created_at',
    ];

    public function goods(): BelongsToMany
    {
        return $this->belongsToMany(Good::class);
    }
}
