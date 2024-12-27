<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class ProductSubscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'phone', 
        'email',
        'proof',
        'booking_trx_id',
        'total_amount',
        'total_tax_amount',
        'customer_bank_name',
        'customer_bank_account',
        'customer_bank_number',
        'is_paid',
        'duration',
        'price',
        'product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function group(): HasOne
    {
        return $this->hasOne(SubscrtiptionGroup::class , 'product_subscription_id');
    }
}